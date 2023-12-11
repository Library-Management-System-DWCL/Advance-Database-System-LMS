<?php
include 'connection.php';

// Get the user ID from the GET parameters
$user_id = $_GET['user_id'];

// Prepare a DELETE query
$query = "DELETE FROM users WHERE user_id = ?";

// Prepare a statement
$stmt = mysqli_prepare($conn, $query);

// Bind the user ID to the statement
mysqli_stmt_bind_param($stmt, "i", $user_id);

// Execute the statement
mysqli_stmt_execute($stmt);

// Redirect back to the user list
header('Location: ../user_list.php');
