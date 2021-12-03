<?php
    if(isset($_POST['submit'])){
        
        $server = "localhost";
        $username = "root";
        $password ="";
    
        $con = mysqli_connect($server,$username,$password,"tutorio");
    
        if(!$con){
            die("Connection failed!". mysqi_connect_error());
        }
        
        $username = $_POST['uname'];
        $password = $_POST['psw'];
        echo "$username";
        echo "$password";
        //for sql injection
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  

        $sql = "select * from login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

        if($count == 1){  
            header("Location: /DB-Project/after.html"); 
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }  
        $con->close();
    }
?>