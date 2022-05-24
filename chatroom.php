<?php
session_start();

if (isset($_SESSION['uname'])) {
    $name = $_SESSION['uname'];
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #2c3338;
        }

        .heading {
            color: white;
            text-align: center;
            font-family: 'Merriweather', serif;
        }
    </style>
    <title>Tutorio | Contact</title>
</head>

<body>
    
    <h2>hellos</h2>
   
    <script type="text/javascript">
        alert("<?php echo $uname; ?>");
    </script>
</body>

</html>