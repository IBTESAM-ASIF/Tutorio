<?php 
include 'connection.php';
session_start();
if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav_style.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/slide.css">
  <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <style>
        .container{
            align-items: center;
        }
    </style>
    <title>Tutorio | Signup</title>
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
                <li><a class="menu__item" href="./mylectures.php">My Lectures</a></li>
                <li><a class="menu__item" href="./studentcircle.php">Student Circle</a></li>

                <?php
                if (isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./tutorProfile.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="./logout.php">Logout</a></li>';
                }
                else{
                    echo '<li><a class="menu__item" href="./tutorlogin.php">Sign IN as tutor</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="container">
        <a href="./uploadLect.php"><button >Upload New Lecture</button></a>
        <a href="./lectures.php"><button>View Your Lectures</button></a>
    </div>
</body>
</html>