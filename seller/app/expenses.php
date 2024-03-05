<?php
session_start();
include_once("../../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
// if(isset($_SESSION["@TIBA2021#ADM"])){
//  $email = $_SESSION["@TIBA2021#ADM"];
//  $chkuser = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
//   while($row = mysqli_fetch_assoc($chkuser)){
//   $uid = $row["id"];
//   }

/*<======expense Management=======>*/
if(isset($_POST["expensename"])){
 $id = trim(mysqli_real_escape_string($con, $_POST["id"]));
 $expensename = trim(mysqli_real_escape_string($con, $_POST["expensename"]));
 $expensedate = trim(mysqli_real_escape_string($con, $_POST["expensedate"]));
 $description = trim(mysqli_real_escape_string($con, $_POST["description"]));
 $amount = trim(mysqli_real_escape_string($con, $_POST["amount"]));

 //New expense
 if($id == ""){
  if(mysqli_query($con,"INSERT INTO expenses(expensename,expensedate,description,amount) VALUES('$expensename','$expensedate','$description','$amount')")){
    echo json_encode(array('status' => 200,'message' => "SUCCESS"));
   }
  else{
   echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  else{
   if(mysqli_query($con,"UPDATE expenses SET expensename='$expensename',expensedate='$expensedate',description='$description',amount='$amount' WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
   }
   else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
    }
  }
}

/*<=======Delete a expense=========>*/
if(isset($_POST["delpurch"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["delpurch"]));

  if(mysqli_query($con,"DELETE FROM expenses WHERE id='$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  
//}
?>