<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){
$total = 0;
$chkpymts = mysqli_query($con,"SELECT * FROM otherpayments WHERE created_at>='$date1' AND created_at<='$date2' ORDER BY id DESC"); 
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
     <div class="col-md-12 summary">
     <p>Total Other Payments: <span>Ksh <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM otherpayments WHERE created_at>='$date1' AND created_at<='$date2'"))["amt"]);?></span></p>
     <p>Period: <span><?php echo $startdate." - ".$enddate;?></span></p>
     </div>
     <div class="col-md-12">
     <div class="table-responsive">
     <table id="tb_pymts" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
       <tr><th>Customer</th><th>Description</th><th>Amount</th><th>Date Added</th></tr>
      </thead>
      <tbody>
       <?php
        while($row = mysqli_fetch_assoc($chkpymts)){
        $patid = $row["patId"];
        $pat = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM patients WHERE id='$patid'"));  ?>
        <tr>
         <td><?php echo $pat["first_name"]." ".$pat["last_name"]." (".$pat["patNo"].")";?></td>
         <td><?php echo $row["description"];?></td>
         <td>Ksh <?php echo number_format($row["amount"]);?></td>
         <td><?php echo date("d M Y",strtotime($row["created_at"]));?></td>
        </tr>
       <?php } ?>
      </tbody>
     </table>
    </div>
   </div>
<?php
 }
}
