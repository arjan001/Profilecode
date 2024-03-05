<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

include_once("../config/index.php");
//add or update cart
if(isset($_POST["productid"])) {
$productid=$_POST["productid"];
$sessionid=$_POST["sessionid"];
$quantity="1";
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM cart WHERE productid='$productid' AND sessionid='$sessionid'"))>0){
$cart1=mysqli_query($con,"UPDATE cart SET quantity='$quantity' WHERE productid='$productid' AND sessionid='$sessionid'");
if($cart1){
    echo "success";
}
}else{
$cart=mysqli_query($con,"INSERT INTO cart(productid,sessionid,quantity) VALUES ('$productid','$sessionid','$quantity')");
if($cart){
   echo "success"; 
}
}
}
?>