<?php 
session_start(); // Start the session

include 'functions/connection.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

if ($role !== 'admin') {
    header('Location: user_dashboard.php');
    exit();
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$total_users = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <title>Dashboard (admin)</title>

    <style>
        /* Add your CSS styles for the dropdown button here */
        .dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
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
            <li><img src="images/user.png" width="30px"></li>
            
            <!-- Add the admin dropdown button -->
            <div class="dropdown">
            <li><?php echo $email; ?></li>
                <li><img src="images/next.png" width="20px"></li>
                <div class="dropdown-content">
                    <a href="functions/logout.php">Logout</a>
                    <a href="#">Admin Option 2</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="admin">
            <div style="display: flex;align-items: center;">
                <li>ADMIN DASHBOARD</li>
            </div>
        </div>
        <div class="log">
            <li>BOOK</li>
            <li>CATEGORIES</li>
            <li>CHANGED PASSWORD</li>
        </div>
    </div>

    <div class="box">
        <div class="rectangle"></div>
    </div>

    <div class="cat">
        <div style="display:flex;justify-content: space-evenly;gap:5rem;padding: 2rem;">
            <div class="cat2"><img src="images/stack-of-books.png" alt="">10</div>
            <div class="cat2"><img src="images/return_1.png" alt="">2</div>
            <div class="cat2"><img src="images/occupation.png" alt="">50</div>

            <!-- Wrap the group.png in an anchor tag -->
            <a href="user_list.php" class="cat2">
                <img src="images/group.png" alt="Users List"> <?php echo $total_users; ?>
            </a>
        </div>
    </div>
</body>

</html>
