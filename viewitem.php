<?php

include 'functions.php';

// Check that GET is not empty
if(!isset($_GET) || empty($_GET) || !isset($_GET['result_clicked']))
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
    // GET was set correctly, display the item
    // TODO

    // This generates the page
    makePage("Tales Shop", 
        makeItemInfo($_GET['result_clicked'])
    );
    
}

?>
