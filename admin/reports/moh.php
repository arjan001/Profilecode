<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){
$total = 0;
$chkvisits = mysqli_query($con,"SELECT * FROM visits WHERE created_at>='$date1' AND created_at<='$date2' ORDER BY id DESC"); 
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
   <div class="col-md-12 summary">
    <p>Period: <span><?php echo $startdate." - ".$enddate;?></span></p>
   </div>
   <div class="col-md-12">
   <div class="table-responsive">
    <table id="tb_moh" class="table table-striped table-bordered" cellspacing="0" width="100%">
     <thead>
      <tr><th>Patient</th><th>Age</th><th>Sex</th><th>Chief Complain</th><th>Treatment</th><th>Prescription</th><th style="min-width: 100px;">Date</th></tr>
     </thead>
     <tbody>
      <?php
       while($row = mysqli_fetch_assoc($chkvisits)){ 
       $patid = $row["patId"];
       $pat = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM patients WHERE id='$patid'"));
       $gid = $pat["gender"];
       $gender = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM gender WHERE id='$gid'"));?>
       <tr>
        <td><?php echo $pat["first_name"]." ".$pat["last_name"]." (".$pat["patNo"].")";?></td>
        <td><?php echo floor((strtotime(date("Y-m-d"))-strtotime($pat["dob"]))/31536000);?></td>
        <td><?php echo $gender["name"];?></td>
        <td><?php echo $row["symptoms"];?></td>
        <td>
         <?php
          $vid = $row["id"];
          $chktreats = mysqli_query($con,"SELECT * FROM treatments WHERE vid='$vid'");
          $total = mysqli_num_rows($chktreats);
          $num = 0;
          while($abc = mysqli_fetch_assoc($chktreats)){
           $num += 1;
           $servid = $abc["servId"];
           echo "- ".mysqli_fetch_assoc(mysqli_query($con,"SELECT name FROM services WHERE id='$servid'"))["name"];
           if($num < $total){
            echo "<br>";
           }
          }
         ?>
        </td>
        <td><?php echo str_replace("\n", "<br>", $row["prescription"]);?></td>
        <td><?php echo date("d M Y", strtotime($row["created_at"]));?></td>
       </tr>
      <?php } ?>
   </tbody>
  </table>
 </div>
</div>
<?php
 }
}
