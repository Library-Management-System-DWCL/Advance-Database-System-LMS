<?php
session_start();

include 'functions/connection.php';

$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

if ($role !== 'admin') {
    header('Location: user_dashboard.php');
    exit();
}

$query = "SELECT checkout.*, users.email, books.book_name 
FROM checkout 
JOIN users 
ON checkout.user_id = users.user_id
JOIN books
ON checkout.bookID = books.bookID";
$result = mysqli_query($conn, $query);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/user_checkout.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">

    <title>Checkout (User)</title>
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
        <p>CHECKOUT LIST</p>
        <div class="del-butt">
            <button>DELETE</button>
            <div class="selectall">
                <button>SELECT ALL</button>
            </div>
        </div>
    </div>

    <div class="table">
        <table border="2">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Book Title</th>
                <th>Date Borrow</th>
                <th>Date Return</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['checkoutID']; ?></td>
                <td>
                    <img src="./images/man.png" alt="pfp" class="img1">
                    <span> <?php echo $row['email']; ?>
                    </span>
                </td>
                <td><?php echo $row['book_name']; ?></td>
                <td><?php echo $row['checkout_date']; ?></td>
                <td></td>
                <div class="button">
                    <td>
                        <div class="button">
                            <div>
                                <img src="./images/delete.png" alt="delete" width="30px">
                                <p>Delete</p>
                            </div>
                            <div>
                                <input type="checkbox">
                            </div>
                        </div>
                    </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script>
        document.querySelector('.del-butt button').addEventListener('click', function () {
            var confirmation = confirm('Are you sure you want to delete all selected items?');
            if (confirmation) {
                // Perform delete all operation
            }
        });

        document.querySelector('.selectall button').addEventListener('click', function () {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = !allChecked;
            }
        });

        var deleteButtons = document.querySelectorAll('.button img');
        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                var confirmation = confirm('Are you sure you want to delete this item?');
                if (confirmation) {
                    // Perform delete operation
                }
            });
        });
    </script>
</body>

</body>

</html>