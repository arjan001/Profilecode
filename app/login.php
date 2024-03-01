<?php
session_start();
include_once("../config/index.php"); 
header("Content-Type:application/json");
$today = date('Y-m-d H:i:s');

/*<==========Logging in=============>*/
if(isset($_POST["email"])){
 $email = trim(mysqli_real_escape_string($con,$_POST["email"]));
 $pass = hash("sha256",md5(trim(mysqli_real_escape_string($con, $_POST ["pass"]))));
 if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$pass'")) > 0){
  $_SESSION["@PCK23#ADM"] = $email;
  $typeid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE email='$email'"))["typeId"];
  $url = $base_url.mysqli_fetch_assoc(mysqli_query($con,"SELECT directory FROM usertypes WHERE id='$typeid'"))["directory"];
  echo json_encode(array("status" => 200, "message" => "SUCCESS", "url" => $url));
 }
 else{
  echo json_encode(array("status" => 300, "message" => "INVALID")); 
 }
}
?>
