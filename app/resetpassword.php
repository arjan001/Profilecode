<?php
session_start();
include_once("../config/index.php");
header("Content-Type:application/json");
/*<==========Resetting password=============>*/
if(isset($_POST["email"])){
 $email = trim(mysqli_real_escape_string($con,$_POST["email"]));
 $pwd = hash("sha256",md5(trim(mysqli_real_escape_string($con,$_POST["pwd"]))));
 if(mysqli_query($con,"UPDATE users SET password = '$pwd' WHERE email = '$email'")){
   echo json_encode(array("status" => 200, "message" => "SUCCESS"));
 }
 else{
   echo json_encode(array("status" => 300, "message" => "ERROR"));
 }
}
?>
