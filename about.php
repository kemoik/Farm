<?php

include('inc/header.php');
include('connect.php');

if (isset($_SESSION["user_id"])) {

  // $mysqli = require __DIR__ . "/connect.php";

  $sql = "SELECT *FROM customers WHERE id ={$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();
}

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

  .welcome {
    margin-top: 50px;
  }

  .welcome p {
    font-size: 18px;
    font-weight: 600;
  }
  .card p {
    color: green;
  }
</style>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/img/seedlings.jpg" class="d-block w-100" height="450px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <p>MBOGA NA KADHALIKA</p>
        <h5>WHY US</h5>
      </div>
    </div>

  </div>

</div>

<div class="container welcome">
  <div style="text-align: center;">
    <p>Welcome to Mboga na Kadhalika, a purpose-driven company committed to changing the way you shop for farm products. We are proud to be a business for good, with a mission to connect you with the source of your food and inspire you to value the process, passion, and purpose that all our producers carry throughout the creation of our products. Our goal is to make you more aware of the impact of your choices, and to encourage you to buy products that are good for you, good for the planet, and good for the local economy.</p>
    <p>We have created a platform that brings you closer to the producers of your food, while also providing a space for small, artisanal producers to bring their products to market. Every single one of the products on our site has been carefully curated based on our philosophy of quality, environmental impact, and community impact. We assess each product based on its ingredients, flavour, how it is made and packaged, fair pay, and worker conditions.</p>
    <p>As a B Corp Certified business and Africa’s first online retail business to be recognised for our commitment to people and the planet, we are proud to be part of the B Corp movement. Our philosophy for being a business for good extends to every detail of our operations, from where our servers are hosted to how we work with customers and producers to reduce packaging and recycle where possible.</p>
    <p>Thank you for choosing Mboga na Kadhalika for your farm product needs. We look forward to helping you make conscious choices that benefit you, the environment, and our local communities.</p>
  </div>
</div>

<div class="container text-center welcome">
  <div class="row">
    <div class="col">
      <div class="card text-bg-light mb-3" style="width: 18rem;">
        <img src="./assets/img/greenh.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Good for the enviroment</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-bg-light mb-3" style="width: 18rem;">
        <img src="./assets/img/aboutvegetables.jpeg" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text">Good for you</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-bg-light mb-3" style="width: 18rem;">
        <img src="./assets/img/community.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text">Good for the community</p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-bg-light mb-3" style="width: 18rem;">
        <img src="./assets/img/farmdes.jpg" class="card-img-top" alt="...">
        <div class="card-body">
        <p class="card-text">Join us</p>
        </div>
      </div>

    </div>
  </div>

</div>

<?php include('inc/footer.php');  ?>