<?php 
function sanitizeInput($input){
    return trim(htmlspecialchars(htmlentities($input)));
}

function redirect($path){
    header ("location: $path");
    die;
}
