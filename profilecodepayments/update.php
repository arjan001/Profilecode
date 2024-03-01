<?php
include("../config/index.php");
$now = date('Y-m-d H:i:s');

// $chkloans = mysqli_query($con,"SELECT * FROM loan_applications WHERE status='4'");
// while($row = mysqli_fetch_assoc($chkloans)){
//  $id = $row["id"];
//  $phone = $row["mpesaNo"];
//  $amount = $row["disbursed_amount"];
//  $txncode = mysqli_fetch_assoc(mysqli_query($con,"SELECT txncode FROM mpesab2c WHERE amount='$amount' AND phone='$phone'"))["txncode"];
//  if(mysqli_num_rows(mysqli_query($con,"SELECT id FROM loan_applications WHERE txncode='$txncode'")) < 1){
//   mysqli_query($con,"UPDATE loan_applications SET txncode='$txncode' WHERE id='$id'");
//  }
// }

$message = "PH699KTSPX Confirmed. You have received your loan of amount Ksh30,000.00. The repayable amount is Ksh36,000.00 by 03/09/2021 To repay, use Paybill: 4061353 and acc number: 72399.";
  $gateway = new AfricasTalkingGateway($username,$apikey);
   try{
    $results = $gateway->sendMessage("254721542919",$message,$senderid);
    echo $results;
   }
   catch (AfricasTalkingGatewayException $e){}