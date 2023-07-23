<?php

include('inc/header.php');
include('inc/nav.php');

include('config/db.php');
if (!isset($_SESSION['customer']) && empty($_SESSION['customer'])) {
    header('location:login.php');
}


if (!isset($_SESSION['customerid'])) {
    echo '<script>window.location.href = "login.php";</script>';
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';



$message  = '';
$_POST['agree'] = 'false';

if (isset($_POST['submit'])) {
    $county = $_POST['county'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $addr = $_POST['addr'];
    $city = $_POST['city'];
    $state = '';
    $Postcode = $_POST['Postcode'];
    $Email = '';
    $Phone = $_POST['Phone'];
    $payment = '';
    $agree = '';
    $cid = $_SESSION['customerid'];


    $sql = "SELECT * FROM customer_data where userid = $cid";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) == 1) {
        //   update query
        $up_sql = "UPDATE user_data SET firstname='$fname', lastname='$lname', company='$companyName', address1='$addr1', address2='$addr2', city='$city', country='$country', zip='$Postcode', mobile='$Phone'  WHERE userid=$cid";

        $Updated = mysqli_query($conn, $up_sql);
    }
}





$cid = $_SESSION['customerid'];

$sql = "SELECT * FROM customer_data where userid = $cid";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);


?>






<div class="container text-black">

    <?php
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // echo "</pre>";



    if (isset($_SESSION['cart'])) {
        $total = 0;
        foreach ($cart as $key => $value) {
            // echo $key ." : ". $value['quantity'] . "<br>";

            $sql_cart = "SELECT * FROM products where product_id = $key";
            $result_cart = mysqli_query($mysqli, $sql_cart);
            $row_cart = mysqli_fetch_assoc($result_cart);
            $total = $total +  ($row_cart['price'] * $value['quantity']);
        }
    }



    ?>

    <section id="content">
        <div class="content-blog">
            <div class="page_header text-center  py-5">
                <h2>Update Address</h2>

            </div>
            <form method='post'>
                <?php echo $message ?>
                <div class="container ">
                    <div class="row">
                        <div class="offset-md-2 col-md-8">
                        <div class="billing-details">
                                <h3 class="uppercase">Billing Details</h3>
                                <div class="space30"></div>

                                <label class="">County </label>
                                <select class="form-control" name='county'>
                                    <option value="">Select County</option>
                                    <option value="AX">Mombasa</option>
                                    <option value="AF">Kajiado</option>
                                    <option value="AL">Nairobi</option>
                                    <option value="DZ">Nandi</option>
                                    <option value="AD">Bomet</option>
                                    <option value="AO">Kisii</option>
                                    <option value="AI">Migori</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Machakos</option>
                                    <option value="AR">Kitui</option>
                                    <!-- <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option> -->
                                </select>
                                <div class="clearfix space20"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name </label>
                                        <input class="form-control" name='fname' placeholder="" value="<?php if (isset($row['firstname'])) {
                                                                                                            echo $row['firstname'];
                                                                                                        } ?>" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name </label>
                                        <input class="form-control" name='lname' placeholder="" value="<?php if (isset($row['lastname'])) {
                                                                                                            echo $row['lastname'];
                                                                                                        } ?>" type="text">
                                    </div>
                                </div>
                               
                                <div class="clearfix space20"></div>
                                <label>Address </label>
                                <input class="form-control" name='addr' placeholder="Street address" value="<?php if (isset($row['address'])) {
                                                                                                                    echo $row['address'];
                                                                                                                } ?>" type="text">
                              
                                <div class="clearfix space20"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Town / City </label>
                                        <input class="form-control" name='city' placeholder="Town / City" value="<?php if (isset($row['city'])) {
                                                                                                                        echo $row['city'];
                                                                                                                    } ?>" type="text">
                                    </div>

                                  
                                </div>
                                <div class="clearfix space20"></div>
                                <!-- <label>Email Address </label>
							<input class="form-control" name='Email' placeholder="" value="-" type="text"> -->
                                <div class="clearfix space20"></div>
                                <label>Phone </label>
                                <input class="form-control" name='Phone' id="billing_phone" placeholder="" value="<?php if (isset($row['mobile'])) {
                                                                                                                        echo $row['mobile'];
                                                                                                                    } ?>" type="text">

                            </div>
                        </div>


                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <input type='submit' name='submit' value='Update Address' class="btn">
                    </div>
                </div>

        </div>
    </section>
</div>

</form>

<?php include('inc/footer.php');  ?>