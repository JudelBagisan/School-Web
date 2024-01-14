<?php

include 'adminconnectdatabase.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sqls = "DELETE FROM enrollstep1 WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sqls);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    if($result) {
        header("Location: adminpanel.php?success=Student $id Deleted Successfully!");
    } else {
        header("Location: adminpanel.php?success=Not deleted!");
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>