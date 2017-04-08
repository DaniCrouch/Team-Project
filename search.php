<?php

// Default GET vars
$type = '';
$filter_name = '';
$sort_by = '';

// Set the GET vars
if(isset($_GET) && !empty($_GET))
{
    $type = $_GET['type'];
    $filter_name = $_GET['filter_name'];
    $sort_by = $_GET['sort_by'];
}

//TODO:
//Handle empties/defaults
if($sort_by == '') $sort_by = '2';
if($type == '') $type = 'games';

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
        <div id="search_area">
            <?php
            include 'functions.php';
            makeForm($type, $filter_name, $sort_by);
            ?>
        </div>
        <div id="results_area">
            <?php
            getSearch($type, $filter_name, $sort_by);
            ?>
        </div>
    </body>
</html>
