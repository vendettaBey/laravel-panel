<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DomainModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Currency\Converter;
use App\Models\urunler;


class AjaxController extends Controller
{
    public function smsapi(Request $request)
    {
        $data = $request->all();

        $userId = "e-very";
        $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);
        $data = [
            'token' => $hashPassword,
            'userId' => $userId,
            'operation' => 'smsApi',
            'ipAddress' => "167.235.22.206",
            // $_SERVER['REMOTE_ADDR'],
            'telephone' => $_POST['telephone'],
            'islem' => 'add'
        ];

        $ch = curl_init('https://api.verysoft.com.tr/every/sms/sender/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }


    public function smsCheck(Request $request)
    {
        $data = $request->all();

        if (isset($data['site']) && $data['site'] == 'e-very') {
            $userId = "e-very";
            $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);
            $data = [
                "token" => $hashPassword,
                "userId" => $userId,
                "operation" => "smsCheck",
                "ipAddress" => "167.235.22.206",
                // $_SERVER['REMOTE_ADDR'],
                "smsCode" => $_POST['smsCode'],
                'islem' => "smsCheck"
            ];

            $ch = curl_init('https://api.verysoft.com.tr/every/sms/checker/');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
        }
    }

    public function musteriEkle(Request $request)
    {
        $data = $request->all();


        $password = $data["password"]; // Hashlenmesi gereken şifre
        $options = [
            'cost' => 12, // Bcrypt maliyet faktörü
        ];
        $pass = password_hash($password, PASSWORD_BCRYPT, $options);
        DB::table('users')->insert([
            'name' => $data['name'] . " " . $data['surname'],
            'telephone' => $data['telephone'],
            'password' => $pass,
            'email' => $data['email'],
        ]);
        $userInfo = User::where('telephone', $data['telephone'])->first();
        DB::table('domains')->insert([
            'user_id' => $userInfo->id,
            'domain_id' => time(),
            'domain_name' => $data['magaza'] . ".e-very.com.tr",
            'domain_status' => 'active',
            'start_date' => date('Y-m-d'),
            'end_date' => date('Y-m-d'),
        ]);


        $userId = "e-very";
        $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);

        $data = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'username' => $_POST['name'] . $_POST['surname'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'ipAddress' => "167.235.22.206",
            // $_SERVER['REMOTE_ADDR'],
            'magaza' => $_POST['magaza'],
            'token' => $hashPassword,
            'userId' => $userId,
            'islem' => 'add',
            'smsCode' => $_POST['smsCode'],
        ];

        $ch = curl_init('https://api.verysoft.com.tr/every/Customer/up/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;

    }

