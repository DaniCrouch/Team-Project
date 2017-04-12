<?php

include 'functions.php';

// Default GET vars
$type = '';
$filter_name = '';
$sort_by = '';
$order = '';

// Check that GET is not empty
if(!isset($_GET) || empty($_GET))
{
    // GET is empty, display an error
    makePage("Tales Shop - Error", "
    <strong class='error'>
        Sorry but your shopping cart was empty.
    </strong>
    ");
}
else
{
    // GET was set correctly, display the item
    // TODO

    // This generates the page
    makePage("Tales Shop - Shopping cart", 
    "TODO: NOT YET IMPLEMENTED"
    );
    
}

?>
