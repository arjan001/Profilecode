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
/*<========Managing user Password============>*/
if(isset($_POST['pass'])){
 $pwd = hash("sha256",md5(trim(mysqli_real_escape_string($con, $_POST ['pass']))));
 $opwd = hash("sha256",md5(trim(mysqli_real_escape_string($con, $_POST ['opass']))));
 if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE id='$uid' AND password='$opwd'")) > 0){
 if(mysqli_query($con,"UPDATE users SET password='$pwd' WHERE id = '$uid'")){
  echo json_encode(array("status" => 200, "message" => "SUCCESS"));
  }
  else{
   echo json_encode(array("status" => 300, "message" => "ERROR"));
  }
}
else{
   echo json_encode(array("status" => 300, "message" => "WRONGOP"));
}
}

}
?>
