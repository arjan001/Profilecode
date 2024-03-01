<?php
session_start();

include_once("../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');


/*<======User Management=========>*/
if(isset($_POST["vname"])){
 extract($_POST);


  $pwd = hash("sha256",md5($vpassword));
  if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM vendors WHERE vemail='$vemail'")) < 1){
  if(mysqli_query($con,"INSERT INTO vendors(vname,vemail,vphone,vpassword) VALUES('$vname','$vemail','$vphone','$pwd')")){
   $link = "https://www.profilecode.ke/"."login-register";
   $notif = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM notification_templates WHERE id='8'"));
   $mail->Subject = $notif["subject"];
   $mail->Body = str_replace(array("{name}","{email}","{password}","{link}"),array($vname,$vemail,$vpassword,$link),$notif["body"]);
   $mail->AddAddress($vemail,$vname);
   if($mail->Send()){
    echo json_encode(array('status' => 200,'message' => "SUCCESS"));
    }
   }
  else{
   echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  else{
   echo json_encode(array('status' => 401,'message' => 'EXIST'));
   }
 
  }

?>