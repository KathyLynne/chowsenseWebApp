<?php
/**
 * User: Kate
 * Date: 2015-04-24
 * Time: 12:22 PM
 */

include 'includes/header.php';

/*require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');*/
?>

<div id="mainWrapper" class="container-fluid">

<?php
use Parse\ParseUser;


if($currentUser){

    $username=$currentUser->getUsername();
    echo "<h3>Hello $username</h3>";

} else {

    echo '<form method="post">
            <h3>Please Login</h3>
            <input type="text" name="userName" placeholder="Enter User Name">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="loginButton" class="btn btn-success btn-large">Login</button>
          </form>';
    if(isset($_POST['loginButton'])){
        if(!empty($_POST['userName']) && !empty($_POST['password'])){
            try{
                $currentUser = ParseUser::logIn($_POST['userName'], $_POST['password']);
                header('Location: '.$_SERVER['REQUEST_URI']);
            }catch(ParseException $error){
                echo "$error";
            }
        }
   }
}

?>

</div>
<?php
include 'includes/footer.php';
        ?>