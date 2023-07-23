<?php

session_start();
include('../connect.php');
// if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
//  header('location:adminlogin.php');
// }
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
</head>
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-light navbar-light" >
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

                </div>
            </div> 
</li>
</div> 
</ul>
 
      </nav>
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
          <form method="post" enctype="multipart/form-data" action='addProducts.php'>
      <div class="form-group">
        <label for="Productname">Product Name</label>
        <input type="text" class="form-control" name="productname" id="Productname" placeholder="Product Name">
      </div>
      <div class="form-group">
        <label for="productdescription">Product Description</label>
        <textarea class="form-control" name="productdescription" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="productquantiy">Quantity</label>
        <input type="text" class="form-control">
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
      
      <button type="submit"  name ='submit' class="btn btn-primary">Submit</button>
    </form>
    
  </div>
</div>

</section>
</div>
</div>


</div>

</body>
  <script src="js/scripts.js"></script>
  <script src = "https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>