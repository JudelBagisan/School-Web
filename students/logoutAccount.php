<?php

    require_once("../admin/sql/createDB.php");

    if(isset($_COOKIE['uid'])) {
        setcookie('fullName', $fullName, time()-3600);
        setcookie('coursedisp', $coursedisp, time()-3600);
        setcookie('uid', $uid, time()-3600);
        setcookie('sex', $sex, time()-3600);
        setcookie('birthdate', $birthdate, time()-3600);
        setcookie('email', $email, time()-3600);
        setcookie('address', $address, time()-3600);
        setcookie('cNumber', $cNumber, time()-3600);

        header("Location: logIn.php?success=Logout Successfully!");
    }else {
        header("Location: logIn.php?success=No user logged in!");
    }


?>