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

/*<========Newsletter Management=========>*/
if(isset($_POST["list"])){
$recipients = trim(mysqli_real_escape_string($con, $_POST["recipients"]));
$list = array();
if($recipients == "patients"){
  $chkemails = mysqli_query($con,"SELECT first_name,email FROM patients");
  while($row = mysqli_fetch_assoc($chkemails)){
   array_push($list, array("first_name" => $row["first_name"], "email" => $row["email"]));
 }
}

if($recipients == "suppliers"){
  $chkemails = mysqli_query($con,"SELECT name,email FROM suppliers");
  while($row = mysqli_fetch_assoc($chkemails)){
   array_push($list, array("first_name" => $row["name"], "email" => $row["email"]));
 }
}
 echo json_encode($list);
}


if(isset($_POST["title"])){
 $email = trim(mysqli_real_escape_string($con, $_POST["email"]));
 $name = trim(mysqli_real_escape_string($con, $_POST["name"]));
 $title = trim(mysqli_real_escape_string($con, $_POST["title"]));
 $body = trim($_POST["body"]);

 //Send the email
 $mail->Subject = $title;
 $mail->Body = str_replace(array("{name}","{subject}","{year}"),array($name,$title,$year),$body); 
 $mail->AddAddress($email,$name);
 if($mail->Send()){
  echo json_encode(array('status' => 200,'message' => 'success'));
 }
 else{
  echo json_encode(array('status' => 300,'message' => 'error'));
 }
}


if(isset($_POST["subject"])){
 $title = trim(mysqli_real_escape_string($con, $_POST["subject"]));
 $recipients = trim(mysqli_real_escape_string($con, $_POST["recipients"]));
 $maillist = trim(mysqli_real_escape_string($con, $_POST["maillist"]));
 $body = trim($_POST["message"]);
 
 $num = 0;
 $addresses = explode(',', $maillist);
 foreach ($addresses as $address) {
  $name = explode("@", $address)[0];
  $mail->AddAddress($address,$name);
  $mail->Subject = $title;
  $mail->Body = $body; 
  if($mail->Send()){
   $num += 1;
   $mail->ClearAllRecipients();
  }
 }
 if($num > 0){
  echo json_encode(array('status' => '200','message' => 'success', 'count' => $num));
 }
}

}
?>