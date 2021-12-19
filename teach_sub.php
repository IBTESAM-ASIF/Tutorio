<?php 
include './connection.php';
session_start();
if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
}

if(isset($_POST['submit'])){
    
    $subID = $_POST['subID'];
    $query = "INSERT INTO `teacher_course` (`teacherEmail`, `subID`, `lecture`) VALUES ('$name',".$subID.", '');";
    
    if ($con->query($query) == true) {
        
        header("Location: ./tutorhome.php");
    } else {
        echo "error, $query <br> $con->error()";
    }
}

?>