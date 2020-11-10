<?php

$orders = file_get_contents('orders.txt');

$orders = explode("\n", $orders);

echo '<h1>Pizza Order Queue</h1>';

echo '<ol>';
foreach($orders as $order) {
    echo "<li>$order</li>";
}
echo '</ol>';