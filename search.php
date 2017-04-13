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
switch ($type)
{
    case 'game':
        switch ($sort_by)
        {
            case 'name':
            case 'year':
            case 'num_chars':
            case 'platforms':
            case 'avg_play_time':
            case 'price':
                break;
            default:
            $sort_by='name';
                break;
        }
    case 'character':
        switch ($sort_by)
        {
            case 'first_Name':
            case 'last_Name':
            case 'sex':
            case 'age':
            case 'hometown':
                break;
            default:
            $sort_by='first_Name';
                break;
        }
    case 'world':
        switch ($sort_by)
        {
            case 'name':
            case 'num_towns':
            case 'capital':
                break;
            default:
            $sort_by='name';
                break;
        }
        break;
    default:
        $sort_by='name';
        break;
}
switch ($sort_by)
{
    default:
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
