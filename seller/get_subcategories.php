<?php
include_once ("./includes/config.php");
$categoryID = $_POST['categoryId'];
$sql = "SELECT * FROM subcategories WHERE catid = $categoryID";
$result = mysqli_query($con, $sql);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>