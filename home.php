<?php
include ('connection.php');
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
  <!-- <link rel="stylesheet" href="css/home.css"> -->
  <title>Tutorio</title>
</head>

<body id="cover">
  <div ></div>
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

          echo '<li><a class="menu__item" href="./login.php"><?php session_destroy(); ?>Logout</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>



  </script>
</body>

</html>