<?php

    //Start ang session or pagrun sa imo php or ambot unsa ni gicopy ra ko ni sa google
    session_start();

    include_once("../admin/sql/createDB.php");
    

    //error catching diria if mali na gibutang sa babaw then ipakita niya ang error murag printstack trace sa java
    if($conn->connect_error) {
        die('Fatal error, unable to connect to database : '. $conn->connect_error);
    }else {
        // pag gipindot nimo confirm button sa enroll na page i execute ni niya na if
        if(isset($_POST["submit-btn"])){
            
            //kuhaon niya tanan field nimo didto sa html murag variable ni siya sa php istore niya sulod sa field pasa sa variables
            $firstName = $_POST['firstName'];
            $midName = $_POST['midName'];
            $lastName = $_POST['lastName'];
            $sex = $_POST['sex'];
            $birthdate = $_POST['birthdate'];
            $course = $_POST['course'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $cNumber = $_POST['cNumber'];
            $lrn = $_POST['lrn'];

            //iinsert niya tanan variables sa database connect  sa mysql
            $query = "INSERT INTO enrollstep1 (firstName, midName, lastName, sex, birthdate, course, address, email, cNumber, lrn)
            VALUES ('$firstName', '$midName', '$lastName', '$sex', '$birthdate', '$course', '$address', '$email', '$cNumber', '$lrn')";
            $query_run = mysqli_query($conn, $query);

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
    
    <div class="container" id="container">
        <div class="header-title">Submitted Successfully!</div>
        <h1>Patienly wait for the email<br> given by the school</h1>
        <p></p>
    </div>

    <script>

        
        redirect_Page();
        
        function redirect_Page () {
        var redirector = setTimeout(function () {
            window.location.href = "home.html";
            window.clearTimeout(redirector);
        }, 10000);
        }
    </script>
</body>
</html>