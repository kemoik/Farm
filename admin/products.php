
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
All Products
</div>
<div class="card-body">
<section id="content mt-5">
	<div class="content-blog  bg-white">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr> 
						<th>Product Name</th>
						<th>Category Name</th>
						<th>Thumbnail</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

                <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            ?>
      
        <tr>
            <td><?php echo $row["product_name"] ?></td>
            <td><?php echo $row["cat_id"] ?></td>
            <td><?php if(isset($row["thumb"])){echo 'yes'; }else{ echo 'No'; }  ?></td> 
            <td><a href='editProducts.php?id=<?php echo $row["product_id"] ?>'>Edit</a> 
            | <a href='delProducts.php?id=<?php echo $row["product_id"] ?>'>Delete</a></td>
        </tr>

        
        <?php
        }
      } else {
        echo "0 results";
      }


?>

			 
				</tbody>
			</table>
			
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