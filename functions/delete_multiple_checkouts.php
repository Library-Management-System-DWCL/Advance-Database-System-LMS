<?php
include 'connection.php';

$ids = explode(',', $_GET['ids']);
$query = "DELETE FROM checkout WHERE checkoutID IN (" . implode(',', array_map('intval', $ids)) . ")";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_execute($stmt);

header('Location: ../user_checkout.php');
?>