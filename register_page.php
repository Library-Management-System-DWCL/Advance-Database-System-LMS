<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Register</title>
    <style>
        /* Add styles for the password strength indicator */
        #password-strength {
            margin-top: 10px;
            color: #fff;
            position: relative;
            height: 20px;
        }

        #strength-meter {
            height: 100%;
            width: 0;
            background-color: #3498db; /* Set the color of the progress bar */
            position: absolute;
        }
    </style>
    <script>
        // Password strength check function
        function checkPasswordStrength(password) {
            var strength = 0;

            if (password.length >= 10) {
                strength += 1;
            }
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
                strength += 1;
            }
            if (password.match(/[0-9]/)) {
                strength += 1;
            }

            return strength;
        }

        // Update password strength indicator
        $(document).ready(function() {
            $('#password').on('input', function() {
                var password = $(this).val();
                var strength = checkPasswordStrength(password);

                // Calculate the width of the progress bar based on the strength
                var width = (strength / 3) * 100;

                // Update the strength meter and progress bar
                $('#strength-meter').css('width', width + '%');
            });
        });
    </script>
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
                <input type="password" name="password" id="password" class="email" required>
                <!-- Password Strength Indicator with Progress Bar -->
                <div id="password-strength">
                    Password Strength
                    <div id="strength-meter"></div>
                </div><br><br>

                <!-- Dropdown for User Type -->
                <select id="userType" name="userType" required>
                    <option value="" disabled selected>Select User Type</option>
                    <option value="admin">Admin</option>
                    <option value="student">Student</option>
                    <option value="librarian">Librarian/Teacher</option>
                </select><br><br>

                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
