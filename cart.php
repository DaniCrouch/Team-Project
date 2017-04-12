<?php

include 'functions.php';

// Check that SESSION is not empty
if(!isset($_SESSION) || empty($_SESSION))
{
    // SESSION is empty, display an error
    makePage("Tales Shop - Error", "
    <strong class='error'>
        Sorry but your shopping cart was empty.
    </strong>
    ");
}
else
{
    // SESSION was set correctly, display the cart

    // This generates the page
    makePage("Tales Shop - Shopping cart", 
        makeCart($_SESSION['cart'])
    );
    
}

?>
