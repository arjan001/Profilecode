<?php
session_start();
$sessionid = session_id();
include_once("../config/index.php"); 
include_once("../profilecodepayments/mpesa-config.php");
header("Content-Type:application/json");
$today = date('Y-m-d H:i:s');

/*<========== =============>*/
if(isset($_POST["CheckoutRequestID"])){
 extract($_POST);
 
 $checkresponse=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM stkresponse WHERE requestid='$CheckoutRequestID'"));
 $phone=$checkresponse["phone"];
 $amount=$checkresponse["amount"];
 $txncode=$checkresponse["txncode"];
 if($phone!="" && $amount!="" && $txncode!=""){
     $accno=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM mpesapayments WHERE mpesacode='$txncode'"))["account_no"];
     $prddet=mysqli_fetch_assoc(mysqli_query($con,"SELECT sales.*,products.productname,products.docs FROM sales,products WHERE sales.accno='$accno' AND sales.productid=products.id"));
     $docs=$prddet["docs"];
     echo json_encode(array("status" => 200, "message" => "Success","docs"=>$docs)); 
 }else{
     echo json_encode(array("status" => 300, "message" => "Error")); 
 }
}
 ?>