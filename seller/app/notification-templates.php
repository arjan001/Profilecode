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
/*<=========Notification templates Management===========>*/
if(isset($_POST['subject'])){
 $id = trim(mysqli_real_escape_string($con,$_POST['id']));
 $subject = trim(mysqli_real_escape_string($con,$_POST['subject']));
 $name = trim(mysqli_real_escape_string($con,$_POST['name']));
 $desc = trim(mysqli_real_escape_string($con,$_POST['desc']));
 $variables = trim(mysqli_real_escape_string($con,$_POST['variables']));
 $body = str_replace("'","&rsquo;",trim($_POST['body']));

 if(strlen($body) > 100){
 //Add new template
 if($id == ""){
 if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM notification_templates WHERE name='$name' OR description='$desc'")) < 1){
   if(mysqli_query($con,"INSERT INTO notification_templates(name,subject,description,body,variables,created_at) VALUES('$name','$subject','$desc','$body','$variables','$today')")){
      echo json_encode(array('status' => '200','message' => 'SUCCESS'));
    }
    else{
    echo json_encode(array('status' => '300','message' => mysqli_error($con)));
    }
  }
  else{
    echo json_encode(array('status' => '300','message' => 'EXIST'));
  }
 }
 //Edit a template
 else{
 if(mysqli_query($con,"UPDATE notification_templates SET name='$name',subject='$subject',description='$desc',body='$body',variables='$variables' WHERE id = '$id'")){
     echo json_encode(array('status' => '200','message' => 'SUCCESS'));
    }
    else{
     echo json_encode(array('status' => '300','message' => 'ERROR'));
    }
   }
 }
 else{
  echo json_encode(array('status' => 300, "message" => "BODY_EMPTY"));
 }
 }
}
?>
