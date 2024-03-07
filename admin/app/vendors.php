<?php
session_start();

include_once("../../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
if(isset($_SESSION["@PCK23#ADM"])){
 $email = $_SESSION["@PCK23#ADM"];
 $chkvendor = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
  while($row = mysqli_fetch_assoc($chkvendor)){
   $uid = $row["id"];
  }


/*<======Vendor Management=========>*/
if(isset($_POST["vname"])){
 extract($_POST);

 //New vendor

  if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM vendors WHERE id='$id'")) >0){
  if(mysqli_query($con,"UPDATE vendors SET vname='$vname',vphone='$vphone',vemail='$vemail',balance='$vbalance' WHERE id='$id'")){
      echo json_encode(array('status' => 200,'message' => "SUCCESS"));
   }
  else{
   echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  else{
   echo json_encode(array('status' => 401,'message' => 'EXIST'));
   }
 
  }

/*<=======Delete Vendor=========>*/
if(isset($_POST["delvendor"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["delvendor"]));
  if(mysqli_query($con,"DELETE FROM vendors WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
}
?>