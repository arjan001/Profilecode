<?php
 if(isset($_SESSION["@PCK23#VE"])){
 $email = $_SESSION["@PCK23#VE"];
 $user = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM vendors WHERE vemail='$email'"));
 $vendorid=$user["id"];
 $vendorbalance=$user["balance"];
 $vendorphone=$user["vphone"];
  //header("Location:".$portal_url);
 
}
else{
    header("Location:../account-signin.php");
}
