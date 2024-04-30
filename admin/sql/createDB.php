<?php

    $databasecreate = new mysqli('localhost', 'root', '');
    if($databasecreate->connect_error){
        die("Error Executing: ". $databasecreate->connect_error);
    }

    $database = "CREATE DATABASE IF NOT EXISTS adminschool";
    if(!$databasecreate->query($database) === TRUE) {
        echo "ERROR CREATING DATABASE ". $databasecreate->error;
    }

    $conn = new mysqli('localhost', 'root', '', 'adminschool');
    if($conn->connect_error){
        die("Error Executing: ". $conn->connect_error);
    }

    $admindatabase = file_get_contents('../admin/sql/admindatabase.sql');
    if(!$conn->query($admindatabase) === TRUE) {
        echo "ERROR CREATING DATABASE ". $conn->error;
    }

    $enrollstep1 = file_get_contents('../admin/sql/enrollment.sql');
    if(!$conn->query($enrollstep1) === TRUE) {
        echo "ERROR CREATING DATABASE ". $conn->error;
    }

    $officialstudents = file_get_contents('../admin/sql/officialstudents.sql');
    if(!$conn->query($officialstudents) === TRUE) {
        echo "ERROR CREATING DATABASE ". $conn->error;
    }
?>