    public function ssl(Request $request)
    {
        if ($_POST['site'] == 'e-very') {
            $domain = $_POST['domain'];

            $ch = curl_init('http://ssl.verysoft.com.tr/api?domain=' . $domain);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);
            echo $response;
        }
    }

    public function extractZip(Request $request)
    {
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

    }

    public function saveDomainDb(Request $request)
    {
        $data = $request->all();

        $domainSave = DomainModel::create([
            'user_id' => Auth::user()->id,
            'domain_id' => $data['domain_id'],
            'domain_name' => $data['domain_name'],
            'domain_status' => "active",
            'start_date' => date('Y-m-d'),
        ]);

        if ($domainSave) {
            return response()->json([
                'status' => 'success',
                'message' => 'Domain başarıyla kaydedildi.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Domain kaydedilirken bir hata oluştu.',
            ]);
        }
    }

    public function saveUser(Request $request, Response $response)
    {
        $data = $request->all();

        $password = $data["password"]; // Hashlenmesi gereken şifre
        $options = [
            'cost' => 12, // Bcrypt maliyet faktörü
        ];

        $pass = password_hash($password, PASSWORD_BCRYPT, $options);

        $domainSave = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $pass,
            "telephone" => $data['telephone'],
        ]);

        if ($domainSave) {
            return response()->json([
                'status' => 'success',
                'message' => 'Domain başarıyla kaydedildi.',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Domain kaydedilirken bir hata oluştu.',
            ]);
        }
    }

    public function domainUcret(Request $request)
    {
        $data = $request->all();

        $domainName = $data['domainName'];
        $dUzanti = $data['domainTld'];

        $veri = [
            "dName" => $domainName,
            "dUzanti" => $dUzanti,
            "islem_tipi" => "sorgula"
        ];

        $ch = curl_init('https://api.verysoft.com.tr/domainname/islem.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $veri);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function domainAl(Request $request)
    {
        $data = $request->all();
        return view('panel.domainSatinAl', compact('data'));
    }

    public function buyDomain(Request $request)
    {
        $data = $request->all();
        $domainName = $data['domainName'];
        $dUzanti = $data['dUzanti'];
        $domainAd = $data['domainFirstName'];
        $domainSoyad = $data['domainLastName'];
        $email = $data['domainEmail'];
        $company = $data['domainCompany'];
        $telephone = $data['domainPhone'];
        $fax = $data['domainFax'];
        $address = $data['domainAddress'];
        $il = $data['domainIl'];
        $ilce = $data['domainIlce'];
        $cardHolder = $data['cardHolder'];
        $cardNumber = $data['cardNumber'];
        $cardMonth = $data['cardMonth'];
        $cardYear = $data['cardYear'];
        $cardCvv = $data['cardCvc'];
        $tutar = $data['tutar'];

        $tutar = str_replace(".", ",", $tutar);
        /*
        $dataDomain = [
        "domainFirstName" => $domainAd,
        "domainLastName" => $domainSoyad,
        "domainCompany" => $company,
        "domainEmail" => $email,
        "domainAddress" => $address,
        "domainIl" => $il,
        "domainIlce" => $ilce,
        "domainPhone" => $telephone,
        "domainFax" => $fax,
        "domainName" => $domainName,
        'domainAdi' => $domainName,
        "domainUzanti" => $dUzanti,
        'tutar' => $tutar,
        "islem_tipi" => "domainKayit",
        ];
        $ch = curl_init('https://api.verysoft.com.tr/domainname/islem.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataDomain);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        echo curl_error($ch);
        curl_close($ch);
        */
        $errorUrl = "https://api.verysoft.com.tr/domainname/islem.php?payStatus=5";
        $successUrl = "https://api.verysoft.com.tr/domainname/islem.php?payStatus=1&domainAdi=";
        $paymentUrl = "http://127.0.0.1:8000/domainAl";

        $dataCard = [
            "cardName" => $cardHolder,
            "cardNumber" => $cardNumber,
            "expMonth" => $cardMonth,
            "expYear" => $cardYear,
            "cvCode" => $cardCvv,
            "odemetutar" => $tutar,
            "referer" => "https://api.verysoft.com.tr/domainname/islem.php",
            "domainFirstName" => $domainAd,
            "domainLastName" => $domainSoyad,
            "domainCompany" => $company,
            "domainEmail" => $email,
            "domainAddress" => $address,
            "domainIl" => $il,
            "domainIlce" => $ilce,
            "domainPhone" => $telephone,
            "domainFax" => $fax,
            "domainName" => $domainName,
            'domainAdi' => $domainName,
            "domainUzanti" => $dUzanti,
            'tutar' => $tutar,
            "islem_tipi" => "domainKayit",
            "errorUrl" => $errorUrl,
            "successUrl" => $successUrl,
            "payment_url" => $paymentUrl,
        ];
        $ch = curl_init('https://api.verysoft.com.tr/param/payment.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCard);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function paketSatinAl(Request $request)
    {
        $data = $request->all();
        $cardHolder = $data['cardHolder'];
        $cardNumber = $data['cardNumber'];
        $cardMonth = $data['cardMonth'];
        $cardYear = $data['cardYear'];
        $cardCvv = $data['cardCvc'];
        if (isset($data['kobiPaket'])) {
            $tutar = $data['kobiPaket'];
        } elseif (isset($data['kurumsalPaket'])) {
            $tutar = $data['kurumsalPaket'];
        }
        $tutar = str_replace(".", ",", $tutar);
        $errorUrl = "http://127.0.0.1:8000/redirectEticaret";
        $successUrl = "https://e-very.com.tr/e-ticaret-siteni-ac";
        $paymentUrl = "http://127.0.0.1:8000/domainAl";
        $tutar = $tutar . ",00";
        $dataCard = [
            "cardName" => $cardHolder,
            "cardNumber" => $cardNumber,
            "expMonth" => $cardMonth,
            "expYear" => $cardYear,
            "cvCode" => $cardCvv,
            "odemetutar" => $tutar,
            "referer" => "https://api.verysoft.com.tr/domainname/islem.php",
            'tutar' => $tutar,
            "islem_tipi" => "domainKayit",
            "errorUrl" => $errorUrl,
            "successUrl" => $successUrl,
            "paymentUrl" => $paymentUrl,
        ];
        $ch = curl_init('https://api.verysoft.com.tr/param/payment.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCard);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function modulSatinAl(Request $request)
    {
        $data = $request->all();
        $cardHolder = $data['cardHolder'];
        $cardNumber = $data['cardNumber'];
        $cardMonth = $data['cardMonth'];
        $cardYear = $data['cardYear'];
        $cardCvv = $data['cardCvc'];
        $tutar = $data['tutar'];
        $modulId = $data['modulId'];
        $userId = $data['userId'];
        $tutar = str_replace(".", ",", $tutar);
        $errorUrl = "http://127.0.0.1:8000/redirectModul?data=error&userId=$userId&urunId=$modulId";
        $successUrl = "https://e-very.com.tr/redirectModul?data=success";
        $paymentUrl = "http://127.0.0.1:8000/moduller";
        $tutar = $tutar . ",00";
        $dataCard = [
            "cardName" => $cardHolder,
            "cardNumber" => $cardNumber,
            "expMonth" => $cardMonth,
            "expYear" => $cardYear,
            "cvCode" => $cardCvv,
            "odemetutar" => $tutar,
            "referer" => "https://api.verysoft.com.tr/domainname/islem.php",
            'tutar' => $tutar,
            "islem_tipi" => "domainKayit",
            "errorUrl" => $errorUrl,
            "successUrl" => $successUrl,
            "paymentUrl" => $paymentUrl,
        ];
        $ch = curl_init('https://api.verysoft.com.tr/param/payment.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCard);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }


    public function eticaretPaketSatinAl(Request $request)
    {
        $data = $request->all();
        $cardHolder = $data['cardHolder'];
        $cardNumber = $data['cardNumber'];
        $cardMonth = $data['cardMonth'];
        $cardYear = $data['cardYear'];
        $cardCvv = $data['cardCvc'];
        $urun = $data['urun'];
        if (isset($data['kobiPaket'])) {
            $tutar = $data['kobiPaket'];
        } elseif (isset($data['kurumsalPaket'])) {
            $tutar = $data['kurumsalPaket'];
        }
        $tutar = str_replace(".", ",", $tutar);
        $errorUrl = "http://127.0.0.1:8000/redirectEticaretPaket";
        $successUrl = "http://127.0.0.1:8000/eticaretpaketial/$urun";
        $paymentUrl = "http://127.0.0.1:8000/eticaretpaketleri";
        $tutar = $tutar . ",00";
        $tutar = "1,00";

        $dataCard = [
            "cardName" => $cardHolder,
            "cardNumber" => $cardNumber,
            "expMonth" => $cardMonth,
            "expYear" => $cardYear,
            "cvCode" => $cardCvv,
            "odemetutar" => $tutar,
            "referer" => "https://api.verysoft.com.tr/domainname/islem.php",
            'tutar' => $tutar,
            "islem_tipi" => "domainKayit",
            "errorUrl" => $errorUrl,
            "successUrl" => $successUrl,
            "paymentUrl" => $paymentUrl,
        ];
        $ch = curl_init('https://api.verysoft.com.tr/param/payment.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCard);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function yeniSitem(Request $request)
    {
        $data = $request->all();


        $password = $data["password"]; // Hashlenmesi gereken şifre
        $options = [
            'cost' => 12, // Bcrypt maliyet faktörü
        ];

        $pass = password_hash($password, PASSWORD_BCRYPT, $options);
        $userCheck = User::where('name', $data['name'] . " " . $data['surname']);
        if (!$userCheck) {
            DB::table('users')->insert([
                'name' => $data['name'] . " " . $data['surname'],
                'password' => $pass,
                'email' => $data['email'],
            ]);
        }
        $userInfo = User::find(Auth::user()->id);
        $checkDomain = DomainModel::where(['domain_name' => $data['magaza'] . ".e-very.com.tr", 'user_id' => $userInfo->id]);
        if (!$checkDomain) {
            DB::table('domains')->insert([
                'user_id' => $userInfo->id,
                'domain_id' => time(),
                'domain_name' => $data['magaza'] . ".e-very.com.tr",
                'domain_status' => 'active',
                'start_date' => date('Y-m-d'),
                'end_date' => date('Y-m-d'),
            ]);
        }

        $userId = "e-very";
        $hashPassword = password_hash("e-very", PASSWORD_BCRYPT, ['cost' => 12]);

        if (isset($_POST['telephone'])) {
            $tel = $_POST['telephone'];
        } else {
            $tel = "";
        }

        if (isset($_POST['smsCode'])) {
            $smsCode = $_POST['smsCode'];
        } else {
            $smsCode = "";
        }

        $data = [
            'name' => $_POST['name'],
            'surname' => $_POST['surname'],
            'username' => $_POST['name'] . $_POST['surname'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'telephone' => $tel,
            'ipAddress' => "167.235.22.206",
            // $_SERVER['REMOTE_ADDR'],
            'magaza' => $_POST['magaza'],
            'token' => $hashPassword,
            'userId' => $userId,
            'islem' => 'add',
            'smsCode' => $smsCode,
        ];

        $ch = curl_init('https://api.verysoft.com.tr/every/Customer/up/');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;

    }


    public function pazaryeriSatinAl(Request $request)
    {
        $data = $request->all();
        $cardHolder = $data['cardHolder'];
        $cardNumber = $data['cardNumber'];
        $cardMonth = $data['cardMonth'];
        $cardYear = $data['cardYear'];
        $cardCvv = $data['cardCvc'];
        $tutar = $data['tutar'];
        $urun = $data['urun'];
        $tutar = str_replace(".", ",", $tutar);
        $errorUrl = "http://127.0.0.1:8000/redirectPazaryeri";
        $successUrl = "http://127.0.0.1:8000/getUserInfo?urun=$urun";
        $paymentUrl = "http://127.0.0.1:8000/domainAl";
        $tutar = $tutar . ",00";
        $tutar = "1,00";
        $dataCard = [
            "cardName" => $cardHolder,
            "cardNumber" => $cardNumber,
            "expMonth" => $cardMonth,
            "expYear" => $cardYear,
            "cvCode" => $cardCvv,
            "odemetutar" => $tutar,
            "referer" => "https://api.verysoft.com.tr/domainname/islem.php",
            'tutar' => $tutar,
            "islem_tipi" => "domainKayit",
            "errorUrl" => $errorUrl,
            "successUrl" => $successUrl,
            "paymentUrl" => $paymentUrl,
        ];
        $ch = curl_init('https://api.verysoft.com.tr/param/payment.php');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataCard);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }


}