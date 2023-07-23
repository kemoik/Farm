<?php

include('inc/header.php');

include('./connect.php');
  
// $message =  '';
// if(isset($_POST['submit'])){
//     $product_id = $_GET['id'];
//     $c_id = $_SESSION['customerid']; 

//         // $name  = $_POST['name']; 
//         // $email  = $_POST['email']; 
//     $review  = $_POST['review']; 

//     $insertReview = "INSERT INTO reviews (pid, uid, review)
// 	VALUES ('$product_id','$c_id' ,'$review' )";  

// 	if(mysqli_query($mysqli, $insertReview)){
//         $message = 'Review Submitted';
//     }


// }
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products  WHERE product_id='$product_id'";
    $result = mysqli_query($mysqli, $sql);
    //    header('location:products.php');

    $row = mysqli_fetch_assoc($result);

    $product_name  = $row['product_name'];
    $cat_id  = $row['cat_id'];
    $price  = $row['price'];
    $product_description  = $row['product_description'];
    $thumb  = $row['thumb'];
}
include('inc/nav.php')
?>


<div class="container detail">

    <div class="row text-black">
        <div class="col-md-6 ">
            <img src="admin/<?php echo $thumb ?>" alt="" class='img-fluid' style='height:500px;width:500px;'>
        </div>
        <div class="col-md-6 pt-5">
            <h3><b><?php echo $product_name ?></b></h3>
            <h2><b>Ksh <?php echo  $price ?>.00 </b></h2>
            <p> <?php echo $product_description ?></p>

            <div class="row">
                <div class="col-md-2">
                    Quantity:
                </div>
                <div class="col-md-2">
                    <form action='addToCart.php'>
                        <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
                        <input type="number" class='form-control' name='quantity'>

                </div>

            </div>
            <div class="row ">
                <div class="col-md-12 category">

                    <?php


                    $sql2 = "SELECT * FROM Category where cat_id = '$cat_id'";
                    $result2 = mysqli_query($mysqli, $sql2);
                    // output data of each row
                    $row2 = mysqli_fetch_assoc($result2)
                    ?>
                    Categories - <a href="index.php?id=<?php echo $cat_id ?>"><?php echo $row2["cat_name"] ?></a>


                </div>
                <!-- <div class="col-md-12 category">
        Tags - <a href="#">Tag 1</a>, <a href="#">Tag 2</a>, <a href="#">Tag 3</a>
    </div> -->
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <button type="submit" class=" btn btn-outline-success  btn-xs pull-right">
                        <i class="bi bi-cart cart-icon"></i></i> Add To Cart
                    </button>
                </div>
            </div>
            </form>


        </div>

    </div>






    <div class="tab mt-5">
        <button id='defaultOpen' class="tablinks btn btn-outline-success" onclick="openCity(event, 'London')">Details </button>
        <button class=" btn btn-outline-success tablinks" onclick="openCity(event, 'Paris')">Reviews</button>
    </div>

    <div id="London" class="tabcontent bg-white">
        <p> <?php echo $product_description ?></p>

    </div>

    <div id="Paris" class="tabcontent bg-white">



        <div class="col-md-12">

            <h6 class="uppercase space35"> Reviews for</h6>
            <ul class="comment-list">

                <?php
                $sql_allReview = "SELECT * FROM reviews JOIN customer_data ON customer_data.userid=reviews.uid";
                $result_allReview = mysqli_query($mysqli, $sql_allReview);

                if (mysqli_num_rows($result_allReview) > 0) {

                    while ($row_nameEmail = mysqli_fetch_assoc($result_allReview)) {
                ?>
                        <li>
                            <div class="comment-meta">
                                <a href="#"> <?php echo $row_nameEmail['firstname'] ?></a>
                                <span>
                                    <em><?php echo $row_nameEmail['timestamp'] ?></em>
                                </span>
                                <p><?php echo $row_nameEmail['review'] ?></p>
                            </div>
                        </li>


                <?php
                    }
                }
                ?>

            </ul>

            <?php
            $proid = $_GET['id'];
            if (isset($_SESSION['customerid'])) {
                $c_id = $_SESSION['customerid'];
                $sql_count = "SELECT * FROM reviews where pid='$proid' AND uid='$c_id '";
                $result_count = mysqli_query($mysqli, $sql_count);
                if (mysqli_num_rows($result_count) > 0) {

                    echo '<h3 class="text-center">You Already Submitted Review for this product</h3>';
                } else {
            ?>


                    <h6 class="uppercase space20">Add a review</h6>
                    <form id="form" class="review-form" method="post">
                        <?php

                        $name  = '';
                        $email  = '';

                        if (isset($_SESSION['customerid'])) {
                            $c_id = $_SESSION['customerid'];
                            $sql_nameEmail = "SELECT users.email, customer_data.firstname, customer_data.lastname FROM users JOIN customer_data ON users.id=customer_data.userid AND customer_data.userid = '$c_id'";
                            $result_nameEmail = mysqli_query($mysqli, $sql_nameEmail);

                            if (mysqli_num_rows($result_nameEmail) > 0) {
                                $row_nameEmail = mysqli_fetch_assoc($result_nameEmail);
                                $name = $row_nameEmail['firstname'] . " " . $row_nameEmail['lastname'];
                                $email = $row_nameEmail['email'];
                            }
                        }

                        ?>
                        <div class="row">
                            <div class="col-md-6 space20">
                                <input name="name" value='<?php echo  $name ?>' class="form-control" placeholder="Name *" required="" type="text" <?php if ($name != '') {
                                                                                                                                               }    ?>>
                            </div>
                            <div class="col-md-6 space20">
                                <input name="email" value='<?php echo  $email ?>' class="form-control" placeholder="Email *" required="" type="text" <?php if ($email != '') {
                                                                                                                                          }  ?>>
                            </div>
                        </div>

                        <div class="space20 mt-2">
                            <textarea name="review" id="text" class="input-md form-control" rows="6" placeholder="Add review.." maxlength="400"></textarea>
                        </div>
                        <button type="submit" name='submit' class="btn btn-success  mt-2">
                            Submit Review
                        </button>
                        <?php echo $message  ?>
                    </form>
            <?php
                }
            }

            ?>

        </div>


    </div>


    <div class="card">
        <div class="card-header">
            Related Products

        </div>
        <div class="card-body">

            <div class="mt-5">
                <ul class="rig columns-4">

                    <?php
                    $sql_related = "SELECT * FROM products where product_id != $product_id  order by rand() limit 3";
                    //  if(isset($_GET['id'])){
                    //      $catID = $_GET['id'];
                    //      $sql .= " WHERE cat_id = '$catID'";
                    //  }


                    $result_related = mysqli_query($mysqli, $sql_related);

                    while ($row_related = mysqli_fetch_assoc($result_related)) {
                        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";


                    ?>

                        <li>
                            <a href="#"><img class="product-image" src="admin/<?php echo $row_related['thumb']; ?>    "></a>
                            <h4><?php echo $row_related['product_name']; ?></h4>

                            <p> <?php echo $row_related['product_description']; ?> </p>
                            <div class="price"> <b><?php echo $row_related['price']; ?> </b></div>

                            <hr>
                            <!-- <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button> -->
                            <div class="text-center">
                                <a href="single.php?id=<?php echo $row_related['product_id']; ?>" class="btn btn-outline-success btn-xs pull-left">
                                    <i class="fa fa-eye"></i> Details
                                </a>
                            </div>

                        </li>

                    <?php

                    }

                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    document.getElementById("defaultOpen").click();

    function reveal() {
        var reveals = document.querySelectorAll(".reveal");

        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;

            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("active");
            } else {
                reveals[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", reveal);
</script>
<script src="js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>