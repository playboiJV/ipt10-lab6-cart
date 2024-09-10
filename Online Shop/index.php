<?php
session_start();
require "products.php";

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add the CSS file -->
</head>
<body>
    <header>
        <h1>Online Shop</h1>
        <nav>
            <a href="cart.php" class="cart-btn">View Cart</a>
        </nav>
    </header>
    <main>
        <section class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <h2><?php echo $product['name']; ?></h2>
                    <p class="price"><?php echo $product['price']; ?> PHP</p>
                    <form method="post" action="add-to-cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="btn">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Online Shop</p>
    </footer>
</body>
</html>
