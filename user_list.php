<?php
include 'functions/connection.php';

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
        <div style="display:flex;gap:1rem;align-items:center;margin-right: 40px;">
            <li><img src="images/bell-ring.png" alt="bell" width="30px" style="margin-top: 5px;"></li>
            <li><img src="./images/user.png" alt="user" width="40px" style="margin-top: 5px;"></li>
            <li>07108487@dwc-legazpi.edu</li>
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
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php echo $row['user_id']; ?>
                    </td>
                    <td>
                        <img src="./images/man.png" alt="pfp" class="img1">
                        <span>
                            <?php echo $row['email']; ?>
                        </span>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="button">
                            <div>
                                <img src="./images/store.png" alt="store" width="30px">
                                <p>Store</p>
                            </div>
                            <div>
                                <img src="./images/delete.png" alt="delete" width="30px">
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