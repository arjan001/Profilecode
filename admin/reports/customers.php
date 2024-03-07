<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){
$total = 0;
$chkpymts = mysqli_query($con,"SELECT * FROM customers WHERE createdon>='$date1' AND createdon<='$date2' ORDER BY id DESC");
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
     <div class="col-md-12 summary">
     <p>Total Customers: <span><?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) AS amt FROM customers WHERE createdon>='$date1' AND createdon<='$date2'"))["amt"]);?></span></p>
     <p>Period: <span><?php echo $startdate." - ".$enddate;?></span></p>
     </div>
    <div class="col-md-12">
    <div class="table-responsive">
     <table id="tb_users" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
           <tr><th>Cust No</th><th>Org Name</th><th>Org Phone</th><th>Org Email</th><th>ID / Reg No</th><th>PIN</th><th>Box</th><th>Code</th><th>Town</th><th>Address</th><th>Contact Person</th><th>Contact Phone</th><th>Contact Email</th><th style="min-width: 100px;">Action</th></tr>
          </thead>
           <tbody>
             <?php
             while($row = mysqli_fetch_assoc($chkpymts)){  ?>
             <tr>
                 <td><?php echo $row["custNo"];?></td>
                 <td><?php echo $row["orgname"];?></td>
                 <td><?php echo $row["orgphone"];?></td>
                 <td><?php echo $row["orgemail"];?></td>
                 <td><?php echo $row["orgid"];?></td>
                 <td><?php echo $row["orgpin"];?></td>
                 <td><?php echo $row["orgbox"];?></td>
                 <td><?php echo $row["orgcode"];?></td>
                 <td><?php echo $row["orgtown"];?></td>
                 <td><?php echo $row["orgaddress"];?></td>
                  <td><?php echo $row["fname"]." ".$row["lname"]." ".$row["sname"];?></td>
                  <td><?php echo $row["phone"];?></td>
                  <td><?php echo $row["email"];?></td>
                  <td>
                   <a data-toggle="tooltip" data-placement="bottom" title="Edit customer"><button class="btn btn-xs btn-primary edtuser" data-id="<?php echo $row["id"];?>" data-orgname="<?php echo $row["orgname"]  ?>" data-orgphone="<?php echo $row["orgphone"]  ?>" data-orgemail="<?php echo $row["orgemail"]  ?>" data-orgid="<?php echo $row["orgid"]  ?>" data-orgpin="<?php echo $row["orgpin"]  ?>" data-orgbox="<?php echo $row["orgbox"]  ?>" data-orgcode="<?php echo $row["orgcode"]  ?>" data-orgtown="<?php echo $row["orgtown"]  ?>" data-orgaddress="<?php echo $row["orgaddress"]  ?>" data-fname="<?php echo $row["fname"];?>" data-lname="<?php echo $row["lname"];?>" data-sname="<?php echo $row["sname"];?>" data-phone="<?php echo $row["phone"];?>" data-email="<?php echo $row["email"];?>"><i class="fas fa-pencil-alt"></i></button></a>
                   <button class="btn btn-xs btn-danger deluser" id="<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="bottom" title="Delete Doctor"><i class="fa fa-trash"></i></button>
                  </td>
             </tr>
             <?php }
            ?>
         </tbody>
       </table>
    </div>
   </div>
<?php
 }
}
