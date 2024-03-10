<?php
session_start();
include_once("../includes/config.php");
header("Content-Type: application/json");
$today = date('Y-m-d H:i:s');

/*<==========Logging in=============>*/
if(isset($_POST["email"]) && isset($_POST["pass"])) {
    $email = trim(mysqli_real_escape_string($con, $_POST["email"]));
    $pass = hash("sha256", md5(trim(mysqli_real_escape_string($con, $_POST["pass"]))));
    
    $query = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) > 0) {
        $_SESSION["@PCK23#ADM"] = $email;
        $row = mysqli_fetch_assoc($result);
        $typeid = $row["typeId"];
        $directory_query = "SELECT directory FROM usertypes WHERE id='$typeid'";
        $directory_result = mysqli_query($con, $directory_query);
        $directory_row = mysqli_fetch_assoc($directory_result);
        $url = $directory_row["directory"]; // Use directory directly
         
        echo json_encode(array("status" => 200, "message" => "SUCCESS", "url" => $url));
    } else {
        echo json_encode(array("status" => 300, "message" => "INVALID")); 
    }
} else {
    echo json_encode(array("status" => 400, "message" => "MISSING_FIELDS"));
}
?>
