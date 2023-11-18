<?php
include 'functions/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="book1">
        <img src="images/books1.png" alt="Book Image">
    </div>
    <div class="logo">
        <img src="images/logo2.png" alt="Logo">
        <h1>REGISTER</h1>
        <form action="functions/register.php" method="post">
            <h2>Email Address</h2>
            <input type="text" name="email" class="email" required><br><br>
            <h2>Password</h2>
            <input type="password" name="password" class="email" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div>
</body>
</html>
