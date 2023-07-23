<?php
 session_start();
 include('../connect.php');
 if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
  header('location:login.php');
 }
 

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "DELETE FROM products WHERE product_id='$product_id'";
   $result = mysqli_query($mysqli, $sql);
   header('location:products.php');


}


?>