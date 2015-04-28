<?php

require 'vendor/autoload.php';
session_start();
use Parse\ParseClient;
use Parse\ParseUser;
use Parse\ParseException;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');

$storage = new \Parse\ParseSessionStorage();
ParseClient::setStorage($storage);
//$user = \Parse\ParseUser::getCurrentUser();
//var_dump($_SERVER['REQUEST_URI']);
//if($user = null && ($_SERVER['REQUEST_URI'] == '/ChowSenseWebApp/account.php'))
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="ChowSenseTeam Brody Smith Kate Johnson">

    <title>Chowsense</title>
    <!--Bootstrap-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Abel&subset=latin" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Ubuntu&subset=latin" rel="stylesheet" type="text/css">
    <link rel="icon"
          type="image/png"
          href="images/ic_chowsenselogo.png">

    <!-- html5 shim and respond.js for ie8 support of html5 elements and media queries -->
    <!-- warning: respond.js doesn't work if you view the page via file:// -->
    <!--[if lt ie 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.4.2.min.js"></script>

</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/ChowSenseWebApp/index.php">
            <div class="nav-title">
                <img src="images/ic_chowsenselogo.png">
                <p><strong>Chowsense</strong></p>
            </div>
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">

            <?php
            $pages = array(
                'Search' =>'/ChowSenseWebApp/search.php',
                'My Recipes' =>'/ChowSenseWebApp/myrecipes.php',
                'My Favorites' =>'/ChowSenseWebApp/favourites.php',
                'Browse' =>'/ChowSenseWebApp/browse.php'
            );
            $this_page = $_SERVER['REQUEST_URI'];
            foreach ($pages as $k=>$v){
                echo '<li';
                if ($this_page ==$v)echo ' class="active"';
                echo '><a href="'.$v.'">'.$k.'</a></li>';
            }
            ?>
<!--            <li class="active"><a href="#">Search</a></li>-->
<!--            <li><a href="#">My Recipes</a></li>-->
<!--            <li><a href="#">My Favorites</a></li>-->
<!--            <li><a href="#">Browse</a></li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li role="presentation" class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <?php
                $currentUser = \Parse\ParseUser::getCurrentUser();
                if($currentUser){
                    echo 'Hello '. $currentUser->getUsername();
                }
                else{
                    echo 'Welcome, Guest!';
                }
                ?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">

            <?php
            $currentUser = \Parse\ParseUser::getCurrentUser();

            if($currentUser) {
                echo '<li><a href="account.php">Manage Account</a></li>
                <li><form method="post"><button name="logOutButton" class="logoutButton" type="submit">Logout</button></form></li>';
            }else {
                echo '<div class="form-group navbar-form">
                        <form method="post">
                            <li><input type="text" name="userNameNav" placeholder="Enter User Name" class="form-control"></li>
                            <li><input type="password" name="passwordNav" placeholder="Password" class="form-control"></li>
                            <li><button type="submit" name="loginButtonNav" class="btn btn-success btn-large">Login</button></li>
                        <!--<button type="submit" name="registerButtonNav" class="btn btn-success btn-large">Register</button>-->
                        </form>
                            <li><form action=" /ChowSenseWebApp/account.php" method="post">
                            <button type="submit" name="register" class="btn btn-success btn-large">Register</button>
                        </form></li>
                     </div>';
            }
            //if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['logOutButton'])) {
                    if ($currentUser) {
                        $currentUser->logOut();
                        $_SESSION = array();
                        session_destroy();
                        $username = $currentUser->getUsername();
                        echo '<script type="text/javascript">location.reload(true); alert("You Have Been Logged Out!");</script>';

                    }
                } else if (isset($_POST['loginButtonNav'])) {
                    if (!empty($_POST['userNameNav']) && !empty($_POST['passwordNav'])) {
                        try {
                            $currentUser = ParseUser::logIn($_POST['userNameNav'], $_POST['passwordNav']);
                            header('Location: '.$_SERVER['REQUEST_URI']);
                            //echo '<script type="text/javascript">location.reload(true); alert("Welcome");</script>';


                        } catch (ParseException $error) {

                            echo '<script type="text/javascript">window.location ="/ChowSenseWebApp/account.php"; alert("There was a problem logging you in, Please Try again");</script>';

                        }
                        /*if($currentUser){
                            echo '<script type="text/javascript">location.reload(true); alert("Welcome");</script>';
                        }else{
                            echo '<script type="text/javascript">window.location ="/ChowSenseWebApp/account.php"; alert("There was a problem logging you in, Please Try again");</script>';
                        }*/


                    }else if(empty($_POST['userName']) || empty($_POST['password'])){

                        echo '<script type="text/javascript"> alert("UserName and Password are required for Login");window.location ="/ChowSenseWebApp/account.php";</script>';
                        //exit();
                    }
                } else if (isset($_POST['registerButtonNav'])) {
                    header('Location: /ChowSenseWebApp/account.php');

                    echo "<script type='text/javascript'>
                          $(function() {
                            $('#register').click();
                                });
                      </script>";

                //}
            }
            ?>
            </ul>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div id="body">
