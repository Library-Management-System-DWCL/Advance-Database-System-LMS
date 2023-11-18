<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
       
        echo '<script>alert("Registration successful!");</script>';
    } else {
       
        echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
    }
}

$conn->close();
?>

