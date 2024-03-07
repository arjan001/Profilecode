<?php
session_start();
include("../../config/index.php");
if(isset($_POST["date1"]) && isset($_POST["date2"])){
$date1 = $_POST["date1"];
$date2 = date("Y-m-d",strtotime($_POST["date2"]."+1 Days"));
if(isset($_SESSION["@TIBA2021#ADM"])){ 
$startdate = date("d M, Y",strtotime($date1));
$enddate = date("d M, Y",strtotime($date2)); ?>
<div class="breadcrumbs row">
 <ul class="breadcrumb">
  <li><i class="fas fa-tachometer-alt"></i>&nbsp;Dashboard</li>
  <li><i class="fa fa-home"></i> &nbsp;Home</li>
  <li>&nbsp; Period: <span><?php echo $startdate." - ".$enddate;?></span></li>
 </ul>
</div>

<div class="row wrapper">
 <button class="btn item" data-dismiss="modal" data-toggle="modal" data-target="#filtermodal"><i class="far fa-calendar-alt"></i> Filter by Date</button>
</div>
   
   <div class="row">
   <div class="col-md-12" style="padding-left: 0!important;">
    <div class="col-md-3">
    <div class="col-md-12 inner">
    <div class="row">
     <div class="col-md-7">
      <h1><?php echo number_format(mysqli_num_rows(mysqli_query($con,"SELECT * FROM files WHERE status='1' AND createdon>='$date1' AND createdon<='$date2'")));?></h1>
     </div>
     <div class="col-md-5">
      <i class="fas fa-file"></i>
     </div>
    </div>
    <div class="row">
     <h4>Open Files</h4>
    </div>
    </div>
    </div>

   <div class="col-md-3">
    <div class="col-md-12 inner">
    <div class="row">
     <div class="col-md-7">
      <h1><?php echo number_format(mysqli_num_rows(mysqli_query($con,"SELECT * FROM files WHERE status='0' AND createdon>='$date1' AND createdon<='$date2'")));?></h1>
     </div>
     <div class="col-md-5">
      <i class="fas fa-file"></i>
     </div>
    </div>
    <div class="row">
     <h4>Closed Files</h4>
    </div>
    </div>
    </div>
    
    <div class="col-md-3">
    <div class="col-md-12 inner">
    <div class="row">
     <div class="col-md-7">
      <h1><?php echo number_format(mysqli_num_rows(mysqli_query($con,"SELECT * FROM rulings WHERE createdon>='$date1' AND createdon<='$date2'")));?></h1>
     </div>
     <div class="col-md-5">
      <i class="fas fa-hammer"></i>
     </div>
    </div>
    <div class="row">
     <h4>Rulings</h4>
    </div>
    </div>
    </div>
    
    <div class="col-md-3">
    <div class="col-md-12 inner">
    <div class="row">
     <div class="col-md-7">
      <h1><?php echo number_format(mysqli_num_rows(mysqli_query($con,"SELECT * FROM mentions WHERE createdon>='$date1' AND createdon<='$date2'")));?></h1>
     </div>
     <div class="col-md-5">
      <i class="fas fa-hammer"></i>
     </div>
    </div>
    <div class="row">
     <h4>Mentions</h4>
    </div>
    </div>
    </div>
    
    <div class="col-md-3">
    <div class="col-md-12 inner">
    <div class="row">
     <div class="col-md-7">
      <h1><?php echo number_format(mysqli_num_rows(mysqli_query($con,"SELECT * FROM hearings WHERE createdon>='$date1' AND createdon<='$date2'")));?></h1>
     </div>
     <div class="col-md-5">
      <i class="fas fa-hammer"></i>
     </div>
    </div>
    <div class="row">
     <h4>Hearings</h4>
    </div>
    </div>
    </div>

    <div class="col-md-3">
    <div class="col-md-12 inner">
    <div class="row">
     <div class="col-md-7">
      <h1>Ksh <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS fee FROM payment WHERE createdon>='$date1' AND createdon<='$date2'"))["fee"]);?></h1>
     </div>
     <div class="col-md-5">
      <i class="fas fa-file-invoice"></i>
     </div>
    </div>
    <div class="row">
     <h4>Income</h4>
    </div>
    </div>
    </div>

    <div class="col-md-3">
     <div class="col-md-12 inner">
     <div class="row">
      <div class="col-md-7">
      <h1>Ksh <?php echo number_format(mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM expenses WHERE createdon>='$date1' AND createdon<='$date2'"))["amt"]);?></h1>
      </div>
      <div class="col-md-5">
       <i class="fas fa-file-invoice"></i>
      </div>
     </div>
     <div class="row">
      <h4>Expenses</h4>
     </div>
     </div>
    </div>

   </div>
   </div>
  
  <?php
   $year = date("Y");
   $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
   $graph = array();
   for($i=1; $i<=(int)date("m"); $i++){
    $mnthname = $months[$i-1];
    if($i < 10){
      $month = "0".$i;
    }else{
      $month = $i;
    }
    // $income = $expenses = 0;
    // $total = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM visits WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year' AND paid='1'"))["amt"];
    // $fee = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(fee_amt) AS amt FROM visits WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year' AND fee_pymt='1'"))["amt"];
    // $directsales = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM pharmacy_sales WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year' AND vid='0'"))["amt"];
    // $purchases = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(cost) AS amt FROM purchases WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year'"))["amt"];
    // $miscellaneous = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM miscellaneous WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year'"))["amt"];
    // $income += $total+$fee+$directsales;
    // $expenses += $purchases+$miscellaneous;
    $income = $expenses = 0;
 $total = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM payment WHERE MONTH(createdon)='$month' AND YEAR(createdon)='$year' AND createdon>='$date1' AND createdon<='$date2'"))["amt"];
//  $fee = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(fee_amt) AS amt FROM visits WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year' AND fee_pymt='1'"))["amt"];
//  $directsales = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM pharmacy_sales WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year' AND vid='0'"))["amt"];
 $purchases = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM expenses WHERE MONTH(createdon)='$month' AND YEAR(createdon)='$year' AND createdon>='$date1' AND createdon<='$date2'"))["amt"];
//  $miscellaneous = mysqli_fetch_assoc(mysqli_query($con,"SELECT SUM(amount) AS amt FROM miscellaneous WHERE MONTH(created_at)='$month' AND YEAR(created_at)='$year'"))["amt"];
  $income += $total;
 $expenses += $purchases;

    array_push($graph, array("month" => $mnthname, "income" => $income, "expenses" => $expenses));
   } ?>
   
  <div class="panel panel-default graphical">
   <div class="panel-body">
    <script type="text/javascript">
     google.charts.load('current', {'packages':['bar']});
     google.charts.setOnLoadCallback(drawChart);
     function drawChart() {
     var data = google.visualization.arrayToDataTable([
     ['Month','Expenses','Income'],
     <?php
      foreach ($graph as $value) {
        echo "['".$value["month"]."',".$value["expenses"].",".$value["income"]."],";
       }
      ?>]);     
       var options = {
        chart: {
            title: 'Income vs Expenses',
            subtitle: '',
        },
        bars: 'vertical',
        vAxis: {format: 'decimal',
                title:'Numbers/Amount'
        },
        hAxis: {format: 'decimal',
               title:'Months of the Year <?php echo $year;?>'
        },
        height: 300,
        colors: ['#2673c7', '#ff9000']
        };
        var chart = new google.charts.Bar(document.getElementById('bar-graph'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
     </script>
     <div id="bar-graph"></div>
    </div>
   </div>
<?php
 }
}
