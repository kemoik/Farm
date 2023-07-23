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
    .welcomes {
        margin-top: 50px;
    }

    .welcome p {
        font-size: 20px;
        font-weight: 600;
        padding: 50px;
    }

    .card p {
        color: green;
    }
</style>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/greenhouse.png" class="d-block w-100" height="450px" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p>GreenHouse Farming</p>

            </div>
        </div>

    </div>

</div>

<div class="container welcome">
    <div style="text-align: center;">
        <p>Greenhouse farming, also known as horticulture or greenhouse cultivation, is a method of agriculture where plants are grown in a controlled environment. Greenhouses are designed to provide optimal growing conditions for plants by controlling temperature, humidity, and light levels. Greenhouse farming is a highly efficient and sustainable method of agriculture that offers a wide range of benefits..</p>
        <ol>
            <li>Increased crop yields: Greenhouse farming allows for year-round crop production and higher crop yields. Plants can be grown in controlled environments that are optimized for their specific needs, resulting in healthier plants and higher yields.</li>
            <li>Protection from weather: Greenhouses provide protection from harsh weather conditions, such as extreme temperatures, frost, and heavy rain, which can damage crops and reduce yields</li>
            <li>Water conservation: Greenhouses can be designed to conserve water by using drip irrigation systems and recirculating water.</li>
            <li>Sustainable agriculture: Greenhouse farming is a highly sustainable method of agriculture that reduces the need for fossil fuels, conserves water, and minimizes waste.</li>
            <li>Pest and disease control: Greenhouses provide a barrier against pests and diseases, reducing the need for harmful chemical pesticides and herbicides.</li>
        </ol>
    </div>
</div>

<div class="container text-center welcomes">
    <h5>Types of Greenhouses</h5>
    <div class="row">
        <div class="col">
            <div class="card text-bg-light mb-3" style="width: 18rem;">
                <img src="./assets/img/greenh.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Traditional Glass</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-light mb-3" style="width: 18rem;">
                <img src="./assets/img/greenhouse.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Hydroponic Grenhouses</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-bg-light mb-3" style="width: 18rem;">
                <img src="./assets/img/community.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Vertical Farms</p>
                </div>
            </div>
        </div>
        <!-- <div class="col">
            <div class="card text-bg-light mb-3" style="width: 18rem;">
                <img src="./assets/img/farmdes.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Join us</p>
                </div>
            </div>

        </div> -->
    </div>

</div>

<?php include('inc/footer.php');  ?>