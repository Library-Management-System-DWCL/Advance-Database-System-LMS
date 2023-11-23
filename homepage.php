<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">

  <title>Homepage</title>

</head>

<body>
  <!-- navbar -->
  <div class="top-bar">
    <div class="container">
      <div class="logo">
        <div style="display: flex;align-items: center;">
          <img src="./images/logo2.png" alt="logo" width="90px" draggable="false">
          <li>LIBRARY MANAGEMENT SYSTEM</li>
        </div>
      </div>
    </div>
    <div class="search"><input type="search" placeholder="Search..."><i class="fa-solid fa-magnifying-glass fa-xl" style="color: white; cursor: pointer;"></i>
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

        <script>
          // Add an event listener to the logout icon to toggle the logout dropdown
          document.getElementById('logout-icon').addEventListener('click', function() {
            var logoutDropdown = document.getElementById('logout-dropdown');
            logoutDropdown.style.display = (logoutDropdown.style.display === 'block') ? 'none' : 'block';
          });

          // Close the logout dropdown if the user clicks outside of it
          window.addEventListener('click', function(event) {
            var logoutIcon = document.getElementById('logout-icon');
            var logoutDropdown = document.getElementById('logout-dropdown');

            if (!logoutIcon.contains(event.target) && !logoutDropdown.contains(event.target)) {
              logoutDropdown.style.display = 'none';
            }
          });

          // Prevent the document click event from closing the dropdown when the icon is clicked
          document.getElementById('logout-icon').addEventListener('click', function(event) {
            event.stopPropagation();
          });

          // Add an event listener to the logout link to perform the logout action
          document.getElementById('logout-link').addEventListener('click', function() {
            // Add your logout logic here
            console.log('Logout clicked');
            // Example: window.location.href = 'logout.php';
          });
        </script>

        <hr style="border-color: black;">
        <div class="library-card"><img src="./images/library-card 1.png" alt="library-card" draggable="false" style="cursor: pointer;">
          <label for="card-id" style="cursor: pointer;">
            <p>GET A LIBRARY CARD NOW!!</p>
          </label>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="nav-bar">
    <ul>
      <li><a href="#">BORROW</a></li>
      <li><a href="#">RESERVE</a></li>
      <li><a href="#">CATEGORIES</a> <i class="fa-solid fa-chevron-down fa-2xs" style="color: #ffffff;"></i></li>
      <li><a href="#">CONTACTS</a></li>
    </ul>
  </div>
  <!-- CONTENT -->
  <div class="bg-image">
    <img src="./images/librarian-shelving-books-in-a-library-for-libraries-feature-700x375-1.jpg 1.png" alt="bg-image" style="width: 100%;" draggable="false">
  </div>

  <div class="books">
    <div class="book1"> <img src="./images/schoflife.png" alt="schooloflife" draggable="false"></div>
    <div class="book2"><img src="./images/confidencegame.png" alt="confidencegame" draggable="false"></div>
    <div class="book3"><img src="./images/The_Chronicles_of_Narnia_box_set_cover 1.png" alt="narnia" draggable="false"></div>
    <div class="book4"><img src="./images/getalife.png" alt="getalife" draggable="false"></div>
  </div>

  <div class="booklist">
    <div class="" style="display:flex">
      <div>
        <img src="./images/thinkingfastandslow.png" alt="tfs">
      </div>
      <div>
        <div>
          <p>
            THINKING FAST AND SLOW by DANIEL KAHNEMAN
          </p>
        </div>
        <div style="display:flex;justify-content:space-evenly;margin-top: 1rem;">
          <button>Borrow</button>
          <button>Reserve</button>
        </div>
      </div>
    </div>

    <div class="booklist2">
      <div class="book-info">
        <img src="./images/knowledgegap.png" alt="tkg">
        <p>THE KNOWLEDGE GAP by NATALIE WEXLER </p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
    <div class="booklist3">
      <div class="book-info">
        <img src="./images/lightningthief.png" alt="tlt">
        <p>THE LIGHTNING THIEF by RICK RIORDAN</p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
    <div class="booklist4">
      <div class="book-info">
        <img src=".//images/thinklikealawyer.png" alt="tlal">
        <p>THINKING LIKE A LAWYER by COLIN SEALE</p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
    <div class="booklist5">
      <div class="book-info">
        <img src="./images/howchildrensucceed.png" alt="hcs">
        <p>HOW CHILDREN SUCCEED by PAUL TOUGH</p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
    <div class="booklist6">
      <div class="book-info">
        <img src="./images/harrypotter.png" alt="hp">
        <p>HARRY POTTER AND THE SORCERERS STONE by J.K ROWLING</p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
    <div class="booklist7">
      <div class="book-info">
        <img src="./images/habit.png" alt="habit">
        <p>THE POWER OF HABIT by CHARLES DUHIGG</p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
    <div class="booklist8">
      <div class="book-info">
        <img src="./images/startherestartnow.png" alt="shsn">
        <p>START HERE START NOW by LIZ KLEINROCK</p>
      </div>
      <div class="button">
        <button>BORROW</button>
        <button>RESERVE</button>
      </div>
    </div>
  </div>

</body>

</html>