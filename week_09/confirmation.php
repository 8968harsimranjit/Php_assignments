<?php

$size = $_POST['size'];
$topping = $_POST['topping'];
$quantity = $_POST['quantity'];

$today = date("Y-m-d H:i:s");

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

$order = "SIZE:$size | TOPPING:$topping | QTY:$quantity | DateTime: $today\n";
file_put_contents('orders.txt', $order, FILE_APPEND);

?>
Your <?= $quantity ?> <?= $size ?> <?= $topping ?> pizza<?= $quantity > 1 ? 's' : '' ?> <?= $quantity > 1 ? 'have' : 'has' ?> been ordered and will be available shortly! Thank you for your business!