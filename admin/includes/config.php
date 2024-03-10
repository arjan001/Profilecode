<?php
/*********************
 Database connection
*********************/
$con = mysqli_connect("localhost","root","root","profilecode") or die("Error in database connection");

/************************
PHP Mailer configuration
************************/
// require_once('../../config/phpmailer/class.phpmailer.php');
// $smtp = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM constants WHERE id='1'"));
// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->SMTPDebug = 0;
// $mail->SMTPAuth = true;
// $mail->SMTPSecure = $smtp["encryption"];
// $mail->Host = $smtp["host"];
// $mail->Port = $smtp["port"];
// $mail->IsHTML(true);
// $mail->Username = $smtp["username"];
// $mail->Password = $smtp["password"];
// $mail->SetFrom($smtp["username"]);
// $mail->FromName = $smtp["fromname"];


/***************************
Base URL
****************************/
$const = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM constants WHERE id='2'"));
$base_url = $const["site_url"];
$customer_url = $const["site_url"]."customer/";


/***************************
Set Timezone
****************************/
date_default_timezone_set("Africa/Nairobi");


