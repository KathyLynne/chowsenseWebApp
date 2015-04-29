function changeImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image')
                .attr('src', e.target.result)
            $('#imageURL')
                .attr('value', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
    $('.backup_picture').error(function(){
        $(this).attr('src', '')
    });
});


$(function() {

//dynamic add search button//
$("#addIngredient").click(function(){
    $("<li class='ingredientItem'>" +
    "<input type='text' placeholder='Quantity' name='ingredientQty'>"+
    "<select name='ingredientMeasure'>"+
    "<option value='Tsp'>Tsp</option>"+
    "<option value='TBSP'>TBSP</option>"+
    "<option value='Gram'>Gram</option>"+
    "<option value='Cup'>Cup</option>"+
    "<option value='OZ'>OZ</option>"+
    "<option value='LB'>LB</option>"+
    "<option value='KG'>KG</option>"+
    "<option value='mL'>mL</option>"+
    "<option value='Liter'>Liter</option>"+
    "<option value='Pinch'>Pinch</option>"+
    "<option value='Quart'>Quart</option>"+
    "<option value='Gallon'>Gallon</option>"+
    "<option value='Whole'>Whole</option>"+
    "<option value='Half'>Half</option>"+
    "<option value='Quarter'>Quarter</option>"+
    "<option value='Third'>Third</option>"+
    "</select>"+
    "<input type='text' placeholder='Ingredient Name' name='ingredientName'>" +
    '<button class="removeBtn"></button> ' +
    '</li>').appendTo("#ingredientList").hide().fadeIn(700);
});

    $("#addStep").click(function(){
        $('<li><input placeholder="Step Description" type="text" name="step">' +
        '<button class="removeBtn"></button> ' +
        '</li>').appendTo("#stepList").hide().fadeIn(700);
    });

//dynamic remove field button//
$(document).on("click", ".removeBtn", function() {
    //$(this).parent().fadeOut(1000);
    $(this).parent().fadeOut(500, function(){$(this).remove();});
});
});


$(function() {
$("#saveButton").click(function(){

    var $ingredientNameArr = $('input[name=ingredientName]').map(function(){
        return this.value;
    }).get();
    var $ingredientMeasureArr = $('select[name=ingredientMeasure]').map(function(){
        return this.value;
    }).get();
    var $ingredientQtyArr = $('input[name=ingredientQty]').map(function(){
        return this.value;
    }).get();
    var $stepsArr = $('input[name=step]').map(function(){
        return this.value;
    }).get();


    var recipeName = $('input[name=recipeName]').val();
    var recipeDescription = $('textarea[name=recipeDescription]').val();


    // var file = new Parse.File("myfile.txt", { image: base64 });

    var image = $('input[id=imageURL]').val();


    ///Call that does all the heavy lifting
    $.ajax({
        url: 'recipeSave.php',
        type: 'POST',
        data: {ingredientNames: $ingredientNameArr,
               ingredientMeasure: $ingredientMeasureArr,
               ingredientQty: $ingredientQtyArr,
               recipeSteps: $stepsArr,
               recipeName: recipeName,
               recipeDescription: recipeDescription,
               recipeImage: image},
        success: function(data){
            //alert(data);
            $(data).appendTo('#print');
        },
        error: function(){
            alert('error');
        }
    });
});
});