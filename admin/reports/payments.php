<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){
$total = 0;
$chkpymts = mysqli_query($con,"SELECT * FROM payment WHERE createdon>='$date1' AND createdon<='$date2' ORDER BY id DESC");
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
     <div class="col-md-12 summary">
     <p>Total Income: <span>Ksh <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM payment WHERE createdon>='$date1' AND createdon<='$date2'"))["amt"]);?></span></p>
     <p>Period: <span><?php echo $startdate." - ".$enddate;?></span></p>
     </div>
    <div class="col-md-12">
    <div class="table-responsive">
     <table id="tb_purchs" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
          <tr><th>Payment From</th><th>Customer/File</th><th>Payment Mode</th><th>Description</th><th>Amount</th><th style="min-width: 100px;">Action</th></tr>
         </thead>
         <tbody>
         <?php
          while($row = mysqli_fetch_assoc($chkpymts)){
              $pfrom=$row["pfrom"];
              $fromid=$row["fromid"];
              if($pfrom=="Customer"){
          $b = mysqli_fetch_assoc(mysqli_query($con,"SELECT orgname FROM customers WHERE id='$fromid'"));
          $ba=$b["orgname"];
              }else{
           $b = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM files WHERE id='$fromid'"));
           $ba=$b["sfileno"]." ".$b["fileno"];
              }
          ?>
          <tr>
           
           <td><?php echo $row["pfrom"];?></td>
           <td><?php echo $ba;?></td>
           <td><?php echo $row["paymentmode"];?></td>
           <td><?php echo $row["description"];?></td>
           <td>Ksh. <?php echo number_format($row["amount"]);?></td>
           <td>
            <button class="btn btn-xs btn-primary edtpurch" data-toggle="tooltip" data-placement="bottom" title="Edit payment" data-pfrom="<?php echo $row['pfrom'] ?>" data-fromid="<?php echo $row['fromid'] ?>" data-paymentmode="<?php echo $row['paymentmode'] ?>" data-id="<?php echo $row["id"];?>" data-amount="<?php echo $row["amount"];?>" data-description="<?php echo $row['description'];?>"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-xs btn-danger delpurch" id="<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="bottom" title="Delete payment"><i class="fa fa-trash"></i></button>
           </td>
          </tr>
          <?php } ?>
         </tbody>
        </table>
    </div>
   </div>
<?php
 }
}
