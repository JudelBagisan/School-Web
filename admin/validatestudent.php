<?php


//Connection for Admin DB
require_once("../admin/sql/createDB.php");

if(isset($_GET['validate'])){

    $targetid = $_GET['validate'];

    //For official Students DB
    $duplicate_query = "SELECT * FROM officialstudents where id = $targetid";
    $duplicate_result = mysqli_query($conn, $duplicate_query);

    //Condition if id already exist in DB
    if(mysqli_num_rows($duplicate_result) == 0) {
        $query = "select * from enrollstep1 where id = $targetid";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result);
        if($row) {
            $fullname = $row['firstName'] . " " . $row['midName'] . " " . $row['lastName'];
            $validation_query = "INSERT INTO officialstudents (id, fullName, sex, birthdate, course, address, email, cNumber, lrn) VALUES ('" . $row['id'] . "', '" . $fullname .  "', '" . $row['sex'] . "', '" . $row['birthdate'] . "', '" . $row['course'] . "', '" . $row['address'] . "', '" . $row['email'] . "', '" . $row['cNumber'] . "', '" . $row['lrn'] . "')";

            $targetresult = mysqli_query($conn, $validation_query);
            
            if($targetresult){
                header("Location: adminpanel.php?success=Student $targetid Added Successfully!");
            }else {
                header("Location: adminpanel.php?success=Unable to Add this Student!");
            }
        }
    }else {
        header("Location: adminpanel.php?success=Unable to Add, Student $targetid Already Exist!");
    }
}

?>