<?php
include("../config/index.php");
$now = date('Y-m-d H:i:s');
header("Content-Type:application/json");

$paybill = '6548640';
$consumerkey = "lN7ansHfBW9V6aKNyFmXh1zv9FwZE1Az";
$consumersecret = "5YL1Rhp9nl9wAPOv";
$initiator = "CANDY";
$password = "Sammy+0724100972#";//$smtp["b2c_password"];
$timeouturl = "https://www.profilecode.ke/profilecodepayments/balance-response";
$resulturl = "https://www.profilecode.ke/profilecodepayments/balance-response";

$authenticationurl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$url = 'https://api.safaricom.co.ke/mpesa/accountbalance/v1/query';
$fp = fopen("cert.cer","r");
$publicKey = fread($fp,8192);
fclose($fp);
openssl_get_publickey($publicKey);
$credentials = base64_encode($consumerkey.':'.$consumersecret);
openssl_public_encrypt($password, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);
$encrypted = base64_encode($encrypted);

//Generate access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $authenticationurl);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Authorization: Basic '.$credentials, 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
$access_token=json_decode($result)->access_token;

//Account balance request
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
$curl_post_data = array(
  'Initiator' => $initiator,
  'SecurityCredential' => $encrypted,
  'CommandID' => 'AccountBalance',
  'IdentifierType' => '4',
  'PartyA' => $paybill,
  'AccountReference' => date("YmdHis"),
  'Remarks' => 'Account balance',
  'QueueTimeOutURL' => $timeouturl,
  'ResultURL' => $resulturl
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
$resultcode = json_decode($curl_response)->ResponseCode;


// $chkcusts = mysqli_query($con,"SELECT * FROM customers WHERE reg_fee < '300'");
// while($row = mysqli_fetch_assoc($chkcusts)){
//  $idno = $row["idNo"];
//  if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM mpesac2b WHERE accno='$idno'")) > 0){
//   $pymt = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM mpesac2b WHERE accno='$idno'"));
//   $amount = $pymt["amount"];
//   $txncode = $pymt["txncode"];
//   mysqli_query($con,"UPDATE customers SET reg_fee = reg_fee + $amount,txncode='$txncode' WHERE idNo='$idno'");
//  }
// }
