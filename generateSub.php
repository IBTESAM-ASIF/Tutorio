<?php
include 'connection.php';
    $sql = "SELECT * FROM subject;";
    $result = $con->query($sql) or die($con->error);
    $CategoriesList = array();
    $CategoriesList2 = array();

    while($row = $result->fetch_assoc()) {
        array_push($CategoriesList, $row["description"]);
        array_push($CategoriesList2, $row["subID"]);
    }
?>