<?php include('inc/header.php');
 
include('connect.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($mysqli, $_POST['email']);
     $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
     $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
     $number = mysqli_real_escape_string($mysqli, $_POST['number']);
     $password =  password_hash($_POST['password'], PASSWORD_DEFAULT); 
    //  $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";
    

    $sql = "INSERT INTO users (email,firstname,lastname,number, password)
    VALUES ('$email','$firstname','$lastname','number', '$password')";
    
// $result = mysqli_query($conn, $sql); 
 
  

  if (mysqli_query($mysqli, $sql)) {
    $_SESSION['customer'] = $email;
    $_SESSION['customerid'] = mysqli_insert_id($mysqli);
    header('location:index.php');
  } else {
    header('location:login.php?message=2');
    echo("Error description: " . mysqli_error($mysqli));
  }
 



   
    
}




?>