<?php
    $conn = mysqli_connect("localhost","root","","enrolldb");

    if ($conn->connect_error) {
        die("Fatal error, unable to connect to database : ". $conn->connect_error);
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $dbinfo = "SELECT firstName, id, midName, lastName, sex, birthdate, course, address, email, cNumber FROM enrollstep1 WHERE id='$id'";
        $result = mysqli_query($conn, $dbinfo);
        $disp = mysqli_fetch_array($result);

        $firstName = $disp['firstName'];
        $midName = $disp['midName'];
        $lastName = $disp['lastName'];
        $uid = $disp['id'];
        $sex = $disp['sex'];
        $course = $disp['course'];
        $birthdate = $disp['birthdate'];
        $email = $disp['email'];
        $address = $disp['address'];
        $cNumber = $disp['cNumber'];
        $fullName = $firstName . " " . $midName . " " . $lastName;
        
        if($course == "BSIT") {
            $coursedisp = "Bachelor of Science in Information Technology";
        }else if($course == "BEED") {
            $coursedisp = "Bachelor of Science in Elementary Education";
        }else if($course == "BSED") {
            $coursedisp = "Bachelor of Science in Secondary Education";
        }
        
    }

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "shortcut icon" type = "icon" href = "media/logo.png">
    <title>Profile</title>
    <style>
        body {
            font-family: Open Sans;
            margin:0;
            padding:0;
            overflow-x: hidden;
        }

        .navbar {
            overflow: hidden;
            background-color:#7d0a0a;
        }

        .navbar p {
            display: inline-flex;
            font-size: 20px;
            margin-left: 1vw;
            color: white;
            text-align: center;
            margin-top: 3vh;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .menu-icon {
            width: 3vw;
            height: 1vh;
            background-color: white;
            margin: 1vh 0;
        }

        .dropdown .dropbtn {
            border: none;
            outline: none;
            color: white;
            padding: 2vh 5vh;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .icon img {
            width: 2vw; 
            height: auto;
            margin-top: 1vh;
            margin-bottom: -1vh;
            margin-right: 1vw;
            display: inline-block;
        } 

        .icon2 img {
            width: 2vw; 
            height: auto;
            margin-top: -1vh;
            margin-bottom: -1.7vh;
            margin-right: 1vw;
            display: inline-block;
        } 

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 9vw;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            align-items: center;
            font-size: 3.2vh;
            font-weight: 600;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 2vh 7.1vh;
            text-decoration: none;
            display: block;
            align-items: center;
            text-align: left;
            margin-left: -1vw;
        }

        .dropdown-content a:hover,
        .dropdown-content2 a:hover {
            background-color: #ddd;
        }

        .dropdown2:hover .dropdown-content2,
        .dropdown:hover .dropdown-content {  
            display: block;
            
        }

        .school-name {
            color: white;
            padding: 2vh 1vw;
            font-size: 20px;
            margin-left: 1vw;
        }

        .dropdown2 {
            float: right;
            overflow: hidden;
        }

        .dropdown2 .dropbtn2 {
            font-size: 16px;  
            border: none;
            outline: none;
            color: white;
            padding: 3vh 5vh;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
            display: flex;
            cursor: pointer;
        }

        .name-icon img {
            width: 2vw; 
            height: auto;
            margin-right: 1vw;
            margin-top: 1vh;
        }

        .name {
            width: 3vw;
            height: 1vh;
            margin: 1vh 0;
            margin-right: 2.2vw;
            font-size: 20px;
        }

        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 9vw;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 0;
            margin-top:1vh;
        }

        #school-name {
            font-weight: bold;
            font-size: 3.9vh;
        }

        .dropdown-content2 a {
            float: none;
            color: black;
            padding: 2vh 7.1vh;
            text-decoration: none;
            display: block;
            margin-top: -1vh;
            text-align: right;
            margin-right:1vw;
        }

        .main-container {
            width: 100vw;
            height: 150vh;
            position: absolute;
            
        }

        .main-profile-container {
            background-color: white;
            position: absolute;
            box-shadow: 1px 1px 5px black;
            width: 70vw;
            height: 110vh;
            left: 50%;
            transform: translate(-50%, 0);
            border-radius: 25px;
            margin-top: 20vh;
        }

        .profile-contents {
            width: 58vw;
            height: 82vh;
            position: absolute;
            left: 50%;
            top: 12vh;
            transform: translate(-50%, 0);
           
        }

        .pfp-container {
            border-bottom: 10px solid #7d0a0a;
            width: 58vw;
            height: 40vh;
            position: absolute;
        }

        #pfp-pic {
            width: 35vh;
            height: 35vh;
            border-radius: 50%;
            position: absolute;
            display: inline-block;
        }

        .important-info {
            position: absolute;
            margin-left: 20vw;
        }

        #fullName {
            margin-top: 4vh;
            font-size: 6vh;
            font-weight: 1000;
        }

        #idNumber {
            margin-top: -6vh;
            font-size: 5vh;
            font-weight: 800;
            color: #7d0a0a;
        }

        #course {
            margin-top: -5vh;
            font-size: 3.8vh;
            font-weight: bold;
        }

        #table-profile {
            margin-top: 40vh;
            width: 58vw;
            height: 20vw;
        }

        .row {
            margin-top: 6vh;
            float: left;
            width: 50%;
            height: 38vh;
            background-color: #fff;
        }
        
        .title-info {
            font-weight: 1000;
            font-size: 3vh;
        }

        .info {
            margin-top: -3vh;
            font-weight: bold;
            font-size: 2.5vh;
        }

        #cNumber, #email {
            color: #137bd1;
        }

        #download-btn {
            padding: 1.5vh 6vh;
            margin-left: 50%;
            transform: translate(-50%, 0);
            color: white;
            border-radius: 50vh;
            background-color: #7d0a0a;
            font-weight: bolder;
            cursor: pointer;
        }

        #download-btn:hover {
            border-color: #fff9;
        }

        #download-btn:hover::before {
            animation: shine 1.5s ease-out infinite;
        }

        #download-btn::before {
            content: "";
            position: absolute;
            width: 16.3vh;
            height: 100%;
            background-image: linear-gradient(
            120deg,
            rgba(255, 255, 255, 0) 30%,
            rgba(255, 255, 255, 0.8),
            rgba(255, 255, 255, 0) 70%
            );
            top: 0;
            left: -16.3vh;
            opacity: 0.6;
        }
  
        @keyframes shine {
            0% {
            left: -16.3vh;
            }
            60% {
            left: 100%;
            }  
            to {
            left: 100%;
            }
        }
  
    </style>
    <script type="text/javascript" src="https://cdnjs.com/libraries/html2canvas"></script>
