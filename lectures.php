<?php 
include 'connection.php';
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}
$sql_query = "select * from subject s join teacher_course tc on s.subID = tc.subID where tc.teahcerEmail ='" . $name . "'";
// $result = mysqli_query($con, $sql_query);
// $row = mysqli_fetch_array($result);
// $subject = $row['description'];
// $domain = $row['domain'];
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
            <li><a class="menu__item" href="#">Home</a></li>
                <li><a class="menu__item" href="./mylectures.html">My Lectures</a></li>
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
<table style="margin: auto;">
        <tr>
            <h2 style="text-align: center; padding:5px">Students</h2>
        </tr>
        <t>
            <th>Course Name</th>
            <th>Course Domain</th>
        </t>
        <?php
        $result = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $rows['description']; ?></td>
                <td><?php echo $rows['domain'] ?></td>
            </tr>
        <?php
        }
    }
    else{
        echo "No COurses Uploaded yet";
    }
        ?>
    </table>

</body>
</html>