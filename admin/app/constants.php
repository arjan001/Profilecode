<?php
session_start();
include_once("../../config/index.php");
header("Content-Type:application/json");
$today = date('Y-m-d H:i:s');
if(isset($_SESSION["@TIBA2021#ADM"])){
 $email = $_SESSION["@TIBA2021#ADM"];
 $chkuser = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
  while($row = mysqli_fetch_assoc($chkuser)){
   $uid = $row["id"];
  }
/*<===========Updating smtp settings=============>*/
if(isset($_POST["host"])){
  $sender = trim(mysqli_real_escape_string($con,$_POST["sender"]));
  $uname = trim(mysqli_real_escape_string($con,$_POST["uname"]));
  $host = trim(mysqli_real_escape_string($con,$_POST["host"]));
  $port = trim(mysqli_real_escape_string($con,$_POST["port"]));
  $encryption = trim(mysqli_real_escape_string($con,$_POST["encryption"]));
  $password = trim(mysqli_real_escape_string($con,$_POST["password"]));
  if(mysqli_query($con,"UPDATE constants SET fromname='$sender', username='$uname',host='$host',port='$port',encryption='$encryption',password='$password' WHERE id = '1'")){
    echo json_encode(array("status" => 200, "message" => "SUCCESS"));
  }
  else{
       echo json_encode(array("status" => 300, "message" => "ERROR"));
  }
 }
}
?>
