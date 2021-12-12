<?php 
include 'connection.php';
session_start();

    $uname = $_SESSION['uname'];
    echo $uname;

    $sql_query = "select * from students where Email ='".$uname."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);
    $first = $row['First_Name'];
    $last = $row['Last_Name'];
    $number = $row['Phone_Number'];
    $age = $row['Age'];
    $gender = $row['Gender'];
    $country = $row['Country'];
    
    echo $first . "" . $last;
        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="nav_style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <title>Tutorio | Login</title>
</head>

<body>


    
</body>
</html>