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

        // Check if the user has exceeded the maximum login attempts
        if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3) {
            $lastFailedAttempt = $_SESSION['last_failed_attempt'];
            $timeSinceLastAttempt = time() - $lastFailedAttempt;

            // Check if the 10-second cooldown has passed
            if ($timeSinceLastAttempt < 10) {
                $timeRemaining = 10 - $timeSinceLastAttempt;
                $_SESSION['login_error'] = 'Login attempts exceeded. Please try again in ' . $timeRemaining . ' seconds.';
                mysqli_close($conn);
                header('Location: ../login_page.php');
                exit();
            } else {
                // Reset login attempts after the cooldown period
                unset($_SESSION['login_attempts']);
                unset($_SESSION['last_failed_attempt']);
            }
        }

        $query = "SELECT * FROM users WHERE email=?";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "s", $email);
        mysqli_stmt_execute($statement);
        $result = mysqli_stmt_get_result($statement);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                // Correct credentials, log in the user

                // Reset login attempts on successful login
                unset($_SESSION['login_attempts']);
                unset($_SESSION['last_failed_attempt']);

                // Store user information in the session
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['user_access'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['loggedin'] = true; // Set the session variable for login

                switch ($_SESSION['role']) {
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
                // Incorrect password, update login attempts
                if (!isset($_SESSION['login_attempts'])) {
                    $_SESSION['login_attempts'] = 1;
                } else {
                    $_SESSION['login_attempts']++;
                }

                $_SESSION['last_failed_attempt'] = time();

                $_SESSION['login_error'] = 'Wrong Email/Password. Attempts remaining: ' . (3 - $_SESSION['login_attempts']);
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
