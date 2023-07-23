<?php

include('inc/header.php');
include('./connect.php');
$cart =  $_SESSION['cart'];


?>
 <?php include('inc/nav.php') ?>
 <style>
    /* Change link color to red */
    a {
      color: green;
    }
    
    /* Remove underline from links */
    a:link {
      text-decoration: none;
    }
  </style>
    <div class="container detail">
        <div class="container">
            <h2 class='text-center text-black'>Cart</h2>

            <table class="table table-bordered bg-white">
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

                <?php
                $total = 0;
                foreach ($cart as $key => $value) {
                    // echo $key ." : ". $value['quantity'] . "<br>";

                    $sql = "SELECT * FROM products where product_id = $key";
                    $result = mysqli_query($mysqli, $sql);

                    $row = mysqli_fetch_assoc($result)
                ?>


                    <tr>
                        <td><img src="admin/<?php echo $row['thumb'] ?> " alt=""  width="300"  height="200"></td>
                        <td><a href="single.php?id=<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></a></td>
                        <td><?php echo $row['price'] ?> </td>
                        <td><?php echo $value['quantity'] ?></td>
                        <td><?php echo $row['price'] * $value['quantity'] ?> </td>
                        <td><a href='deleteCart.php?id=<?php echo $key; ?>'>Remove</a></td>
                    </tr>

                <?php

                    $total = $total +  ($row['price'] * $value['quantity']);
                }

                ?>

            </table>

            <div class="text-right">
              
              <a class="btn btn-outline-success" href='checkout.php'>Checkout</a>
            </div>
            <div class="card">
                <div class="card-header">Total</div>
                <div class="card-body">
                    Total Amount: Ksh <?php echo $total; ?>.00/-
                </div>
            </div>

        </div>
    </div>
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>