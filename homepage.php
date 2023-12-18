<?php
session_start();

include 'functions/connection.php';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
$role = isset($_SESSION['role']) ? $_SESSION['role'] : null;

// Check if 'loggedin' is not set or is false, redirect to login page
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
  header('Location: login_page.php');
  exit();
}

// Check if 'role' is not set, redirect to login page
if (!isset($_SESSION['role'])) {
  header('Location: login_page.php');
  exit();
}

if ($role !== 'student') {
    header('Location: admin_dashboard.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/homepage.css" />
  <link rel="stylesheet" href="./css/user_dashboard.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css" />
  <title>Homepage</title>
</head>

<body>
  <!-- navbar -->
  <div class="container">
        <div class="logo">
            <div style="display: flex;align-items: center;">
                <img src="images/logo2.png" width="90px">
                <li>LIBRARY MANAGEMENT SYSTEM</li>
            </div>
        </div>
        <div class="logo2">
            <li><button onclick="location.href='user_dashboard.php'">USER DASHBOARD</button></li>
            <li><button onclick="location.href='homepage.php'">BOOKSHELF</button></li>
        </div>
        <div style="display:flex;gap:1rem;align-items:center;margin-right: 40px;">
            <li><img src="images/bell-ring.png" width="30px" style="margin-top: 5px;"></li>
            <!-- Display the user's email here -->
            <div class="dropdown">
                <li><?php echo $email; ?></li>
                <li><img src="images/next.png" width="20px"></li>
                <div class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="functions/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
  <div class="nav-bar">
    <ul>
      <li><a href="#">HOME</a></li>
      <li><a href="#">CATALOG</a></li>
      <li><a href="#">AUTHOR</a></li>
      <li><a href="#">POPULAR</a></li>
      <li><a href="#">GENRES</a></li>
      <li><a href="#">RECOMENDATIONS</a></li>
    </ul>
  </div>

  <!-- CONTENT -->
  <div class="bg-image">
    <img src="./images/librarian-shelving-books-in-a-library-for-libraries-feature-700x375-1.jpg 1.png" alt="bg-image" style="width: 100%" draggable="false" />
  </div>
  <div class="books">
    <div class="book1">
      <img src="./images/schoflife.png" alt="schooloflife" draggable="false" />
    </div>
    <div class="book2">
      <img src="./images/confidencegame.png" alt="confidencegame" draggable="false" />
    </div>
    <div class="book3">
      <img src="./images/The_Chronicles_of_Narnia_box_set_cover 1.png" alt="narnia" draggable="false" />
    </div>
    <div class="book4">
      <img src="./images/getalife.png" alt="getalife" draggable="false" />
    </div>
  </div>

  <!-- Books -->
  <div class="booklist">
    <div class="booklist1">
      <div>
        <img src="./images/thinkingfastandslow.png" alt="tfs" />
      </div>
      <div>
        <p>THINKING FAST AND SLOW by DANIEL KAHNEMAN</p>
        <div class="button">
          <button class="borrow-btn" data-book-id="1">Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist2">
      <div>
        <img src="./images/knowledgegap.png" alt="tkg" />
      </div>
      <div>
        <p>THE KNOWLEDGE GAP by NATALIE WEXLER</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="2">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist3">
      <div>
        <img src="./images/lightningthief.png" alt="tlt" />
      </div>
      <div>
        <p>THE LIGHTNING THIEF by RICK RIORDAN</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="3">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist4">
      <div>
        <img src=".//images/thinklikealawyer.png" alt="tlal" />
      </div>
      <div>
        <p>THINKING LIKE A LAWYER by COLIN SEALE</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="4">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist5">
      <div>
        <img src="./images/howchildrensucceed.png" alt="hcs" />
      </div>
      <div>
        <p>HOW CHILDREN SUCCEED by PAUL TOUGH</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="5">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist6">
      <div>
        <img src="./images/harrypotter.png" alt="hp" />
      </div>
      <div>
        <p>HARRY POTTER AND THE SORCERERS STONE by J.K ROWLING</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="6">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist7">
      <div>
        <img src="./images/habit.png" alt="habit" />
      </div>
      <div>
        <p>THE POWER OF HABIT by CHARLES DUHIGG</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="7">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist8">
      <div>
        <img src="./images/startherestartnow.png" alt="shsn" />
      </div>
      <div>
        <p>START HERE START NOW by LIZ KLEINROCK</p>
        <div class="button">
        <button class="borrow-btn" data-book-id="8">Borrow</button>
        <button>Reserve</button>
        </div>
      </div>
    </div>
  </div>

  <!-- PAGINATION -->
  <div class="pagination">
    <a href="#">
      << </a>
        <a href="./homepage.php" class="active">1</a>
        <a href="./bookshelf.php">2</a>
        <a href="#"> >> </a>
  </div>

  <script>
    document.querySelectorAll('.borrow-btn').forEach(function(button) {
      button.addEventListener('click', function(e) {
        var bookId = e.target.getAttribute('data-book-id');
        var userId = '<?php echo $_SESSION["user_id"]; ?>'; // Replace this with the actual user ID

        // Send the AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'functions/checkout.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('book_id=' + encodeURIComponent(bookId) + '&user_id=' + encodeURIComponent(userId));

        xhr.onload = function() {
          if (xhr.status === 200) {
            alert('Book borrowed successfully!');
          } else {
            alert('An error occurred: ' + xhr.status);
          }
        };
      });
    });

    // Add an event listener to the logout icon to toggle the logout dropdown
    document.getElementById("logout-icon").addEventListener("click", function() {
      var logoutDropdown = document.getElementById("logout-dropdown");
      logoutDropdown.style.display = logoutDropdown.style.display === "block" ? "none" : "block";
    });
    // Close the logout dropdown if the user clicks outside of it
    window.addEventListener("click", function(event) {
      var logoutIcon = document.getElementById("logout-icon");
      var logoutDropdown = document.getElementById("logout-dropdown");
      if (!logoutIcon.contains(event.target) && !logoutDropdown.contains(event.target)) {
        logoutDropdown.style.display = "none";
      }
    });
    // Prevent the document click event from closing the dropdown when the icon is clicked
    document.getElementById("logout-icon").addEventListener("click", function(event) {
      event.stopPropagation();
    });
    // Add an event listener to the logout link to perform the logout action
    document.getElementById("logout-link").addEventListener("click", function() {
      // Add your logout logic here
      console.log("Logout clicked");
      // Example: window.location.href = 'logout.php';
    });
  </script>

</body>

</html>