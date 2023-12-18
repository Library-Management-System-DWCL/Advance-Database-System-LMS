<?php
include 'connection.php';

// Get the checkout ID from the GET parameters
$checkoutID = $_GET['id'];

// Prepare a DELETE query
$query = "DELETE FROM checkout WHERE checkoutID = ?";

// Prepare a statement
$stmt = mysqli_prepare($conn, $query);

// Bind the checkout ID to the statement
mysqli_stmt_bind_param($stmt, "i", $checkoutID);

// Execute the statement
mysqli_stmt_execute($stmt);

// Redirect back to the user checkout list
header('Location: ../user_checkout.php');
?>