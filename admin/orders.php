
<?php

session_start();
include('../connect.php');

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
<style>
  .btn {
    border: 0px;
    margin: 10px 0px;
    box-shadow: none !important;
    background: green;
    color: white;
}
a {
    color: green;
  }
  a:hover {
    color: #ff6900;
    opacity: 0.8;
  }
</style>

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
          <a class="dropdown-item" href="categories.php">view Categories </a>
          <a class="dropdown-item" href="addCategory.php">Add Categories</a>
        </div>
      </li>


      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Products
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="products.php">view Products </a>
          <a class="dropdown-item" href="addProducts.php">Add Products</a>
        </div>
      </li>

      <li class="nav-item dropdown mt-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Orders
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="orders.php">view Orders </a>
          <a class="dropdown-item" href="addOrder.php">Add Orders</a>
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
              <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-success">0</span>
            </button>

          </div>
        </li>
      </div>
    </ul>

  </nav>
  <div class="container">

    <div class="card">
      <div class="card-header">
        All Orders
      </div>
      <div class="card-body">
        <section id="content mt-5">
          <div class="content-blog  bg-white">
            <div class="container">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Total Price</th>
                    <th>Order Status</th>
                    <th>Payment Mode </th>
                    <th>Order Placed On</th>
                    <th>Operations</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $sql = "SELECT orders.totalprice, orders.orderstatus, orders.paymentmode, orders.timestamp, orders.id, customer_data.firstname, customer_data.lastname 
     FROM orders JOIN customer_data ON orders.userid=customer_data.userid ORDER BY `orders`.`id` DESC    ";
                  $result = mysqli_query($mysqli, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                      

                  ?>

                      <tr>
                        <td><?php echo $row["firstname"] . " " . $row["lastname"] ?></td>
                        <td><?php echo $row["totalprice"] ?></td>
                        <td><?php echo $row["orderstatus"] ?></td>
                        <td><?php echo $row["paymentmode"] ?></td>
                        <td><?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?> </td>

                        <td><a href='order-process.php?id=<?php echo $row["id"] ?>'>Change Status</a> 
                        <a href="download.php?file=order" target="_thapa" class="btn btn-success"><i class="fa-regular fa-file-pdf"></i>Download Order</a>
                      </td>

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
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>