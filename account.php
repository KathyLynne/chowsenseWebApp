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
    if(isset($_POST['loginButton'])){
        if(!empty($_POST['userName']) && !empty($_POST['password'])){
            try{
                $currentUser = ParseUser::logIn($_POST['userName'], $_POST['password']);
                header('Location: '.$_SERVER['REQUEST_URI']);

            }catch(ParseException $error){
                echo "$error";
            }
        }
   }elseif(isset($_POST['register'])){
        echo '<div class="col-md-10">
            <div class="row">
            <form method="post" id="registrationForm" data-toggle="validate">
            <h3>Registration</h3>
             <h5>We don\'t need much, and won\'t send you many emails (don\'t worry, we don\'t like it either)</h5>
                <div class="form-group">
                    <label for="userNameR">User Name</label>
                    <input type="text" name="userNameR" placeholder="Enter User Name" class="form-control" data-validation="length alphanumeric required" data-validation-length="3-12"
		 data-validation-error-msg="Between 3-12 chars, only alphanumeric characters">
                </div>
                <div class="form-group">
                    <label for="emailR">Email</label>
                    <input type="text" name="emailR" data-validation="email required" data-validation-error-msg="You did not enter a valid e-mail" placeholder="Enter enter Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass_confirmation">Password</label>
                    <input type="password" placeholder="Password" name="pass_confirmation" data-validation="length"  data-validation-length="min8" data-validation-help="Must contain one capital letter and at least one number!" class="form-control">
                </div>
                <div class="form-group">
                <label for="pass">Confirm Password</label>
                    <input type="password"name="pass" data-validation="confirmation" placeholder="Password" data-validation-confirm="pass_confirmation" class="form-control">
                </div>
                <button type="submit" name="sendRegistration" class="btn btn-success btn-large">Let\'s Do This!</button>
            </div>
            </div>
            </form>
            </div>';
    }elseif(isset($_POST['sendRegistration'])){
            $uName = $_POST['userNameR'];
            $uEmail = $_POST['emailR'];
            $uPassword = $_POST['pass_confirmation'];

            $user = new ParseUser();
            $user->set("username", $uName);
            $user->set("password", $uPassword);
            $user->set("email", $uEmail);

            try {
                $user->signUp();
                echo 'success';
            } catch (ParseException $ex) {
                // Show the error message somewhere and let the user try again.
                echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
            }
    }else{
        echo '<form method="post">
            <h3>Please Login</h3>
            <div class="form-group">
                <label for="userName">User Name</label>
                <input type="text" name="userName" placeholder="Enter User Name" class="form-control">
            </div>
            <div class="form-group">
            <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
                <button type="submit" name="loginButton" class="btn btn-success btn-large">Login</button>
            </div>
            <div class="form-group">
                <h3>Don\'t have an account?</h3>
                <h5>With an account you can keep track of your favourite recipes, and contribute some of your own specialties</h5>
                <button type="submit" name="register" class="btn btn-success btn-large">I want to make ChowSense!</button>
            </div>
          </form>';
    }
}

?>

</div>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
            //  form : '#registrationForm'
            modules: 'security'
        });
    </script>
<?php
include 'includes/footer.php';
        ?>