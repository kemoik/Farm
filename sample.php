<div class="container text-center">
    <div class="row">
        <div class="col">
            <div class="container-fluid">
               <p>Login if you are a returning customer</p>
                <?php if ($is_invalid) : ?>
                    <div class="alert alert-danger">Invalid Credential</div>
                <?php endif; ?>
                <form method="post"  action='loginProcess.php' method='post'>
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
                    <button type="submit"name="submit" class="btn btn-outline-success">LOG IN</button>
                </form>


            </div>
        </div>
        <div class="col">   
          <p>Create your account and start shopping with us</p>     
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
                    <button type="submit" class="btn btn-outline-success">SignUp</button>
                </form>
           
        </div>
    </div>
    <p>Are you an agriculturist and you want to sell your product on our platform,click below </p>
                    
                    <a href="farmers.php">
                        <button type="button" class="btn btn-success">SELL YOUR PRODUCT</button>
                    </a>
</div>