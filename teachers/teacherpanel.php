<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Panel</title>
    <style>
        body{
            margin: 0;
            font-family: Open Sans;
            padding: 0;
            overflow-x: hidden;
        }

        .main-container {
            width: 100vw;
            height: 100vh;
            background-image: url(media/school3.png);
            background-repeat: no-repeat;  
        }

        .login-container {
            width: 30vw;
            border-radius: 15px;
            height: 50vh;
            box-shadow: 1px 1px 5px black;
            position: fixed;
            margin-left: 50%;
            transform: translate(-50%, 0);
            margin-top: 20vh;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .header {
            width: 30vw;
            height: 10vh;
            background-color: #7d0a0a;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            color: white;
            text-align: center;
        }

        .title {
            font-size: 3.8vh;
            padding: 2.1vh;
            font-weight: bolder;
        }

        .row {
            width: 26vw;
            height: 6.5vh;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .first {
            margin-top: 10vh;
        }

        input[type=text] {
            text-align: center;
            padding: 1.5vh 5vw;
            border: 1px solid grey;
            border-radius: 3px;
        }

        .confirm-btn {
            text-align: center;
            padding: 1.5vh 8.6vw;
            border: 0;
            border-radius: 4px;
            background-color: #7d0a0a;
            color: white;
            font-size: 2vh;
            font-weight: bolder;
        }

        .confirm-btn:hover {
            background-color: #bf3131;
            cursor: pointer;
        }

        a {
            color: white;
            text-decoration: none;
        }

        .container {
            width: 100vw;
            height: 100vh;
            background-image: linear-gradient(rgb(174, 151, 113), rgb(183, 112, 72));
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 0;
        }

        .prompt-container {
            position: fixed;
            width: 25vw;
            height: 20vh;
            background-color: white;
            border-radius: 10px;
            margin-left: 50%;
            transform: translate(-50%, 0);
            margin-top: 35vh;
            box-shadow: 1px 1px 5px black;
            z-index: 5;
            display: none;
        }

        #close-btn {
            width: 4vh;
            height: 4vh;
            position: absolute;
            right: 0;
            top: 0;
            font-weight: bolder;
            color: red;
        }

        #close-btn:hover {
            cursor: pointer;
            color: #7d0a0a;
        }


    </style>

</head>
<body>
    <div class="main-container">
    <div class="prompt-container" id="prompt">
        <div class="content">
            <div id="close-btn" onclick="closeOpen()">X</div>
                <?php
                if(isset($_GET['error'])){ ?>
                    <style>
                        #prompt {
                            display: block;
                            text-align: center;
                        }
                    </style>
                    <p style="margin-top: 8vh; color: #bf3131; font-weight: bolder;"><?php echo ($_GET['error']); ?></p>
                    

                <?php } ?>
                <?php
                if(isset($_GET['info'])){ ?>
                    <style>
                        #prompt {
                            display: block;
                            text-align: center;
                        }
                    </style>
                    <p style="margin-top: 8vh; color: #bf3131; font-weight: bolder;"><?php echo ($_GET['info']); ?></p>
                <?php } ?>
                <?php
                if(isset($_GET['redirect'])){ ?>
                    <style>
                        #prompt {
                            display: block;
                            text-align: center;
                        }
                    </style>
                    <p style="margin-top: 8vh; color: #bf3131; font-weight: bolder;"><?php echo ($_GET['redirect']); ?></p>
                    <script>
                        redirect_Page();
                        
                        function redirect_Page () {
                            var redirector = setTimeout(function () {
                                window.location.href = "teacherpanel.php";
                                window.clearTimeout(redirector);
                            }, 5000);
                        }
                    </script>
                <?php } ?>
        </div>
    </div>
        <div class="login-container">
            <div class="header">
                <div class="title">Search Subject</div>
            </div>
            <div class="row first">
                <input type="text" name="studentid" autocomplete="off" placeholder="Enter Student ID" />
            </div>
            <div class="row">
                <input type="text" name="subject" placeholder="Subject" />
            </div>
            <div class="row">
                <button class="confirm-btn"><a href="studentvalidate.php?validateid=">Confirm</a></button>
            </div>
        </div>
    </div>

    <script>
        function closeOpen() {
            var g = document.getElementById("prompt");

            if(g.style.display === "none" || g.style.display === "") {
                g.style.display = "block";
            } else {
                g.style.display = "none";
            }
        }
    </script>
</body>
</html>