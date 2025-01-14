<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../logicCode/functions.php";
include "../logicCode/validation.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $emil = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $type = $_POST["type"];
    }
    //vlaidation of name 
    if (required($name)) {
        $error[] = "name is required input";
    } elseif (minimumchars($name, 3)) {
        $error[] = "name must be more than three chars";
    } elseif (maximumchars($name, 25)) {
        $error[] = "name must be less than 25 chars";
    }

    //validate email 
    if (required($email)) {
        $error[] = " email is required";
    } elseif (emailvalidate($email)) {
        $error[] = "invalid email format";
    }
    //validate password 
    if (required($password)) {
        $error[] = "password is required input";
    } elseif (minimumchars($password, 6)) {
        $error[] = "password must be more than 6 chars";
    }

    //validation of confim passord
    if (required($confirm_password)) {
        $error[] = "confirm password is required input";
    }elseif($confirm_password !== $password){
        $error[] = "your password must be match with confirm password";
    }
     //validate Type

   if(required($type) ){
    $error [] = "type must be required ";
   }

   //error handling

   if (!empty($error)){
    $_SESSION['errors'] = $error;
    redirect("../register.php");
   }else{
    $_SESSION ['authentication'] = [$name,$email,$type];
    $hashedPassword = sha1($password);
    $file = fopen("../data/users.csv",'a');
    fwrite($file,"$name,$email,$type,$hashedPassword \n");
    fclose($file);
    redirect("../index.php");

   }




}
