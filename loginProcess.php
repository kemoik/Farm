<?php 
include('inc/header.php');

include('connect.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($mysqli, $_POST['email']);
     $password = $_POST['password'];
    
     $sql = "SELECT * FROM users WHERE email='$email' ";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);
    $dbStoredPASSWORD = $row['password'];

if (password_verify ($password, $dbStoredPASSWORD)) {
     $_SESSION['customer'] = $email;
     $_SESSION['customerid'] = $row['id'];
     header('location:checkout.php');
  } else {
    header('location:login.php?message=1');
//    $message =  'incorrect Credentials';
  }
  


   
    
}
