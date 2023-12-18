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
        <div class="logo2">
            <li> <button onclick="location.href='homepage.php'">ADMIN DASHBOARD </button></li>
            <li> <button onclick="location.href='user_list.php'">USER LIST <button></li>
            <li> <button onclick="location.href='user_checkout.php'">USER CHECKOUTS </>
            </li>
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
                <th>Date Borrowed</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php echo $row['checkoutID']; ?>
                    </td>
                    <td style="gap:0.5rem">
                        <img src="./images/man.png" alt="pfp" class="img1">
                        <span style="align-items:center;display:flex;">
                            <?php echo $row['email']; ?>
                        </span>
                    </td>
                    <td>
                        <?php echo $row['book_name']; ?>
                    </td>
                    <td>
                        <?php echo $row['checkout_date']; ?>
                    </td>
                    <div class="button">
                        <td>
                            <div class="button">
                                <div>
                                    <a href="functions/delete_checkout.php?id=<?php echo $row['checkoutID']; ?>"
                                        onclick="return confirm('Are you sure you want to delete this user? click yes to continue')">
                                        <img src="./images/delete.png" alt="delete" width="30px">
                                    </a>
                                </div>
                                <div>
                                    <input type="checkbox" class="row-checkbox" value="<?php echo $row['checkoutID']; ?>">
                                </div>
                            </div>
                        </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <script>
        document.querySelector('.del-butt button').addEventListener('click', function () {
            var checkboxes = document.querySelectorAll('.row-checkbox:checked');
            var checkoutIDs = Array.from(checkboxes).map(checkbox => checkbox.value);
            if (checkoutIDs.length > 0) {
                var confirmation = confirm('Are you sure you want to delete all selected items?');
                if (confirmation) {
                    window.location.href = 'functions/delete_multiple_checkouts.php?ids=' + checkoutIDs.join(',');
                }
            }
        });

        document.querySelector('.selectall button').addEventListener('click', function () {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = !allChecked;
            }
        });
    </script>
</body>

</body>

</html>