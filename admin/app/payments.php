<?php
session_start();
include_once("../../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
if(isset($_SESSION["@TIBA2021#ADM"])){
 $email = $_SESSION["@TIBA2021#ADM"];
 $chkuser = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
  while($row = mysqli_fetch_assoc($chkuser)){
   $uid = $row["id"];
  }

/*<======Payment Management=======>*/
if(isset($_POST["pfrom"])){
 $id = trim(mysqli_real_escape_string($con, $_POST["id"]));
 $pfrom = trim(mysqli_real_escape_string($con, $_POST["pfrom"]));
 $fromid = trim(mysqli_real_escape_string($con, $_POST["fromid"]));
 $paymentmode = trim(mysqli_real_escape_string($con, $_POST["paymentmode"]));
 $description = trim(mysqli_real_escape_string($con, $_POST["description"]));
 $amount = trim(mysqli_real_escape_string($con, $_POST["amount"]));

 //New payment
 if($id == ""){
  if(mysqli_query($con,"INSERT INTO payment(pfrom,fromid,paymentmode,description,amount) VALUES('$pfrom','$fromid','$paymentmode','$description','$amount')")){
    echo json_encode(array('status' => 200,'message' => "SUCCESS"));
   }
  else{
   echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  else{
   if(mysqli_query($con,"UPDATE payment SET pfrom='$pfrom',fromid='$fromid',paymentmode='$paymentmode',description='$description',amount='$amount' WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
   }
   else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
    }
  }
}

/*<=======Delete a payment=========>*/
if(isset($_POST["delpurch"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["delpurch"]));

  if(mysqli_query($con,"DELETE FROM payment WHERE id='$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  
}
?>