<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user_dashboard.css">
    <title>User Dashboard</title>

    <style>
        /* Add your CSS styles for the dropdown button here */
        .dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            top: 1.5rem;
            position: absolute;
            background-color: #f9f9f9;
            /* min-width: 160px; */
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Check if the user is not logged in
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header('Location: ../login_page.php');
        exit();
    }

    // Retrieve other user information from the session
    $user_email = $_SESSION['email'];
    $role = $_SESSION['role'];
    ?>

    <div class="container">
        <div class="logo">
            <div style="display: flex;align-items: center;">
                <img src="images/logo2.png" width="90px">
                <li>LIBRARY MANAGEMENT SYSTEM</li>
            </div>
        </div>
        <div class="logo2">
            <li>LIBRARY HOMEPAGE</li>
            <li>DATABASES A-TO-Z</li>
            <li>HELP</li>
        </div>
        <div style="display:flex;gap:1rem;align-items:center;margin-right: 40px;">
            <li><img src="images/bell-ring.png" width="30px" style="margin-top: 5px;"></li>
            <!-- Display the user's email here -->
            <div class="dropdown" style="display: flex; gap:0.5rem">
                <li>
                    <?php echo $user_email; ?>
                </li>
                <li><img src="images/next.png" width="20px"></li>
                <div class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="label">
        <div class="text-wrapper">MY LIBRARY ACCOUNT</div>
    </div>

    <div class="box">
        <div class="rectangle"></div>
    </div>

    <div style="justify-content: center;display: flex;margin-top: 10%;">
        <div style="display:flex;justify-content: space-evenly;gap:5rem;">
            <div><img src="images/stack-of-books.png" alt=""></div>
            <div><img src="images/return_1.png" alt=""></div>
            <div><img src="images/wishlist_1.png" alt=""></div>
        </div>
    </div>

    <!-- <div class="box1">
        <div class="tangle">
            <div class="image">
                <img class="stack-of-books" src="images/stack-of-books.png" />
            </div>
        </div>
    </div> -->
</body>

</html>