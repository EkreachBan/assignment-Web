<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h1>Your cart is empty!</h1>";
    echo "<a href='index.php'>Continue Shopping</a>";
    exit();
}

$products = [
    1 => ['name' => 'Shirt', 'price' => 50, 'image' => 'images/Shirt.jpg'],
    2 => ['name' => 'Shirt', 'price' => 50, 'image' => 'images/Shirt1.jpg'],
    3 => ['name' => 'Shirt', 'price' => 50, 'image' => 'images/Shirt2.jpg'],
    4 => ['name' => 'Sneakers', 'price' => 150, 'image' => 'images/Sneakers.jpg'],
    5 => ['name' => 'Jacket', 'price' => 80, 'image' => 'images/Jacket.jpg'],
    6 => ['name' => 'Hat', 'price' => 20, 'image' => 'images/Hat.jpg'],
    7 => ['name' => 'Pan', 'price' => 25, 'image' => 'images/Pan.jpg'],
    8 => ['name' => 'Pan', 'price' => 25, 'image' => 'images/Pan1.jpg'],
    9 => ['name' => 'Pan', 'price' => 25, 'image' => 'images/Pan2.jpg'],
];

if (isset($_GET['remove_from_cart'])) {
    $product_id = $_GET['remove_from_cart'];
    unset($_SESSION['cart'][$product_id]);
    header("Location: cart.php");
    exit();
}

$total = 0;

echo "<h1>Your Cart</h1>";
echo "<table border='1' style='width: 100%; text-align: center;'>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>";

foreach ($_SESSION['cart'] as $id => $quantity) {
    $product = $products[$id];
    $subtotal = $product['price'] * $quantity;
    $total += $subtotal;

    echo "<tr>
            <td>{$product['name']}</td>
            <td>\${$product['price']}</td>
            <td>$quantity</td>
            <td>\$$subtotal</td>
            <td><a href='cart.php?remove_from_cart=$id'>Remove</a></td>
          </tr>";
}

echo "</table>";
echo "<h3>Total: \$$total</h3>";
echo "<a href='checkout.php'>Proceed to Checkout</a><br>";
echo "<a href='index.php'>Continue Shopping</a>";
?>
