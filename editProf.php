<?php
include 'connection.php';
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
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
$Password = $row['Password'];


if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image=basename( $_FILES["imageUpload"]["name"],".jpg"); // used to store the filename in a variable

    $sql = "UPDATE student SET First_Name='$first', Last_Name='$last', Phone_Number='$phone', Age='$age', Gender='$gender', Country='$country', Email='$email', Password='$password', imageUpload='$image' where email='$name';";

    

    if ($con->query($sql) == true) {
        header("Location: home.php");
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
        <h1>Edit Profile</h1>
        <form action="editProf.php" method="POST" class="form login" enctype='multipart/form-data'>

            <div class="form__field">
                <label id="login__username" class="form__input" for="upload">Upload Your Picture</label><br>
                <input id="imageUpload" type="file" name="imageUpload" class="form__input" placeholder="Picture Upload" accept=".png,.jpeg,.jpg">
            </div>

            <div class="form__field">
                <label for="">First Name:</label>
                <input id="login__username" type="text" name="first" class="form__input" value="<?php echo $first?>" required>
            </div>

            <div class="form__field">
            <label for="">Last Name:</label>
                <input id="login__username" type="text" name="last" class="form__input" placeholder="Last Name" value="<?php echo $last?>" required>
            </div>

            <div class="form__field">
            <label for="">Age:</label>
                <input id="login__username" type="text" name="age" class="form__input" placeholder="age" value="<?php echo $age?>" required>
            </div>

            <div class="form__field">
            <label for="">Phone Number:</label>
                <input id="login__username" type="text" name="phone" class="form__input" placeholder="phone" value="<?php echo $number?>" required>
            </div>

            <div class="form__field">
            <label for="">Gender:</label>
                <input id="login__username" type="text" name="gender" class="form__input" placeholder="gender" value="<?php echo $gender?>" required>
            </div>

            <div class="form__field">
            <label for="">Country:</label>
                <input id="login__password" type="text" name="country" class="form__input" placeholder="country" value="<?php echo $country?>" required>
            </div>

            <div class="form__field">
            <label for="">Email:</label>
                <input id="login__username" type="text" name="email" class="form__input" placeholder="Description" value="<?php echo $email?>" required>
            </div>

            <div class="form__field">
            <label for="">Password:</label>
                <input id="login__username" type="text" name="password" class="form__input" placeholder="Language" value="<?php echo $Password?>" required>
            </div>

            <div class="form__field">
                <input type="submit" name="submit" value="Update">
            </div>

        </form>
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
        <li><a class="menu__item" href="./editProf.php">Find Tutors</a></li>
        <li><a class="menu__item" href="./Aboutus.php">About US</a></li>
        <li><a class="menu__item" href="./contact.php">Contact US</a></li>
        <?php
        if (!isset($_SESSION['uname'])) {
          echo '<li><a class="menu__item" href="./login.php">Login/Signup</a></li>';
          echo '<li><a class="menu__item" href="./editProf.php">Signup as Tutor</a></li>';
        } else {
          echo '<li><a class="menu__item" href="./editProf.php">' . $name . '</a></li>';
          echo '<li><a class="menu__item" href="./login.php">Logout</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</body>

</html>