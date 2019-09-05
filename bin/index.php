<?php

ini_set('display_errors', 1);

require_once 'bin/core/Core.php';

$core = new Core();
$core->run();

//echo json_encode(
//    array("dbSettings" => array(
//        "db_users" => "users",
//        "db_name" => "test",
//        "db_user" => "root",
//        "db_pass" => "",
//        "db_host" => "127.0.0.1"
//        ),
//        "routerSettings" => array(
//            "controllerIndex" => 2,
//            "methodIndex" => 3,
//            "HTTP_HOST" => "http://localhost/PhpTestTask/",
//            "routes" => array(
//                "Auth",
//                "User",
//                "Register"
//            ),
//            "IsInstalled" => false
//        ),
//        "AppSettings" => array(
//            "defaultDirName" => "bin/",
//            "defaultAbstractionDir" => "bin/Abstraction/",
//            "defaultAppSettingsDir" => "bin/AppSettings/",
//            "defaultControllersDir" => "bin/controllers/",
//            "defaultCoreDir" => "bin/core/",
//            "defaultExceptionsDir" => "bin/Exceptions/",
//            "defaultModelsDir" => "bin/models/",
//            "defaultServicesDir" => "bin/Services/",
//            "defaultViewsDir" => "bin/views/",
//        )
//    )
//);

//print_r(json_decode("{\"dbSettings\":{\"db_users\":\"users\",\"db_name\":\"test\",\"db_user\":\"root\",\"db_pass\":\"\",\"db_host\":\"127.0.0.1\"},\"routerSettings\":{\"controllerIndex\":2,\"methodIndex\":3,\"HTTP_HOST\":\"http:\/\/localhost\/PhpTestTask\/\",\"routes\":[\"Auth\",\"User\",\"Register\"]},\"AppSettings\":{\"defaultDirName\":\"bin\/\",\"defaultAbstractionDir\":\"bin\/Abstraction\/\",\"defaultAppSettingsDir\":\"bin\/AppSettings\/\",\"defaultControllersDir\":\"bin\/controllers\/\",\"defaultCoreDir\":\"bin\/core\/\",\"defaultExceptionsDir\":\"bin\/Exceptions\/\",\"defaultModelsDir\":\"bin\/models\/\",\"defaultServicesDir\":\"bin\/Services\/\",\"defaultViewsDir\":\"bin\/views\/\"}}"));

//$key = "AAAFNSF-4564FSF-FSF4564-SFA45FF-FSDA456";
//
//$plaintext = "{\"dbSettings\":{\"db_users\":\"users\",\"db_name\":\"test\",\"db_user\":\"root\",\"db_pass\":\"\",\"db_host\":\"127.0.0.1\"},\"routerSettings\":{\"controllerIndex\":0,\"methodIndex\":0,\"HTTP_HOST\":\"http:\/\/localhost\/PhpTestTask\/\",\"routes\":[\"Auth\",\"User\",\"Register\"],\"IsInstalled\":false},\"AppSettings\":{\"defaultDirName\":\"bin\/\",\"defaultAbstractionDir\":\"bin\/Abstraction\/\",\"defaultAppSettingsDir\":\"bin\/AppSettings\/\",\"defaultControllersDir\":\"bin\/controllers\/\",\"defaultCoreDir\":\"bin\/core\/\",\"defaultExceptionsDir\":\"bin\/Exceptions\/\",\"defaultModelsDir\":\"bin\/models\/\",\"defaultServicesDir\":\"bin\/Services\/\",\"defaultViewsDir\":\"bin\/views\/\"}}";
//$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
//$iv = openssl_random_pseudo_bytes($ivlen);
//$ciphertext_raw = openssl_encrypt($plaintext, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
//$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
//$ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );
//
//echo $ciphertext;
//
////decrypt later....
//$c = base64_decode($ciphertext);
//$ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
//$iv = substr($c, 0, $ivlen);
//$hmac = substr($c, $ivlen, $sha2len=32);
//$ciphertext_raw = substr($c, $ivlen+$sha2len);
//$original_plaintext = openssl_decrypt($ciphertext_raw, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
//$calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
//if (hash_equals($hmac, $calcmac))//PHP 5.6+ timing attack safe comparison
//{
//   // echo $original_plaintext."\n";
//}