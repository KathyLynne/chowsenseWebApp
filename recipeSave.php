<?php

include 'includes/header.php';

$ingredients = $_POST["ingredientNames"];
$ingredientsMeasure = $_POST["ingredientMeasure"];
$ingredientsQty = $_POST['ingredientQty'];
$recipeSteps = $_POST['recipeSteps'];
$recipeDescription = $_POST['recipeDescription'];
$recipeName = $_POST['recipeName'];
$image = $_POST['recipeImage'];

define('UPLOAD_DIR', 'images/');
$image = str_replace('data:image/png;base64,', '', $image);
$image = str_replace(' ', '+', $image);
$data = base64_decode($image);
$file = UPLOAD_DIR . uniqid() . '.jpeg';
$success = file_put_contents($file, $data);

$file = \Parse\ParseFile::createFromData($file, "photo.jpg");
$file->save();

$newRecipe = new \Parse\ParseObject("Recipe");
$newRecipe->set("RecipeTitle", $recipeName);
$newRecipe->set("RecipeDescription", $recipeDescription);
$newRecipe->setArray("RecipeSteps", $recipeSteps);
$newRecipe->set("RecipePhoto",$file);

$newRecipe->save();

$newRecipe->fetch();
$recipeID = $newRecipe->getObjectId();

for($x = 0; $x < sizeof($ingredients);$x++){
    $newIngredient = new \Parse\ParseObject("Ingredient");
    $newIngredient->set("Measure", $ingredientsQty[$x]." ".$ingredientsQty[$x]);
    $newIngredient->set("IngredientName", $recipeName[$x]);
    $newIngredient->set("RecipeId", $recipeID);

    $newIngredient->save();
}

var_dump($ingredients);
var_dump($ingredientsMeasure);
var_dump($ingredientsQty);
var_dump($recipeSteps);
var_dump($recipeDescription);
var_dump($recipeName);

echo "Success!";