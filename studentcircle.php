<?php
include 'connection.php';
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}
$query = "select * from tutor t join teacher_student ts on t.email = ts.teacherEmail join student s on ts.studentEmail = s.Email where t.email='" .$name. "'";
$result = mysqli_query($con, $query);

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
                <li><a class="menu__item" href="./mylecture.php">My Lectures</a></li>
                <li><a class="menu__item" href="#">Student Circle</a></li>

                <?php
                if (isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="./logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="menu__item" href="./tutorlogin.php">Sign IN as tutor</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <table>
        <tr>
            <h2>Students</h2>
        </tr>
        <t>
            <th>Student Name</th>
            <th>Student Phone</th>
            <th>Gender</th>
            <th>Country</th>
        </t>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $rows['First_Name'] . "" . $rows['Last_Name']; ?></td>
                <td><?php echo $rows['Phone_Number'] ?></td>
                <td><?php echo $rows['Gender'] ?></td>
                <td><?php echo $rows['Country'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>



    </script>
</body>

</html>