<?php
session_start();
$sessionid = session_id();
include_once("../config/index.php"); 
include_once("../profilecodepayments/mpesa-config.php");
header("Content-Type:application/json");
$today = date('Y-m-d H:i:s');

/*<========== =============>*/
if(isset($_POST["email"])){
 extract($_POST);
 
 $length = 6;
 $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $accno=substr(str_shuffle($str), 0, $length);
 
 mysqli_query($con,"INSERT INTO sales(accno,productid,amount,cemail,cphone) VALUES('$accno','$productid','$amount','$email','$phone')");
 
 $msisdn = "254".substr($phone,-9); 
$reference = $accno;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $authenticationurl);
curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Authorization: Basic '.$credentials, 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
$access_token=json_decode($result)->access_token;
// echo $result;

$timestamp = date("YmdHis");
$password = base64_encode($partybill.$passkey.$timestamp);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $stkpush_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token));
$curl_post_data = array(
  'BusinessShortCode' => $partybill,
  'Password' => $password,
  'Timestamp' => $timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $amount,
  'PartyA' => $msisdn,
  'PartyB' => $partybill,
  'PhoneNumber' => $msisdn,
  'CallBackURL' => $stkpush_callback,
  'AccountReference' => $reference,
  'TransactionDesc' => 'STK payment'
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
 $curl_response = curl_exec($curl);
 $CheckoutRequestID=json_decode($curl_response)->CheckoutRequestID;
if(json_decode($curl_response)->ResponseCode == 0){
  echo json_encode(array("status" => 200,"CheckoutRequestID"=>$CheckoutRequestID, "message" => "Success"));
 }else{
  echo json_encode(array("status" => 300, "message" => "Error"));  
 }
 
  //echo json_encode(array("status" => 200, "message" => "SUCCESS"));
 
 
}
?>
