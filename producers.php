<?php

  include('inc/header.php');
  include('connect.php');

  ?>

 <?php include('inc/nav.php') ?>
 <style>
.carousel-caption {
  position: absolute;
  top: 45%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}
.carousel-caption p {
  margin-bottom: 50px;
  font-family: 'Sedgwick Ave Display', cursive;
  font-size: 32px;
}
.carousel-caption h5 {
  font-size: 45px;
}

 </style>

 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/img/farmlands.jpg" class="d-block w-100" height="400px"alt="...">
      <div class="carousel-caption d-none d-md-block">
        <p>Every Farmer has a unique taste! .</p>
        <h5 >PRODUCERS</h5>
      </div>
    </div>
    <div class="carousel-item">
    <img src="./assets/img/seedlings.jpg" class="d-block w-100" height="400px" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <p>Nurture your green thumb with our premium quality seeds</p>
        <h5 >SEEDS/SEEDLINGS</h5>
      </div>
    </div>
    <div class="carousel-item">
    <img src="./assets/img/equipment.jpeg" class="d-block w-100" height="400px" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <p>Get the job done right with our reliable farm equipment.</p>
        <h5 >FARM EQUIPMENT</h5>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container">
<table class=main>
       <tr>
         <?php
          $sql = "SELECT * FROM producers";

          $result = mysqli_query($mysqli, $sql);
          $count = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            if ($count % 3 == 0 && $count != 0) {
              echo '</tr><tr>';
            }
          ?>
           <td style="padding: 14px ">
             <img src="admin/<?php echo $row["thumb"] ?>" style="width: 18rem " class="card-img-top" alt="...">
             <div class="card-body">
               <h5 class="card-title"><?php echo $row["producer_name"] ?></h5>
               <p class="card-text"><?php echo $row["producer_location"] ?></p>
               <p class="card-text"><?php echo $row["producer_sell"] ?></p>
               <p class="card-text"><b>KSH <?php echo $row["price"] ?>.00 </b></p>
               <a href='addToCart.php?id=<?php echo  $row["producer_id"] ?>' class="btn btn-outline-success  btn-xs pull-right">
                 <i class="bi bi-cart cart-icon"></i></i> Add To Cart
               </a>
               <a href='single.php?id=<?php echo $row["producer_id"] ?>' class="btn btn-outline-success  btn-xs pull-left">
                 <i class="bi bi-eye"></i>Details
             </div>
           </td>
         <?php
            $count++;
          }
          ?>
       </tr>
     </table>
</div>


 <?php include('inc/footer.php');  ?>