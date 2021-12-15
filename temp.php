<?php 
include 'connection.php';
session_start();
if(isset($_POST['upload'])){
    $target = "img/profiles/".[basename($_FILES['image']['name']);

    
}


?>