<?php
session_start();
include_once("includes/config.php");
unset($_SESSION["@TUWE23#ADM"]);
session_destroy();
header("Location:../account-signin.php");
exit(); // Ensure that no code is executed after the redirect
?>
