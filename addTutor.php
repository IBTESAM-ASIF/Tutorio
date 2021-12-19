<?php 
session_start();
include('connection.php');
if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
  if(isset($_POST['course_buy'])){
    $email = $_POST['teacher'];
    $subID = $_POST['sub'];
    $id = $_POST['course_buy'];                 
      $query2 = "INSERT INTO `teacher_student` (`teacherEmail`, `studentEmail`, `subID`) VALUES ('".$email."', '$name' , $subID);";

      $query2 .= "INSERT INTO `student_course` (`studentEmail`, `subID`) VALUES ('$name', ".$id.");";
      if ($con->multi_query($query2) == true) {
        header("Location: \Project\Final_Design\home.php");
    } else {
        echo "error, $query2 <br> $con->error()";
    }
  }
}
