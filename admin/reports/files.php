<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){
$total = 0;
$chkpymts = mysqli_query($con,"SELECT * FROM files WHERE status='1' AND createdon>='$date1' AND createdon<='$date2' ORDER BY id DESC");
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
     <div class="col-md-12 summary">
     <p>Total Open Files: <span><?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT count(id) AS amt FROM files WHERE status='1' AND createdon>='$date1' AND createdon<='$date2'"))["amt"]);?></span></p>
     <p>Period: <span><?php echo $startdate." - ".$enddate;?></span></p>
     </div>
    <div class="col-md-12">
    <div class="table-responsive">
     <table id="tb_purchs" class="table table-striped table-bordered" cellspacing="0" width="100%">
         <thead>
          <tr><th>System File No</th><th>File No</th><th>Staff Assigned</th><th>Physical Location</th><th>Description</th><th>Client</th><th style="min-width: 100px;">Action</th></tr>
         </thead>
         <tbody>
         <?php
          while($row = mysqli_fetch_assoc($chkpymts)){
          $staffid = $row["staffid"];
          $clientid = $row["clientid"];
          $counsel = $row["counsel"];
          $staff = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$staffid'"));
          $client = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM customers WHERE id='$clientid'"));
          ?>
          <tr>
           
           <td><?php echo $row["sfileno"];?></td>
           <td><?php echo $row["fileno"];?></td>
           <td><?php echo $staff["first_name"]." ".$staff["last_name"];?></td>
           <td><?php echo $row["location"];?></td>
           <td><?php echo $row["description"];?></td>
           <td><?php echo $client["orgname"];?></td>
           <td>
               <a href="<?php echo $base_url;?>admin/file/<?php echo $row['sfileno'] ?>"><button class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="bottom" title="View file"><i class="fas fa-search-plus"></i></button></a>
            <button class="btn btn-xs btn-primary edtpurch" data-toggle="tooltip" data-placement="bottom" title="Edit file" data-clientid="<?php echo $row['clientid'] ?>" data-fileno="<?php echo $row['fileno'] ?>" data-staff="<?php echo $row['staffid'] ?>" data-location="<?php echo $row['location'] ?>" data-id="<?php echo $row["id"];?>" data-description="<?php echo $row['description'];?>"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-xs btn-danger delpurch" id="<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="bottom" title="Delete file"><i class="fa fa-trash"></i></button>
            <button class="btn btn-xs btn-warning closefile" id="<?php echo $row["id"];?>" data-toggle="tooltip" data-placement="bottom" title="close a file"><i class="fa fa-lock"></i></button>
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
