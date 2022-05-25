<?php
include ('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}
if(!isset($_SESSION['uname'])){
  header("Location: login.php");
}
$sql_query = "select t.*, s.description from teacher_course ts join teacher_student tc on ts.teacherEmail = tc.teacherEmail join subject s on ts.subID = s.subID join tutor t on ts.teacherEmail = t.email where tc.studentEmail = '" . $name . "'";
$result = mysqli_query($con, $sql_query);
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
    <title>Document</title>
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
        <li><a class="menu__item" href="./findtutors.php">Find Tutors</a></li>
        <?php
        if (!isset($_SESSION['uname'])) {
          echo '<li><a class="menu__item" href="./login.php">Login/Signup</a></li>';
          echo '<li><a class="menu__item" href="./tutorsignup.php">Signup as Tutor</a></li>';
        } else {
          echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
          echo '<li><a class="menu__item" href="./myLearning.php">My Learning</a></li>';
          echo '<li><a class="menu__item" href="http://localhost:3003?username=' .$name. '"><?php session_destroy(); ?>Chat</a></li>';
          echo '<li><a class="menu__item" href="./login.php"><?php session_destroy(); ?>Logout</a></li>';
        }
        ?>
      </ul>
        </div>
    </div>
    <table style="margin: auto;">
        <tr>
            <h2 style="text-align: center; padding:5px">My Courses</h2>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
    
        ?>
        <t>
            <th>Course Name</th>
            <th>Taught By:</th>
            <th>Lecture Video</th>

        </t>
        <?php
        }
        ?>
        <?php
        $result = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $rows['description']; ?></td>
            <td><?php echo $rows['last']; ?></td>
            <td><video width="500px" height="280px" controls="controls" />
                <source src="./<?php echo $rows['lecture']; ?>.mp4" type="video/mp4">
                </video>
            </td>
        </tr>
        <?php
            }
        } else {
        ?>
            <h2>No Courses Found</h2>
        <?php
        }
        ?>
    </table>

</body>

</html>