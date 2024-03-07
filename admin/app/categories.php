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

/*<======category Management=======>*/
if(isset($_POST["catname"])){
 $id = trim(mysqli_real_escape_string($con, $_POST["id"]));
 $catname = trim(mysqli_real_escape_string($con, $_POST["catname"]));
 $url = strtolower(preg_replace("#[^0-9a-zA-Z()!,.?'\"]#i","-",$catname));

 //New category
 if($id == ""){
  if(mysqli_query($con,"INSERT INTO categories(catname,url) VALUES('$catname','$url')")){
    echo json_encode(array('status' => 200,'message' => "SUCCESS"));
   }
  else{
   echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  else{
   if(mysqli_query($con,"UPDATE categories SET catname='$catname' WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
   }
   else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
    }
  }
}

/*<=======Delete a category=========>*/
if(isset($_POST["delcategory"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["delcategory"]));

  if(mysqli_query($con,"DELETE FROM categories WHERE id='$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  
}
?>