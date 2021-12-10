<?php      
        $server = "localhost";
        $username = "root";
        $password ="";
    
        $con = mysqli_connect($server,$username,$password,"tutorio");
    
        if(!$con){
            die("Connection failed!". mysqli_connect_error());
        }
?>