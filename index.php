<?php
  session_start();
  if (isset($_SESSION["user_id"])){

    $mysqli = require __DIR__."/connect.php";

    $sql = "SELECT *FROM customers WHERE id ={$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result ->fetch_assoc();
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-light" style="background-color: #ffffff;">
        <div>
            <a class="navbar-brand" href="#">
              <img src="assets/img/logo2.png" alt="Bootstrap" width="150" height="30">
            </a>
        </div>
        <div class="top">
            <ul class="nav navbar-dark bg-light justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">MarketPlace</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Producers</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">BlogSpace</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="about.html">About MNK</a>
                </li>
              </ul>
        </div>
        <div class="topnav">
            <ul class=" nav justify-content-end">
                <li class="nav-item">
                  <?php if (isset($user)):?>
                  <i class="bi bi-person-fill-add"style="font-size: 1.5rem; color: black;">Hello <?= htmlspecialchars($user["firstname"]) ?> </i>
                  <a href="logout.php">
                  <button type="button" class="btn nav-link">LOGOUT</button>
                  </a>
                  <?php else: ?>
                  <a href="login.php">
                    <button type="button" class="btn nav-link">LOGIN/SIGNUP</button>
                  </a>
                  <?php endif; ?>
                </li>
              </ul>
        </div>
 
      </nav>
      <nav class="bottom">
        <ul class="nav justify-content-center">
          <li class="nav-item dropdown has-megamenu">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> DAIRY  </a>
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
                  </div>  <!-- col-megamenu.// -->
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
                  </div>  <!-- col-megamenu.// -->
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
                  </div>  <!-- col-megamenu.// -->
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
                  </div>  <!-- col-megamenu.// -->
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
              <a class="nav-link disabled">PRODUCTS</a>
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
                     <div class="d-flex d-none d-md-flex flex-row align-items-center">
                         <span class="shop-bag"><i class="bi bi-cart"></i></span>
                         <div class="d-flex flex-column ms-2">
                             <span class="qty">1 Product</span>
                             <span class="fw-bold">$27.90</span>
                         </div>    
                     </div>           
                 </div>
             </div>
        </div> 
      </section>
      <!-- marketplaceBody -->
      <div class="sellers">
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
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/milk.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Milk</h5>
                <p class="card-text">Bio Milk -2L</p>
                <p class="card-text">KSH 250</p>
                <div class="box">
                  <div  class="increase increment" >+</div>
                  <input type="text" name="" id="1" value="0" class="input-filed">
                  <div  class="decrease decrement" >-</div>
                  <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/peppers.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Bell Peppers</h5>
                <p class="card-text">Selina Wamucii Green Bell Peppers</p>
                <p class="card-text">KSH 100/kg</p>

                <div class="box">
                  <div  class="increase increment" >+</div>
                  <input type="text" name="" id="2" value="0" class="input-filed">
                  <div  class="decrease decrement" >-</div>
                  <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/tomatoes.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Tomatoes</h5>
                <p class="card-text">Mark Karanja Nyota F1 Tomatoes</p>
                <p class="card-text">KSH 120/kg</p>
                <div class="box">
                  <div  class="increase increment" >+</div>
                  <input type="text" name="" id="3" value="0" class="input-filed">
                  <div  class="decrease decrement" >-</div>
                  <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/eggs.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Eggs</h5>
                <p class="card-text">Jenico Poultry Farm eggs</p>
                <p class="card-text">KSH 350/tray</p>
                <div class="box">
                  <div  class="increase increment" >+</div>
                  <input type="text" name="" id="4" value="0" class="input-filed">
                  <div  class="decrease decrement" >-</div>
                  <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/milk.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Milk</h5>
                <p class="card-text">Bio Milk -2L</p>
                <p class="card-text">KSH 250</p>
                <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/peppers.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Bell Peppers</h5>
                <p class="card-text">Selina Wamucii Green Bell Peppers</p>
                <p class="card-text">KSH 100/kg</p>
                <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/tomatoes.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Tomatoes</h5>
                <p class="card-text">Mark Karanja Nyota F1 Tomatoes</p>
                <p class="card-text">KSH 120/kg</p>
                <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="assets/img/eggs.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Eggs</h5>
                <p class="card-text">Jenico Poultry Farm eggs</p>
                <p class="card-text">KSH 350/tray</p>
                <button  class="btn btn-light" style="color:green; " type="button" >ADD TO CART</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
 </div>
  </body>
  <script src="js/scripts.js"></script>
  <script>
  
           var incrementButton =  document.getElementsByClassName('increase');
           var decrementButton =  document.getElementsByClassName('decrease');

           for(var i = 0; i  < incrementButton.length; i++ ){
            var button = incrementButton[i];
            button.addEventListener('click', function(event){

              var buttonClicked =  event.target;
             
              var input =  buttonClicked.parentElement.children[1];
              var inputValue = input.value;
              var newValue = parseInt(inputValue) + 1;
              input.value = newValue;
            })
           }
           for(var i = 0; i  < decrementButton.length; i++ ){
            var button = decrementButton[i];
            button.addEventListener('click', function(event){

              var buttonClicked =  event.target;
             
              var input =  buttonClicked.parentElement.children[1];
              var inputValue = input.value;
              var newValue = parseInt(inputValue) - 1;
              input.value = newValue;
            })
           }

  </script>
  <script src = "https://code.jquery.com/jquery-3.6.3.min.js">
    
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>