<?php
include 'connection.php';




$rand = rand();
if (isset($_POST['submit'])) {
    $name = $_POST['uname'];    
}

//Include required PHPMailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
// require_once '../class.phpmailer.php';
$mail = new PHPMailer(true);
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "ssl://smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "owaiskhan.temp02@gmail.com";
//Set gmail password
$mail->Password = "Pakistan12300";
//Email subject
$mail->Subject = "Test email using PHPMailer";
//Set sender email
$mail->setFrom('owaiskhan.temp02@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Email body
$mail->Body = "$rand";
//Add recipient
$mail->addAddress("hasanaskarii112@gmail.com");
//Finally send email
if ( $mail->send() ) {
    echo "Email Sent..!";
}else{
    echo "Message could not be sent. Mailer Error: ";
}
echo $mail->ErrorInfo;
//Closing smtp connection
$mail->smtpClose();


if (isset($_POST['update'])) {
    $num = $_POST['num'];
    $pass = $_POST['password'];

    $sql = "update student set 'Password' = '$pass' where Email = '$name' ";

    if ($rand = $num) {
        if ($con->query($sql) == true) {

            header("Location: ./login.php");
        } else {
            echo "wrong otp";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="./forgot.php" method="post">
            <label for="">Input Code</label>
            <input type="text" name="num" required>

            <label for="">Enter New Password</label>
            <input name="password" type="password" required>

            <input type="submit" name="update" value="Update Password">
        </form>
    </div>
</body>

</html>