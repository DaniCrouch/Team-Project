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
        header("Location: viewitem.php?item=".$_GET['result_clicked']);
    }
    else if(isset($_GET['result_added']))
    {
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array();
        }
        $_SESSION['cart'][] = $_GET['result_added'];
    }

    
    $type = $_GET['type'];
    $filter_name = $_GET['filter_name'];
    $sort_by = $_GET['sort_by'];
    $order = $_GET['order'];
}

// Handle values
switch ($type)
{
    case 'game':
    case 'character':
    case 'world':
        break;
    default:
        $type='game';
        break;
}
switch ($sort_by)
{
    //todo
    default:
        $sort_by='name';
        break;
}
switch ($order)
{
    case 'desc':
    case 'asc':
        break;
    default:
        $order='asc';
}

// This generates the page
makePage("Tales Shop - Search", 

    makeForm($type, $filter_name, $sort_by, $order) .
    makeSearch($type, $filter_name, $sort_by, $order)

);
?>
