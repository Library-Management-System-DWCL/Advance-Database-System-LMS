<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/card_library.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="logo">
            <div style="display: flex;align-items: center;">
                <img src="images/logo2.png" width="90px">
                <li>LIBRARY MANAGEMENT SYSTEM</li>
            </div>
        </div>
    <div style="display:flex;gap:1rem;align-items:center;margin-right: 40px;">
        <li><img src="images/bell-ring.png" width="30px" style="margin-top: 5px;"></li>
        <li>07108487@dwc-legazpi.edu</li>
        <li><img src="images/next.png" width="20px"></li>
        </div>
    </div>
    <div style="display:flex;gap:1rem;align-items:center;margin-left: 50px;margin-top: 20px">
        <div class="image"><img class="home" src="images/home.png" /></div>
        <div class="label"><div class="text-wrapper">Home</div></div>
    </div>
    <div> 
    <div class="box">
        <div class="rectangle">
        <div class="label"><div class="per">Personal Information:</div></div>
        <form method="" action="">
            <div class="line">
                <label for="student_id">First Name</label>
                <input type="text" name="student_id" maxlength="4" placeholder="Enter Your id" required>
            </div>
            <div class="line">
                <label>Middle Name</label>
                <input type="text" name="student_name" placeholder="Enter Your Name" required>
            </div>
            <div class="line">
                <label>Last Name</label>
                <input type="text" name="address" placeholder="Enter Your Address" required>
            </div>
            <div class="rad">
                <p>Gender</p>
                <div class="in">
                    <input type="radio">
                    <label for="html">Male</label><br>
                    <input type="radio">
                    <label for="css">Female</label><br>
                    <input type="radio">
                    <label for="javascript">Others</label>
                </div>
                <div class="day">
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday">
                </div>
            </div>
            <div class="lib">
                <div class="line">
                    <label for="student_id">Library Number</label>
                    <input type="text" name="student_id" maxlength="4" placeholder="Enter Your id" required>
                </div>
                <div class="line">
                    <label>EXP DATE</label>
                    <input type="text" name="student_name" placeholder="Enter Your Name" required>
                </div>
            </div>
            </form>
    </div>
    </div>
</body>
</html>