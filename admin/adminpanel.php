<?php

    require_once("adminconnectdatabase.php");
    $query = "select * from enrollstep1";
    $result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
            background-image: url(media/bglogin.png);
            background-repeat: no-repeat;
            position: absolute;
        }

        .table-container {
            box-shadow: 1px 1px 5px black;
            width: 95vw;
            height: 90vh;
            margin: 5vh auto;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
        }

        .table-title {
            width: 95vw;
            height: 10vh;
            background-color: #7d0a0a;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .title {
            text-align: center;
            color: white;
            padding-top: 2vh;
        }

        th {
            background-color: #bf3131;
            color: white;
            padding-bottom: 1vh;
            padding-top: 1vh;
        }

        th, td {
            padding-left: 1.2vw;
            padding-right: 1.5vw;
            font-size: 1.8vh;
            text-align: center;
        }

        td {
            font-size: 1.5vh;
            font-weight: bold;
            background-color: white;
        }

        #display-data {
            border-collapse: collapse;
        }

        .validate-btn {
            background-color: green;
            padding: 1vh 2vh;
            border: 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .validate-btn:hover {
            background-color: darkgreen;
        }

        .delete-btn {
            background-color: #7d0a0a;
            padding: 1vh 2vh;
            border: 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #bf3131;
        }

        a {
            color: white;
            text-decoration: none;
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
        <div class="table-container">
            <div class="table-title">
                <h1 class="title">Admin Panel</h1>
                <table id="display-data" align=center>
                    <tr>
                        <th style="border-top-left-radius: 5px">ID Number</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Sex</th>
                        <th>Birthdate</th>
                        <th>Course</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>LRN</th>
                        <th>Validate</th>
                        <th style="border-top-right-radius: 5px">Delete</th>
                    </tr>
                    <tr>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstName']; ?></td>
                        <td><?php echo $row['midName']; ?></td>
                        <td><?php echo $row['lastName']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['birthdate']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['cNumber']; ?></td>
                        <td><?php echo $row['lrn']; ?></td>
                        <td><button class="validate-btn"><a href="validatestudent.php?validate=<?php echo $row['id'] ?>">Validate</a></button></td>
                        <td><button class="delete-btn"><a href="delete.php?deleteid=<?php echo $row['id'] ?>">Delete</a></button></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
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