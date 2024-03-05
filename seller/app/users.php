<?php
session_start();

include_once("../../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
if(isset($_SESSION["@PCK23#ADM"])){
 $email = $_SESSION["@PCK23#ADM"];
 $chkuser = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
  while($row = mysqli_fetch_assoc($chkuser)){
   $uid = $row["id"];
  }


/*<======User Management=========>*/
if(isset($_POST["fname"])){
 $id = trim(mysqli_real_escape_string($con, $_POST["id"]));
 $typeid = trim(mysqli_real_escape_string($con, $_POST["typeid"]));
 $fname = trim(mysqli_real_escape_string($con, $_POST["fname"]));
 $lname = trim(mysqli_real_escape_string($con, $_POST["lname"]));
 $email = trim(mysqli_real_escape_string($con, $_POST["email"]));
 $phone = trim(mysqli_real_escape_string($con, $_POST["phone"]));
 $account = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usertypes WHERE id='$typeid'"))["name"];
 
 $category=trim(mysqli_real_escape_string($con, $_POST["category"]));

 //New user
 if($id == ""){
 function password($length) {
  $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));
  $key = "";
  for($i=0; $i < $length; $i++) {
    $key .= $pool[mt_rand(0, count($pool) - 1)];
   }
  return $key;
   }
  $pass = password(8);
  $pwd = hash("sha256",md5($pass));
  if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email='$email'")) < 1){
  if(mysqli_query($con,"INSERT INTO users(typeId,first_name,last_name,email,phone,password,created_at,category) VALUES('$typeid','$fname','$lname','$email','$phone','$pwd','$now','$category')")){
   $link = $base_url."adminlogin";
   $notif = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM notification_templates WHERE id='1'"));
   $mail->Subject = $notif["subject"];
   $mail->Body = str_replace(array("{name}","{account}","{email}","{password}","{link}"),array($fname,$account,$email,$pass,$link),$notif["body"]);
   $mail->AddAddress($email,$fname);
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
  else{
   if(mysqli_query($con,"UPDATE users SET first_name='$fname',last_name='$lname',email='$email',phone='$phone',category='$category' WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
   }
   else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
      }
    }
  }

/*<=======Delete User=========>*/
if(isset($_POST["deluser"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["deluser"]));
  if(mysqli_query($con,"DELETE FROM users WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
}
?>