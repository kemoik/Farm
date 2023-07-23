<?php

session_start();
include('../connect.php');
// if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
//  header('location:login.php');
// }
if (isset($_POST['submit'])) {
  // echo 'you clicked on submit';
  $productname = $_POST['productname'];
  $productdescription = $_POST['productdescription'];
  $productcategory = $_POST['productcategory'];
  $productprice = $_POST['productprice'];
  $product_id = $_POST['hiddenID'];

  if (isset($_FILES) & !empty($_FILES)) {
    $name = $_FILES['productimage']['name'];
    $size = $_FILES['productimage']['size'];
    $type = $_FILES['productimage']['type'];
    $tmp_name = $_FILES['productimage']['tmp_name'];
    $max_size = 10000000;
    $extension = substr($name, strpos($name, '.') + 1);
    if (isset($name) && !empty($name)) {
      if (($extension == "jpg" || $extension == "jpeg") && $type == "image/jpeg" && $size <= $max_size) {
        $location = "uploads/";
        $filePath = $location . $name;
        if (move_uploaded_file($tmp_name, $filePath)) {
          //$smsg = "Uploaded Successfully";  

          $sql2 = "UPDATE products SET product_name='$productname', product_description='$productdescription',  
			cat_id='$productcategory', price='$productprice', thumb='$filePath'  WHERE product_id='$product_id'";

          $res = mysqli_query($mysqli, $sql2);
          if ($res) {
            //echo "Product Created";
            $message = 'Saved Successfully with image';
          } else {
            $message = "Failed to Create Product";
            echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
          }
        } else {
          $message = "Failed to Upload File";
        }
      } else {
        $message = "Only JPG files are allowed and should be less that 1MB";
      }
    } else {
      $message = "Please Select a File";
    }
  }

  $sql_update = "UPDATE products SET product_name='$productname', product_description='$productdescription',  
			cat_id='$productcategory', price='$productprice' WHERE product_id='$product_id'";

  if (mysqli_query($mysqli, $sql_update)) {

    $message = 'Saved Successfully';
  } else {
    echo "Error: " . $sql_update . "<br>" . mysqli_error($mysqli);
  }
}


if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $sql = "SELECT * FROM products  WHERE product_id='$product_id'";
  $result = mysqli_query($mysqli, $sql);
  //    header('location:products.php');

  $row = mysqli_fetch_assoc($result);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div>
      <a class="navbar-brand" href="#">
        <img src="../assets/img/logo2.png" alt="Bootstrap" width="150" height="30">
      </a>
    </div>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Categories
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="./categories.php">view Categories </a>
          <a class="dropdown-item" href="./addCategory.php">Add Categories</a>
        </div>
      </li>


      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Products
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="./products.php">view Products </a>
          <a class="dropdown-item" href="./addProducts.php">Add Products</a>
          <a class="dropdown-item" href="./addProducers.php">Add Producers</a> 
        </div>
      </li>

      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Orders
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="./orders.php">view Orders </a>
          <a class="dropdown-item" href="./addOrder.php">Add Orders</a>
        </div>
      </li>


      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          My Account
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="editProfile.php">Edit Profile </a>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </li>

      <li class="nav-item mt-2">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>




      <!-- Dropdown -->

      <div class='text-right ml-5'>
        <li class="nav-item dropdown">

          <div class="dropdown">
            <button type="button" class="btn btn-info" data-toggle="dropdown">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">3</span>
            </button>
            <div class="dropdown-menu">
              <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">3</span>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                  <p>Total: <span class="text-info">$2,978.24</span></p>
                </div>
              </div>
              <div class="row cart-detail">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                  <img src="images/1.jpeg">
                </div>
                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                  <p>Sony DSC-RX100M..</p>
                  <span class="price text-info"> $250.22</span> <span class="count"> Quantity:01</span>
                </div>
              </div>
              <div class="row cart-detail">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                  <img src="images/2.jpeg">
                </div>
                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                  <p>Vivo DSC-RX100M..</p>
                  <span class="price text-info"> $500.40</span> <span class="count"> Quantity:01</span>
                </div>
              </div>
              <div class="row cart-detail">
                <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                  <img src="images/3.jpeg">
                </div>
                <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                  <p>Lenovo DSC-RX100M..</p>
                  <span class="price text-info"> $445.78</span> <span class="count"> Quantity:01</span>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                  <button class="btn btn-primary btn-block">Checkout</button>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
    </ul>

  </nav>
  <div class="container">

    <div class="card">
      <div class="card-header">
        Edit Products
      </div>
      <div class="card-body">
        <section id="content ">
          <div class="content-blog bg-white py-3">
            <div class="container">
              <form method="post" enctype="multipart/form-data">
                <input type="hidden" name='hiddenID' value='<?php echo $product_id ?>'>
                <div class="form-group">
                  <label for="Productname">Product Name</label>
                  <input type="text" class="form-control" value='<?php echo $row['product_name']; ?>' name="productname" id="Productname" placeholder="Product Name">
                </div>
                <div class="form-group">
                  <label for="productdescription">Product Description</label>
                  <textarea class="form-control" name="productdescription" rows="3"> <?php echo $row['product_description']; ?> </textarea>
                </div>

                <div class="form-group">
                  <label for="productcategory">Product Category</label>
                  <select class="form-control" id="productcategory" name="productcategory">


                    <?php


                    $sql2 = "SELECT * FROM category";
                    $result2 = mysqli_query($mysqli, $sql2);


                    // output data of each row
                    while ($row2 = mysqli_fetch_assoc($result2)) {

                    ?>
                      <option value="<?php echo $row2["cat_id"] ?>" <?php

                                                                    if ($row2["cat_id"] == $row['cat_id']) {
                                                                      echo 'selected';
                                                                    } else {
                                                                      echo '';
                                                                    }
                                                                    ?>><?php echo  $row2["cat_name"] ?></option>
                    <?php
                    }

                    ?>

                  </select>
                </div>


                <div class="form-group">
                  <label for="productprice">Product Price</label>
                  <input type="text" class="form-control" value='<?php echo $row['price']; ?>' name="productprice" id="productprice" placeholder="Product Price">
                </div>
                <?php if (isset($row['thumb']) && !empty($row['thumb'])) {
                ?>
                  <img src="<?php echo $row['thumb']; ?>" alt="" height='150' width='150'><br>
                  <a href="delproduImg.php?id=<?php echo $row['product_id']; ?>">Delete Image</a><br>

                <?php
                } else {

                ?>
                  <div class="form-group">
                    <label for="productimage">Product Image</label>
                    <input type="file" name="productimage" id="productimage">
                    <p class="help-block">Only jpg/png are allowed.</p>
                  </div>

                <?php
                } ?>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>

            </div>
          </div>

        </section>
      </div>
    </div>

  </div>

</body>

</html>