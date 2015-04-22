/**
 * Created by kate on 2015-04-22.
 */
$(function() {



    $("#addTerm").click(function(){


        $('<div id="newSearchLine"><input type="text" name="searchTerm">' +
        '<button name="addedTerm" class="btn btn-default"> ' +
        '<img src="images/ic_menu_add.png"/>  </button> ' +
        '</div>').appendTo("#termOriginal");
    });

    var $removeBtn = $('<button name="removeTerm" class="btn btn-default">Remove</button>'),



    $("#addTerm").click(function(){
        $removeBtn.append(".searchLine");
    });

});






