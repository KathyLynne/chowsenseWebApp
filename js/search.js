/**
 * Created by kate on 2015-04-22.
 */
Parse.$ = jQuery;

Parse.initialize("qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP", "1oh0IVVs2m57N9qov3LoW5V7O6ZqNR62YDEJvFZP");


$(function() {
    $("#addTerm").click(function(){

    $('<li class="searchItem"><input type="text" name="searchTerm">' +
    '<button class="removeBtn"></button> ' +
    '</li>').appendTo("#ingredientList").hide().fadeIn(700);

    });


    $(document).on("click", ".removeBtn", function() {
        //$(this).parent().fadeOut(1000);
        $(this).parent().fadeOut(500, function(){$(this).remove();});
    });

    $("#searchButton").click(function(){
       var $arr = $('input[type=text]').map(function(){
           return this.value;
       }).get();

        var $jsonString = JSON.stringify($arr);

       $('<p>test: '+$jsonString+'</p>').appendTo('.searchLine');
        //alert('click');
        //var Ingredient = Parse.Object.extend("Ingredient");
        //var Recipe = Parse.Object.extend("Recipe");
        //method Below
        //getIngredients($jsonString);

        $.ajax({
            url: 'http://localhost:8888/ChowSenseWebApp/search.php',

            type: 'post',
            //data: {ingredients: $jsonString},
            data: {testing: 1, page: 2},
            success: function(){
                alert('success');
            },
            error: function(){
                alert('error');
            }
        });

    });


});

/*function getIngredients(list){
    var query = Parse.Query("Ingredient");
    query.containedIn("IngredientName",list);

    query.find({
        success: function(ingredients){
            //$results = JSON.parse(ingredients);
            alert(ingredients);
        },
        error: function(error){
            alert(error);
        }
    });
}*/

    //query.



   /* $("#addTerm").click(function(){
        $('<div id="newSearchLine"><input type="text" name="searchTerm">' +
        '<button name="addedTerm" class="btn btn-default"> ' +
        '<img src="images/ic_menu_add.png"/>  </button> ' +
        '</div>').appendTo("#termOriginal");
    });*/
    // var $removeBtn = $('<button name="removeTerm" class="btn btn-default">Remove</button>'),
    /*
     $("#addTerm").click(function(){
        $removeBtn.append(".searchLine");
    });
*/








