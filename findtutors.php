<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}

// fetch data from database




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
  <title>Tutorio</title>
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
        <li><a class="menu__item" href="./home.php">Home</a></li>
        <li><a class="menu__item" href="#">Find Tutors</a></li>
        <li><a class="menu__item" href="./Aboutus.php">About US</a></li>
        <li><a class="menu__item" href="./contact.php">Contact US</a></li>
        <?php
        if (!isset($_SESSION['uname'])) {
          echo '<li><a class="menu__item" href="./login.php">Login/Signup</a></li>';
          echo '<li><a class="menu__item" href="./tutorsignup.php">Signup as Tutor</a></li>';
        } else {
          echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
          echo '<li><a class="menu__item" href="./login.php">Logout</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>

  <table border="2">
    <tr>
      <td>Sr.No.</td>
      <td>Full Name</td>
      <td>Age</td>
    </tr>

    <?php

    $sql = mysqli_query($con, "select * from tutor");

    if ($con->query($sql) == true) {
      header("Location: ./findtutors.php");
    } else {
      echo "error, $sql <br> $con->error()";
    }
    
    while ($data = mysqli_fetch_array($sql)) {
    ?>
      <tr>
        <td><?php echo $data['First_Name']; ?></td>
        <td><?php echo $data['Last_Name']; ?></td>
        <td><?php echo $data['Phone_Number']; ?></td>
        <td><?php echo $data['Age']; ?></td>
        <td><?php echo $data['Gender']; ?></td>
        <td><?php echo $data['Country']; ?></td>
      </tr>
    <?php
    }
    ?>
  </table>

  </script>
</body>

</html>