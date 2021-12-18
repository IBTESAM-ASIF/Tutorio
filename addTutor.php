<?php 
include('connection.php');
session_start();
include './findtutors.php';
if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}
if(isset($_POST['course_buy'])){
    $query2 = "INSERT INTO `cart` (`subjectID`, `Email`) VALUES ('$id', '$name');";
    if ($con->query($query2) == true) {
      echo "success";
  } else {
      echo "error, $sql <br> $con->error()";
  }
  }
?>