<?php

include('inc/header.php');
include('inc/nav.php');

include('connect.php');
if (!isset($_SESSION['customer']) && empty($_SESSION['customer'])) {
    header('location:login.php');
}
?>
<div class="container text-black">
    <h2 class='text-center text-black'>My Account</h2>

    <section id="content">
        <div class="content-blog content-account">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Recent Orders</h3>
                        <br>
                        <table class="cart-table account-table table table-bordered bg-white text-dark">
                            <thead>
                                <tr>
                                    <th>Total Price</th>
                                    <th>Order Status</th>
                                    <th>Paymentmode</th>
                                    <th>Date and Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $c_id = $_SESSION['customerid'];

                                $sql = "SELECT * FROM orders WHERE userid='$c_id'";
                                $result = mysqli_query($mysqli, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $row["totalprice"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["orderstatus"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["paymentmode"] ?>
                                            </td>
                                            <td>
                                                <?php echo $row["timestamp"] ?>
                                            </td>
                                            <td>
                                                <a href="view-order.php?id=<?php echo $row["id"] ?>">View Order</a> &nbsp;
                                                <?php if ($row["orderstatus"] != 'Cancelled') { ?>
                                                    | <a href="cancel-order.php?id=<?php echo $row["id"] ?>">Cancel Order</a>
                                                <?php } ?> &nbsp;
                                                <!-- <a href="order-pdf.php?id=<?php echo $row["id"]; ?> &ACTION=DOWNLOAD" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i>Download Order</a> -->
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



                        <div class="ma-address">
                            <h3>My Addresses</h3>
                            <p>The following addresses will be used on the checkout page by default.</p>

                            <div class="row  bg-white text-dark px-5 py-3">
                                <div class="col-md-6">
                                    <h4>Billing Address <a href="update_address.php?id=<?php echo $c_id ?>">Edit</a></h4>
                                    <?php
                                    $sql_add = "SELECT * FROM customer_data  WHERE userid='$c_id'";
                                    $result_add = mysqli_query($mysqli, $sql_add);

                                    $row_add = mysqli_fetch_assoc($result_add);
                                    echo $row_add['firstname'] . " " . $row_add['lastname'] . "<br>";
     
                                    echo $row_add['address'] . "<br>";
                                    echo $row_add['city'] . "<br>";
                                    echo $row_add['county'] . "<br>";
                                    echo $row_add['mobile'] . "<br>";

                                    ?>


                                </div>


                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


</div>







<?php include('inc/footer.php');  ?>