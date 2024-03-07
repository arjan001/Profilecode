<?php
include_once("../includes/config.php");
if(isset($_POST['categoryid'])){
$mcode = $_POST["categoryid"];
$cc=mysqli_query($con,"SELECT * FROM subcategories where catid='$mcode' ORDER BY subcatname ASC");
$flist = "";
?>
<?php
while($row=mysqli_fetch_assoc($cc)){
$flist .= '<option value="'.$row["id"].'">'.$row["subcatname"].'</option>';
 }
 echo $flist;
}
?>