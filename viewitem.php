<?php

include 'functions.php';

// Check that GET is not empty

if(!isset($_GET) || empty($_GET))
{
    // GET is empty, display an error
    makePage("Tales Shop - Error", "
    <strong class='error'>
        We couldn't find the item you were looking for.
    </strong>
    ");
}
else
{
    $i = $_GET['item'];
     if(isset($_GET['result_added']))
    {
        $i = $_GET['result_added'];
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = array();
        }
        //TODO: REDIRECT TO VIEWITEM
        $_SESSION['cart'][] = $_GET['result_added'];
    }
    // GET was set correctly, display the item
    // TODO

    // This generates the page
    makePage("Tales Shop", 
        makeItemInfo($i)
    );
    
}

?>

