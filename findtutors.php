<?php
include('connection.php');
session_start();

if (isset($_SESSION['uname'])) {
  $name = $_SESSION['uname'];
}

$sql = "select t.*, s.* from tutor t join teacher_course tc on t.email = tc.teacherEmail join subject s on tc.subID = s.subID";
$result = $con->query($sql) or die($con->error);

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
  <title>Tutorio</title>
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
          echo '<li><a class="menu__item" href="./profile.php">' . $name . '</a></li>';
          echo '<li><a class="menu__item" href="./login.php">Logout</a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
  <table class="find">
    <tr>
      <th colspan="20">
        <h2>Tutors</h2>
      </th>
    </tr>
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Domain</th>
      <th>Subject</th>
      <th>Gender</th>
      <th>Country</th>
      <th>Language</th>
      <th>Fee</th>
      <th>Source</th>
      <th>Book</th>
    </tr>
    <?php
    while ($rows = mysqli_fetch_assoc($result)) {
      $id = $rows['subID'];
      $email = $rows['email'];
      $subId = $rows['subID'];
    ?>
      <tr>
        <td style="padding: 0;"><img src="uploads/<?php echo $rows['imageUpload'] ?>" style="height: 60px; width: 100px"></td>
        <td><?php echo strtoupper($rows['first']) . " " . strtoupper($rows['last']); ?></td>
        <td><?php echo $rows['domain'] ?></td>s
        <td><?php echo strtoupper($rows['description']) ?></td>
        <td><?php echo strtoupper($rows['gender']) ?></td>
        <td><?php echo strtoupper($rows['country']) ?></td>
        <td><?php echo $rows['language'] ?></td>
        <td><?php echo $rows['fee'] ?></td>
        <td><?php echo $rows['source'] ?></td>
        <form action="./addTutor.php" method="post">
        <td><button type="submit" name="course_buy" value=<?php echo $id ?>>Buy This Course</button></td>
        <input type="hidden" name="teacher" value=<?php echo $email ?>>
        <input type="hidden" name="sub" value=<?php echo $subId ?>>
        </form>
      </tr>
    <?php
    }
    ?>
  </table>

  </script>
</body>

</html>