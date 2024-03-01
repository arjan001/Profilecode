<?php

$partyA = '4124189';
$consumerkey = "zDABmKJ9GZ2Aw4yoeCqd4HkQ7mFWiZhY";
$consumersecret = "zk1isJP50fL795lq";
$initiator = "Waithera";
$authenticationurl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$url = 'https://api.safaricom.co.ke/mpesa/b2b/v1/paymentrequest';
$fp = fopen("cert.cer","r");
$publicKey = fread($fp,8192);
fclose($fp);
openssl_get_publickey($publicKey);
$password = "@Cira88#";//$smtp["b2c_password"];

$credentials = base64_encode($consumerkey.':'.$consumersecret);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $authenticationurl);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Authorization: Basic '.$credentials, 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
$access_token=json_decode($result)->access_token;

openssl_public_encrypt($password, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);
$encrypted = base64_encode($encrypted);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
$curl_post_data = array(
  'Initiator' => $initiator,
  'SecurityCredential' => $encrypted,
  'CommandID' => 'BusinessBuyGoods',
  "SenderIdentifierType"=> "4",
   "RecieverIdentifierType"=>"4",
  'Amount' => '10',
  'PartyA' => $partyA,
  'PartyB' => '6340360',
  "AccountReference"=>"353353",
   "Requester">"254713083924",
  'Remarks' => 'B2C transfer',
  'QueueTimeOutURL' => 'https://www.ewash.africa/ewashpayments/b2c-response.php',
  'ResultURL' => 'https://www.ewash.africa/ewashpayments/b2c-response.php'
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
echo $curl_response = curl_exec($curl);
?>