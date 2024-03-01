<?php
include("../config/index.php");
$now = date('Y-m-d H:i:s');
header("Content-Type:application/json");
//if(isset($_POST["amount"])){
$phone = "254713083924";//"254".substr(trim(mysqli_real_escape_string($con,$_POST["phone"])),-9);
$amount = "10";//trim(mysqli_real_escape_string($con,$_POST["amount"]));
// $hash = trim(mysqli_real_escape_string($con,$_POST["hash"]));

// $myhash = hash("sha256",md5($phone.":".$amount));

// if($hash == $myhash){
// $b2cbalance = mysqli_query($con,"SELECT * FROM paybillbalance WHERE paybill='529670'")["balance"];
// if($balance > $amount){
//$smtp = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM constants WHERE id='1'"));
$partyA = '6548640';
$consumerkey = "lN7ansHfBW9V6aKNyFmXh1zv9FwZE1Az";
$consumersecret = "5YL1Rhp9nl9wAPOv";
$initiator = "CANDY";
$authenticationurl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$url = 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$fp = fopen("cert.cer","r");
$publicKey = fread($fp,8192);
fclose($fp);
openssl_get_publickey($publicKey);
$password = "0724100972Sammy+#";//$smtp["b2c_password"];

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
  'InitiatorName' => $initiator,
  'SecurityCredential' => $encrypted,
  'CommandID' => 'BusinessPayment',
  'Amount' => $amount,
  'PartyA' => $partyA,
  'PartyB' => $phone,
  'Remarks' => 'B2C transfer',
  'QueueTimeOutURL' => 'https://www.profilecode.ke/profilecodepayments/b2c-response',
  'ResultURL' => 'https://www.profilecode.ke/profilecodepayments/b2c-response'
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
echo $curl_response = curl_exec($curl);

$resultcode = json_decode($curl_response)->ResponseCode;
if($resultcode === "0"){
 echo json_encode(array("status" => 200, "message" => "Query sent successfully"));
}
else{
 echo json_encode(array("status" => 503, "message" => "service temporarily unavailable"));
}
// }
// else{
//   echo json_encode(array("status" => 300, "message" => "INSUFFICIENT_BALANCE")); 
//}
//}
// else{
//   echo json_encode(array("status" => 400, "message" => "Invalid authorization")); 
// }
//}
?>
