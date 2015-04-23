<?php

require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');
include 'includes/header.php';
//$recipeID = 'Wp9G76Fwpd';

$query = new \Parse\ParseQuery("Recipe");
$query->descending("createdAt");
$results = $query->find();
echo "Successfully retrieved " . count($results) . " Recipes.";


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
<?php include 'includes/footer.php'?>