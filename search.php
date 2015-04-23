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
    <div class="callOut">
        <div  class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
            <div class="searchWrapper">
            <!--<form method='post' >-->

                <h3>What's in the cupboards?</h3>
                <div class="searchLine" id="termOriginal">
                    <ul id="ingredientList">
                        <li> <input type='text' name='searchTerm'><button id="addTerm" class="btn btn-default"><img src="images/ic_menu_add.png"> </button></li>
                    </ul>


                </div>
                <button id="searchButton" class="btn btn-default">Search</button>
            </div>
            <!--</form>-->


        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>