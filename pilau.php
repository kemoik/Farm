<?php

include('inc/header.php');
include('connect.php');



?>

<?php include('inc/nav.php') ?>
<style>
    .header {
        margin-top: 50px;
    }

    .below {
        margin-top: 20px;
    }
    .recipe{
        padding: 50px;
    }
</style>

<div class="container header text-center">
    <h5>Pilau Recipe</h5>
    <div class="container header text-center">

        <div class="row">
            <div class="col-8">
                <img src="./assets/img/recpilau.jpg" class="img-fluid" alt="..." height="800">
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <div class="card" style="width: 10rem;">
                            <img src="./assets/img/tomatoes.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Tomatoes</h5>
                                <p class="card-text">KSH 100</p>
                                <a href="#" class="btn btn-outline-success">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 10rem;">
                            <img src="./admin/uploads/whiteonions.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Onions</h5>
                                <p class="card-text">KSH 120</p>
                                <a href="#" class="btn btn-outline-success">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row below">
                    <div class="col">
                        <div class="card" style="width: 10rem;">
                            <img src="./assets/img/garlic.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Garlic</h5>
                                <p class="card-text">KSH 100</p>
                                <a href="#" class="btn btn-outline-success">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card" style="width: 10rem;">
                            <img src="./assets/img/ginger.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Ginger</h5>
                                <p class="card-text">KSH 120</p>
                                <a href="#" class="btn btn-outline-success">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="conatiner recipe">
    <h2> Pilau recipe</h2>
    <p>Course: Recipes / Difficulty: Easy</p>
    <div class="row">
        <div class="col">
            <p>Servings</p>
            <p>3-5 people</p>
        </div>
        <div class="col">
           <p>Prep time</p>
           <p>1 hour 15mins</p>
        </div>
    </div>
    <h2>INGREDIENTS</h2>
    <ul class="list-group">
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
            <label class="form-check-label" for="firstCheckbox">Beef</label>
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
            <label class="form-check-label" for="secondCheckbox">Onion</label>
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
            <label class="form-check-label" for="thirdCheckbox">Garlic</label>
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
            <label class="form-check-label" for="thirdCheckbox">Ginger</label>
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
            <label class="form-check-label" for="thirdCheckbox">Bayleaves</label>
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
            <label class="form-check-label" for="thirdCheckbox">Rice</label>
        </li>
        <li class="list-group-item">
            <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
            <label class="form-check-label" for="thirdCheckbox">Ground cloves,cumin</label>
        </li>
    </ul>
    <div class="preparations">
        <h2>Directions</h2>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item">Peel the onions and garlic cloves.</li>
            <li class="list-group-item">Wash the beef and add into a pan. Slice in one onion and 2 garlic cloves with the ginger. Add bay leaves, with a cup of water and some salt to taste.</li>
            <li class="list-group-item">Cook until the beef is tender, then remove from heat. Keep the meet chunks and stock to one side.</li>
            <li class="list-group-item">Chop the remaining onion and garlic..</li>
            <li class="list-group-item">Wash the rice and repeat until the water runs clear.</li>
            <li class="list-group-item">In another pan, heat the oil under low heat. Add the onions into the pot and cook until the onions start to caramelize and become brown. You should stir the onions with a wooden spoon continuously to prevent burning.</li>
            <li class="list-group-item">Pour in the garlic and the ground spices. The brownish colour comes from the brown spices. Stir for 30 secs.</li>
            <li class="list-group-item">Add the rice into the pot. Pour in the stock and meat chunks. Add more water so there is enough to cook the rice (read the rice pack instructions). Taste for salt and add more if needed.</li>
        </ol>
    </div>

</div>

<?php include('inc/footer.php');  ?>