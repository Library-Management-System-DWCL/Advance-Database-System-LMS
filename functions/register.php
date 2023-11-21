<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $rawPassword = $_POST['password'];
    $password = password_hash($rawPassword, PASSWORD_DEFAULT);
    $userType = $_POST['userType']; // Assuming this corresponds to the role

    // Calculate password strength
    function checkPasswordStrength($password) {
        $strength = 0;

        if (strlen($password) >= 10) {
            $strength += 1;
        }
        if (preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password)) {
            $strength += 1;
        }
        if (preg_match('/[0-9]/', $password)) {
            $strength += 1;
        }

        return $strength;
    }

    // Get password strength as a string
    $passwordStrength = '';
    $strength = checkPasswordStrength($rawPassword);

    if ($strength >= 3) {
        $passwordStrength = 'Strong';
    } elseif ($strength >= 2) {
        $passwordStrength = 'Moderate';
    } else {
        // Password is weak, prevent registration
        echo '<script>alert("Password is too weak. Please choose a stronger password.");';
        echo 'window.location.href = "../register_page.php";</script>';
        exit();
    }

    // Check if the email already exists in the database using prepared statement
    $checkQuery = "SELECT * FROM users WHERE email=?";
    $checkStatement = mysqli_prepare($conn, $checkQuery);
    mysqli_stmt_bind_param($checkStatement, "s", $email);
    mysqli_stmt_execute($checkStatement);
    $checkResult = mysqli_stmt_get_result($checkStatement);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '<script>alert("Email address is already registered.");';
        echo 'window.location.href = "../register_page.php";</script>';
    } else {
        // Insert the new user only if the email is not already registered using prepared statement
        $insertQuery = "INSERT INTO users (email, password, user_access, password_strength) VALUES (?, ?, ?, ?)";
        $insertStatement = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStatement, "ssss", $email, $password, $userType, $passwordStrength);
        $insertResult = mysqli_stmt_execute($insertStatement);

        if ($insertResult) {
            echo '<script>alert("Registration successful!");';
            echo 'window.location.href = "../login_page.php";</script>';
            // Redirect to login page on success
        } else {
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");';
            echo 'window.location.href = "../register_page.php";</script>';
            // Redirect to register page on error
        }
    }

    mysqli_close($conn);
}
?>
