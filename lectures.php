<?php
include 'connection.php';
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}
if(!isset($_SESSION['uname'])){
  header("Location: login.php");
}
$sql_query = "select * from subject s join teacher_course tc on s.subID = tc.subID where tc.teacherEmail ='" . $name . "'";
if(isset($_POST['course_del'])){
    $id = $_POST['course_del'];
    $query = "DELETE FROM `teacher_course` WHERE `teacher_course`.`teacherEmail` = '$name' AND `teacher_course`.`subID` = $id;";
    // echo $query;
    $result = mysqli_query($con, $query);
    header("Location: \Project\Final_Design\lectures.php");
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
                <li><a class="menu__item" href="./mylectures.php">My Lectures</a></li>
                <li><a class="menu__item" href="./studentcircle.php">Student Circle</a></li>

                <?php
                if (isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./tutorProfile.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="http://localhost:3003?username=' . $name . '"><?php session_destroy(); ?>Chat</a></li>';
                    echo '<li><a class="menu__item" href="./logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="menu__item" href="./tutorlogin.php">Sign IN as tutor</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
    <table style="margin: auto;">
        <tr>
            <h2 style="text-align: center; padding:5px">My Courses</h2>
        </tr>
        <t>
            <th>Course Name</th>
            <th>Course Domain</th>
        </t>
        <?php
        $result = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows['subID'];
        ?>
                <tr>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['domain'] ?></td>
                    <form action="./lectures.php" method="post">
                        <td><button type="submit" value=<?php echo $id?> name="course_del">Delete This Course</button></td>
                    </form>
                </tr>
                
        <?php
            }
        }
        ?>
    </table>

</body>
</html>