<?php
session_start();
include_once("../../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
if(isset($_SESSION["@TIBA2021#ADM"])){
 $email = $_SESSION["@TIBA2021#ADM"];
 $chkuser = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
  while($row = mysqli_fetch_assoc($chkuser)){
   $uid = $row["id"];
  }


/*<======User Management=========>*/
if(isset($_POST["fname"])){
 $id = trim(mysqli_real_escape_string($con, $_POST["id"]));
 $orgname = trim(mysqli_real_escape_string($con, $_POST["orgname"]));
 $orgphone = trim(mysqli_real_escape_string($con, $_POST["orgphone"]));
 $orgemail = trim(mysqli_real_escape_string($con, $_POST["orgemail"]));
 $orgid = trim(mysqli_real_escape_string($con, $_POST["orgid"]));
 $orgpin = trim(mysqli_real_escape_string($con, $_POST["orgpin"]));
 $orgbox = trim(mysqli_real_escape_string($con, $_POST["orgbox"]));
 $orgcode = trim(mysqli_real_escape_string($con, $_POST["orgcode"]));
 $orgtown = trim(mysqli_real_escape_string($con, $_POST["orgtown"]));
 $orgaddress = trim(mysqli_real_escape_string($con, $_POST["orgaddress"]));
 $fname = trim(mysqli_real_escape_string($con, $_POST["fname"]));
 $lname = trim(mysqli_real_escape_string($con, $_POST["lname"]));
 $sname = trim(mysqli_real_escape_string($con, $_POST["sname"]));
 $email = trim(mysqli_real_escape_string($con, $_POST["email"]));
 $phone = trim(mysqli_real_escape_string($con, $_POST["phone"]));

 //New user
 if($id == ""){
 function clientno($length) {
  $pool = array_merge(range(0,9));
  $key = "";
  for($i=0; $i < $length; $i++) {
    $key .= $pool[mt_rand(0, count($pool) - 1)];
   }
  return $key;
   }
  $clientno = clientno(5);
  if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM customers WHERE orgpin='$orgpin'")) < 1){
  if(mysqli_query($con,"INSERT INTO customers(custNo,orgname,orgphone,orgemail,orgid,orgpin,orgbox,orgcode,orgtown,orgaddress,fname,lname,sname,email,phone) VALUES('$clientno','$orgname','$orgphone','$orgemail','$orgid','$orgpin','$orgbox','$orgcode','$orgtown','$orgaddress','$fname','$lname','$sname','$email','$phone')")){
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
  else{
   if(mysqli_query($con,"UPDATE customers SET orgname='$orgname',orgphone='$orgphone',orgemail='$orgemail',orgid='$orgid',orgpin='$orgpin',orgbox='$orgbox',orgcode='$orgcode',orgtown='$orgtown',orgaddress='$orgaddress',fname='$fname',lname='$lname',sname='$sname',email='$email',phone='$phone' WHERE id = '$id'")){
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
  if(mysqli_query($con,"DELETE FROM customers WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
}
?>