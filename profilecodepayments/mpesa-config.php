<?php
date_default_timezone_set("Africa/Nairobi");

/*****************************************************************************************
c2b Live Credentials
*****************************************************************************************/
$partybill = $shortcode = '838457';
$devpass = "PCK23$";
$consumerkey = "elQCE1Eb6ddWVpd93Lh9Rqf19g8mNNG8";
$consumersecret = "05GD21IbvJvAxFnA";
$credentials = base64_encode($consumerkey.':'.$consumersecret);
$authenticationurl = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$validationurl="https://profilecode.ke/profilecodepayments/validation.php?token=PCK23$";
    $confirmationurl="https://profilecode.ke/profilecodepayments/notification.php?token=PCK23$";
$registerurl = 'https://api.safaricom.co.ke/mpesa/c2b/v2/registerurl';
$stkpush_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$passkey = "bf4d3ce0fbf6df58cc3f3b8e170f6885a87c6a889e15e7f6d8bb960632641a35";
$stkpush_callback = "https://www.profilecode.ke/profilecodepayments/stkpush-response";
$timestamp = date("YmdHis");
$password = base64_encode($partybill.$passkey.$timestamp);


/*****************************************************************************************
Sandbox Credentials
*****************************************************************************************/
// $partybill = $shortcode = '600730';
// $devpass = "@MFS$2021$$$";
// $consumerkey = "8gg1SC6UImOr0NytKwFKPiGGctcETolc";
// $consumersecret = "PBGNFcam6iKgGB71";
// $credentials = base64_encode($consumerkey.':'.$consumersecret);
// $authenticationurl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
// $validationurl = "https://www.microfinsolutions.co.ke/erp/sapemmf/validation?token=".$devpass;
// $confirmationurl = "https://www.microfinsolutions.co.ke/erp/sapemmf/notification?token=".$devpass;
// $registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
// $stkpush_url = 'https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request';
// $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
// $stkpush_callback = "https://www.microfinsolutions.co.ke/erp/sapemmf/stkpush";
// $timestamp = date("YmdHis");
// $password = base64_encode($partybill.$passkey.$timestamp);




