<?php
session_start();

function makePage($title, $body)
{
    echo "
    
<!DOCTYPE html>
<html>
    <head>
        <title>$title</title>
        <style>
            @import url('css/style.css');
        </style>
    </head>
    <body>
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
    echo '<label><strong>'.$title.':</strong></label><br/>';
    for($i=0;$i<count($radioValues);$i++)
    {
        $n = $radioNames[$i];
        $v = $radioValues[$i];
        $c = ($v == $value?'checked':'');
        echo '<input class="radio" type="radio" name="'.$name.'" value="'.$v.'"'.$c.'>'.$n.'</input>';
    }
    echo '<br/>';
}

// TODO: MORE SEARCH PARAMS
function makeForm($type, $filter_name, $sort_by, $order)
{
    echo '<div id="search_area"><form>';
    
    echo '<label><strong>Filter: </strong></label><br/><input class="textbox" type="text" name="filter_name" value="'.$filter_name.'"/><br/>';
    
    makeRadios("Search for", "type", $type, array("Games", "Characters"), array("games","chars"));
    
    makeRadios("Sort by", "sort_by", $sort_by, array("Sort option 1", "Sort option 2"), array("1", "2"));
    
    makeRadios("Order", "order", $order, array("Ascending", "Descending"), array("asc", "desc"));
    
    echo '<button class="button">Search</button>';
    
    echo '</form></div>';
}

function makeSearch($type, $filter_name, $sort_by, $order)
{
    echo '<div id="search_results">';
    //TODO
    echo '</div>';
}

function makeResult($row, $index)
{
    echo '<tr>';
        echo '<td>';
            echo '<form>';
            echo '<input type="hidden" name="result_clicked" value="'.$index.'">';
            echo '<button>View</button>';
            echo '</form>';
        echo '</td>';
        // TODO add the rest of the columns
    echo '</tr>';
}
?>