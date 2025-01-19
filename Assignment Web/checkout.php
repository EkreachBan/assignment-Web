<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

$products = [
    1 => ['name' => 'Shirt', 'price' => 50],
    2 => ['name' => 'Shirt', 'price' => 50],
    3 => ['name' => 'Shirt', 'price' => 50],
    4 => ['name' => 'Sneakers', 'price' => 150],
    5 => ['name' => 'Jacket', 'price' => 80],
    6 => ['name' => 'Hat', 'price' => 20],
    7 => ['name' => 'Pan', 'price' => 25],
    8 => ['name' => 'Pan', 'price' => 25],
    9 => ['name' => 'Pan', 'price' => 25],
];

$total = 0;
foreach ($_SESSION['cart'] as $id => $quantity) {
    $product = $products[$id];
    $total += $product['price'] * $quantity;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h1 class='thank-you-message'>Thank you for your order!</h1>";
    echo "<p class='total-amount'>Total Amount: \$$total</p>";
    unset($_SESSION['cart']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 20px;
        }

        .thank-you-message {
            color: #2ecc71;
            text-align: center;
            font-size: 1.8em;
            margin-top: 30px;
        }

        .total-amount {
            font-size: 3.5em;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            color: #e74c3c;
        }

        .checkout-form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background-color: #ecf0f1;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .checkout-form input, .checkout-form textarea, .checkout-form button {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 1.1em;
        }

        .checkout-form button {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.5em;
        }

        .checkout-form button:hover {
            background-color: #2980b9;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-size: 1.5em;
        }

        a:hover {
            text-decoration: underline;
        }

        .checkout-links {
            text-align: center;
            margin-top: 20px;
        }

        .checkout-links a {
            font-size: 2em;
            font-weight: bold;
            display: inline-block;
            margin: 10px;
        }

        .continue-shopping {
            float: left;
            font-size: 2em;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Checkout</h1>
    <p class="total-amount">Total: $<?php echo $total; ?></p>

    <form method="POST" class="checkout-form">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br>

        <button type="submit">Place Order</button>
    </form>

    <div class="checkout-links">
        <a href="checkout.php"><b>Proceed to Checkout</b></a>  
    </div>
    <a href="shop.php" class="continue-shopping"><b>← Continue Shopping</b></a>  
</div>

</body>
</html>
