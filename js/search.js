/**
 * Created by kate on 2015-04-22.
 */
Parse.$ = jQuery;

Parse.initialize("qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP", "1oh0IVVs2m57N9qov3LoW5V7O6ZqNR62YDEJvFZP");


$(function() {

    $('#searchResultsPrompt').hide();
    //dynamic add search button//
    $("#addTerm").click(function(){
        $('<li class="searchItem"><input type="text" name="searchTerm">' +
        '<button class="removeBtn"></button> ' +
        '</li>').appendTo("#ingredientList").hide().fadeIn(700);
    });
    //dynamic remove field button//
    $(document).on("click", ".removeBtn", function() {
        //$(this).parent().fadeOut(1000);
        $(this).parent().fadeOut(500, function(){$(this).remove();});
    });
    //search button
    $("#searchButton").click(function(){
       var $arr = $('input[type=text]').map(function(){
           return this.value;
       }).get();
     ///Call that does all the heavy lifting
        $.ajax({
            url: 'ingredientSearchAdapter.php',
            type: 'POST',
            data: {ingredients: $arr},
            success: function(data, testStatus, jqZHR){
                //alert(data);
                $('.searchWrapper').hide();
                $('#searchButton').hide();
                $('#searchResultsPrompt').show();
                $('#searchPrompt').hide();
                $(data).appendTo('.callOut');
            },
            error: function(){
                alert('error');
            }
        });
    });
});









