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
        <nav>
            <a href='search.php' class='.button'>Home</a>
            <a href='cart.php' class='.button'>Shopping Cart</a>
        </nav>
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

//A magical function that makes a set of radio buttons
//Because, you know, a set of radio buttons is behaviorally identical to a Dropdown
function makeDropdown($title, $name, $value, $radioNames, $radioValues)
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
    
    $result.=makeRadios("Search for", "type", $type, array("Games", "Characters", "Worlds"), array("game","character","world"));
   
    $result.='<label><strong>Filter: </strong></label><br/><input class="textbox" type="text" name="filter_name" value="'.$filter_name.'"/><br/>';
    
    $result.=makeRadios("Sort by", "sort_by", $sort_by, array("Sort option 1", "Sort option 2"), array("1", "2"));
    
    $result.=makeRadios("Order", "order", $order, array("Ascending", "Descending"), array("asc", "desc"));
    
    $result.='<button class="button">Search</button>';
    
    $result.='</form></div>';
    return $result;
}
function makeSearch($type, $filter_name, $sort_by, $order)
{
    switch ($type)
    {
        case 'character':
            return makeCharSearch($filter_name, $sort_by, $order);
            break;
        case 'world':
            return makeWorldSearch($filter_name, $sort_by, $order);
            break;
        default:
        case 'game':
            return makeGameSearch($filter_name, $sort_by, $order);
            break;
    }
}
function makeGameSearch($filter_name, $sort_by, $order)
{
    $db = new mysqli("localhost","team_project","","team_project");
    $query =
    "SELECT * FROM game ";
    if($filter_name != '') $query .= "WHERE name LIKE ? ";
    $query.="ORDER BY $sort_by $order;";
    if ($db->connect_errno)
    {
        return "Sorry, this website is experiencing problems.<br/>".
        "Error: Failed to make a MySQL connection, here is why: <br/>".
        "Errno: " . $db->connect_errno . "<br/>".
        "Error: " . $db->connect_error . "<br/>";
    }
    $k = $db->prepare($query);
    if($filter_name != '')
    {
        $filter_name = '%'.$filter_name.'%';
        $k->bind_param("s", $filter_name);
    }
    
    $k->execute();
    $k->bind_result($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price);
    
    $result = '';
    $result.='<div id="search_results"><table align="center"><tr><tbody>';
    $result.="<th></th>";
    $result.="<th></th>";
    $result.="<th></th>";
    $result.="<th>Name</th>";
    $result.="<th>Year</th>";
    $result.="<th>Characters</th>";
    $result.="<th>Platform(s)</th>";
    $result.="<th>Average play time</th>";
    $result.="<th>Price</th><tr>";
    while($k->fetch())
    {
        
        $result.=makeGameResult($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price);
    }
    
    $result.='</tbody></table></div>';
    return $result;
}
function makeGameResult($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price)
{
    $result = '';
    $result.='<tr>';
        $result.='<td>';
            $result.='<form>';
            $result.='<input type="hidden" name="result_clicked" value="'.$id.'">';
            $result.='<button class="button">View</button>';
            $result.='</form>';
        $result.='</td>';
        $result.='<td>';
            $result.='<form>';
            $result.='<input type="hidden" name="result_added" value="'.$id.'">';
            $result.='<button class="button">Add to cart</button>';
            $result.='</form>';
        $result.='</td>';
        $result.='<td>';
            $result.='<img src="img/games/';
            $result.=$id;
            $result.='"/>';
        $result.='</td>';
        $result.='<td>';
            $result.=$name;
        $result.='</td>';
        $result.='<td>';
            $result.=$year;
        $result.='</td>';
        $result.='<td>';
            $result.=$num_chars;
        $result.='</td>';
        $result.='<td>';
            $result.=$platforms;
        $result.='</td>';
        $result.='<td>';
            $result.=$avg_play_time;
        $result.='</td>';
        $result.='<td>$';
            $result.=$price;
        $result.='</td>';
    $result.='</tr>';
    return $result;
}
function makeCharSearch($filter_name, $sort_by, $order)
{
    $db = new mysqli("localhost","team_project","","team_project");
    $query =
    "SELECT * FROM game ";
    if($filter_name != '') $query .= "WHERE name LIKE ? ";
    $query.="ORDER BY $sort_by $order;";
    if ($db->connect_errno)
    {
        return "Sorry, this website is experiencing problems.<br/>".
        "Error: Failed to make a MySQL connection, here is why: <br/>".
        "Errno: " . $db->connect_errno . "<br/>".
        "Error: " . $db->connect_error . "<br/>";
    }
    $k = $db->prepare($query);
    if($filter_name != '')
    {
        $filter_name = '%'.$filter_name.'%';
        $k->bind_param("s", $filter_name);
    }
    
    $k->execute();
    $k->bind_result($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price);
    
    $result = '';
    $result.='<div id="search_results"><table align="center"><tr><tbody>';
    $result.="<th></th>";
    $result.="<th></th>";
    $result.="<th></th>";
    $result.="<th>Name</th>";
    $result.="<th>Year</th>";
    $result.="<th>Characters</th>";
    $result.="<th>Platform(s)</th>";
    $result.="<th>Average play time</th>";
    $result.="<th>Price</th><tr>";
    while($k->fetch())
    {
        
        $result.=makeGameResult($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price);
    }
    
    $result.='</tbody></table></div>';
    return $result;
}
function makeCharResult($row)
{
    $result = '';
    $result.='<tr>';
        $result.='<td>';
        $result.='</td>';
    $result.='</tr>';
    return $result;
}
function makeWorldSearch($filter_name, $sort_by, $order)
{
    $db = new mysqli("localhost","team_project","","team_project");
    $query =
    "SELECT * FROM game ";
    if($filter_name != '') $query .= "WHERE name LIKE ? ";
    $query.="ORDER BY $sort_by $order;";
    if ($db->connect_errno)
    {
        return "Sorry, this website is experiencing problems.<br/>".
        "Error: Failed to make a MySQL connection, here is why: <br/>".
        "Errno: " . $db->connect_errno . "<br/>".
        "Error: " . $db->connect_error . "<br/>";
    }
    $k = $db->prepare($query);
    if($filter_name != '')
    {
        $filter_name = '%'.$filter_name.'%';
        $k->bind_param("s", $filter_name);
    }
    
    $k->execute();
    $k->bind_result($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price);
    
    $result = '';
    $result.='<div id="search_results"><table align="center"><tr><tbody>';
    $result.="<th></th>";
    $result.="<th></th>";
    $result.="<th></th>";
    $result.="<th>Name</th>";
    $result.="<th>Year</th>";
    $result.="<th>Characters</th>";
    $result.="<th>Platform(s)</th>";
    $result.="<th>Average play time</th>";
    $result.="<th>Price</th><tr>";
    while($k->fetch())
    {
        
        $result.=makeGameResult($id, $name, $year, $num_chars, $platforms, $avg_play_time, $price);
    }
    
    $result.='</tbody></table></div>';
    return $result;
}
function makeWorldResult($row)
{
    $result = '';
    $result.='<tr>';
        $result.='<td>';
        $result.='</td>';
    $result.='</tr>';
    return $result;
}

function makeCart($cart)
{
    // $cart should be an array of integers
    //TODO
    $result ='NOT YET IMPLEMENTED';
    $result.='';
    
    return $result;
    
}

function makeItemInfo($item)
{
    // $item should be an int
    //TODO
    $result ='NOT YET IMPLEMENTED';
    $result.='';
    
    return $result;
    
}
function error($e)
{
    return "<span class='error'>$e</span>";
}
?>