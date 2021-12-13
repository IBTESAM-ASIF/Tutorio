<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `student` (`First_Name`, `Last_Name`, `Phone_Number` , `Age`, `Gender` , `Country` , `Email` , `Password`) VALUES ('$first','$last', '$phone' , '$age', '$gender' , '$country' , '$username' , '$password');";


    if ($con->query($sql) == true) {
        header("Location: Final_Design/login.php");
    } else {
        echo "error, $sql <br> $con->error()";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav_style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>Tutorio | Signup</title>
</head>

<body class="align">
    <div class="grid">
        <h1>Signup as Student</h1>
        <form action="./signup.php" method="POST" class="form login">

            <div class="form__field">
                <input id="login__username" type="text" name="first" class="form__input" placeholder="First Name"
                    required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="last" class="form__input" placeholder="Last Name"
                    required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="phone" class="form__input" placeholder="phone" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="age" class="form__input" placeholder="age" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="gender" class="form__input" placeholder="gender" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="country" class="form__input" placeholder="country"
                    required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="username" class="form__input" placeholder="username Name"
                    required>
            </div>

            <div class="form__field">
                <input id="login__password" type="password" name="password" class="form__input" placeholder="Password"
                    required>
            </div>


            <div class="form__field">
                <input type="submit" name="submit" value="Sign UP">
            </div>

        </form>

        <p class="text--center">Already a member? <a href="login.php">Sign in now</a> <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg></p>

    </div>
</body>

<body>
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
                <li><a class="menu__item" href="./login.php">Login/Signup</a></li>
            </ul>
        </div>
    </div>
</body>

</html>