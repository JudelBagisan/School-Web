<?php

    $conn = mysqli_connect("localhost","root","","students");

    if(!$conn) {
        die("Fatal Error : ". $conn->connect_error);
    }

    if(isset($_GET['validateid'])) {
        
    }
?>