</head>
<body>
    <div class="main-container">
        <div class="navbar">
            <p id="school-name">STANFORD UNIVERSITY OF SAMAL</p>

            <div class="dropdown">
            <div class="dropbtn">
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <i class="ddown"></i> 
            </div>

            <div class="dropdown-content">
                <a href="#" class="icon"><img src="media/person.png"> Profile </a>
                <a href="appointment.html" class="icon"><img src="media/appointment.png"> Make an appointment </a>
                <a href="#" class="icon"><img src="media/grade.png"> Grades </a>
                <a href="#" class="icon"><img src="media/prospectus.png"> Prospectus </a>
                </div>
            </div>

            <div class="dropdown2">
            <div class="dropbtn2">  
                <div class="name-icon"><img src="media/person.png"></div>
                <div class="name"><?php echo $id ?></div>
                <i class="ddown2"></i>
            </div>
            <div class="dropdown-content2">
                <a href="home.html" class="icon2"><img src="media/logout.png"> Logout </a>
            </div>
            </div>
        </div>
        <div class="main-profile-container">
            <div class="profile-contents">
                <div class="pfp-container">
                    <img src="media/corgi.png" id="pfp-pic" name="pfp-pic">
                    <div class="important-info">
                        <p id="fullName"><?php echo $fullName ?></p>
                        <p id="idNumber"><?php echo $uid ?></p>
                        <p id="course"><?php echo $coursedisp ?></p>
                    </div>
                </div>
                <div id="table-profile">
                    <div class="row">
                        <p class="title-info">Sex:</p>
                        <p class="info" id="sex"><?php echo $sex ?></p>
                        <p class="title-info">Birthdate:</p>
                        <p class="info" id="birthdate"><?php echo $birthdate ?></p>
                        <p class="title-info">Address</p>
                        <p class="info" id="address"><?php echo $address ?></p>
                    </div>
                    <div class="row">
                        <p class="title-info">Contact Number: </p>
                        <p class="info" id="cNumber"><?php echo $cNumber ?></p>
                        <p class="title-info">Email: </p>
                        <p class="info" id="email"><?php echo $email ?></p>
                    </div>
                    <div class="button-container">
                        <button type="button" id="download-btn">Download Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('button').addEventListener('click', function() {
            html2canvas(document.querySelector('.main-profile-container'), {
                onrendered: function(canvas) {
                    document.body.appendChild(canvas);
                return Canvas2Image.saveAsPNG(canvas);
                }
            });
        });

    </script>
</body>
</html>