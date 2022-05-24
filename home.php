<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}
if (!isset($_SESSION['uname'])) {
  header("Location: login.php");
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
  <link rel="stylesheet" href="newhome.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Koulen&display=swap');
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- <link rel="stylesheet" href="css/home.css"> -->
  <title>Tutorio</title>
</head>

<body id="cover">
  <div></div>
  <div class="nav">
    <div class="hamburger-menu">
      <input id="menu__toggle" type="checkbox" />
      <label class="menu__btn" for="menu__toggle">
        <span></span>
      </label>
      <ul class="menu__box">
        <li><a class="menu__item" href="./home.php">Home</a></li>
        <li><a class="menu__item" href="./findtutors.php">Find Tutors</a></li>
        <?php
        if (!isset($_SESSION['uname'])) {
          echo '<li><a class="menu__item" href="./login.php">Login/Signup</a></li>';
          echo '<li><a class="menu__item" href="./tutorsignup.php">Signup as Tutor</a></li>';
        } else {
          echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
          echo '<li><a class="menu__item" href="./myLearning.php">My Learning</a></li>';
          echo '<li><a class="menu__item" href="http://localhost:3003?username=' . $name . '"><?php session_destroy(); ?>Chat</a></li>';

          echo '<li><a class="menu__item" href="./logout.php"><?php session_destroy(); ?>Logout</a></li>';
        }
        ?>
      </ul>
    </div>
    <div>



      <div class="container">

        <div class="span2">
          <h3>START LEARNING TODAY</h3>

          <h2 class="large">
            Tutorio Student
          </h2>
        </div>



        <div class="span5">
          <a href="/Tutorio/findtutors.php" style="font-size: 100px">
            Find Tutors
          </a>
        </div>
        <div class="span6">
          <a href="http://localhost:3003?username=' .$name. '" style="font-size: 100px">
            CHAT
          </a>
        </div>
        <div class="span7">
        </div>

      </div>

    </div>

  </div>
  </script>
</body>

</html>