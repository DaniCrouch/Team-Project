<?php

// Default GET vars
$type = '';
$filter_name = '';
$sort_by = '';
$order = '';

// Set the GET vars
if(isset($_GET) && !empty($_GET))
{
    $type = $_GET['type'];
    $filter_name = $_GET['filter_name'];
    $sort_by = $_GET['sort_by'];
    $order = $_GET['order'];
}

//TODO:
//Handle empties/defaults
if($sort_by == '') $sort_by = '2';
if($type == '') $type = 'games';
if($order == '') $order = 'asc';

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tales Shop</title>
        <style>
            @import url("/Team-Project/css/style.css");
        </style>
    </head>
    <body>
      
<embed src="mp3/background.mp3" autostart="true" loop="true"
width="2" height="0">
</embed>
<div id="wrapper">
        <div id="search_area">
            <?php
            include 'functions.php';
            makeForm($type, $filter_name, $sort_by, $order);
            ?>
        </div>
       
        <div id="results_area">
            <?php
            getSearch($type, $filter_name, $sort_by, $order);
            ?>
        </div>
        </div>
    </body>
</html>
