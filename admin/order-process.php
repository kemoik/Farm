<?php

ob_start();

?>
<?php


include('../connect.php');
if (!isset($_SESSION['email']) && empty($_SESSION['email'])) {
    //  header('location:login.php');
}


if (isset($_POST['submit'])) {


    $orderid = $_POST['orderid'];
    $reason = $_POST['reason'];
    $status = $_POST['status'];;
    $insertCancel = "INSERT INTO ordersTracking (orderid, status, reason )
	VALUES ('$orderid', '$status', '$reason')";

    if (mysqli_query($mysqli, $insertCancel)) {
        $up_sql = "UPDATE orders SET orderstatus='$status'  WHERE id=$orderid";
        mysqli_query($mysqli, $up_sql);
        header('location:orders.php');
    }
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
    <div class="container text-black">

        <?php
  
        $total = 0;


        ?>

        <section id="content">
            <div class="content-blog">
                <div class="page_header text-center  py-5">
                    <h2>Process Order</h2>

                </div>
                <form method='post'>

                    <div class="container ">
                        <div class="row">
                            <div class="offset-md-2 col-md-8">
                                <div class="billing-details">
                                    <table class="cart-table account-table table table-bordered bg-white text-dark">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>price</th>
                                                <th>Total Price</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // $c_id = $_SESSION['customerid'];

                                            if (isset($_GET['id'])) {
                                                $o_id = $_GET['id'];
                                            }




                                            $sql = "SELECT * FROM orders WHERE id='$o_id'";
                                            $result = mysqli_query($mysqli, $sql);

                                            if (mysqli_num_rows($result) > 0) {

                                                while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            $sql_proID = "SELECT * FROM ordersItems WHERE orderid='$o_id'";
                                                            $result_proID = mysqli_query($mysqli, $sql_proID);
                                                            $row_prodID = mysqli_fetch_assoc($result_proID);
                                                            $p_id =  $row_prodID['productid'];

                                                            $sql_ProName = "SELECT * FROM products WHERE product_id='$p_id'";
                                                            $result_ProName = mysqli_query($mysqli, $sql_ProName);
                                                            $row_ProName = mysqli_fetch_assoc($result_ProName);
                                                            echo  $row_ProName['product_name'];
                                                            ?>


                                                        </td>
                                                        <td>
                                                            <?php echo $row["totalprice"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["orderstatus"] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row["paymentmode"]  ?>
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
                                    <div class="space30"></div>


                                    <div class="form-group">
                                        <label for="sel1">Change Status:</label>
                                        <select class="form-control" name="status">
                                            <option value='In Progress'>In Progress</option>
                                            <option value='Dispatched'>Dispatched</option>
                                            <option value='Delivered'>Delivered</option>
                                        </select>
                                    </div>

                                    <div class="clearfix space20"></div>
                                    <label>Reason</label>
                                    <textarea class="form-control" name='reason' id="" cols="30" rows="10"></textarea>


                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <input type="hidden" name='orderid' value='<?php echo $_GET['id'] ?>'>
                            <input type='submit' name='submit' value='Change Status' class="btn">
                        </div>
                    </div>

            </div>
        </section>
    </div>

    </form>






</body>

</html>