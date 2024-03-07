<?php
 if(isset($_SESSION["@PCK23#ADM"])){
 $email = $_SESSION["@PCK23#ADM"];
 $user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE email='$email'"));
 $typeid = $user["typeId"];
 $usertype = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usertypes WHERE id='$typeid'"));
 $directory = $usertype["directory"];
 $portal_url = $base_url.$directory;
 if($typeid != 1){
  header("Location:".$portal_url);
 }
}
else{
    header("Location:../adminlogin.php");
}
