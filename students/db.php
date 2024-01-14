<?php
    $con = mysqli_connect("localhost", "root", "", "admin");
    
    if(!$con) {
        die('Fatal Error : '. $con->connect_error);
    }
?>