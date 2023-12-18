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
    <!-- Add this script for the countdown -->
    <script>
        // Function to update the countdown
        function updateCountdown(seconds) {
            var countdownElement = document.getElementById('countdown');
            countdownElement.innerHTML = 'Please try again in ' + seconds + ' seconds.';
        }

        // Function to start the countdown
        function startCountdown(seconds) {
            var countdownInterval = setInterval(function () {
                updateCountdown(seconds);
                seconds--;

                if (seconds < 0) {
                    clearInterval(countdownInterval);
                    updateCountdown(0);
                }
            }, 1000);
        }

        <?php
        // Check if the countdown is needed and start it if so
        if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= 3) {
            $lastFailedAttempt = $_SESSION['last_failed_attempt'];
            $timeSinceLastAttempt = time() - $lastFailedAttempt;
            $cooldownRemaining = max(10 - $timeSinceLastAttempt, 0);

            echo "startCountdown($cooldownRemaining);";
        }
        ?>
    </script>
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
            <h2 style="user-select: none;">Enter the following code: <?php echo $captcha; ?></h2>
            
            <!-- Include the CAPTCHA code as a hidden input field -->
            <input type="hidden" name="captcha_code" value="<?php echo $captcha; ?>">

            <!-- Display the countdown message -->
            <div id="countdown"></div>

            <input type="text" name="captcha_input" required><br><br>

            <button type="submit" name="login">Login</button>
            
            <!-- Button to redirect to register_page.php -->
            <a href="register_page.php" class="register-button">Register</a>
        </form>
    </div>
</div>

<button id="facialLoginBtn" style="position: absolute; bottom: 28%; left: 11%">Login with Facial Recognition</button>
<video id="video" width="320" height="240" autoplay style="position: absolute; bottom:35%; left: 10%"></video>

<script src="path/to/face-api.js"></script>
<script >
  document.getElementById('facialLoginBtn').addEventListener('click', function() {
    // Access the user's camera
    navigator.mediaDevices.getUserMedia({ video: true })
      .then(function(stream) {
        document.getElementById('video').srcObject = stream;

        // Use face-api.js for facial recognition
        setInterval(async () => {
          const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptors();
          
          // Process the facial recognition results
          if (detections.length > 0) {
            // Facial recognition successful, log the user in
            // Redirect to the user dashboard or set session variables
            alert('Facial recognition successful!');
          }
        }, 1000); // Check for facial recognition every second
      })
      .catch(function(err) {
        console.error('Error accessing camera:', err);
      });
  });
</script>
</body>
</html>
