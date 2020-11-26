<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order Queue</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            margin: 30px;
        }
    </style>
</head>
<body>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'pizza_palace');

// Start delete handling here

$status = $_POST['completed'];

$sql_update = "UPDATE orders SET status = 'complete' WHERE id = ? ";
$statement = $conn->prepare($sql_update);
$statement->bind_param('s', $status);
$statement->execute();

// End delete handling here

$sql = "SELECT * FROM orders WHERE status = 'pending'";
$results = $conn->query($sql);

?>
<h1>Pizza Order Queue</h1>
<br>
<?php if ($results->num_rows > 0) : ?>
    <table style="width:100%">
    <tr>
        <th>Order ID</th>
        <th>Size</th>
        <th>Topping</th>
        <th>Quantity</th>
        <th>Order Date</th>
    </tr>
    <?php while($row = $results->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['size'] ?></td>
            <td><?= $row['topping'] ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['order_datetime'] ?></td>
            <td>
                <form method="post">
                    <input name="completed" type="hidden" value="<?= $row['id'] ?>">
                    <input type="submit" value="Mark as complete">
                </form>
            </td>
        </tr>
    <?php endwhile ?>
    </table>
<?php else : ?>
    <p>No pending orders.</p>
<?php endif ?>
</body>
</html>

