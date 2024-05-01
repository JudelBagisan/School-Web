<?php

require_once("../admin/sql/createDB.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $log_in_studentID = $_POST['log_in_studentID'];
    $log_in_password = $_POST['log_in_password'];

    if (!empty($log_in_studentID) && !empty($log_in_password)) {
        $query = "select * from officialstudents where id = '$log_in_studentID' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] == $log_in_password) {
                header("location: profile.php?id=$log_in_studentID");
                die;
            } else {
                header("Location: logIn.php?success=Invalid ID or Password!<br>Try Again");
            }
        } else {
            header("Location: logIn.php?success=User $log_in_studentID is not found!<br>Please input a valid Student ID!");
        }
    } else {
        header("Location: logIn.php?success=Enter Username and Password!");
    }
}
?>
