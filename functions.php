<?php

//A magical function that makes a set of radio buttons
//Because, you know, a set of radio buttons is behaviorally identical to a Dropdown
function makeRadios($title, $name, $value, $radioNames, $radioValues)
{
    echo '<strong>'.$title.':</strong><br/>';
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
function makeForm($type, $filter_name, $sort_by)
{
    echo '<form>';
    
    echo '<input class="textbox" type="text" name="filter_name" value="'.$filter_name.'"/><br/>';
    
    makeRadios("Search for", "type", $type, array("Games", "Characters"), array("games","chars"));
    
    makeRadios("Sort by", "sort_by", $sort_by, array("Sort option 1", "Sort option 2"), array("1", "2"));
    
    echo '<button class="button">Search</button>';
    
    echo '</form>';
}

function getSearch($type, $filter_name, $sort_by)
{
    echo '<div id="search_results">';
    //TODO
    echo '</div>';
}
?>