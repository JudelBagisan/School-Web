<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel = "shortcut icon" type = "icon" href = "media/logo.png">
    <link rel="stylesheet" href="Log-inAndSign_in.css">
</head>

<body>
    <div class="prompt-container" id="prompt">
        <div class="content">
            <div id="close-btn" onclick="closeOpen()">X</div>
            <?php
                if(isset($_GET['success'])){ ?>
                    <style>
                        #prompt {
                            display: block;
                            text-align: center;
                        }
                    </style>
                    <p style="margin-top: 8vh; color: #bf3131; font-weight: bolder;"><?php echo ($_GET['success']); ?></p>
                    

            <?php } ?>
        </div>
    </div>
    <div class="header">
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="Courses.html">Courses</a></li>
                <li><a href="About.html">About</a   ></li>
                <li><a href="enroll.html">Enroll</a></li>
            </ul>
        </nav>
        <img id = "logo2" src="media/logo.png">
    </div>

    <div class="log-inCont" id="log-incont" >
        <div class="log-in">
            <div  id="log-inLabel">
                 <p>LOGIN</p>
            </div>
        <form method ="post" action = "logInValidate.php"> 
            <div class="in">
                <input type="text" placeholder="Student ID Ex. 20232842 " id="studentIDInput" name="log_in_studentID"  required autocomplete="off"></div>
            <div class="in">
                <input type="password" placeholder="Password" name="log_in_password" required></div>
            <button class="sign-inButton" name="sign-inButton" type="Sign in">Sign in</button>
        </form>
                <div class = "orText"> <p> or </p></div>
                <a href="signIn.html" class = "createAcct"> <p> Create Account </p></a>
            </div>
        </div>

        <script src="script.js"></script>

        <div class="footer">
            <div class="column1">
                <h2 id="stanford-footer">STANFORD UNIVERSITY OF SAMAL</h2>
            </div>
            <div class="column">
                <p id="title-footer">Contact Us</p>
                <p id="details-footer">0909212199</p>
                <p id="details-footer">stanforduniversity@yehey.com</p>
            </div>
            <div class="column">
                <p id="title-footer">Contact Us</p>
                <p id="details-footer">0909212199</p>
                <p id="details-footer">stanforduniversity@yehey.com</p>
            </div>
            <div class="column3">
                <p id="title-footer">Contact Us</p>
                <p id="details-footer">0909212199</p>
                <p id="details-footer">stanforduniversity@yehey.com</p>
            </div>
        </div>
    </body>
</html>
