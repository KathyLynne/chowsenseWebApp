<?php
require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');
include 'includes/header.php';
$errorDisplay = "
    <div class='row'>
            <div class='col-md-push-3 col-md-6 col-xs-12'>
               <div class='sleeping-cooks'>
                 <img class='img-responsive' src='images/sleepingChef.jpg'>
                 <h3>Oh no! The cooks are asleep!<br>We couldn't what you were looking for..</h3>
                 <a href='search.php' class='btn btn-success btn-large'>Go Home</a>
               </div>
            </div>
        </div>";
if(isset($_GET['id'])) {
    $recipeID = $_GET['id'];

    $error = null;

    $query = new \Parse\ParseQuery('Recipe');
    try {
        $recipe = $query->get($recipeID);
        $recipeName = $recipe->get("RecipeTitle");
        $recipeDescription = $recipe->get("RecipeDescription");
        $photo = $recipe->get("RecipePhoto");
        $steps = $recipe->get("RecipeSteps");
        if (!empty($photo)) {
            $photoURL = $photo->getURL();
        } else {
            $photoURL = "images/recipe.png";
        }

        $details = "<div class='row'>
            <div class='col-md-push-1 col-md-10 col-xs-push-1 col-xs-10'>
                <div class='recipe-details col-xs-12'>
                    <div class='row'>
                        <h1 class='details-title'>$recipeName</h1>
                        <h4 class='details-title'>$recipeDescription</h4>
                        <hr>
                        <div class='col-md-6'>
                            <img class='img-responsive details-img' src='$photoURL'>
                            ";


        $details .= "        </div>
                    <div class='col-md-6'>";

        $query = new \Parse\ParseQuery('Ingredient');
        try {
            $query->equalTo("RecipeId", $recipeID);
            $results = $query->find();

            $multiColumn = false;
            $ingredientDisplay1 = "";
            $ingredientDisplay2 = "";

            for ($i = 0; $i < count($results); $i++) {
                $ingredient = $results[$i];
                $ingredientName = $ingredient->get("IngredientName");
                $ingredientMeasure = $ingredient->get("Measure");
                if (count($results) <= 10) {
                    $details .= "<h5 class='ingredient'>$ingredientMeasure $ingredientName</h5>";
                    $multiColumn = false;
                } else {
                    $multiColumn = true;
                    if ($i > count($results) / 2) {
                        $ingredientDisplay1 .= "<h5 class='ingredient'>$ingredientMeasure $ingredientName</h5>";
                    } else {
                        $ingredientDisplay2 .= "<h5 class='ingredient'>$ingredientMeasure $ingredientName</h5>";
                    }
                }
            }

            if ($multiColumn) {
                $details .= "<div class='row'>
                            <div class='col-md-6 col-xs-6'>";
                $details .= $ingredientDisplay1;
                $details .= "    </div>";
                $details .= "    <div class='col-md-6 col-xs-6'>";
                $details .= $ingredientDisplay2;
                $details .= "    </div>
                        </div><hr>";
            }

        } catch (\Parse\ParseException $ex) {
            $error .= $ex;
        }
        $details .= "</div>
          <div class='col-md-12'>";
        $stepNum = 1;
        foreach ($steps as $step):
            $details .= "
                    <h4 class='step-head'>Step $stepNum.</h4>
                    <p class='step-body'>$step</p><hr>";
            $stepNum++;
        endforeach;

        $details .= "
                       </div>
                    </div>
                </div>
            </div>
       </div>";

    } catch (\Parse\ParseException $ex) {
        $error .= $ex;
    }
    if (is_null($error)) {
        echo $details;
    } else {
        echo $errorDisplay;
    }
}else{
    echo $errorDisplay;
}
include 'includes/footer.php';