<?php 
include_once("mpesa-config.php");
header("Content-Type:application/json"); 
if(isset($_GET["token"])){
if($_GET["token"] == $devpass){
$request = file_get_contents('php://input');
$array = json_decode($request, true);
 echo '{"ResultCode":0, "ResultDesc":"Success", "ThirdPartyTransID": 0}';
}
else{
 echo "Invalid authorization";
 exit();
 }
 }
 else{
  echo "Technical error";
  exit();
 }     
?>