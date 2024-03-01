<?php
include_once("../config/index.php"); 
if(isset($_POST["cartid"])) {
 $cartid=$_POST["cartid"];
$sessionid=$_POST["sessionid"];
$quantity="1";
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM cart WHERE id='$cartid' AND sessionid='$sessionid'"))>0){
$cart1=mysqli_query($con,"DELETE FROM cart WHERE id='$cartid' AND sessionid='$sessionid'");
if($cart1){
    echo "success";
}
}else{
 echo "error";
}
}
?>