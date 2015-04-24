<?php
session_start();
require 'vendor/autoload.php';

use Parse\ParseClient;
ParseClient::initialize('qJwvg8qtJEb7FnzU1ygRwgdUkGp7Bgh2oV8m2yWP', 'RY4q4pxlAZGLr1OX6INOEo5f9vKCJExvsEzVxzIg', 'nf096iEf4IJQX6uYVTjPZ5ybis51RkSzE45SfJjr');

/*$storage = new \Parse\ParseSessionStorage();
ParseClient::setStorage($storage);
$user = \Parse\ParseUser::getCurrentUser();
//var_dump($_SERVER['REQUEST_URI']);
if($user = null && ($_SERVER['REQUEST_URI'] == '/ChowSenseWebApp/account.php'))*/
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
                'My Recipes' =>'#',
                'My Favorites' =>'#',
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
            <li><a href="#">Account</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<div id="body">