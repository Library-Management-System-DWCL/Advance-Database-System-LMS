<?php
// Start the session
session_start();

include 'connection.php';

// Get the book ID and user ID from the POST data
$bookId = $_POST['book_id'];
$userId = $_POST['user_id'];

// Get the current date
$checkoutDate = date('Y-m-d');

// Prepare an SQL statement to insert a new record into the checkout table
$sql = "INSERT INTO checkout (bookID, id, checkout_date) VALUES (?, ?, ?)";

// Use a prepared statement to execute the SQL command
$stmt = $conn->prepare($sql);
$stmt->bind_param("iis", $bookId, $userId, $checkoutDate);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $stmt->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
