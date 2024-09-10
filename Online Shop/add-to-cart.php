<?php
session_start();
require "products.php";

// Add to cart logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Find the product in the product list
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            // Add the product to the session cart
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}

// Redirect to the products browsing page
header("Location: cart.php");
exit();
?>
