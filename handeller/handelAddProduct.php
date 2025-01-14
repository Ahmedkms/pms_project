<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../logicCode/functions.php";
include "../logicCode/validation.php";
$error = [];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $key=> $value){
        $$key = $value;
    }

    $image_link = $_POST['image_link']?$_POST['image_link']:'';
    $category = $_POST['category']?$_POST['category']:'';
    $stars = $_POST['stars']?$_POST['stars']:'';
    $price = $_POST['price']?$_POST['price']:'';
   
    // $id = $_POST['id']?$_POST['id']:'';
    $file = fopen("../data/products.csv",'r');
    $data = [];
    while($res = fgetcsv($file)){
        $data[] = $res;
        
    }
    fclose($file);
    $lastRow = end($data);
    $id = $lastRow[0] + 1 ;
    



    // if(required($id)){
    //     $error[] = "employee id is required";
    // }

    //validation of image link
    if(required($image_link)){
        $error[] = "image link is required"; 
    }

    // validation of category
    if(required($category)){
        $error[] = "category of product is required"; 
    }elseif(minimumchars($category,3)){
        $error[] = "category must be more than three chars";
    }
    
    //validate stars
    if(required($stars)){
        $error[] = "number of stars is required";
    }elseif($stars < 1 || $stars > 5){
        $error [] = "stars must be between 1 -> 5 ";
    }

    //validate price 
    if(required ($price)){
        $error[] = "price is required";
    }

    // error handeling
    if (!empty($error)){
        $_SESSION["errors"] = $error;
        redirect("../add_product.php");
    }
    else{
        $file = fopen("../data/products.csv",'a');

        fwrite($file, "$id,$image_link,$category,$stars,$price \n");
        redirect("../index.php");
        fclose($file);
    }






}