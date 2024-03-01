<?php
include("../apis/config/index.php");
$now = date('Y-m-d H:i:s');
$devpass = "EWA23$";
header("Content-Type:application/json");
if(isset($_GET["token"])){
 if($_GET["token"] == $devpass){
  $request = file_get_contents('php://input');
  $array = json_decode($request, true); 
  $txncode = mysqli_real_escape_string($con,$array['TransID']); 
  $transtime = mysqli_real_escape_string($con,$array['TransTime']); 
  $transtime = date("Y-m-d H:i:s", strtotime($transtime)); 
  $amount = mysqli_real_escape_string($con,$array['TransAmount']); 
  $paybill = mysqli_real_escape_string($con,$array['BusinessShortCode']);  
  $accno = mysqli_real_escape_string($con,$array['BillRefNumber']);
  $phone = mysqli_real_escape_string($con,$array['MSISDN']); 
  $fname = str_replace("'", "&rsquo;", mysqli_real_escape_string($con,$array['FirstName'])); 
  $mname = str_replace("'", "&rsquo;", mysqli_real_escape_string($con,$array['MiddleName'])); 
  $lname = str_replace("'", "&rsquo;", mysqli_real_escape_string($con,$array['LastName']));
     
  if(mysqli_query($con,"INSERT INTO mpesac2b(paybill,accno,txncode,transtime,amount,phone,first_name,middle_name,last_name) VALUES('$paybill','$accno','$txncode','$transtime','$amount','$phone','$fname','$mname','$lname')")){  
   $id = mysqli_insert_id($con);
   $knowtype=substr($accno,0,1);
   if(mysqli_num_rows(mysqli_query($con,"SELECT loanNo FROM loan_applications WHERE loanNo='$accno' AND amount_repayable > amt_repaid")) > 0){
    $loanid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM loan_applications WHERE loanNo='$accno'"))["id"];
    mysqli_query($con,"UPDATE loan_applications SET amt_repaid = amt_repaid + $amount WHERE loanNo='$accno'");
    mysqli_query($con,"INSERT INTO loan_repayments(loanId,amount,paymode,txncode,created_at) VALUES('$loanid','$amount','M-Pesa','$txncode','$transtime')");
    $loan = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM loan_applications WHERE loanNo='$accno'"));
    $custid = $loan["custId"];
    $cust = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customers WHERE id='$custid'"));
    $balance = ceil($loan["amount_repayable"]-$loan["amt_repaid"]);
    
    $message = $txncode." Confirmed. Your loan repayment of amount Ksh".number_format($amount,2)." has been received. Your outstanding loan balance is: Ksh".number_format($balance,2).".";
    $gateway = new AfricasTalkingGateway($username,$apikey);
    try{$results = $gateway->sendMessage($cust["phone"],$message,$senderid);}
    catch (AfricasTalkingGatewayException $e){}
    }
    if($knowtype=="A" || $knowtype=="a"){
        $theidno=substr($accno,1);
       $custno=mysqli_fetch_assoc(mysqli_query($con,"SELECT custNo FROM customers WHERE idNo='$theidno'"))["custNo"];
       mysqli_query($con,"UPDATE customers SET status='1' WHERE custNo='$custno'");
       mysqli_query($con,"INSERT INTO activationfee(custid,amount,txncode) VALUES('$custno','$amount','$txncode')");
    }
    if($knowtype=="P" || $knowtype=="p"){
        $theidno=substr($accno,1);
       $custid=mysqli_fetch_assoc(mysqli_query($con,"SELECT id FROM customers WHERE idNo='$theidno'"))["id"];
       mysqli_query($con,"UPDATE loan_applications SET penalty=penalty-$amount WHERE custId='$custid' WHERE penalty>='$amount' AND status='4' ORDER BY id DESC LIMIT 1");
       mysqli_query($con,"INSERT INTO penalties_paid(custid,amount,txncode) VALUES('$custid','$amount','$txncode')");
    }
    if(substr(strtolower($accno),0,1) == "m"){
     $custNo = substr($accno, -4);
     $chkcust = mysqli_query($con,"SELECT * FROM customers WHERE custNo='$custNo'");
     if(mysqli_num_rows($chkcust) > 0){
      $custid = mysqli_fetch_assoc($chkcust)["id"];
      mysqli_query($con,"UPDATE customers SET savings = savings + $amount WHERE custNo='$custNo'");
      mysqli_query($con,"INSERT INTO customer_savings(custId,amount,txncode) VALUES('$custid','$amount','$txncode')");
      $cust = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customers WHERE custNo='$custNo'"));
      $message = $txncode." Confirmed. Your saving of amount Ksh".number_format($amount,2)." at Kuza Fine Africa has been received. Your total savings is: Ksh".number_format($cust["savings"],2).".";
      $gateway = new AfricasTalkingGateway($username,$apikey);
      try{$results = $gateway->sendMessage($cust["phone"],$message,$senderid);}
      catch (AfricasTalkingGatewayException $e){}
      }
     }
    if(is_numeric($accno) && strlen($accno) >= 7 && strlen($accno) <= 8){
     $chkcust = mysqli_query($con,"SELECT * FROM customers WHERE idNo='$accno' AND reg_fee < '300'");
     if(mysqli_num_rows($chkcust) > 0){
      $custid = mysqli_fetch_assoc($chkcust)["id"];
      mysqli_query($con,"UPDATE customers SET reg_fee = reg_fee + $amount,txncode='$txncode',status='1' WHERE idNo='$accno'");
      $cust = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customers WHERE idNo='$accno'"));
      $message = $txncode." Confirmed. Your registration fee of amount Ksh".number_format($amount,2)." to Kuza Fine Africa has been received.";
      $gateway = new AfricasTalkingGateway($username,$apikey);
      try{$results = $gateway->sendMessage($cust["phone"],$message,$senderid);}
      catch (AfricasTalkingGatewayException $e){}
      }else if(mysqli_num_rows(mysqli_query($con,"SELECT loan_applications.* FROM loan_applications,customers WHERE customers.idNo='$accno' AND loan_applications.custId=customers.id AND amount_repayable > amt_repaid AND loan_applications.status='4' ORDER BY loan_applications.id DESC")) > 0){
            $loanid = mysqli_fetch_assoc(mysqli_query($con,"SELECT loan_applications.* FROM loan_applications,customers WHERE customers.idNo='$accno' AND loan_applications.custId=customers.id AND amount_repayable > amt_repaid AND loan_applications.status='4' ORDER BY loan_applications.id DESC"))["id"];
            mysqli_query($con,"UPDATE loan_applications SET amt_repaid = amt_repaid + $amount WHERE id='$loanid'");
            mysqli_query($con,"INSERT INTO loan_repayments(loanId,amount,paymode,txncode,created_at) VALUES('$loanid','$amount','M-Pesa','$txncode','$transtime')");
            $loan = mysqli_fetch_assoc(mysqli_query($con,"SELECT loan_applications.* FROM loan_applications,customers WHERE customers.idNo='$accno' AND loan_applications.custId=customers.id AND amount_repayable > amt_repaid AND loan_applications.status='4' ORDER BY loan_applications.id DESC"));
            $custid = $loan["custId"];
            $cust = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customers WHERE id='$custid'"));
            $balance = ceil($loan["amount_repayable"]-$loan["amt_repaid"]);
            
            $message = $txncode." Confirmed. Your loan repayment of amount Ksh".number_format($amount,2)." has been received. Your outstanding loan balance is: Ksh".number_format($balance,2).".";
            $gateway = new AfricasTalkingGateway($username,$apikey);
            try{$results = $gateway->sendMessage($cust["phone"],$message,$senderid);}
            catch (AfricasTalkingGatewayException $e){}
    }
          
      
     }
    echo '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
    }
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