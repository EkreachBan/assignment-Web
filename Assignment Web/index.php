<?php
session_start();

$products = [
    1 => ['name' => 'Shirt', 'price' => 50, 'image' => 'image/Shirt.jpg'],
    2 => ['name' => 'Shirt', 'price' => 50, 'image' => 'image/Shirt1.jpg'],
    3 => ['name' => 'Shirt', 'price' => 50, 'image' => 'image/Shirt2.jpg'],
    4 => ['name' => 'Sneakers', 'price' => 150, 'image' => 'image/Sneakers.jpg'],
    5 => ['name' => 'Jacket', 'price' => 80, 'image' => 'image/Jacket.jpg'],
    6 => ['name' => 'Hat', 'price' => 20, 'image' => 'image/Hat.jpg'],
    7 => ['name' => 'Pan', 'price' => 25, 'image' => 'image/Pan.jpg'],
    8 => ['name' => 'Pan', 'price' => 25, 'image' => 'image/Pan1.jpg'],
    9 => ['name' => 'Pan', 'price' => 25, 'image' => 'image/Pan2.jpg'],
];

if (isset($_GET['add_to_cart'])) {
    $product_id = $_GET['add_to_cart'];
    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1;
    } else {
        $_SESSION['cart'][$product_id]++;
    }
    header("Location: index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Streetwear Fashion</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin: 40px 0;
            font-size: 2.5em;
            color: #333;
        }

        .go-to-cart {
            position: fixed;
            top: 20px;
            right: 20px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 100;
        }

        .go-to-cart:hover {
            background-color: #0056b3;
        }

        .products-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .product img {
            width: 100%;
            max-width: 200px;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .product img:hover {
            transform: scale(1.05);
        }

        .product h3 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #333;
        }

        .product p {
            color: #777;
            margin: 10px 0;
            font-size: 1em;
        }

        .add-to-cart {
            display: inline-block;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .add-to-cart:hover {
            background: #218838;
        }

        @media (max-width: 768px) {
            .products-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .products-container {
                grid-template-columns: 1fr;
            }

            .go-to-cart {
                font-size: 1em;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

<a href="cart.php" class="go-to-cart">Go to Cart</a>

<h1>Welcome to Streetwear Fashion</h1>

<div class="products-container">
    <?php foreach ($products as $id => $product): ?>
        <div class="product">
            <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
            <h3><?= $product['name'] ?></h3>
            <p>Price: $<?= $product['price'] ?></p>
            <a href="index.php?add_to_cart=<?= $id ?>" class="add-to-cart">Add to Cart</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
