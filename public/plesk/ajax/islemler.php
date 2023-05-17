<?php
if (isset($_POST['operation'])) {
    $operation = $_POST['operation'];
    switch ($operation) {
        case 'MusteriEkle':
            if ($_POST['site'] == 'e-very') {
                $userId = "e-very";
                $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);

                $data = [
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'username' => $_POST['name'] . $_POST['surname'],
                    'password' => $_POST['password'],
                    'email' => $_POST['email'],
                    'telephone' => $_POST['telephone'],
                    'ipAddress' => "167.235.22.206", // $_SERVER['REMOTE_ADDR'],
                    'magaza' => $_POST['magaza'],
                    'token' => $hashPassword,
                    'userId' => $userId,
                    'islem' => 'add',
                    'smsCode' => $_POST['smsCode'],
                ];

                $ch = curl_init('https://api.verysoft.com.tr/every/Customer/add/');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                echo $response;
            }
            break;
        case 'smsCheck':
            if(isset($_POST['site']) && $_POST['site']=='e-very'){
                $userId="e-very";
                $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);
                $data = [
                    "token" => $hashPassword,
                    "userId" => $userId,
                    "operation" => "smsCheck",
                    "ipAddress" => "167.235.22.206", // $_SERVER['REMOTE_ADDR'],
                    "smsCode" => $_POST['smsCode'],
                    'islem'=> "smsCheck"
                ];

                $ch = curl_init('https://api.verysoft.com.tr/every/sms/checker/');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                echo $response;
                break;
            }
        case 'smsApi':
            if ($_POST['site'] == 'e-very') {
                $userId = "e-very";
                $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);
                $data = [
                    'token' => $hashPassword,
                    'userId' => $userId,
                    'operation' => 'smsApi',
                    'ipAddress' => "167.235.22.206", // $_SERVER['REMOTE_ADDR'],
                    'telephone' => $_POST['telephone'],
                    'islem' => 'add'
                ];

                $ch = curl_init('https://api.verysoft.com.tr/every/sms/sender/');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                echo (curl_error($ch));
                curl_close($ch);
                // $response = json_decode($response);


                echo $response;
            }
            break;

        case 'extractZip':
            if ($_POST['site'] == 'e-very') {
                $userId = "e-very";
                $domainName = $_POST['domain'];
                $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);
                $user_info = [
                    'username' => $_POST['name'],
                    'password' => $_POST['pw'],
                    'email' => $_POST['mail'],
                ];
                // $data = [
                //     'name' => $_POST['name'],
                //     'pw' => $_POST['pw'],
                //     'mail' => $_POST['mail'],
                //     'domain' => $_POST['domain'],
                //     'token' => $hashPassword,
                //     'userId' => $userId,
                //     'operation' => 'extractZip',
                //     'ipAddress' => "167.235.22.206", // $_SERVER['REMOTE_ADDR'],
                // ];

                $location = "http://" . $domainName . "/zipExtract.php?domain=" . $domainName . "&pw=" . $user_info["password"] . "&name=" . $user_info["username"] . "&mail=" . $user_info["email"];
                header("Location: " . $location);
                exit();
            }
            break;

        case 'ssl':
            if ($_POST['site'] == 'e-very') {
                $domain = $_POST['domain'];

                $ch = curl_init('http://ssl.verysoft.com.tr/api?domain=' . $domain);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                echo $response;
            }
            break;
    }
}
