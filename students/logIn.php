<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $log_in_studentID = $_POST['log_in_studentID'];
    $log_in_password = $_POST['log_in_password'];

    if (!empty($log_in_studentID) && !empty($log_in_password)) {
        $query = "select * from officialstudents where id = '$log_in_studentID' limit 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] == $log_in_password) {
                header("location: profile.php?id=$log_in_studentID");
                die;
            } else {
                echo "<script type='text/javascript'> alert('wrong ID number or password ');
                
                redirect_Page();
                        
                function redirect_Page () {
                    var redirector = setTimeout(function () {
                        window.location.href = 'login.html';
                        window.clearTimeout(redirector);
                    }, 10);
                }
                </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('User not found')

            redirect_Page();
                        
                function redirect_Page () {
                    var redirector = setTimeout(function () {
                        window.location.href = 'login.html';
                        window.clearTimeout(redirector);
                    }, 10);
                }
            </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Please enter both Id number and password')
        
        redirect_Page();
                        
                function redirect_Page () {
                    var redirector = setTimeout(function () {
                        window.location.href = 'login.html';
                        window.clearTimeout(redirector);
                    }, 10);
                }
        
        </script>";
    }
}
?>
