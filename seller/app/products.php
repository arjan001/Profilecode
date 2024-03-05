<?php
session_start();
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
include_once("../../config/index.php");
header("Content-Type:application/json");
$now = date('Y-m-d H:i:s');
$today = date('Y-m-d');
// if(isset($_SESSION["@TIBA2021#ADM"])){
//  $email = $_SESSION["@TIBA2021#ADM"];
//  $chkuser = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
//   while($row = mysqli_fetch_assoc($chkuser)){
//   $uid = $row["id"];
//   }

/*<======order Management=======>*/
if(isset($_POST["productname"])){
 extract($_POST);
 
    
         $url = strtolower(preg_replace("#[^0-9a-zA-Z()!,.?'\"]#i","-",$productname));
        
         //New order
         if($id == ""){
             $productimage = str_replace(" ","",$_FILES['productimage']['name']);
                $file_tmp =$_FILES['productimage']['tmp_name'];
                move_uploaded_file($file_tmp,"../../products/".$productimage);
                
                $productatt = str_replace(" ","",$_FILES['productatt']['name']);
                $file_tmp =$_FILES['productatt']['tmp_name'];
                if(move_uploaded_file($file_tmp,"../../docs/".$productatt)){
                }else{
                  echo json_encode(array('status' => 301,'message' => 'ERRORU')); 
               }
             
          if(mysqli_query($con,"INSERT INTO products(productname,url,productcategory,subcat1,productprice,description,productimage,docs,vendorid) VALUES('$productname','$url','$productcategory','$subcat1','$productprice','$description','$productimage','$productatt','$vendorid')")){
            echo json_encode(array('status' => 200,'message' => "SUCCESS"));
           }
          else{
           echo json_encode(array('status' => 300,'message' => 'ERROR'));
           }
          }
          else{
              if($_FILES['productimage']['name']!="" && $_FILES['productatt']['name']!=""){
                   $productimage = str_replace(" ","",$_FILES['productimage']['name']);
                $file_tmp =$_FILES['productimage']['tmp_name'];
                move_uploaded_file($file_tmp,"../../products/".$productimage);
                
               $productatt = str_replace(" ","",$_FILES['productatt']['name']);
                $file_tmp =$_FILES['productatt']['tmp_name'];
                if(move_uploaded_file($file_tmp,"../../docs/".$productatt)){
                }else{
                  echo json_encode(array('status' => 301,'message' => 'ERRORU')); 
               }
               
               $query="UPDATE products SET productname='$productname',productcategory='$productcategory',subcat1='$subcat1',productprice='$productprice',description='$description',productimage='$productimage',docs='$productatt' WHERE id = '$id'";
                  
              }else if($_FILES['productimage']['name']!="" && $_FILES['productatt']['name']==""){
                           $productimage = str_replace(" ","",$_FILES['productimage']['name']);
                        $file_tmp =$_FILES['productimage']['tmp_name'];
                        move_uploaded_file($file_tmp,"../../products/".$productimage);
                       
                       $query="UPDATE products SET productname='$productname',productcategory='$productcategory',subcat1='$subcat1',productprice='$productprice',description='$description',productimage='$productimage' WHERE id = '$id'";
                          
            }else if($_FILES['productimage']['name']=="" && $_FILES['productatt']['name']!=""){
                        
                       $productatt = str_replace(" ","",$_FILES['productatt']['name']);
                        $file_tmp =$_FILES['productatt']['tmp_name'];
                        if(move_uploaded_file($file_tmp,"../../docs/".$productatt)){
                        }else{
                          echo json_encode(array('status' => 301,'message' => 'ERRORU')); 
                       }
                       
                       $query="UPDATE products SET productname='$productname',productcategory='$productcategory',subcat1='$subcat1',productprice='$productprice',description='$description',docs='$productatt' WHERE id = '$id'";
                          
             }else if($_FILES['productimage']['name']=="" && $_FILES['productatt']['name']==""){
                       
                       $query="UPDATE products SET productname='$productname',productcategory='$productcategory',subcat1='$subcat1',productprice='$productprice',description='$description' WHERE id = '$id'";
                          
             }
              
           if(mysqli_query($con,$query)){
            echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
           }
           else{
            echo json_encode(array('status' => 300,'message' => 'ERROR'));
            }
          }
   
}

/*<=======Delete a order=========>*/
if(isset($_POST["delpurch"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["delpurch"]));

  if(mysqli_query($con,"DELETE FROM products WHERE id='$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  
  /*<=======complete a order=========>*/
if(isset($_POST["markascomplete"])){
  $id = trim(mysqli_real_escape_string($con, $_POST["markascomplete"]));

  if(mysqli_query($con,"UPDATE products SET status='2' WHERE id='$id'")){
    echo json_encode(array('status' => 200,'message' => 'SUCCESS'));
  }
  else{
    echo json_encode(array('status' => 300,'message' => 'ERROR'));
   }
  }
  
//}
?>