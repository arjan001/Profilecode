<?php
include_once('../config/index.php');
header("Content-Type:application/json");
$year = date("Y");
/*<===========Reset password=============>*/
if(isset($_POST['email'])){
$email = trim(mysqli_real_escape_string($con, $_POST['email']));
$emencoded = base64_encode($email);
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email = '$email' AND status = '2'")) < 1){
$chkuser = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
if(mysqli_num_rows($chkuser) > 0){
 $row = mysqli_fetch_assoc($chkuser);
 $fname = $row["first_name"];
 $link = $base_url."setpassword/".$emencoded;
 $notif = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM notification_templates WHERE id='2'"));
 $mail->Subject = str_replace(array("{name}","{link}"),array($fname,$link),$notif["subject"]);
 $mail->Body = str_replace(array("{name}","{link}","{subject}"),array($fname,$link,$notif["subject"]),$notif["body"]);
 $mail->AddAddress($email,$fname);
 $mail->Send();
 echo json_encode(array("status" => 200, "message" => "SUCCESS"));
 }
else{
   echo json_encode(array("status" => 300, "message" => "NON_EXISTENT"));
  }
}
else{
 echo json_encode(array("status" => 300, "message" => "BLOCKED"));
 }
}
?>
