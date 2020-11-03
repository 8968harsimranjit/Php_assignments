<?php

function is_a_simpson($full_name) {
    $splitted_name = explode(" ", $full_name);
    if ($splitted_name[1] == 'Simpson') {
        return true;
    }
    return false;
}

var_dump(is_a_simpson('Lisa Simpson'));
var_dump(is_a_simpson('Marge Simpson'));
var_dump(is_a_simpson('Ned Flanders')); 
var_dump(is_a_simpson('Montgomery Burns')); 
var_dump(is_a_simpson('Simpson Harris')); 

?>