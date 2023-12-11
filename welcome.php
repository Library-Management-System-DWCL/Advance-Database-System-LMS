<?php
session_start(); // Start the session
include 'functions/connection.php';

// Check if the logout button was clicked
if (isset($_POST['logout'])) {
    // End the session
    session_destroy();
    // Redirect to login page
    header('Location: login_page.php');
    exit();
}

// Check if 'email' parameter is set in the session
if (!isset($_SESSION['email'])) {
    // Redirect to login page if the session email is not set
    header('Location: login_page.php');
    exit();
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to the System</h1>

    <?php
    echo "<p>Email: $email</p>";
    ?>

    <!-- Logout button -->
    <form method="post">
        <button type="submit" name="logout">Logout</button>
    </form>

    <!-- Add additional content as needed -->

</body>
</html>
