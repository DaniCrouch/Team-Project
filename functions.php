<?php
session_start();

function makePage($title, $body)
{
    echo "
    
<html>
    <head>
        <title>$title</title>
        <style>
            @import url('css/style.css');
        </style>
    </head>
    <body>
        <a href='cart.php' class='.button'>Shopping Cart</a>
        $body
        <embed src='mp3/background.mp3' autostart='true' loop='true' width='2' height='0'>
        </embed>
    </body>
</html>
    
    ";
}

//A magical function that makes a set of radio buttons
//Because, you know, a set of radio buttons is behaviorally identical to a Dropdown
function makeRadios($title, $name, $value, $radioNames, $radioValues)
{
    $result = '';
    $result.='<label><strong>'.$title.':</strong></label><br/>';
    for($i=0;$i<count($radioValues);$i++)
    {
        $n = $radioNames[$i];
        $v = $radioValues[$i];
        $c = ($v == $value?'checked':'');
        $result.='<input class="radio" type="radio" name="'.$name.'" value="'.$v.'"'.$c.'>'.$n.'</input>';
    }
    $result.='<br/>';
    return $result;
}

// TODO: MORE SEARCH PARAMS
function makeForm($type, $filter_name, $sort_by, $order)
{
    $result = '';
    $result.='<div id="search_area"><form>';
    
    $result.='<label><strong>Filter: </strong></label><br/><input class="textbox" type="text" name="filter_name" value="'.$filter_name.'"/><br/>';
    
    $result.=makeRadios("Search for", "type", $type, array("Games", "Characters"), array("games","chars"));
    
    $result.=makeRadios("Sort by", "sort_by", $sort_by, array("Sort option 1", "Sort option 2"), array("1", "2"));
    
    $result.=makeRadios("Order", "order", $order, array("Ascending", "Descending"), array("asc", "desc"));
    
    $result.='<button class="button">Search</button>';
    
    $result.='</form></div>';
    return $result;
}

function makeSearch($type, $filter_name, $sort_by, $order)
{
    $result = '';
    $result.='<div id="search_results">';
    //TODO
    $result.='</div>';
    return $result;
}

function makeResult($row, $index)
{
    $result = '';
    $result.='<tr>';
        $result.='<td>';
            $result.='<form>';
            $result.='<input type="hidden" name="result_clicked" value="'.$index.'">';
            $result.='<button>View</button>';
            $result.='</form>';
        $result.='</td>';
        $result.='<td>';
            $result.='<form>';
            $result.='<input type="hidden" name="result_added" value="'.$index.'">';
            $result.='<button>Add to cart</button>';
            $result.='</form>';
        $result.='</td>';
        // TODO add the rest of the columns
    $result.='</tr>';
    return $result;
}
?>