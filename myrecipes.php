<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');
include 'includes/header.php';
//$recipeID = 'Wp9G76Fwpd';



if($currentUser){

echo '    <div class="list-container">
            <div class="row">
                <a href="#" class="col-md-12 col-md-push-0 col-xs-10 col-xs-push-1 btn-success btn"><div class="add-recipe"><h2>Add a Recipe!</h2><img class="img-responsive" src="images/plus.png" alt="add"/></div></a>
            </div>
          </div>';

$UserName=$currentUser->getUsername();
$query = new \Parse\ParseQuery('Recipe');
$query->equalTo("UserId", $UserName);
$results = $query->find();

if(!empty($results)){
?><!--Main Body-->

<div class="list-container">
    <div class="row">

        <?php

        for ($i = 0; $i < count($results); $i++) {
            $recipe = $results[$i];
            $recipeID = $recipe->getObjectId();
            include 'includes/recipeListItem.php';
        }

        ?>
    </div>
</div>
<?php
}else{

    echo "
                <div class='col-md-push-3 col-md-6 col-xs-12'>
                   <div class='sleeping-cooks'>
                     <img class='img-responsive' src='images/sleepingChef.jpg'>
                     <h3>Oh no! The cooks are asleep! We couldn't find anything..<br><br>Have you added any recipes?</h3>
                     <a href='#' class='btn-add-recipe btn btn-success btn-large'>Add a Recipe!<img src='images/ic_menu_add.png' alt='add'/></a>
                   </div>
                </div>
<div class='list-container'>
    <div class='row'>
    </div></div>";
}
}else{
    echo '
    <div class="list-container">
        <div class="row">
            <h1>You must be logged in for this!</h1>
        </div>
    </div>';
}
include 'includes/footer.php'?>