<!-- <?php
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



?> -->
<?php
session_start();

include 'functions/connection.php';

$userId = $_SESSION["user_id"]; // Get the logged-in user ID

// Prepare an SQL statement to fetch the borrowed books from the checkout table
$sql = "SELECT * FROM checkout WHERE user_id = ?";

// Use a prepared statement to execute the SQL command
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);

// Execute the prepared statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the data
$books = $result->fetch_all(MYSQLI_ASSOC);

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();

// Now you can loop through the $books array to display the borrowed books
foreach ($books as $book) {
  echo $book['bookID']; // Replace this with the actual book details
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/book_shelf.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
  <title>Book Shelf</title>
</head>

<body>
  <div class="top-bar">
    <div class="container">
      <div class="logo">
        <div style="display: flex; align-items: center;">
          <img src="./images/logo2.png" alt="logo" width="90px" draggable="false">
          <li>LIBRARY MANAGEMENT SYSTEM</li>
        </div>
      </div>

      <div class="search">
        <div class="search-container">
          <input type="search" placeholder="Search...">
          <i class="fa-solid fa-magnifying-glass fa-xl" style="color: white; cursor: pointer;"></i>
        </div>
      </div>

      <div class="user">
        <div class="user-logo">
          <img src="./images/user.png" alt="user-logo" draggable="false" style="cursor: pointer;">
          <label for="username" style="cursor: pointer;">
            <p>57842340@dwc-legazpi.edu</p>
          </label> &nbsp;
          <i class="fa-solid fa-circle-chevron-down fa-lg" id="logout-icon" style="color:#910000; cursor: pointer;"></i>
          <div class="logout-dropdown" id="logout-dropdown">
            <a href="#" id="logout-link">Profile</a>
            <a href="#" id="logout-link">Settings & Privacy</a>
            <a href="#" id="logout-link">Logout</a>
          </div>
        </div>
        <div class="library-card">
          <img src="./images/library-card 1.png" alt="library-card" draggable="false" style="cursor: pointer;">
          <label for="card-id" style="cursor: pointer;">
            <p>GET A LIBRARY CARD NOW!!</p>
          </label>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Add an event listener to the logout icon to toggle the logout dropdown
    document.getElementById('logout-icon').addEventListener('click', function () {
      var logoutDropdown = document.getElementById('logout-dropdown');
      logoutDropdown.style.display = (logoutDropdown.style.display === 'block') ? 'none' : 'block';
    });
    // Close the logout dropdown if the user clicks outside of it
    window.addEventListener('click', function (event) {
      var logoutIcon = document.getElementById('logout-icon');
      var logoutDropdown = document.getElementById('logout-dropdown');
      if (!logoutIcon.contains(event.target) && !logoutDropdown.contains(event.target)) {
        logoutDropdown.style.display = 'none';
      }
    });
    // Prevent the document click event from closing the dropdown when the icon is clicked
    document.getElementById('logout-icon').addEventListener('click', function (event) {
      event.stopPropagation();
    });
    // Add an event listener to the logout link to perform the logout action
    document.getElementById('logout-link').addEventListener('click', function () {
      // Add your logout logic here
      console.log('Logout clicked');
      // Example: window.location.href = 'logout.php';
    });
  </script>

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

  <div class="searchbooks">
    <input type="search" placeholder="Search Books..."><i class="fa-solid fa-magnifying-glass fa-xl"
      style="color: white; cursor: pointer;"></i>
  </div>

  <!-- Books -->
  <div class="booklist">
    <div class="booklist1">
      <div>
        <img src="./images/thinkingfastandslow.png" alt="tfs">
      </div>
      <div>
        <p>THINKING FAST AND SLOW by DANIEL KAHNEMAN</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist2">
      <div>
        <img src="./images/knowledgegap.png" alt="tkg">
      </div>
      <div>
        <p>THE KNOWLEDGE GAP by NATALIE WEXLER </p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist3">
      <div>
        <img src="./images/lightningthief.png" alt="tlt">
      </div>
      <div>
        <p>THE LIGHTNING THIEF by RICK RIORDAN</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist4">
      <div>
        <img src=".//images/thinklikealawyer.png" alt="tlal">
      </div>
      <div>
        <p>THINKING LIKE A LAWYER by COLIN SEALE</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist5">
      <div>
        <img src="./images/howchildrensucceed.png" alt="hcs">
      </div>
      <div>
        <p>HOW CHILDREN SUCCEED by PAUL TOUGH</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist6">
      <div>
        <img src="./images/harrypotter.png" alt="hp">
      </div>
      <div>
        <p>HARRY POTTER AND THE SORCERERS STONE by J.K ROWLING</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist7">
      <div>
        <img src="./images/habit.png" alt="habit">
      </div>
      <div>
        <p>THE POWER OF HABIT by CHARLES DUHIGG</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist8">
      <div>
        <img src="./images/startherestartnow.png" alt="shsn">
      </div>
      <div>
        <p>START HERE START NOW by LIZ KLEINROCK</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>
    <div class="booklist1">
      <div>
        <img src="./images/thinkingfastandslow.png" alt="tfs">
      </div>
      <div>
        <p>THINKING FAST AND SLOW by DANIEL KAHNEMAN</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist2">
      <div>
        <img src="./images/knowledgegap.png" alt="tkg">
      </div>
      <div>
        <p>THE KNOWLEDGE GAP by NATALIE WEXLER </p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist3">
      <div>
        <img src="./images/lightningthief.png" alt="tlt">
      </div>
      <div>
        <p>THE LIGHTNING THIEF by RICK RIORDAN</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist4">
      <div>
        <img src=".//images/thinklikealawyer.png" alt="tlal">
      </div>
      <div>
        <p>THINKING LIKE A LAWYER by COLIN SEALE</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist5">
      <div>
        <img src="./images/howchildrensucceed.png" alt="hcs">
      </div>
      <div>
        <p>HOW CHILDREN SUCCEED by PAUL TOUGH</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist6">
      <div>
        <img src="./images/harrypotter.png" alt="hp">
      </div>
      <div>
        <p>HARRY POTTER AND THE SORCERERS STONE by J.K ROWLING</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist7">
      <div>
        <img src="./images/habit.png" alt="habit">
      </div>
      <div>
        <p>THE POWER OF HABIT by CHARLES DUHIGG</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist8">
      <div>
        <img src="./images/startherestartnow.png" alt="shsn">
      </div>
      <div>
        <p>START HERE START NOW by LIZ KLEINROCK</p>
        <div class="button">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>
  </div>

  <!-- PAGINATION -->
  <div class="pagination">
    <a href="#">
      << </a>
        <a href="./homepage.php">1</a>
        <a href="./bookshelf.php" class="active">2</a>
        <a href="#"> >> </a>

  </div>

</body>

</html>