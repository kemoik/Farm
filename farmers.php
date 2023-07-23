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
    h1 {
  text-align: center;
  font-family: 'Tilt Prism', cursive;
}
.lead {
    text-align: center;
    font-size: 20px;
    font-family: 'Roboto', sans-serif;
}
</style>

  <div class="container">
    <h1> WELCOME TO <span><img src="assets/img/farmers.png" alt=""  width="200" height="60"></span> AGRICULTURIST</h1>
    <p class="lead">Fill the form below on which product you would like to sell on our platform</p>
    <div class="card text-center">
        <div class="card-body center">
          <form action="connect.php" method="post"> 
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-4 ">
                  <div class="input-group  mb-3">
                    <label for="validationCustom01" class="form-label"></label>
                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                      <input type="text" name="firstname" id="validationCustom01"  class="form-control" placeholder="FirstName" aria-label="Username" aria-describedby="basic-addon1" required>
                      <div class="invalid-feedback">
                        Please Enter your name.
                      </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                  <div class="input-group  mb-3">
                    <label for="validationCustom02" class="form-label"></label>
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" name="lastname" id="validationCustom02" class="form-control" placeholder="LastName" aria-label="Username" aria-describedby="basic-addon1" required>
                      <div class="invalid-feedback">
                        Please Enter your name.
                      </div>
                    </div>
                </div>
              </div>
              <div class="input-group  mb-3">
                <label for="validationCustom03" class="form-label"></label>
                  <span class="input-group-text" id="basic-addon1"></span>
                  <input type="text" name="product" id="validationCustom02" class="form-control" placeholder="Product" aria-label="Username" aria-describedby="basic-addon1" required>
                  <div class="invalid-feedback">
                    Enter Product name.
                  </div>
                </div>
          </div>
            <p>Provide a brief description about your product</p>
            <div class="input-group  mb-3">
              <label for="validationCustom04 exampleFormControlTextarea1" class="form-label"></label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <p>Upload a photo of your product</p>
            <div class="input-group  mb-3">
                <label for="validationCustom05" class="form-label"></label>
                <label class="form-label" for="customFile"></label>
                <input type="file" class="form-control" id="customFile" placeholder="Upload a photo of your product" aria-label="Username" aria-describedby="basic-addon1"  required/>
            </div>
            <button type="submit" class="btn btn-success">START SELLING</button>
          </form>
        </div>
      </div>
  </div>
</body>
<script src="/js/scripts.js"></script>
<script src = "https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>