<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../logicCode/functions.php";
include "../logicCode/validation.php";
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = isset($_POST["email"]) ? sanitizeInput($_POST["email"]) : '';
    $password = isset($_POST["password"]) ? sanitizeInput($_POST["password"]) : '';

    //validate email
       if(required($email)){
        $error [] = " email is required"; 

       }elseif(emailvalidate($email)){
        $error[] = "invalid email format"; 
       }
    
       //validate password 
    if (required($password)) {
        $error[] = "password is required input";
    } elseif (minimumchars($password, 6)) {
        $error[] = "password must be more than 6 chars";
    }

    if(!empty($error)){
        $_SESSION['errors']=$error;
        redirect("../login.php");
    }else{
        $file = fopen("../data/users.csv",'r');
        $hashedPassword= sha1($password);
        $tocheckIfExist = false;
        while($res =trim( fgets($file))){
            $row = explode(',',$res);
            if($row[1]===$email && trim($row[3] ) === $hashedPassword ){
                $tocheckIfExist = true;
                $name = $row[0];
                $type = $row[2];
                break;
            }
        } 
        fclose($file);   
        if($tocheckIfExist){
            $_SESSION['authentication'] = [$name,$email,$type];
            redirect("../index.php");
        }else{
            $error[] = "invalid email or password";
            $_SESSION['errors'] = $error;
            redirect("../login.php");
        }    
    }

}