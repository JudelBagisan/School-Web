<?php
        if (isset($_POST['username']) && isset($_POST['password'])) {
            function validate($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $username = validate($_POST['username']);
            $password = validate($_POST['password']);

            if(empty($username)){
                header("Location: adminlogin.php?error=Username is required!");
                exit();
            }else if(empty($password)){
                header("Location: adminlogin.php?error=Password is required!");
                exit();
            } else {
                $conn = mysqli_connect('localhost', 'root', '', 'admin');

                if ($conn->connect_error) {
                    die('Fatal error, unable to connect to database : '. $conn->connect_error);
                }else {
                    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        
                        header("Location: adminlogin.php?redirect=Login Successful!");
                        exit();
                    }else {
                        header("Location: adminlogin.php?info=Invalid Username or Password!");
                        exit();
                    }
                }
            }
        }
?>