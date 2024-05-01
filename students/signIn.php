<?php
    require_once("../admin/sql/createDB.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sign_in_studentID = $_POST['sign_in_studentID'];
    $sign_in_password = $_POST['sign_in_password'];
    $sign_in_confirmPassword = $_POST['sign_in_confirmPassword'];


    if (!empty($sign_in_studentID) && !empty($sign_in_password) && !empty ($sign_in_confirmPassword)) {
        
        if($sign_in_password == $sign_in_confirmPassword) {
            
            $sql = "SELECT * FROM officialstudents WHERE id = '$sign_in_studentID'";

            $result = $conn->query($sql);
            if($result) {
                if(mysqli_num_rows($result) > 0) {
                    $query = "UPDATE officialstudents SET password = '$sign_in_password' WHERE id = '$sign_in_studentID'";
                    
                    if (mysqli_query($conn, $query)) {
                        $_SESSION['signup_success'] = true;
                    }
                } else {
                    $_SESSION["ID number doesn't exist!"] = true;
                }
            } else{
                die("Error");
            }
        }else {
            $_SESSION['Password do not match!'] = true;
        }
        
    }
    else {
        echo "<script type = 'text/javascript'> alert ('Please Enter some Valid Information') <script>";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Details</title>

    <style>

        body {
            background-image: url(media/school.png);
            padding: 0;
            margin: 0;
            font-family: Open Sans;
        }
        .container {
            width: 30vw;
            height: 25vh;
            background-color: white;
            border-radius: 10px;
            position: fixed;
            top: 0;
            margin-top: 35vh;
            margin-left: 50%;
            transform: translate(-50%, 0);
            box-shadow: 2px 2px 5px #000;
        }

        .header-title {
            background-color: #7d0a0a;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 6vh;
            font-size: 4vh;
            color: white;
            font-weight: bolder;
            text-align: center;
        }

        h1 {
            margin-top: 5vh;
            font-size: 2.5vh;
            text-align: center;
        }

        p {
            text-align: center;
        }

        p:before {
            font-size: 2vh;
            text-align: center;
            color: blue;
            content: "This page will automatically reload please wait . .";
            animation: dotdotdot 3s infinite;
        }

        @keyframes dotdotdot {
            0% {content: "This page will automatically reload please wait . . ."};
            33% { content: "This page will automatically reload please wait . .";}
            66% {content: "This page will automatically reload please wait ."}
        }
        
    </style>
</head>
<body>
<?php
    if (isset($_SESSION['signup_success']) && $_SESSION['signup_success'] === true) {
        echo '
            <div class="container" id="container">
                <div class="header-title"> </div>
                <h1>Submitted Successfully!</h1>
                <p></p>
            </div>

            <script>
                redirect_Page();
                
                function redirect_Page() {
                    var redirector = setTimeout(function () {
                        window.location.href = "logIn.html";
                        window.clearTimeout(redirector);
                    }, 4000);
                }
            </script>';
        unset($_SESSION['signup_success']);
    }
    ?>
    </script>
</body>
</html>