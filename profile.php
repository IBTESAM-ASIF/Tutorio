<?php
include 'connection.php';
session_start();

$uname = $_SESSION['uname'];

$sql_query = "select * from student where Email ='" . $uname . "'";
$result = mysqli_query($con, $sql_query);
$row = mysqli_fetch_array($result);
$first = $row['First_Name'];
$last = $row['Last_Name'];
$number = $row['Phone_Number'];
$age = $row['Age'];
$gender = $row['Gender'];
$country = $row['Country'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="nav_style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>Tutorio | Login</title>
</head>

<body>
    <div id="cover"></div>
    <div class="nav">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="#">Home</a></li>
                <li><a class="menu__item" href="#">Find Tutors</a></li>
                <li><a class="menu__item" href="./Aboutus.php">About US</a></li>
                <li><a class="menu__item" href="./contact.php">Contact US</a></li>
                <?php
                if (!isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./login.php">Login/Signup</a></li>';
                    echo '<li><a class="menu__item" href="./tutor.php">Signup as Tutor</a></li>';
                } else {
                    echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="./login.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
<form action="">
    <label for=""></label>
    <input type="text">
    
    <label for=""></label>
    <input type="text">
</form>


</body>

</html>