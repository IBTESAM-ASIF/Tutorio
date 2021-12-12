<?php
session_start();

if (!isset($_SESSION['uname'])) {
    header('location:home.php');
}

$name = $_SESSION['uname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="slide.css">
    <!-- <link rel="stylesheet" href="home.css"> -->
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
                <li><a class="menu__item" href="#">Home</a></li>
                <li><a class="menu__item" href="#">My Lectures</a></li>
                <li><a class="menu__item" href="./Aboutus.php">Student Circle</a></li>

                <?php
                if (isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="./logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>



    </script>
</body>

</html>