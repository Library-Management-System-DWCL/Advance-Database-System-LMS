<?php
session_start(); // Start the session

include 'connection.php';

// Verify CAPTCHA
if (isset($_POST['login'])) {
    $userCaptcha = $_POST['captcha_input'];
    $captchaCode = $_POST['captcha_code'];

    // Check if the entered CAPTCHA matches the stored value
    if ($userCaptcha === $captchaCode) {
        // CAPTCHA is correct, continue with login verification

        // Check if the connection was successful
        if (!$conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email=?";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                // Correct credentials, log in the user

                // Retrieve additional information from the user record (e.g., role)
                $role = $user['user_access'];

                // Store user information in the session
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $role;
                $_SESSION['logged_in'] = true; // Set the session variable for login

                $_SESSION['loggedin'] = true;

                switch ($role) {
                    case 'admin':
                        mysqli_close($conn);
                        header('Location: ../admin_dashboard.php');
                        exit();
                    case 'librarian':
                        mysqli_close($conn);
                        header('Location: ../librarian_dashboard.php');
                        exit();
                    default:
                        mysqli_close($conn);
                        header('Location: ../user_dashboard.php');
                        exit();
                }
            } else {
                $_SESSION['login_error'] = 'Wrong Email/Password';
                mysqli_close($conn);
                header('Location: ../login_page.php');
                exit();
            }
        } else {
            $_SESSION['login_error'] = 'User is not registered';
            mysqli_close($conn);
            header('Location: ../login_page.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = 'Wrong Captcha';
        mysqli_close($conn);
        header('Location: ../login_page.php');
        exit();
    }
}
?>