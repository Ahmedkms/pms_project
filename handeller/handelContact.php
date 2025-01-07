<?php 
include "../logicCode/functions.php";
include "../logicCode/validation.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = [];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    foreach ($_POST as $key => $value){
        $$key = $value;
    }

    $name = sanitizeInput($name);
    $email = sanitizeInput($email);
    $message = sanitizeInput($message);


      //validate name
   if(required($name)){
    $error [] = "name is required input" ;
   } elseif(minimumchars($name,3)){
    $error[] = "name must be more than 3 chars";
   }elseif(maximumchars($name,20)){
    $error [] = "name can not be more than 20 character";
   }

      //validate email 
      if(required($email)){
        $error [] = " email is required"; 
       }elseif(emailvalidate($email)){
        $error[] = "invalid email format"; 
       }

    // validate message
    if(required($message)){
        $error [] = "message is required input" ;
       } elseif(minimumchars($message,20)){
        $error[] = "message must be more than 20 chars";
       }elseif(maximumchars($message,200)){
        $error [] = "message can not be more than 200 character";
       }
 if(!empty($error)){
    $_SESSION["errors"] = $error;
    redirect("../contact.php");
 }else{
    $file = fopen("../data/contactMessage.csv",'a');
    fputs($file,"$name,$email,$message\n");
    $_SESSION["success"]= "your message is successfully send";
    redirect("../contact.php");
    
    
 } 

 

}