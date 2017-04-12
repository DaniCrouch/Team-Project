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


include 'functions.php';


makePage("Tales Shop - Search", 

    makeForm($type, $filter_name, $sort_by, $order) .
    makeSearch($type, $filter_name, $sort_by, $order)

);

?>
