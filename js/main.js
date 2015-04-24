/**
 * Created by thecr_000 on 2015-04-14.
 */

Parse.$ = jQuery;

Parse.initialize("qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP", "1oh0IVVs2m57N9qov3LoW5V7O6ZqNR62YDEJvFZP");

$(function(){
    $(document).on('hover', 'a', function(){
        $(this).fadeTo('slow', 0.5);
    });

/*    var currentuser = Parse.User.current().get;
    alert(currentuser);
    $('#logOutButton').click(function(){
        if(window.sessionStorage){
            //alert('session storage if');
            Parse.User.logOut();
            sessionStorage.clear();

        }
    });*/

});