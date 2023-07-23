<div class="container">
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

<div class="container text-center">
    <div class="row">
        <div class="col">
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
        <div class="col">
            <form action="process-signup.php" method="post">
                <div class="input-group  mb-3">
                    <label for="validationCustomUsername" class="form-label"></label>
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1" required>
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
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="FirstName" aria-label="Username" aria-describedby="basic-addon1" required>
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
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder=" Confirm Password" aria-label="Confirm Password" aria-describedby="basic-addon1" required>
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
    <h2>Sign up as </h2>
    <button type="button" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="btn btn-success">E-SHOPPER</button>
    <a href="farmers.php">
        <button type="button" class="btn btn-success">LOGIN/SIGNUP</button>
    </a>
</div>
<?php
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (empty($_POST["firstname"])) {
    die("Name is required");
}
if (empty($_POST["lastname"])) {
    die("Name is required");
}
if (empty($_POST["number"])) {
    die("Phone Number is required");
}
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/connect.php";
// print_r($_POST);
// var_dump($password_hash);

$sql = "INSERT INTO customers (email,firstname,lastname,number, password_hash)
        VALUES (?, ?, ?,?,?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param(
    "sssis",
    $_POST["email"],
    $_POST["firstname"],
    $_POST["lastname"],
    $_POST["number"],
    $password_hash
);

if ($stmt->execute()) {

    header("Location: index.php");
    exit;
} else {

    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
<li class="nav-item dropdown">
    <div class="dropdown">
        <button type="button" class="btn btn-outline-success" data-toggle="dropdown">
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                $cart = $_SESSION['cart'];
                $count = count($cart);
            } else {
                $cart = array();
                $count = 0;
            }
            ?>
            <i class="bi bi-cart cart-icon"></i>Cart<span class="badge rounded-pill text-bg-success">
                <?php echo $count ?>
            </span>
        </button>
        <div class="dropdown-menu">

            <?php
            $total = 0;
            foreach ($cart as $key => $value) {
                // echo $key ." : ". $value['quantity'] . "<br>";

                $sql = "SELECT * FROM products where product_id = $key";
                $result = mysqli_query($mysqli, $sql);

                $row = mysqli_fetch_assoc($result)
            ?>

                <div class="row cart-detail">
                    <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                        <img src="admin/<?php echo $row['thumb'] ?> ">
                    </div>
                    <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                        <p><a href="single.php?id=<?php echo $row['product_id'] ?>"><?php echo $row['product_name'] ?></a></p>
                        <span class="price text-info"> Ksh <?php echo $row['price'] ?>.00</span>
                        <span class="count"> Quantity:<?php echo $value['quantity'] ?></span>
                    </div>
                </div>

            <?php
                $total = $total +  ($row['price'] * $value['quantity']);
            }
            ?>

            <div class="row total-header-section">
                <div class="col-lg-6 col-sm-6 col-6">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">
                        <?php echo $count ?>
                    </span>
                </div>
                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                    <p>Total: <span class="text-info">Ksh <?php echo $total ?>.00</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href='checkout.php' class="btn btn-primary btn-block">Checkout</a>
                    <a href='cart.php' class="btn btn-primary btn-block">Cart</a>
                </div>
            </div>
        </div>
    </div>
</li>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>price</th>
            <th>Total Price</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>

                <?php

                $sql_product = "SELECT * FROM products  WHERE product_id='$prodID'";
                $result_prod = mysqli_query($mysqli, $sql_product);

                $row_prod = mysqli_fetch_assoc($result_prod);

                ?>

                <a href="single.php?id=<?php echo $prodID; ?>"><?php echo $row_prod['product_name']; ?></a>

            </td>
            <td>
                <?php echo $row["quantity"] ?>
            </td>
            <td>
                <?php echo $row["productprice"] ?>
            </td>
            <td>
                <?php echo $row["quantity"] * $row["productprice"] ?>
            </td>

        </tr>
    </tbody>
</table>