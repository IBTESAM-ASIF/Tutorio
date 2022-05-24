<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}
if (!isset($_SESSION['uname'])) {
    header("Location: login.php");
}

$sql_query = "select * from student where Email ='" . $name . "'";
$result = mysqli_query($con, $sql_query);
$row = mysqli_fetch_array($result);
$first = $row['First_Name'];
$last = $row['Last_Name'];
$number = $row['Phone_Number'];
$age = $row['Age'];
$gender = $row['Gender'];
$country = $row['Country'];
$email = $row['Email'];
$image = $row['photo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav_style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Koulen&display=swap');
    </style>
    <link rel="stylesheet" href="newprofile.css">
    <style>
        body {
            background: linear-gradient(to bottom, #05445E, #189AB4);

        }
    </style>
    <title>Tutorio | Login</title>
</head>

<body id="cover">

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
    </div>

    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" />
                <span class="name mt-3" style="font-family: 'Koulen', cursive;"><?php echo strtoupper($first . " " . $last); ?></span>

                <div class="text mt-3">
                    <span>Email: </span><span style="font-family: 'Koulen', cursive;"><?php echo $email ?></span>
                </div>

                <div class="text mt-3">
                    <span>Phone Number: </span><span style="font-family: 'Koulen', cursive;"><?php echo $number ?></span>
                </div>

                <div class="text mt-3">
                    <span>Age: </span><span style="font-family: 'Koulen', cursive;"><?php echo $age ?></span>
                </div>

                <div class="text mt-3">
                    <span>Gender: </span><span style="font-family: 'Koulen', cursive;"><?php echo $gender ?></span>
                </div>

                <div class="text mt-3">
                    <span>Country: </span><span style="font-family: 'Koulen', cursive;"><?php echo $country ?></span>
                </div>

                <div class=" d-flex mt-2"> <a href="/Tutorio/editProf.php"><button class="btn1 btn-dark">Edit Profile</button></a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>