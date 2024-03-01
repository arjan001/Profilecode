<?php
include("../config/index.php");
header("Content-Type:application/json");

  $request = file_get_contents('php://input');
// $request=mysqli_fetch_assoc(mysqli_query($con,"SELECT payload FROM mpesab2c_balance WHERE id='1'"))["payload"];
$array = json_decode($request, true);
$value= $array["Result"]["ResultParameters"]["ResultParameter"][1]["Value"];
$withhash= explode("&",$value)[1];
$actual=explode("|",$withhash)[2];
// echo$balance = explode("|", $array["Result"]["ResultParameters"]["ResultParameter"][0]["Value"])[7];
$status = $array["Result"]["ResultCode"];
if($status == 0){
 mysqli_query($con,"UPDATE mpesab2c_balance SET balance='$actual',payload='$request' WHERE id='1'");
}
?>
