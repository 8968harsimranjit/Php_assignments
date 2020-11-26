<?php

$conn = mysqli_connect('localhost', 'root', '', 'pizza_palace');
$size = $_POST['size'];
$topping = $_POST['topping'];
$quantity = $_POST['quantity'];
date_default_timezone_set('America/Vancouver');

$timestamp = date('Y-m-d h:i:s a');

if ($size != 'Small' && $size != 'Medium' && $size != 'Large') {
    echo 'That size is not a valid option!';
    die;
}

if ($topping != 'pepperoni' && $topping != 'Ham & Pineapple' && $topping != 'Vegetarian') {
    echo 'That topping is not a valid option!';
    die;
}

if (!ctype_digit($quantity) || $quantity < 1) {
    echo 'That quantity is not valid!';
    die;
}

$sql = "INSERT into orders (size, topping, quantity, order_datetime, status) VALUES (?, ?, ?, NOW(), 'pending')";
$statement = $conn->prepare($sql);
$statement->bind_param('ssi', $size, $topping, $quantity);
$statement->execute();

?>
Your <?= $quantity ?> <?= $size ?> <?= $topping ?> pizza<?= $quantity > 1 ? 's' : '' ?> <?= $quantity > 1 ? 'have' : 'has' ?> been ordered and will be available shortly! Thank you for your business!