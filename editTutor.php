<?php
include 'connection.php';
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}

$sql_query = "select * from tutor where Email ='" . $name . "'";
$result = mysqli_query($con, $sql_query);
$row = mysqli_fetch_array($result);
$first = $row['first'];
$last = $row['last'];
$number = $row['phone'];
$age = $row['age'];
$gender = $row['gender'];
$country = $row['country'];
$description = $row['description'];
$language = $row['language'];
$fee = $row['fee'];
$source = $row['source'];
$email = $row['email'];
$password = $row['password'];


if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $description = $_POST['description'];
    $language = $_POST['language'];
    $fee = $_POST['fee'];
    $source = $_POST['source'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["imageUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $image = $_FILES["imageUpload"]["name"];
    
    $sql = "UPDATE tutor SET first ='$first', last ='$last', phone ='$phone', age='$age', gender='$gender', country='$country', description='$description', language = '$language', fee = '$fee', source = '$source', email='$email', Password='$password', photo='$image' where email='$name';";

    if ($con->query($sql) == true) {
        header("Location: tutorhome.php");
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
        <form action="editTutor.php" method="POST" class="form login" enctype='multipart/form-data'>

            <div class="form__field">
                <label id="login__username" class="form__input" for="upload">Upload Your Picture</label><br>
                <input id="imageUpload" type="file" name="imageUpload" class="form__input" placeholder="Picture Upload" accept=".png,.jpeg,.jpg">
            </div>

            <div class="form__field">
                <label for="">First Name:</label>
                <input id="login__username" type="text" name="first" class="form__input" placeholder="First Name" value="<?php echo $first ?>">
            </div>

            <div class="form__field">
                <label for="">Last Name:</label>
                <input id="login__username" type="text" name="last" class="form__input" placeholder="Last Name" value="<?php echo $last ?>">
            </div>

            <div class="form__field">
                <label for="">Age:</label>
                <input id="login__username" type="text" name="age" class="form__input" placeholder="Age" value="<?php echo $age ?>">
            </div>

            <div class="form__field">
                <label for="">Phone Number:</label>
                <input id="login__username" type="tel" name="phone" class="form__input" placeholder="Phone" value="<?php echo $number ?>">
            </div>

            <div class="form__field">
                <label for="">Gender:</label>
                <input id="login__username" type="text" name="gender" class="form__input" placeholder="Gender" value="<?php echo $gender ?>">
            </div>

            <div class="form__field">
                <label for="">Country:</label>
                <input id="login__password" type="text" name="country" class="form__input" placeholder="Country" value="<?php echo $country ?>">
            </div>


            <div class="form__field">
                <label for="">Description:</label>
                <input id="login__username" type="text" name="description" class="form__input" placeholder="Description" value="<?php echo $description ?>">
            </div>

            <div class="form__field">
                <label for="">Language:</label>
                <input id="login__username" type="text" name="language" class="form__input" placeholder="Language" value="<?php echo $language ?>">
            </div>

            <div class="form__field">
                <label for="">Fee:</label>
                <input id="login__username" type="text" name="fee" class="form__input" placeholder="Fee" value="<?php echo $fee ?>">
            </div>

            <div class="form__field">
                <label for="">Source:</label>
                <input id="login__username" type="text" name="source" class="form__input" placeholder="Source" value="<?php echo $source ?>">
            </div>

            <div class="form__field">
                <label for="">Email:</label>
                <input id="login__username" type="email" name="email" class="form__input" placeholder="Email" value="<?php echo $email ?>">
            </div>

            <div class="form__field">
                <label for="">Password:</label>
                <input id="login__username" type="password" name="password" class="form__input" placeholder="Password" value="<?php echo $password ?>">
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
                <li><a class="menu__item" href="./tutorhome.php">Home</a></li>
                <li><a class="menu__item" href="./mylectures.php">My Lectures</a></li>
                <li><a class="menu__item" href="./studentcircle.php">Student Circle</a></li>

                <?php
                if (isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./tutorProfile.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="./logout.php"><?php session_destroy(); ?>Logout</a></li>';
                } else {
                    echo '<li><a class="menu__item" href="./tutorlogin.php">Sign in as tutor</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>