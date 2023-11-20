<?php
session_start(); // Start the session

// Verify CAPTCHA
if (isset($_POST['login'])) {
    $userCaptcha = $_POST['captcha_input'];
    $captchaCode = $_POST['captcha_code'];

    // Check if the entered CAPTCHA matches the stored value
    if ($userCaptcha === $captchaCode) {
        // CAPTCHA is correct, continue with login verification
        include 'connection.php';

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

                // Redirect to welcome page
                header('Location: ../welcome.php');
                exit();
            } else {
                $_SESSION['login_error'] = 'Incorrect password.';
                header('Location: ../login_page.php');
                exit();
            }
        } else {
            $_SESSION['login_error'] = 'User not found.';
            header('Location: ../login_page.php');
            exit();
        }

        mysqli_close($conn);
    } else {
        $_SESSION['login_error'] = 'Incorrect CAPTCHA code.';
        header('Location: ../login_page.php');
        exit();
    }
}
?>
