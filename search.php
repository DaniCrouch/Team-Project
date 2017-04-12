<?php

include 'functions.php';

// Default GET vars
$type = '';
$filter_name = '';
$sort_by = '';
$order = '';

// Set the GET vars
if(isset($_GET) && !empty($_GET))
{
    if(isset($_GET['result_clicked']))
    {
        //TODO: REDIRECT TO VIEWITEM
        header("Location: veiwitem.php?item=".$_GET['result_clicked']);
    }
    else if(isset($_GET['result_added']))
    {
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array();
        }
        //TODO: REDIRECT TO VIEWITEM
        $_SESSION['cart'][] = $_GET['result_added'];
    }
    
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

// This generates the page
makePage("Tales Shop - Search", 

    makeForm($type, $filter_name, $sort_by, $order) .
    makeSearch($type, $filter_name, $sort_by, $order)

);
?>
