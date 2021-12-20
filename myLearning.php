<?php
include 'connection.php';
session_start();
if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}
$sql_query = "select t.*, s.description, lecture from teacher_course ts join teacher_student tc on ts.teacherEmail = tc.teacherEmail join subject s on ts.subID = s.subID join tutor t on ts.teacherEmail = t.email where tc.studentEmail = '" . $name . "'";
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
                <li><a class="menu__item" href="#">Home</a></li>
                <li><a class="menu__item" href="./mylectures.php">My Lectures</a></li>
                <li><a class="menu__item" href="./studentcircle.php">Student Circle</a></li>

                <?php
                if (isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./tutorProfile.php">' . $name . '</a></li>';
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
            <th>Taught By:</th>
            <th>Lecture Video</th>

        </t>
        <?php
        $result = mysqli_query($con, $sql_query);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $rows['description']; ?></td>
                    <td><?php echo $rows['first'] . " " . $rows['last']; ?></td>
                    <td><video width="500px" height="280px" controls="controls" />
                        <source src="./<?php echo $rows['lecture']; ?>.mp4" type="video/mp4">
                        </video>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "You have no lectures currently";
        }
        ?>
    </table>

</body>

</html>