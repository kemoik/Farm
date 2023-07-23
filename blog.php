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
      <!-- aboutmnk body -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/about.jpg" class="d-block w-100"height="400px" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Welcome to the Blog Space</h5>
              <p>You can post a review about farming techniques, recipes and the Green Life.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/blog1.jpeg" class="d-block w-100" height="400px"alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Latest Blogs</h5>
              <p>How you can start Greenhouse farming.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/food.jpg" class="d-block w-100" height="400px" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Latest Recipes</h5>
              <p>Get a taste of the finest meals straight from your Kitchen.</p>
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
      
      <div class="shopHeader">
        <div class="row">
          <div class="col-2">
            <h5>LATEST RECIPES</h5>
          </div>
          <div class="col-8">
            <p>See what everyone is having on their table</p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card border-light" style="width: 18rem;">
              <img src="./assets/img/recpilau.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">February 2nd</p>
                <h5 class="card-title">Beef Pilau</h5>
                <p class="card-text">Here's how to make a simple Kenyan beef pilau. Best enjoyed during events with friends and family. Serve with kachumbari and stew.</p>
                <a href="pilau.php" class="btn btn-outline-success">RECIPE</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-light" style="width: 20rem;">
            <img src="./assets/img/goatmeat.jpg" class="img-fluid rounded-start" alt="...">
              <div class="card-body">
                <p class="card-text">February 2nd</p>
                <h5 class="card-title">Goat Meat</h5>
                <p class="card-text">Here's how to make a simple Kenyan beef pilau. Best enjoyed during events with friends and family. Serve with kachumbari and stew.</p>
                <a href="pilau.php" class="btn btn-outline-success">RECIPE</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-light" style="width: 14rem;">
              <img src="./assets/img/chickenstew.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">August 2nd</p>
                <h5 class="card-title">Chicken Stew</h5>
                <p class="card-text">Here's how to make a simple Kenyan beef pilau. Best enjoyed during events with friends and family. Serve with kachumbari and stew.</p>
                <a href="pilau.php" class="btn btn-outline-success">RECIPE</a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card border-light" style="width: 18rem;">
              <img src="./assets/img/kienyeji.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text">February 2nd</p>
                <h5 class="card-title">Mboga Kienyeji</h5>
                <p class="card-text">Here's how to make a simple Kenyan beef pilau. Best enjoyed during events with friends and family. Serve with kachumbari and stew.</p>
                <a href="pilau.php" class="btn btn-outline-success">RECIPE</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
      <div class="shopHeader">
        <div class="row">
          <div class="col-2">
            <h5>Blog Space</h5>
          </div>
          <div class="col-8">
            <p>Get a taste of blogs from your fellow agriculturist</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card border-light">
            <div class="card-header">
              Farming 
            </div>
            <img src="assets/img/greenhouse.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Greenhouse Farming</h5>
              <p class="card-text">This is your ultimate guide on how-to on starting your greenhouse step-by-step instructions and advice on what tools you’ll need, where to start looking for land, how much it costs, what crops are best suited for greenhouses etc.</p>
              <a href="Greenhouse.php" class="btn btn-success">READ MORE</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card border-light">
            <div class="card-header">
              Environment
            </div>
            <img src="assets/img/farmland.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Preserving Farmland</h5>
              <p class="card-text">Agriculture remains the backbone of the Kenyan economy. It is the single most
                important sector in the economy, contributing approximately 25% of the GDP, and
                employing 75% of the national labour force (Republic of Kenya 2005).</p>
              <a href="#" class="btn btn-success">READ MORE</a>
            </div>
          </div>
        </div>
      </div>
      </div>

      <footer>
      <div class="container footer">

        <div class="container text-center">
          <div class="row">
            <div class="col">
              <div>
                <a class="navbar-brand" href="#">
                  <img src="assets/img/logo.png" alt="Bootstrap" width="90" height="80">
                </a>
            </div>
            <p class="phrase">Natural, Organic and Delicious!</p>
            <p>+25426631865</p>
            <a href="url">MboganaKadhalika.co.ke</a>
            <p>Nairobi,Kenya</p>
            </div>
            <div class="col">
              <p class="phrase">Shop</p>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Dairy</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Plant based</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Meat</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Fruits/Veg</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Drinks</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Sale</a>
              </div>
            </div>
            <div class="col">
              <p class="phrase">About</p>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Producers</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">About MNK</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Blog Space</a>

              </div>
              <p class="phrase">Support</p>
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Contact</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">FAQ's</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Terms and Conditions</a>

              </div>
            </div>
            <div class="col">
              <div class="card border-light" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">The Green life</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Post something on our blog space</h6>
                  <p class="card-text">A blog space whereby you can post reviews about your farming techniques, weekly product releases, digital love, recipes, and exclusive deals..</p>

                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">P</span>
                    <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
                  </div>
                  <a href="#" class="btn btn-success">BlOG SPACE</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8"></div>
            <div class="col-4"></div>
          </div>
        </div>
      </div>
      </footer>
      
      <script src="js/scripts.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>