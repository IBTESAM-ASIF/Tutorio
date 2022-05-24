<?php 
include ('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}
if(!isset($_SESSION['uname'])){
  header("Location: login.php");
}

if(isset($_POST['submit'])){
    
    $subID = $_POST['subID'];
    // $lecture = $_POST['lecture'];

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