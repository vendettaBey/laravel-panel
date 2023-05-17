<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "askdgsfophg";

use pmill\Plesk\CreateSubscription;


require_once __DIR__ . '/../controller/Customer.php';
require_once __DIR__ . '/../../Ftp/controller/Ftp.php';
require_once __DIR__ . '/../../../src/pmill/Plesk/CreateSubscription.php';
require_once __DIR__ . '/../../Domain/list/listDomains.php';
require_once __DIR__ . '/../../Databases/list/listDatabase.php';
require_once __DIR__ . '/../../Databases/add/createDatabase.php';
require_once __DIR__ . '/../../Databases/user/User.php';
require_once __DIR__ . '/../../File/FileTransfer.php';
require_once __DIR__ . '/../../File/sendFileToServer.php';

$customer = new Customer();
$ftp = new Ftp();
$listDomains = new listDomains();
$listDatabase = new listDatabase();
$createDatabase = new createDatabase();
$dbUser = new User();




if ($_POST['islem'] == 'add' && $_POST['token'] != "" && $_POST['ipAddress'] == "167.235.22.206") {
    $ipAddress = $_POST['ipAddress'];
    $smsCode = $_POST['smsCode'];
    $telephone = $_POST['telephone'];

    $checkSmsCode = $customer->VeriGetir("smscode", "tel=? AND code=?", [$telephone, $smsCode]);
    if (isset($checkSmsCode[0])) {
        $smsCheck = true;
    } else {
        $smsCheck = false;
    }
    if ($checkSmsCode == false) {
        $res = [
            'status' => 'error',
            'message' => 'SMS Kodu Hatalı',
            'modal' => false
        ];
        echo json_encode($res);
    } else {
        //* Token Kontrol
        $username = $_POST['userId'];
        $token = $_POST['token'];
        $ourToken = $customer->VeriGetir("token", "username=?", [$username])[0];
        $ourToken = $ourToken['password'];
        $ourToken = password_verify($ourToken, $token);

        if ($ourToken) {
            $res = [];
            $siteAddress = $customer->guvenlik($_POST['magaza']);
            $username = strtolower($customer->guvenlik($customer->turkishToEnglish($_POST['name'])) . $customer->guvenlik($customer->turkishToEnglish($_POST['surname'])));
            $password = md5($customer->guvenlik($_POST['password']));
            $panelPassword = $customer->guvenlik($_POST['password']);
            $email = $customer->guvenlik($_POST['email']);
            $uniqueId = time();
            $name = $customer->guvenlik($customer->turkishToEnglish($_POST['name']));
            $surname = $customer->guvenlik($customer->turkishToEnglish($_POST['surname']));
            $ftp_login = $username . $uniqueId;
            $randomPassword = "sifre" . substr(md5(rand(1, 1000)), 0, 5);
            $eklendi = $customer->addCustomer($ftp_login, $randomPassword);
            if ($eklendi != false) {
                $userClient = $customer->VeriGetir("client", "name=?", array("ucretsiz"))[0];
                if ($userClient != false) {
                    //$subDomain = $domain->addDomain($userClient,$password, $siteAddress);
                    $settings = $customer->VeriGetir("settings", "host=?", array("verysoft.com.tr"))[0];
                    $config = array(
                        'host' => $settings['host'],
                        'username' => $settings['username'],
                        'password' => $settings['password'],
                    );
                    $params = array(
                        'domain_name' => $siteAddress . '.e-very.com.tr',
                        'username' => $siteAddress,
                        'password' => $randomPassword,
                        'ip_address' => $ipAddress,
                        'owner_id' => 34,
                        'service_plan_id' => 11,
                    );
                    $request = new CreateSubscription($config, $params);
                    $info = $request->process();
                    $myDomain = $listDomains->getDomainInfo($siteAddress . '.e-very.com.tr');
                    // FTP Kullanıcı Oluşturma
                    $user = [
                        "username" => $siteAddress,
                        "password" => $randomPassword,
                        'path' => "/httpdocs",
                        'domain_id' => $myDomain['id'],
                        'domain_name' => $myDomain['name'],
                        'domain_guid' => $myDomain['guid'],
                    ];
                    $createFtp = $ftp->createFTPUser($user);
                    $ftpUser = json_decode($createFtp, true);

                    // Database Oluşturma
                    $db = [
                        'name' => $siteAddress,
                        'type' => 'mysql',
                        'domain_id' => $myDomain['id'],
                        'domain_name' => $myDomain['name'],
                        'domain_guid' => $myDomain['guid'],
                    ];
                    $database = $createDatabase->addDatabase($db);
                    //* Database User Oluşturma

                    $databaseUser = [
                        'username' => $username,
                        'password' => $randomPassword,
                        'domain_id' => $myDomain['id'],
                        'domain_name' => $myDomain['name'],
                        'domain_guid' => $myDomain['guid'],
                        'database_id' => $database->id,
                    ];
                    $dbUserInfo = $dbUser->createUser($databaseUser);

                    // File Transfer
                    $sendFileToServer = new sendFileToServer();

                    $source = [
                        'server' => "167.235.22.206",
                        'username' => 'vendettabey',
                        'password' => '5KasimVendetta',
                    ];

                    $target = [
                        'server' => '167.235.22.206',
                        'username' => $siteAddress,
                        'password' => $randomPassword,
                    ];

                    $data = [
                        'username' => $username,
                        'randomPassword' => $randomPassword,
                        'dbname' => $siteAddress
                    ];

                    $user_info = [
                        "username" => $username,
                        "password" => $panelPassword,
                        "email" => $email,
                    ];

                    $domainName = $siteAddress . ".e-very.com.tr";

                    $url = "http://ssl.verysoft.com.tr/api?domain=$domainName";
                    $sslUrl = "http://ssl.verysoft.com.tr/api";
                    /*
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYSTATUS => false,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache"
                    ),
                    ));
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
                    if ($err) {
                    echo "CURL Hatası: " . $err;
                    } else {
                    echo "CURL Cevabı: " . $response;
                    }
                    */








                    //* Database Php Dosyası Oluşturma
                    $databasePhp = $sendFileToServer->createDbPhp($data, $target);
                    //* Zip Dosyasını Açma
                    $zipTransfer = $sendFileToServer->sendZipFile($source, $target, $domainName, $user_info);

                    $location = "http://" . $domainName . "/zipExtract.php?domain=" . $domainName . "&pw=" . $user_info["password"] . "&name=" . $user_info["username"] . "&mail=" . $user_info["email"];

                    $res = [
                        'status' => 'success',
                        'message' => 'Müşteri Kaydı Oluşturuldu',
                        'modal' => true,
                        'location' => $location,
                        'loader' => true,
                        'domainName' => $domainName,
                        'sslUrl' => $sslUrl
                    ];
                }
            } else {
                $res = [
                    'status' => 'error',
                    'message' => 'Müşteri Kaydı Oluşturulamadı',
                    'modal' => false
                ];
            }

            echo json_encode($res);
        } else {
            $res = [
                'status' => 'error',
                'message' => 'Token Hatası',
                'modal' => false
            ];
            echo json_encode($res);
        }
    }
}