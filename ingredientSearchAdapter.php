<?php
/**
 * Created by IntelliJ IDEA.
 * User: Kate
 * Date: 2015-04-23
 * Time: 3:31 PM
 */
require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');

if(isset($_POST["ingredients"])) {

    $ingredients = $_POST["ingredients"];
    $ingredientQuery = new \Parse\ParseQuery("Ingredient");
    $ingredientQuery->containedIn("IngredientName", $ingredients);
    $recipeQuery = new \Parse\ParseQuery("Recipe");
    $recipeQuery->matchesKeyInQuery('objectId', 'RecipeId', $ingredientQuery);
    $results = $recipeQuery->find();
    //$results = $ingredientQuery->find();
    //echo "Successfully retrieved " . count($results) . " Recipes.";
    echo "<div class='list-container'>
                    <div class='row'>";
    if(count($results) == 0){
        echo "
            <div class='col-md-push-3 col-md-6 col-xs-12'>
               <div class='sleeping-cooks'>
                 <img class='img-responsive' src='images/sleepingChef.jpg'>
                 <h3>Oh no! The cooks are asleep! We couldn't find anything for you..</h3>
                 <a href='search.php' class='btn btn-success btn-large'>Try Again</a>
               </div>
            </div>
                 ";
    }else {
        for ($i = 0; $i < count($results); $i++) {
            $recipe = $results[$i];
            $recipeID = $recipe->getObjectId();
            try {
                //$recipe = $results->get($recipeID);
                $recipeName = $recipe->get("RecipeTitle");
                $recipeDescription = $recipe->get("RecipeDescription");
                $photo = $recipe->get("RecipePhoto");
                if (!empty($photo)) {
                    $photoURL = $photo->getURL();
                } else {
                    $photoURL = "images/recipe.png";
                }
                 echo "<div class='col-md-4 col-xs-12'>
                            <div class='recipe-list-item'>
                                <img class='img-responsive' src='$photoURL'>
                                <h3>$recipeName</h3>
                                <p>$recipeDescription</p>
                                <a href='recipe.php?id=$recipeID' class='btn btn-success btn-large'>View Details</a>
                            </div>
                         </div>";

            } catch (\Parse\ParseException $ex) {
                echo "<img src='images/sleepingChef.jpg'> <p>Oh no! The cooks are asleep! We couldn't find anything for you..</p>";
            }

        }//end of loop
    }
    echo  "      </div>
               </div>";
}



