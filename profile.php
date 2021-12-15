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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav_style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            background: linear-gradient(to bottom, #0d2d40, #0c0c0c);
        }
    </style>
    <title>Tutorio | Login</title>
</head>

<body id="cover">

    <div class="nav">
        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>
            <ul class="menu__box">
                <li><a class="menu__item" href="./home.php">Home</a></li>
                <li><a class="menu__item" href="#">Find Tutors</a></li>
                <li><a class="menu__item" href="./Aboutus.php">About US</a></li>
                <li><a class="menu__item" href="./contact.php">Contact US</a></li>
                <?php
                if (!isset($_SESSION['uname'])) {
                    echo '<li><a class="menu__item" href="./login.php">Login/Signup</a></li>';
                    echo '<li><a class="menu__item" href="./tutorsignup.php">Signup as Tutor</a></li>';
                } else {
                    echo '<li><a class="menu__item" href="./editProf.php">' . $name . '</a></li>';
                    echo '<li><a class="menu__item" href="./login.php"><?php session_destroy(); ?>Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="student-profile py-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                            <img class="profile_img" src="./img/team2.jpg" alt="pic">
                            <h3><?php echo strtoupper($first ." ". $last);?></h3>
                        </div>
                        <div class="card-body">
                            <p class="mb-0"><strong class="pr-1">Student Email: </strong><?php echo $email?></p>
                            <p class="mb-0"><strong class="pr-1">Phone Number: </strong><?php echo $number?></p>
                            <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Roll</th>
                                    <td width="2%">:</td>
                                    <td>125</td>
                                </tr>
                                <tr>
                                    <th width="30%">Academic Year </th>
                                    <td width="2%">:</td>
                                    <td>2020</td>
                                </tr>
                                <tr>
                                    <th width="30%">Gender</th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($gender);?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Country</th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($country);?></td>
                                </tr>
                                <tr>
                                    <th width="30%">blood</th>
                                    <td width="2%">:</td>
                                    <td>B+</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div style="height: 26px"></div>
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class="editProf">
                        <a href="editProf.php"><button class="btn btn-primary">Edit Profile</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>