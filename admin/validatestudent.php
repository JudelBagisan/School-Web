<?php


//Connection for Admin DB
include 'adminconnectdatabase.php';

//Connection for Official Students DB
$connect_validate = mysqli_connect("localhost","root","","admin");

//Connection for Grades DB
$connect_grades = mysqli_connect("localhost","root","","students");
if(!$connect_validate){
    die("Fatal Error : ". $connect_validate->connect_error);
}
if(!$connect_grades) {
    die("Fatal Error : ". $connect_grades->connect_error);
}

if(isset($_GET['validate'])){

    $targetid = $_GET['validate'];

    //For official Students DB
    $duplicate_query = "SELECT * FROM officialstudents where id = $targetid";
    $duplicate_result = mysqli_query($connect_validate, $duplicate_query);
    //For grades DB
    $duplicate_grades = "SELECT * FROM studentgrades where id = $targetid";
    $result_grades = mysqli_query($connect_grades, $duplicate_grades);

    //Condition if id already exist in DB
    if(mysqli_num_rows($duplicate_result) == 0) {
        $query = "select * from enrollstep1 where id = $targetid";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result);
        if($row) {
            $fullname = $row['firstName'] . " " . $row['midName'] . " " . $row['lastName'];
            $validation_query = "INSERT INTO officialstudents (id, fullName, email) VALUES ('" . $row['id'] . "', '" . $fullname . "', '" . $row['email'] . "')";
            $grade_query = "INSERT INTO studentgrades (id, fullName) VALUES ('" . $row['id'] . "', '" . $fullname . "')";
            
            $graderesult = mysqli_query($connect_grades, $grade_query);
            $targetresult = mysqli_query($connect_validate, $validation_query);
            
            if($targetresult || $graderesult){
                header("Location: adminpanel.php?success=Student $targetid Added Successfully!");
            }else {
                header("Location: adminpanel.php?success=Unable to Add this Student!");
            }
        }
    }else {
        header("Location: adminpanel.php?success=Unable to Add, Student Already Exist!");
    }
}

?>