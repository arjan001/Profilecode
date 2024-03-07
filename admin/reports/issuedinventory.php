<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){
$total = 0;
$chkinv = mysqli_query($con,"SELECT issued_inventories.*,inventories.itemname,inventories.itemcode,users.first_name,users.last_name FROM issued_inventories,inventories,users WHERE inventories.id=issued_inventories.itemid AND issued_inventories.issuedto=users.id AND createdon>='$date1' AND createdon<='$date2' ORDER BY id DESC");
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
     <div class="col-md-12 summary">
     <p>Total Amount: <span>Ksh <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(issued_inventories.qty*inventories.unitcost) AS issued FROM issued_inventories,inventories WHERE issued_inventories.itemid=inventories.id AND createdon>='$date1' AND createdon<='$date2'"))["issued"]);?></span></p>
     <p>Period: <span><?php echo $startdate." - ".$enddate;?></span></p>
     </div>
    <div class="col-md-12">
    <div class="table-responsive">
     <table id="tb_purchs" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
           <tr><th>Item Name - Item Code</th><th>Issued to</th><th>Qty</th><th>Issue Date</th></tr>
          </thead>
           <tbody>
             <?php
             while($row = mysqli_fetch_assoc($chkinv)){
                 
             ?>
             <tr>
              <td><?php echo $row["itemname"]." (".$row["itemcode"];?>)</td>
              <td><?php echo $row["first_name"]." ".$row["last_name"];?></td>
              <td><?php echo $row["qty"];?></td>
              <td><?php echo date("d M Y",strtotime($row["createdon"]));?></td>
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
