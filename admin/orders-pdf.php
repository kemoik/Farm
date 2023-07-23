<?php


include('../connect.php');
require_once './vendor/autoload.php';
use Dompdf\Dompdf;

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
	<h2>ORDER</h2>
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
                        <a href="orders-pdf.php?id=<?php echo $row["id"]; ?> &ACTION=DOWNLOAD" class="btn btn-success"><i class="fa-regular fa-file-pdf"></i>Download Order</a>
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
	
</body>
</html>