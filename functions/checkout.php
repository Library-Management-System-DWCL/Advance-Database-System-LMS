<?php
// Start the session
session_start();

include 'connection.php';

// Check if book_id and user_id are set and are valid integers
if (
    !isset($_POST['book_id']) || !filter_var($_POST['book_id'], FILTER_VALIDATE_INT) ||
    !isset($_POST['user_id']) || !filter_var($_POST['user_id'], FILTER_VALIDATE_INT)
) {
    echo "Invalid book_id or user_id";
    exit;
}

// Get the book ID and user ID from the POST data
$bookId = $_POST['book_id'];
$userId = $_POST['user_id'];

// Get the current date
$checkoutDate = date('Y-m-d');

// Prepare an SQL statement to insert a new record into the checkout table
$sql = "INSERT INTO checkout (bookID, user_id, checkout_date) VALUES (?, ?, ?)";

// Use a prepared statement to execute the SQL command
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $bookId, $userId, $checkoutDate);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Success";
} else {
    // Log the error
    error_log("Error: " . $stmt->error);
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
