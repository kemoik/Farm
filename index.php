 <?php

  include('inc/header.php');
  include('connect.php');

  if (isset($_SESSION["user_id"])) {

    // $mysqli = require __DIR__ . "/connect.php";

    $sql = "SELECT *FROM users WHERE id ={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
  }

  ?>

 <?php include('inc/nav.php') ?>
 <div class="container ">
   <img src="./assets/img/easter.png" class="img-fluid" alt="...">
 </div>

 <!-- marketplaceBody -->
 <div class="sellers">
   <div class="container ">

     <div class="row">
       <div class="col">
         <div class="card border-light text-center mb-3">
           <img src="./assets/img/launch.jpg" class="card-img-top rounded-circle mx-auto d-block" style="width: 80px; height: 80px" alt="...">
           <div class="card-body">
             <p class="card-text">Delivered within the same day.</p>
           </div>
         </div>
       </div>
       <div class="col">
         <div class="card border-light text-center mb-3">
           <img src="./assets/img/earth.jpg" class="card-img-top rounded-circle mx-auto d-block" style="width: 80px; height: 80px" alt="...">
           <div class="card-body">
             <p class="card-text">Making the planet a greener place</p>
           </div>
         </div>
       </div>
       <div class="col">
         <div class="card border-light text-center mb-3">
           <img src="./assets/img/palm.jpg" class="card-img-top rounded-circle mx-auto d-block" style="width: 80px; height: 80px" alt="...">
           <div class="card-body">
             <p class="card-text">Benefits of palm oil</p>
           </div>
         </div>
       </div>
       <div class="col">
         <div class="card border-light text-center mb-3">
           <img src="./assets/img/toxin.jpg" class="card-img-top rounded-circle mx-auto d-block" style="width: 80px; height: 80px" alt="...">
           <div class="card-body">
             <p class="card-text">Keep your garden toxic free</p>
           </div>
         </div>
       </div>
     </div>

   </div>
   <div class="container ">
     <div class="shopHeader">
       <div class="row">
         <div class="col-2">
           <h5>TOP SELLERS</h5>
         </div>
         <div class="col-8">
           <p>See what everyone is loving</p>
         </div>
       </div>
     </div>
   </div>
   
   <div class="container">
     <table class=main>
       <tr>
         <?php
          $sql = "SELECT * FROM products";
          if (isset($_GET['id'])) {
            $catID = $_GET['id'];
            $sql .= " WHERE cat_id = '$catID'";
          }
          $result = mysqli_query($mysqli, $sql);
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            if ($count % 4 == 0 && $count != 0) {
              echo '</tr><tr>';
            }
          ?>
           <td style="padding: 10px ">
             <img src="admin/<?php echo $row["thumb"] ?>" style="width: 18rem " class="card-img-top" alt="...">
             <div class="card-body">
               <h5 class="card-title"><?php echo $row["product_name"] ?></h5>
               <p class="card-text"><?php echo $row["product_description"] ?></p>
               <p class="card-text"><b>KSH <?php echo $row["price"] ?>.00 </b></p>
               <a href='addToCart.php?id=<?php echo  $row["product_id"] ?>' class="btn btn-outline-success  btn-xs pull-right">
                 <i class="bi bi-cart cart-icon"></i></i> Add To Cart
               </a>
               <a href='single.php?id=<?php echo $row["product_id"] ?>' class="btn btn-outline-success  btn-xs pull-left">
                 <i class="bi bi-eye"></i>Details
             </div>
           </td>
         <?php
            $count++;
          }
          ?>
       </tr>
     </table>
     <div class="latrecipes">
       <div class="shopHeader">

         <h5>RECIPES</h5>


         <p>Awaken your inner chef</p>

       </div>

       <div id="carouselExample" class="carousel slide kitchen">
         <div class="carousel-inner">
           <div class="carousel-item active">
             <div class="row">
               <div class="col-md-6">
                 <div class="card border-light mb-3" style="max-width: 540px;">
                   <div class="row g-0">
                     <div class="col-md-4">
                       <img src="./assets/img/pilau.jpeg" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                       <div class="card-body">
                         <h5 class="card-title">Pilau</h5>
                         <p class="card-text">If you’re looking for a different way to eat rice or looking to wow your guests next time you’re hosting, then you must try this easy Kenyan beef pilau rice recipe.</p>
                         <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="card border-light mb-3" style="max-width: 540px;">
                   <div class="row g-0">
                     <div class="col-md-4">
                       <img src="./assets/img/Nyama-Choma.jpeg" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                       <div class="card-body">
                         <h5 class="card-title">Goat Meat</h5>
                         <p class="card-text">Goat meat is very nutritious and soft when cooked well. In Kenya we eat goat during different occasions especially during festivities.</p>
                         <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="carousel-item">
             <div class="row">
               <div class="col-md-6">
                 <div class="card mb-3" style="max-width: 540px;">
                   <div class="row g-0">
                     <div class="col-md-4">
                       <img src="./assets/img/pilau.jpeg" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                       <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                         <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                         <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="card mb-3" style="max-width: 540px;">
                   <div class="row g-0">
                     <div class="col-md-4">
                       <img src="./assets/img/goatmeat.jpg" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                       <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                         <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                         <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="carousel-item">
             <div class="row">
               <div class="col-md-6">
                 <div class="card mb-3" style="max-width: 540px;">
                   <div class="row g-0">
                     <div class="col-md-4">
                       <img src="./assets/img/pilau.jpeg" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                       <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                         <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                         <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="card mb-3" style="max-width: 540px;">
                   <div class="row g-0">
                     <div class="col-md-4">
                       <img src="./assets/img/goatmeat.jpg" class="img-fluid rounded-start" alt="...">
                     </div>
                     <div class="col-md-8">
                       <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                         <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                         <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
         </button>
       </div>
     </div>
   </div>
   <div class="shopHeader">
     <div class="container text-center">
       <div class="row">
         <div class="col">
         <figure>
            <img src="https://img.icons8.com/color/48/null/finocchio.png"/> 
             <figcaption>Get the farmest fresh produce</figcaption>
           </figure>
         </div>
         <div class="col">
           <figure>
           <img src="https://img.icons8.com/color/48/null/deliver-food.png"/>
             <figcaption>Delivered in the same day</figcaption>
           </figure>
         </div>
         <div class="col">
         <figure>
             <img src="https://img.icons8.com/color/48/null/money-bag.png" />
             <figcaption>At affordable prices</figcaption>
           </figure>
         </div>
       </div>
     </div>

   </div>
   </body>
   
   <?php include('inc/footer.php');  ?>

   