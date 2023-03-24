<?php
$is_invalid = false;

 if ($_SERVER["REQUEST_METHOD"] === "POST"){
  $mysqli = require __DIR__ ."/connect.php";

  $sql = sprintf("Select * FROM customers WHERE email = '%s'", 
                        $mysqli-> real_escape_string($_POST["email"]));
  $result = $mysqli -> query($sql);

  $user = $result -> fetch_assoc();
  if($user) {
      if(password_verify($_POST["password"], $user["password_hash"])){
          session_start();
          session_regenerate_id();
          $_SESSION["user_id"] = $user["id"];
          header("Location:index.php");
          exit;

      }
  }
  $is_invalid = true;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Prism&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Farmers</title>
</head>
<style>
    h1 {
  text-align: center;
  font-family: 'Tilt Prism', cursive; 
}
.lead {
    text-align: center;
}
.welcome{
    margin-top: 80px;
}
.center{
  margin-left: 130px;
  margin-top: 80px;
}
#show{
  margin-top: 50px;
}

</style>
<body>
<nav class="navbar navbar-dark bg-light" style="background-color: #ffffff;">
        <div>
            <a class="navbar-brand" href="#">
              <img src="assets/img/logo2.png" alt="Bootstrap" width="150" height="30">
            </a>
        </div>
        <div class="top">
            <ul class="nav navbar-dark bg-light justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="index.php">MarketPlace</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Producers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">BlogSpace</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="about.html">About MNK</a>
                </li>
              </ul>
        </div>
        <div class="topnav">
            <ul class=" nav justify-content-end">
                <li class="nav-item">
                  <i class="bi bi-person-fill-add"style="font-size: 1.5rem; color: black;">Hello</i>
                  <a href="login.php">
                    <button type="button" class="btn nav-link">AGRICULTURIST</button>
                  </a>
                </li>
              </ul>
        </div>
      </nav>
  <div class="container welcome">
    <h1 style="color:black"> WELCOME TO <span><img src="assets/img/farmers.png" alt=""  width="200" height="60"></span> </h1>
    <div class="lead">
    <button id="show"  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    Login/Signup
     </button>
     </div>
    <div class="modal fade" id="exampleModalToggle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Shop With Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>Sign up as </h2>
                      <button type="button"data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="btn btn-success">E-SHOPPER</button>
                      <a href="farmers.html">
                       <button type="button" class="btn btn-success">LOGIN/SIGNUP</button>
                      </a>
                    </div>
                    <div class="col-md-6 ms-auto">  
                      <button type="button" class="btn btn-success">LOGIN</button>
                       <?php if($is_invalid):?>
                          <em>Invalid login</em>
                          <?php endif; ?>
                      <form method="post">
                          <div class="input-group  mb-3">
                          <span class="input-group-text" id="basic-addon1">@</span>
                          <input type="email" name="email" class="form-control" placeholder="Useremail" aria-label="email" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group  mb-3">
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                          <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">SignIn</button>
                      </form>
                    </div>
                  </div>
                  </div>
              </div>

            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
          <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-6 ms-auto">
                      <h1>Welcome To</h1> 
                      <img class="center" src="assets/img/farmers.png" alt=""  width="200" height="60">
                      
                    </div>
                    <div class="col-md-6 ms-auto">  
                      <button type="button" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="btn btn-success">LOGIN</button>
                      
                      <form action="process-signup.php" method="post"> 
                        <div class="input-group  mb-3">
                          <label for="validationCustomUsername" class="form-label"></label>
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                          <input type="email" name="email"  id="email"class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
                          <div class="invalid-feedback">
                            Please Enter your email.
                          </div>
                        </div>
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-4 ">
                              <div class="input-group  mb-3">
                                <label for="validationCustom01" class="form-label"></label>
                                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                  <input type="text" name="firstname" id="firstname"  class="form-control" placeholder="FirstName" aria-label="Username" aria-describedby="basic-addon1" required>
                                  <div class="invalid-feedback">
                                    Please Enter your name.
                                  </div>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                              <div class="input-group  mb-3">
                                <label for="validationCustom02" class="form-label"></label>
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                  <input type="text" name="lastname" id="lastname" class="form-control" placeholder="LastName" aria-label="Username" aria-describedby="basic-addon1" required>
                                  <div class="invalid-feedback">
                                    Please Enter your name.
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                      <div class="input-group  mb-3">
                        <label for="validationCustom03" class="form-label"></label>
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                        <input type="tel" name="number" id="number" class="form-control" placeholder="Phone Number" aria-label="Number" aria-describedby="basic-addon1" required>
                        <div class="invalid-feedback">
                          Please Enter a valid Phone Number.
                        </div>
                      </div>
                        <div class="input-group  mb-3">
                          <label for="validationCustom04" class="form-label"></label>
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                          <div class="invalid-feedback">
                            Please Enter a valid password.
                          </div>
                        </div>
                        <div class="input-group  mb-3">
                          <label for="validationCustom05" class="form-label"></label>
                          <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                          <input type="password" name="password_confirmation"  id="password_confirmation"class="form-control" placeholder=" Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1" required>
                          <div class="invalid-feedback">
                            Passwords dont match.
                          </div>
                         </div>
                        <div class="mb-3 form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-success">SignUp</button>
                      </form>
                    </div>
                  </div>
                  </div>
              </div>
            </div> 
          </div>
        </div>
  </div>
</body>
<script src = "https://code.jquery.com/jquery-3.6.3.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>