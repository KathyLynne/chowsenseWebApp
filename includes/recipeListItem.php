<?php
    $query = new \Parse\ParseQuery('Recipe');
try{
    $recipe = $query->get($recipeID);
    $recipeName = $recipe->get("RecipeTitle");
    $recipeDescription = $recipe->get("RecipeDescription");
    $photo = $recipe->get("RecipePhoto");
    if(!empty($photo)){
        $photoURL = $photo->getURL();
    }else{
        $photoURL = "images/recipe.png";
    }

echo "<div class='col-md-4 col-xs-12'>
                <div class='recipe-list-item'>
                    <img class='img-responsive' src='$photoURL'>

                    <h3>$recipeName</h3>
                    <p>$recipeDescription</p>
                    <a href='#' class='btn btn-success btn-large'>View Details</a>
                </div>
       </div>";

}catch(\Parse\ParseException $ex){

}