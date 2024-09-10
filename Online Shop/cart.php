<?php
session_start();
require "products.php";

// Retrieve cart items
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Your Shopping Cart</h1>
        <nav>
            <a href="index.php" class="cart-btn">Back to Products</a>
        </nav>
    </header>
    <main>
        <section class="cart-section">
            <h2>Cart Items</h2>
            <ul class="cart-list">
                <?php if (empty($cart)): ?>
                    <li>Your cart is empty.</li>
                <?php else: ?>
                    <?php foreach ($cart as $item): ?>
                        <li><?php echo $item['name']; ?> - <?php echo $item['price']; ?> PHP</li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="cart-actions">
                <a href="reset-cart.php" class="btn">Clear Cart</a>
                <a href="place_order.php" class="btn">Place Order</a>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Online Shop</p>
    </footer>
</body>
</html>
