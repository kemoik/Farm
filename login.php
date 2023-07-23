<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $mysqli = require __DIR__ . "/connect.php";

  $sql = sprintf(
    "Select * FROM customers WHERE email = '%s'",
    $mysqli->real_escape_string($_POST["email"])
  );
  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();
  if ($user) {
    if (password_verify($_POST["password"], $user["password_hash"])) {
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("Location:index.php");
      exit;
    }
  }
  $is_invalid = true;
}
include('inc/header.php');
?>

<style>
  h1 {
    text-align: center;
    font-family: 'Tilt Prism', cursive;
  }

  .lead {
    text-align: center;
  }

  .welcome {
    margin-top: 80px;
  }

  .center {
    margin-left: 130px;
    margin-top: 80px;
  }

  #show {
    margin-top: 50px;
  }
</style>

<body>
  <?php include('inc/nav.php') ?>

  <div class="container welcome">
    <h1 style="color:black"> WELCOME TO <span><img src="assets/img/farmers.png" alt="" width="200" height="60"></span> </h1>
    <div class="lead">
      <button id="show" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
        Login/Signup
      </button>
    </div>
  </div>
  <div class="container text-black">
    <div class="row">
      <div class="col-md-12 my-5">
        <div class="page_header text-center">
          <h2>Shop - Account</h2>

        </div>
      </div>


      <div class="col-md-12">
        <div class="row shop-login">
          <div class="col-md-6">
            <div class="box-content">
              <h3 class="heading text-center">I'm a Returning Customer</h3>
              <div class="clearfix space40"></div>

              <?php
              if (isset($_REQUEST['message'])) {
                if ($_GET['message'] == '1') {
              ?>

                  <div class="alert alert-danger">Invalid Credential</div>


              <?php

                }
              }
              ?>
              <form class="logregform" action='loginProcess.php' method='post'>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Username or E-mail Address</label>
                      <input type="text" value="" class="form-control" name='email' required>
                    </div>
                  </div>
                </div>
                <div class="clearfix space20"></div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <!-- <a class="pull-right text-white" href="#">(Lost Password?)</a> -->
                      <label>Password</label>
                      <input type="password" value="" class="form-control" name='password' required>
                    </div>
                  </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="row">
                  <!-- <div class="col-md-12">
                        <span class="remember-box checkbox">
                        <label for="rememberme">
                        <input type="checkbox" id="rememberme" name="rememberme">Remember Me
                        </label>
                        </span>
                    </div> -->
                  <div class="col-md-12">
                    <button type="submit" name='submit' class="btn btn-outline-success">Login</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box-content">
              <h3 class="heading text-center">Register An Account</h3>
              <div class="clearfix space40"></div>

              <?php
              if (isset($_REQUEST['message'])) {
                if ($_GET['message'] == '2') {
              ?>

                  <div class="alert alert-danger">Error Creating Account</div>


              <?php

                }
              }
              ?>
              <form class="logregform" action='registerprocess.php' method='post'>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>E-mail Address</label>
                      <input type="text" value="" class="form-control" name='email' required>
                    </div>
                  </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>FirstName</label>
                      <input type="text" value="" class="form-control" name='firstname' required>
                    </div>
                  </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>LastName</label>
                      <input type="text" value="" class="form-control" name='lastname' required>
                    </div>
                  </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Mobile Number</label>
                      <input type="number" value="" class="form-control" name='number' required>
                    </div>
                  </div>
                </div>
                <div class="clearfix space20"></div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                      <label>Password</label>
                      <input type="password" value="" class="form-control" name='password' required>
                    </div>
                    <div class="col-md-12">
                      <label>Re-enter Password</label>
                      <input type="password" value="" class="form-control" name='passwordAgain' required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="space20"></div>
                    <button type="submit" name='submit' class="btn btn-outline-success">Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>



      </div>
    </div>


    <h3 class="heading text-center">Are you an Agriculturist, Start selling your product on our platfrom</h3>
    <?php
    
    if(isset($_POST['submit'])){
      $productname = $_POST['productname'];
      $productdescription = $_POST['productdescription'];
      $productcategory = $_POST['productcategory'];
      $productprice = $_POST['productprice']; 
    
      
      if(isset($_FILES) & !empty($_FILES)){
        $name = $_FILES['productimage']['name'];
        $size = $_FILES['productimage']['size'];
        $type = $_FILES['productimage']['type'];
        $tmp_name = $_FILES['productimage']['tmp_name'];
    
        $max_size = 10000000;
        $extension = substr($name, strpos($name, '.') + 1);
    
        if(isset($name) && !empty($name)){
          if(($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size<=$max_size){
            $location = "uploads/";
            if(move_uploaded_file($tmp_name, $location.$name)){
              //$smsg = "Uploaded Successfully";
              $sql2 = "INSERT INTO products (product_name, cat_id, price, product_description, thumb)
                          VALUES ('$productname', '$productcategory', '$productprice', '$productdescription','$location$name')";
              $res = mysqli_query($mysqli, $sql2);
              if($res){
                //echo "Product Created";
                $message = 'Saved Successfully with image';
              }else{
                              $message = "Failed to Create Product";
                              echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
              }
            }else{
              $message = "Failed to Upload File";
            }
          }else{
            $message = "Only JPG files are allowed and should be less that 1MB";
          }
        }else{
          $message = "Please Select a File";
        }
      }else{
      $sql = "INSERT INTO products (product_name, cat_id, price, product_description)     VALUES ('$productname', '$productcategory', '$productprice', '$productdescription' )";
    
    if (mysqli_query($mysqli, $sql)) {
     
    $message = 'Saved Successfully';
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    
    }
    
    }
    
    ?>
    
    <div class="container">
    <div class="card">
    <div class="card-header">
    Add Products
    </div>
    <div class="card-body">
    <section id="content ">
    <div class="content-blog bg-white py-3">
      <div class="container"> 
          <?php
          if(isset($message)){
              ?>
      <div class="alert alert-success"><?php echo $message ?></div>
          <?php
          }
          ?>
              <form method="post" enctype="multipart/form-data" action='login.php'>
          <div class="form-group">
            <label for="Productname">Product Name</label>
            <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
          </div>
          <div class="form-group">
            <label for="productdescription">Product Description</label>
            <textarea class="form-control" name="productdescription" rows="3"></textarea>
          </div>
    
          <div class="form-group">
            <label for="productcategory">Product Category</label>
            <select class="form-control" id="productcategory" name="productcategory">
            <option value="" selected disabled>---SELECT CATEGORY---</option>
    
                    <?php
                    
          
                    $sql = "SELECT * FROM Category";
                    $result = mysqli_query($mysqli, $sql);
                
                  
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                
                            ?> 
                   <option value="<?php echo $row["cat_id"] ?>"><?php echo  $row["cat_name"] ?></option> 
                        <?php
                        }
                    
                    ?>
           
          
         
          </select>
          </div> 
    
          <div class="form-group">
            <label for="productprice">Product Price</label>
            <input type="text" class="form-control" name="productprice" id="productprice" placeholder="Product Price">
          </div>
          <div class="form-group">
            <label for="productimage">Product Image</label>
            <input type="file" name="productimage" id="productimage">
            <p class="help-block">Only jpg/png are allowed.</p>
          </div>
          
          <button type="submit"  name ='submit' class="btn btn-success">Submit</button>
        </form>
        
      </div>
    </div>
    
    </section>
    </div>
    </div>
    
    
    </div>
  </div>

  <!-- <div class="container">
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Shop With Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <button type="button" class="btn btn-success">LOGIN</button>
                        <?php if ($is_invalid) : ?>
                            <div class="alert alert-danger">Invalid Credential</div>
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
                <div class="modal-footer">
                    <h2>Sign up as </h2>
                    <button type="button" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="btn btn-success">E-SHOPPER</button>
                    <a href="farmers.php">
                        <button type="button" class="btn btn-success">LOGIN/SIGNUP</button>
                    </a>
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
        </div> -->

</body>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>