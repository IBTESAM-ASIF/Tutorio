<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $flag = 1;
    $first = $_POST['first'];
    $last = $_POST['last'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `student` (`First_Name`, `Last_Name`, `Phone_Number` , `Age`, `Gender` , `Country` , `Email` , `Password`) VALUES ('$first','$last', '$phone' , '$age', '$gender' , '$country' , '$email' , '$password');";


    if ($con->query($sql) == true) {

        header("Location: ./login.php");
    } else {
        echo "Email already used!";
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
    <style>
        body {
            background-color: #189AB4;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>Tutorio | Signup</title>
</head>

<body class="align">
    <div class="grid">
        <h1>Signup as Student</h1>
        <form action="./signup.php" method="POST" class="form login">

            <div class="form__field">
                <input id="login__username" type="text" name="first" class="form__input" placeholder="First Name" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="last" class="form__input" placeholder="Last Name" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="tel" name="phone" class="form__input" placeholder="phone" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="age" class="form__input" placeholder="age" required>
            </div>

            <div class="form__field">
                <label for="gender">Gender</label>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="other">other</option>
                </select>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="country" class="form__input" placeholder="country" required>
            </div>

            <div class="form__field">
                <input id="login__username username" type="email" name="email" class="form__input form-control mb-1" placeholder="Email" required>
                <div id="uname_result"></div>
            </div>

            <div class="form__field">
                <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
            </div>
            


            <div class="form__field">
                <input type="submit" name="submit" value="Sign UP" style="background-color: #05445E;">
            </div>

        </form>

        <p class="text--center">Already a member? <a href="login.php">Sign in now</a> <svg class="icon">
                <use xlink:href="#icon-arrow-right"></use>
            </svg></p>

    </div>
    
</body>
<script>
  $(document).ready(function () {
    $('#email').on('blur', function () {
      var email = $(this).val().trim();
      if (email != '') {
        $.ajax({
          url: 'username_checker.php',
          type: 'post',
          data: { email: email },
          success: function (response) {
            $('#uname_result').html(response);
          }
        });
      } else {
        $("#uname_result").html("");
      }
    });
  });
</script>
</html>