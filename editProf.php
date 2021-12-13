<?php
include("connection.php");
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
  }
  
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
    // $username = $_POST['username'];
    $password = $_POST['password'];
    // $image = $_POST['image'];

//{    // $statusMsg = '';
    // $targetDir = "uploads/";
    // $fileName = basename($_FILES["file"]["name"]);
    // $targetFilePath = $targetDir . $fileName;
    // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // $allowTypes = array('jpg','png','jpeg');
    // if(in_array($fileType, $allowTypes))
    // {
    //     if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
    //     {
    //         $insert = $db->query("INSERT into tutor (image) VALUES ('$image')");
    //         if($insert)
    //         {
    //             $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
    //         }
    //         else
    //         {
    //             $statusMsg = "File upload failed, please try again.";
    //         } 
    //     }
    //     else
    //     {
    //         $statusMsg = "Sorry, there was an error uploading your file.";
    //     }
    // }
    // else
    // {
    //     $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.';
    // }
    
    // echo $statusMsg;
//}    

//    $sql = "UPDATE 'tutor' SET 'first'='$first', 'last'='$last', `age`='$age', `phone`='$phone', `gender`='$gender', `country`='$country', `description`='$description', `language`='$language', `fee`='$fee', `source`='$source', `password`='$password'  WHERE username='$name'";
    $sql = "UPDATE tutor SET first='$first', last='$last', age='$age', phone='$phone', gender='$gender', country='$country', description='$description', language='$language', fee='$fee', source='$source', password='$password' where username='$name';";
//    $sql = "INSERT INTO `tutor` (`first`, `last`, `age`, `phone`, `gender`, `country`, `description`, `language`, `fee`, `source`, `username`, `password`) VALUES ('$first', '$last', '$age', '$phone', '$gender', '$country', '$description', '$language', '$fee', '$source', '$username', '$password')";

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
        <form action="editProf.php" method="POST" class="form login">

            <div class="form__field">
                <label id="login__username" class="form__input" for="upload">Upload Your Picture</label><br>
                <input id="login__username" type="file" name="image" class="form__input" placeholder="Picture Upload" accept=".png,.jpeg,.jpg" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="first" class="form__input" placeholder="First Name" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="last" class="form__input" placeholder="Last Name" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="age" class="form__input" placeholder="age" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="phone" class="form__input" placeholder="phone" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="gender" class="form__input" placeholder="gender" required>
            </div>

            <div class="form__field">
                <input id="login__password" type="text" name="country" class="form__input" placeholder="country" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="description" class="form__input" placeholder="Description" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="language" class="form__input" placeholder="Language" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="fee" class="form__input" placeholder="fee" required>
            </div>

            <div class="form__field">
                <input id="login__username" type="text" name="online/onsite" class="form__input" placeholder="Online/Onsite" required>
            </div>
<!-- 
            <div class="form__field">
                <input id="login__username" type="text" name="username" class="form__input" placeholder="username" required>
            </div> -->

            <div class="form__field">
                <input id="login__username" type="text" name="password" class="form__input" placeholder="password" required>
            </div>

            <div class="form__field">
                <label id="login__username" class="form__input" for="upload">Upload Your resume here</label><br>
                <input id="login__username" type="file" name="CV" class="form__input" placeholder="Resume upload" accept=".pdf,.doc" required>
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