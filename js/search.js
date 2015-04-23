/**
 * Created by kate on 2015-04-22.
 */
$(function() {



    $("#addTerm").click(function(){



        $('<li class="searchItem"><input type="text" name="searchTerm">' +
        '<button class="btn btn-default removeBtn"> ' +
        'remove </button> ' +
        '</li>').appendTo("#ingredientList").hide().fadeIn(700);

    });


    $(document).on("click", ".removeBtn", function() {
        //$(this).parent().fadeOut(1000);
        $(this).parent().fadeOut(500, function(){$(this).remove();});
    });

});
   /* $('#ingredientListItem').click(function(){

       $(this).remove();
    });*/

/*    var $removeBtn = $('<button name="removeTerm" class="btn btn-default">Remove</button>'),*/


/*
    $("#addTerm").click(function(){
        $removeBtn.append(".searchLine");
    });*/








