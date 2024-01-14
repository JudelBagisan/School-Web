<?php
    $conn = mysqli_connect("localhost","root","","enrolldb");
    
    if ($conn->connect_error) {
        die("Fatal error, unable to connect to database : ". $conn->connect_error);
    }

?>