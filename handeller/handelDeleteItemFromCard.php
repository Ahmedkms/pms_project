<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "../logicCode/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    $id = $_GET['id'];
    if (isset($_SESSION['cartData'])) {
        $cartData = $_SESSION['cartData'];
        $found = false; 
       
        foreach ($cartData as $index => $item) {
            if ($id == $item['id']) { 
                $found = true; // Mark as found
                if ($item['quantity'] > 1) {
                    $cartData[$index]['quantity'] -= 1; // Reduce quantity by 1
                } else {
                    unset($cartData[$index]); // Remove item if quantity is 1
                }
                break;
            }
        }
        // Re-index the array to maintain proper indexing
        $_SESSION['cartData'] = array_values($cartData);

        header("Location: ../cart.php");
        exit; // Stop further script execution
    } else {
        echo "Cart is empty.";
        exit;
    }
}
?>
