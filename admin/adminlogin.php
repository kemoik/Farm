<?php
   include('../connect.php');
   $message='';
   if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = md5($_POST['pswd']);

    $sql = "SELECT * FROM admin_data WHERE email='$email' and password='$password'";
    $result = mysqli_query($mysqli,$sql);
    if ($result->num_rows > 0) {
     $_SESSION['email'] = $email;
     header('location:index.php');
     
    } else {
      $message='Incorrect Credentials';
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body> 
    <nav class="navbar navbar-dark bg-light" style="background-color: #ffffff;">
        <div>
            <a class="navbar-brand" href="#">
              <img src="../assets/img/logo2.png" alt="Bootstrap" width="150" height="30">
            </a>
        </div>
        <div class="top">
            <ul class="nav navbar-dark bg-light justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">MarketPlace</a>
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
                  <?php if (isset($user)):?>
                  <i class="bi bi-person-fill-add"style="font-size: 1.5rem; color: black;">Hello <?= htmlspecialchars($user["firstname"]) ?> </i>
                  <a href="logout.php">
                  <button type="button" class="btn nav-link">LOGOUT</button>
                  </a>
                  <?php else: ?>
                  <a href="login.php">
                    <button type="button" class="btn nav-link">LOGIN/SIGNUP</button>
                  </a>
                  <?php endif; ?>
                </li>
              </ul>
        </div>
 
      </nav>
<div class="container pt-5">
    <h2 class='text-center text-black text-uppercase'>Admin Login</h2>

    <div class="row text-black mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box-content">
                <div class="clearfix space40"></div>
                <form class="logregform" method="post">
                    <div class="row">
                      <div class="col-md-12">
                        <?php 
                         if(isset($message)){
                          echo"<div class='alert alert-danger'>". $message. "</div>";
                         }
                        ?></div>
                      </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username or E-mail Address</label>
                                <input type="text" value="" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix space20"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a class="pull-right text-black" href="#">(Lost Password?)</a>
                                <label>Password</label>
                                <input type="password" value="" class="form-control" name="pswd">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix space20"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <span class="remember-box checkbox">
                            <label for="rememberme">
                            <input type="checkbox" id="rememberme" name="rememberme" class='mr-2'>Remember Me
                            </label>
                            </span>
                        </div>
                        <div class="col-md-12">
                            <button type="submit"name="submit" class="btn button btn-md pull-right">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
</div>
</body>
<script src="js/scripts.js"></script>
  <script src = "https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>