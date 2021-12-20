<?php
 
  include('connection.php'); 
  session_start();

  if (isset($_SESSION['uname'])) {
      $name = $_SESSION['uname'];
  }
  if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $query = "SELECT count(*) as cnt FROM `student` WHERE Email = '".$email."'";
    $result = mysqli_query($con,$query); 
    $row = mysqli_fetch_array($result);
 
    if($row['cnt'] == 0){
      echo '<span class="text-success">Email <b>'.$email.'</b> is available!</span>';
    } else {
      echo '<span class="text-danger">Email <b>'.$email.'</b> is already taken!</span>';
    }
  }
?>