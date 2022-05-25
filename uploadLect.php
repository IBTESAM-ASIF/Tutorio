<?php
include './connection.php';
include './generateSub.php';
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}
if(!isset($_SESSION['uname'])){
  header("Location: login.php");
}

if(isset($_POST['submit'])){
    
    $subID = $_POST['subID'];
    $lecture = $_POST['lecture'];

    $target_dir = "uploads/lectures/";
    $target_file = $target_dir . basename($_FILES["lecture"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["lecture"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["lecture"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $video = basename($_FILES["lecture"]["name"], ".mp4");

    $query = "INSERT INTO `teacher_course` (`teacherEmail`, `subID`, `lecture`) VALUES ('$name',".$subID.", '$video');";

    if ($con->query($query) == true) {
        
        header("Location: ./tutorhome.php");
    } else {
        echo "error, $query <br> $con->error()";
    }
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
    <link rel="stylesheet" href="page.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .section {
            margin-top: 15%;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="nav">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="./home.php">Home</a></li>
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
    <div class="section">
        <h2>Upload Your Lectures Here</h2>
        <form action="./teach_sub.php" method="POST" enctype="multipart/form-data">
            <label for="subID">Select Course: </label>
            <select style="margin: auto;" name="subID" id="subID">
                <?php
                for ($i = 0; $i < count($CategoriesList); $i++) {
                    $tempCatName = str_replace(" ", "+", $CategoriesList[$i]);
                    echo "<option value=" . $CategoriesList2[$i] . ">" . $CategoriesList[$i] . "</option>";
                    echo $CategoriesList2[$i];
                }
                ?>
            </select>
            <br><br>
            <div class="form__field">
                <label id="login__username" class="form__input" for="upload">Upload Your Lecture Here: </label><br>
                <input id="lecture" type="file" name="lecture" class="form__input" placeholder="Lecture Upload" accept=".mp4">
            </div>
            <br>
            <br>
            <input type="submit" name="submit" value="Submit" style="background-color: green; color: white; border-radius: 5px">
        </form>
    </div>
</body>

</html>