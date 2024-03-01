 <?php
 session_start();
$sessionid = session_id();
 //ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    include_once("../config/index.php");
    header("Content-Type:application/json");
    if(isset($_GET["token"])){
     if($_GET["token"] == "PCK23$"){
      $request = file_get_contents('php://input');
      $array = json_decode($request, true);
      $transactiontype = mysqli_real_escape_string($con,$array['TransactionType']); 
      $transid = mysqli_real_escape_string($con,$array['TransID']); 
      $transtime = mysqli_real_escape_string($con,$array['TransTime']);
      $transdate = mysqli_real_escape_string($con,$array['TransTime']);
      
      $transtime = date("g:i A", strtotime($transtime));
      $transdate = date("d/m/Y");
      $transdate1=date("Y-m-d")." ".date("G:i:s", strtotime($transtime));
      $txntime=$transdate1;
      
      
      $actual_amount = mysqli_real_escape_string($con,$array['TransAmount']); 
      $transamount = $actual_amount;
      $amountnodecimal=substr($transamount, 0, -3);
      $businessshortcode = mysqli_real_escape_string($con,$array['BusinessShortCode']); 
       $billrefno = "";//mysqli_real_escape_string($con,$array['BillRefNumber']);
    
      $otherref=mysqli_real_escape_string($con,$array['BillRefNumber']);
    //   $phone = "254".substr($billrefno,-9); 
      $phone = $billrefno; 
      $invoiceno = mysqli_real_escape_string($con,$array['InvoiceNumber']); 
      $msisdn = mysqli_real_escape_string($con,$array['MSISDN']); 
      $orgaccountbalance = mysqli_real_escape_string($con,$array['OrgAccountBalance']); 
      $firstname = mysqli_real_escape_string($con,$array['FirstName']); 
      $middlename = mysqli_real_escape_string($con,$array['MiddleName']);
      
      $lastname = mysqli_real_escape_string($con,$array['LastName']); 
      $other = $firstname." ".$middlename." - ".$msisdn." - ".$transdate." at ".$transtime;
      $allnames = $firstname." ".$middlename." ".$lastname;
      
   
      
      
     if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM mpesapayments WHERE mpesacode='$transid'")) < 1){
     if(mysqli_query($con,"INSERT INTO mpesapayments(paybill_no,account_no,mpesacode,phone,amountpaid,payment_date,first_name,middle_name,last_name,payload) VALUES('$businessshortcode','$otherref','$transid','$msisdn','$amountnodecimal','$txntime','$firstname','$middlename','$lastname','$request')")){  
        $refno = "ST".date("YmdHis");
         $servername = $_SERVER['SERVER_NAME'];
         
        $query="SELECT sales.*,products.productname,products.docs,products.vendorid,products.id AS productid FROM sales,products WHERE sales.accno='$otherref' AND sales.productid=products.id ORDER BY sales.id DESC LIMIT 1";

//$amountnodecimal=230;
if(mysqli_num_rows(mysqli_query($con,$query))> 0){
    $percentage=".20";

    $listorder=mysqli_query($con,$query);
     $alldata=array();
    
     while ($row=mysqli_fetch_assoc($listorder)) {
       $docs=$row["docs"];
       $productname=$row["productname"];
       $cemail=$row["cemail"];
       $vendorid=$row["vendorid"];
       $productid=$row["productid"];
       
       if($vendorid!="0"){
           $comm=$percentage*$amountnodecimal;
           $vendoramount=$amountnodecimal-$comm;
       }else{
         $comm=$amountnodecimal;
         $vendoramount="0";  
       }
       mysqli_query($con,"INSERT INTO vendorsales(vendorid,productid,amount,sitecommission,txncode,accno) VALUES('$vendorid','$productid','$vendoramount','$comm','$transid','$otherref')");
       
       $notif = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM notification_templates WHERE id='9'"));
       $mail->Subject = $notif["subject"];
       $mail->Body = str_replace(array("{productname}"),array($productname),$notif["body"]);
       $mail->addAttachment("../docs/".$docs);
       $mail->AddAddress($cemail,$otherref);
       if($mail->Send()){
       }
        
            
        
    }
      
          mysqli_query($con,"DELETE FROM cart WHERE sessionid='$sessionid'");
          mysqli_query($con,"UPDATE sales SET paid='1' WHERE accno='$otherref'");
          mysqli_query($con,"UPDATE vendors SET balance=balance+$vendoramount WHERE id='$vendorid'");
         
}
           
         echo '{"ResultCode":0,"ResultDesc":"Confirmation received successfully"}';
      //  }
       }
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