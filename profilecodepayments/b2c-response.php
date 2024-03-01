<?php
include("../config/index.php");
$now = date('Y-m-d H:i:s');
header("Content-Type:application/json");
$now = date("Y-m-d H:i:s");
$request = file_get_contents('php://input');
$array = json_decode($request, true);
$status = $array["Result"]["ResultCode"];
$mpesacode = $array["Result"]["TransactionID"];
$amount = $array["Result"]["ResultParameters"]["ResultParameter"][0]["Value"];
$transtime = date("Y-m-d H:i:s", strtotime($array["Result"]["ResultParameters"]["ResultParameter"][3]["Value"]));
$phone = trim(explode("-", $array["Result"]["ResultParameters"]["ResultParameter"][2]["Value"])[0]);
$name = str_replace("'", "", trim(explode("-", $array["Result"]["ResultParameters"]["ResultParameter"][2]["Value"])[1]));
$phone = "254".substr($phone,-9);
mysqli_query($con,"INSERT INTO mpesab2c(payload,txncode,transtime,amount,phone,name) VALUES('$request','$mpesacode','$transtime','$amount','$phone','$name')");

if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM loan_applications WHERE mpesaNo='$phone' AND disbursed_amount='$amount' AND disbursed_by!='0' AND status='2'")) > 0){
  $loan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM loan_applications WHERE mpesaNo='$phone' AND disbursed_amount='$amount' AND disbursed_by!='0' AND status='2' ORDER BY id DESC LIMIT 0,1"));
  $loanid = $loan["id"];
  $custid = $loan["custId"];
  $prodid = $loan["prodId"];
  $cust = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customers WHERE id='$custid'"));
  $prod = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM loan_products WHERE id='$prodid'"));
  $phone = "254".substr($cust["phone"], -9);
  $graceperiod = $prod["grace_period"];
  $duration = $prod["duration"];
  $firstdate = date('Y-m-d H:i:s',strtotime("+".$graceperiod." Days"));
  $duedate = date('Y-m-d H:i:s',strtotime("+".$duration." Days"));
  mysqli_query($con,"UPDATE loan_applications SET status='4',txncode='$mpesacode',disbursed_at='$now',first_repayment='$firstdate',due_date='$duedate' WHERE id='$loanid'");

  $message = $mpesacode." Confirmed. You have received your loan of amount Ksh".number_format($loan["amount"],2).". The repayable amount is Ksh".number_format($loan["amount_repayable"],2)." by ".date("d/m/Y",strtotime($duedate))." To repay, use Paybill: 4099683 and acc number: ".$cust["idNo"].".";
  $gateway = new AfricasTalkingGateway($username,$apikey);
   try{
    $results = $gateway->sendMessage($cust["phone"],$message,$senderid);
   }
   catch (AfricasTalkingGatewayException $e){}
}
?>
