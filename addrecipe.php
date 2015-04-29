<?php
require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');
include 'includes/header.php';
echo'
<script src="js/jquery-1.11.2.js"></script>
<script src="js/addrecipe.js"></script>
<script>$( document ).ready( handler )</script>';

echo "<div class='row'>
            <div class='col-md-push-1 col-md-10 col-xs-push-1 col-xs-10'>
                <div class='recipe-details col-xs-12'>
                    <div class='row'>
                        <h1 class='details-title'>Add Your Recipe</h1><hr>";
    echo "
                <div class='col-md-6'>
                    <img class='backup_picture img-responsive' id='image' src='#' alt='Image not found' />
                    Upload an image of your Recipe:
                    <input type='file' class='btn btn-submit' onchange='changeImg(this);'/>
                    <input type='text' value='#' id='imageURL' hidden='true'><br>

                </div>

                <div class='col-md-6'>
                    Recipe Name:<br>
                    <input type='text' name='recipeName'><br>
                    Recipe Description:<br>
                    <textarea name='recipeDescription'></textarea><br>
                    Ingredients:<br>
                     <ul id='ingredientList' style='list-style: none'>
                        <li>
                            <input type='text' placeholder='Quantity' name='ingredientQty'>
                            <select name='ingredientMeasure'>
                                <option value='Tsp'>Tsp</option>
                                <option value='TBSP'>TBSP</option>
                                <option value='Gram'>Gram</option>
                                <option value='Cup'>Cup</option>
                                <option value='OZ'>OZ</option>
                                <option value='LB'>LB</option>
                                <option value='KG'>KG</option>
                                <option value='mL'>mL</option>
                                <option value='Liter'>Liter</option>
                                <option value='Pinch'>Pinch</option>
                                <option value='Quart'>Quart</option>
                                <option value='Gallon'>Gallon</option>
                                <option value='Whole'>Whole</option>
                                <option value='Half'>Half</option>
                                <option value='Quarter'>Quarter</option>
                                <option value='Third'>Third</option>
                            </select>
                            <input type='text' placeholder='Ingredient Name' name='ingredientName'>
                            <button id='addIngredient' class='btn btn-default'><img src='images/ic_menu_add.png''> </button>
                        </li>
                    </ul>
                    Steps:<br>
                     <ol id='stepList'>
                        <li>
                            <input type='text' placeholder='Step Description' name='step'>
                            <button id='addStep' class='btn btn-default'><img src='images/ic_menu_add.png''> </button>
                        </li>
                    </ol>
                </div>
                <button id='saveButton'>Save!</button>
                <div id='print'></div>
            ";



echo "              </div>
                </div>
            </div>
        </div>";

include 'includes/footer.php';
