<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');
include 'includes/header.php';
//$recipeID = 'Wp9G76Fwpd';



if($currentUser){
$UserID=$currentUser->getObjectId();
$query = new \Parse\ParseQuery('Favorites');
$query->equalTo("UserId", $UserID);
$results = $query->first();

if(!empty($results)){
    $favorites = $results->get("RecipeId");}
if(count($favorites) == 0){
        echo "
                <div class='col-md-push-3 col-md-6 col-xs-12'>
                   <div class='sleeping-cooks'>
                     <img class='img-responsive' src='images/sleepingChef.jpg'>
                     <h3>Oh no! The cooks are asleep! We couldn't find anything..<br><br>Have you added any recipes to your favourites?</h3>
                     <a href='browse.php' class='btn btn-success btn-large'>Browse Recipes</a>
                   </div>
                </div>
                     ";
}

?><!--Main Body-->

<div class="list-container">
    <div class="row">
        <?php

        for ($i = 0; $i < count($favorites); $i++) {
            $recipeID = $favorites[$i];
            include 'includes/recipeListItem.php';
        }

        ?>
    </div>
</div>
<?php
}else{
    echo '
    <div class="list-container">
        <div class="row">
            <h1>You must be logged in for this!</h1>
        </div>
    </div>';
}
include 'includes/footer.php'?>