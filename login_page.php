<?php
session_start();

// Display the error message if it exists
if (isset($_SESSION['login_error'])) {
    echo "<script>alert('" . $_SESSION['login_error'] . "');</script>";
    unset($_SESSION['login_error']); // remove the error message from the session
}

// If the user is already logged in, redirect them to the dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header('Location: user_dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="book1">
        <img src="images/books1.png" alt="Book Image">
    </div>
    <div class="logo">
        <img src="images/logo2.png" alt="Logo">
        <h1>LOG IN</h1>
        <!-- Login Form with CAPTCHA -->
        <form action="functions/login.php" method="post">
            <h2>Email Address</h2>
            <input type="text" name="email" class="email" required><br><br>
            <h2>Password</h2>
            <input type="password" name="password" class="email" required><br><br>

            <!-- Include the PHP script to generate and store CAPTCHA -->
            <?php include 'functions/captcha.php'; ?>

            <!-- Display the CAPTCHA code to the user -->
            <h2>Enter the following code: <?php echo $captcha; ?></h2>
            
            <!-- Include the CAPTCHA code as a hidden input field -->
            <input type="hidden" name="captcha_code" value="<?php echo $captcha; ?>">

            <input type="text" name="captcha_input" required><br><br>

            <button type="submit" name="login">Login</button>
            
            <!-- Button to redirect to register_page.php -->
            <a href="register_page.php" class="register-button">Register</a>
        </form>
    </div>
</div>
</body>
</html>