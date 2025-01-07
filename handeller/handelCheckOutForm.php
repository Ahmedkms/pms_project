<?php
include "../logicCode/functions.php";
include "../logicCode/validation.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }

    $name = sanitizeInput($name);
    $email = sanitizeInput($email);
    


    //validate name
    if (required($name)) {
        $error[] = "name is required input";
    } elseif (minimumchars($name, 3)) {
        $error[] = "name must be more than 3 chars";
    } elseif (maximumchars($name, 20)) {
        $error[] = "name can not be more than 20 character";
    }

    //validate email 
    if (required($email)) {
        $error[] = " email is required";
    } elseif (emailvalidate($email)) {
        $error[] = "invalid email format";
    }

    //validate address
    if (required($address)) {
        $error[] = "address is required input";
    }

    //validate phone
    if(required($phone)){
        $error[] = "phone is required";
    }
    //validate notes
    if(maximumchars($note,50)){
        $error[] = "notes can not be more than 50 character";

    }

    if(!empty($error)){
        $_SESSION["errors"] = $error;
        redirect("../checkout.php");
     }else{
        $file = fopen("../data/chekoutData.csv",'a');
        fputs($file,"$name,$email,$address,$phone,$note \n");
        redirect("../index.php");
        
        
     } 
    
}
