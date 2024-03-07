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

/*<======subcategory Management=======>*/
if(isset($_POST["subcatname"])){
 $id = trim(mysqli_real_escape_string($con, $_POST["id"]));
 $subcatname = trim(mysqli_real_escape_string($con, $_POST["subcatname"]));
  $catid = trim(mysqli_real_escape_string($con, $_POST["catid"]));
  $url = strtolower(preg_replace("#[^0-9a-zA-Z()!,.?'\"]#i","-",$subcatname));

 //New subcategory
 if($id == ""){
  if(mysqli_query($con,"INSERT INTO subcategories(subcatname,catid,url) VALUES('$subcatname','$catid','$url')")){
    echo json_encode(array('status' => 200,'message' => "SUCCESS"));
   }
  else{
   echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  else{
   if(mysqli_query($con,"UPDATE subcategories SET subcatname='$subcatname',catid='$catid' WHERE id = '$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
   }
   else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
    }
  }
}

/*<=======Delete a subcategory=========>*/
if(isset($_POST["delsubcategory"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["delsubcategory"]));

  if(mysqli_query($con,"DELETE FROM subcategories WHERE id='$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  
}
?>