<?php
include("../config/index.php");
$query=mysqli_query($con,"SELECT * FROM loan_applications WHERE amt_repaid>amount_repayable");
while($row=mysqli_fetch_assoc($query)){
    $appid=$row["id"];
    $custId=$row["custId"];
    $amount_repayable=$row["amount_repayable"];
    $amt_repaid=$row["amt_repaid"];
    
    $extraamount=$amt_repaid-$amount_repayable;
    $txncode="RY".$appid.$custId.$extraamount;
    
    mysqli_query($con,"UPDATE loan_applications SET amt_repaid=amt_repaid-$extraamount WHERE id='$appid'");
    mysqli_query($con,"UPDATE customers SET savings=savings+$extraamount WHERE id='$custId'");
    mysqli_query($con,"INSERT INTO customer_savings(custId,amount,txncode) VALUES('$custId','$extraamount','$txncode')");
}
?>