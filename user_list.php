<?php
session_start();

include 'functions/connection.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

if ($role !== 'admin') {
    header('Location: user_dashboard.php');
    exit();
}

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/user_checkout.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">

    <title>User List</title>
</head>

<body>

    <div class="container">
        <div class="logo">
            <div style="display: flex;align-items: center;">
                <img src="images/logo2.png" alt="logo" width="90px">
                <li>LIBRARY MANAGEMENT SYSTEM</li>
            </div>
        </div>
        <div class="logo2">
        <li> <button onclick="location.href='homepage.php'">ADMIN DASHBOARD </button></li>
            <li> <button onclick="location.href='user_list.php'">USER LIST <button></li>
            <li> <button onclick="location.href='user_checkout.php'">USER CHECKOUTS </></li>
        </div>
        <div style="display:flex;gap:1rem;align-items:center;margin-right: 40px;">
            <li><img src="images/bell-ring.png" alt="bell" width="30px" style="margin-top: 5px;"></li>
            <li><img src="./images/user.png" alt="user" width="40px" style="margin-top: 5px;"></li>
            <li>
                <?php echo $email; ?>
            </li>
            <li><img src="images/next.png" alt="next" width="20px"></li>
        </div>
    </div>
    <div class="title">
        <p>USER LIST</p>
    </div>

    <div class="table">
        <table border="2">
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Book Title</th>
                <th>Date Borrow</th>
                <th>Date Return</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td>
                        <?php echo $row['user_id']; ?>
                    </td>
                    <td>
                        <span style="width: 100%;display: flex;align-items: center;gap: 0.5rem;height: 100%;">
                            <img src="./images/man.png" alt="pfp" class="img1">
                            <span>
                                <?php echo $row['email']; ?>
                            </span>
                        </span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="button">
                            <div>
                                <img src="./images/store.png" alt="store" width="30px">
                                <p>Edit</p>
                            </div>
                            <div>
                                <!-- <a href="functions/delete_user.php?user_id=<?php echo $row['user_id']; ?>">
                                    <img src="./images/delete.png" alt="delete" width="30px">
                                </a> -->
                                <a href="functions/delete_user.php?user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want to delete this user? click yes to continue')">
                                    <img src="./images/delete.png" alt="delete" width="30px">
                                </a>
                                <p>Delete</p>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

</body>

</html>