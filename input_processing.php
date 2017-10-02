<?php
function clearInput($input){
    $trimedInput = trim(htmlspecialchars($input));
    return $trimedInput;
}



