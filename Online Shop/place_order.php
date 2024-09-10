<?php
session_start();
require "products.php";

// Generate a random order code
function generateOrderCode($length = 8) {
    return substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

$order_code = generateOrderCode();
$order_file = "orders-{$order_code}.txt";

// Get the current date and time
$date = date('Y-m-d H:i:s');

// Retrieve the cart
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

// Calculate total price
$total_price = 0;
foreach ($cart as $item) {
    $total_price += $item['price'];
}

// Prepare order details
$order_details = "Order Code: {$order_code}\n";
$order_details .= "Date and Time: {$date}\n";
$order_details .= "Order Items:\n";

foreach ($cart as $item) {
    $order_details .= "Product ID: {$item['id']}, Product Name: {$item['name']}, Price: {$item['price']} PHP\n";
}

$order_details .= "Total Price: {$total_price} PHP\n";

// Save order details to a file
file_put_contents($order_file, $order_details);

// Clear the cart after placing the order
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p>Order Code: <?php echo $order_code; ?></p>
    <p>Total Price: <?php echo $total_price; ?> PHP</p>
    <a href="index.php">Back to Products</a>
</body>
</html>
