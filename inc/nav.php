<?php
  include('inc/header.php');
  include('./connect.php');
if (isset($_SESSION["user_id"])) {

  // $mysqli = require __DIR__ . "/connect.php";

  $sql = "SELECT *FROM users WHERE id ={$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();
}
?>
<style>
a:link {text-decoration:none}
a:visited {text-decoration:none}
a:hover {text-decoration:underline}
a:active {text-decoration:none}

</style>
 <nav class="navbar navbar-dark bg-light" style="background-color: #ffffff;">
   <div>
     <a class="navbar-brand" href="#">
       <img src="assets/img/logo2.png" alt="Bootstrap" width="150" height="30">
     </a>
   </div>
   <div class="top">
     <ul class="nav navbar-dark bg-light justify-content-center">
       <li class="nav-item">
         <a class="nav-link" aria-current="page" href="index.php">MarketPlace</a>
       </li>
       <li class="nav-item dropdown ">
         <a class="nav-link btn  btn-light dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" id="navbardrop" data-toggle="dropdown">
           Shop
         </a>
         <div class="dropdown-menu">

           <?php

            $sql2 = "SELECT * FROM category";
            $result2 = mysqli_query($mysqli, $sql2);


            // output data of each row
            while ($row2 = mysqli_fetch_assoc($result2)) {

            ?>
             <a class="dropdown-item" href="index.php?id=<?php echo $row2["cat_id"] ?>"><?php echo  $row2["cat_name"] ?></a>



           <?php
            }

            ?>

         </div>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="producers.php">Producers</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="blog.php">BlogSpace</a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="about.php">About MNK</a>
       </li>
       <li class="nav-item">
         <a class="nav-link " href="logout.php">LOGOUT</a>
       </li>
       <li class="nav-item dropdown ">
      <a class="nav-link btn  btn-light dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" id="navbardrop" data-toggle="dropdown">
        My Account
      </a>
      <div class="dropdown-menu">
		    <a class="dropdown-item" href="logout.php">Logout</a>
		    <a class="dropdown-item" href="myaccount.php">My Account</a>
        <!-- <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a> -->
      </div>
    </li>
     </ul>
   </div>
   <div class="topnav">
     <ul class=" nav justify-content-end">
       <li class="nav-item">
         <?php if (isset($user)) : ?>
           <i class="bi bi-person-fill-add" style="font-size: 1.5rem; color: black;">Hello <?= htmlspecialchars($user["firstname"]) ?> </i>
           <a href="logout.php">
             <button type="button" class="btn nav-link">LOGOUT</button>
           </a>
         <?php else : ?>
           <a href="login.php">
             <button type="button" class="btn btn-outline-success nav-link">LOGIN/SIGNUP</button>
           </a>
         <?php endif; ?>
       </li>
     </ul>
   </div>

 </nav>
 <nav class="bottom">
   <ul class="nav justify-content-center">
     <li class="nav-item dropdown has-megamenu">
       <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> DAIRY </a>
       <div class="dropdown-menu megamenu" role="menu">
         <div class="row g-3">
           <div class="col-lg-3 col-6">
             <div class="col-megamenu">
               <h6 class="title">Title Menu One</h6>
               <ul class="list-unstyled">
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
               </ul>
             </div> <!-- col-megamenu.// -->
           </div><!-- end col-3 -->
           <div class="col-lg-3 col-6">
             <div class="col-megamenu">
               <h6 class="title">Title Menu Two</h6>
               <ul class="list-unstyled">
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
               </ul>
             </div> <!-- col-megamenu.// -->
           </div><!-- end col-3 -->
           <div class="col-lg-3 col-6">
             <div class="col-megamenu">
               <h6 class="title">Title Menu Three</h6>
               <ul class="list-unstyled">
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
               </ul>
             </div> <!-- col-megamenu.// -->
           </div>
           <div class="col-lg-3 col-6">
             <div class="col-megamenu">
               <h6 class="title">Title Menu Four</h6>
               <ul class="list-unstyled">
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
                 <li><a href="#">Custom Menu</a></li>
               </ul>
             </div> <!-- col-megamenu.// -->
           </div><!-- end col-3 -->
         </div><!-- end row -->
       </div> <!-- dropdown-mega-menu.// -->
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">MEAT</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">FRUITS/VEG</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">PLANT BASED</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">SALE</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">NEW</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">PRODUCTS</a>
     </li>
   </ul>

 </nav>
 <section class="header-main border-bottom bg-white">
   <div class="container-fluid">
     <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
       <div class="col-md-2">

       </div>
       <div class="col-md-8">
         <div class="d-flex form-inputs">
           <input class="form-control" type="text" placeholder="Search any product...">
           <i class="bx bx-search"></i>
         </div>
       </div>

       <div class="col-md-2">
         <div>
           <ul class=" nav justify-content-end">
             <li class="nav-item dropdown">
               <div  class="dropdown">
                 <button type="button" class="btn btn-outline-success" data-toggle="dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#" id="navbardrop" data-toggle="dropdown">
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
                       <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-success">
                         <?php echo $count ?>
                       </span>
                     </div>
                     <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                       <p>Total: <span class="text-info">Ksh <?php echo $total ?>.00</span></p>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                     <a href='checkout.php' class="btn btn-success btn-block">Checkout</a>
                       <a href='cart.php' class="btn btn-success btn-block">Cart</a>
                     </div>
                   </div>
                 </div>
               </div>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </div>
   </div>

 </section>