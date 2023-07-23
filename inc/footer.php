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
            <div class="col-8">col-8</div>
            <div class="col-4">col-4</div>
          </div>
        </div>
      </div>
      </footer>
      </body>

      <script src="js/scripts.js"></script>
   <script>
     var incrementButton = document.getElementsByClassName('increase');
     var decrementButton = document.getElementsByClassName('decrease');

     for (var i = 0; i < incrementButton.length; i++) {
       var button = incrementButton[i];
       button.addEventListener('click', function(event) {

         var buttonClicked = event.target;

         var input = buttonClicked.parentElement.children[1];
         var inputValue = input.value;
         var newValue = parseInt(inputValue) + 1;
         input.value = newValue;
       })
     }
     for (var i = 0; i < decrementButton.length; i++) {
       var button = decrementButton[i];
       button.addEventListener('click', function(event) {

         var buttonClicked = event.target;

         var input = buttonClicked.parentElement.children[1];
         var inputValue = input.value;
         var newValue = parseInt(inputValue) - 1;
         input.value = newValue;
       })
     }
   </script>
   <script src="js/scripts.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   </html>