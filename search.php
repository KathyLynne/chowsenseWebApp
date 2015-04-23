<?php
/**

 * User: kate
 * Date: 2015-04-22
 * Time: 12:08 PM
 */

require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');

include 'includes/header.php';

;?>
<script src="js/jquery-1.11.2.js"></script>
<script src="js/search.js"></script>
<!--Main Body-->
<div id="mainWrapper" class="container-fluid">
    <h1 class="searchTitle text-center">What's in the cupboards?</h1>
    <div class="callOut">
            <div class="searchWrapper">
                <?php
                if($_POST){
                echo 'Posted';
                }
?>


                <div class="searchLine" id="termOriginal">
                    <ul id="ingredientList">
                        <li> <input type='text' name='searchTerm'><button id="addTerm" class="btn btn-default"><img src="images/ic_menu_add.png"> </button></li>
                    </ul>
                </div>


                    <button id="searchButton"  class="btn btn-default">Search</button>
                <?php
                if(isset($_POST)){
                    var_dump($_POST);
                }
                if(isset($_POST["ingredients"])){
                    $ingredients = json_decode($_POST["ingredients"]);
                    echo var_dump($ingredients);
                }
                ?>

            </div>




        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>