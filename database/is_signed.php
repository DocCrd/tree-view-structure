<?php

session_start();

function is_signed($conn, $sign = [], $path = "../")
{
    $sql = "SELECT * FROM adminlogin";
    $users = $conn->query($sql);

    
    $adminname = $sign[0];
    $password = md5($sign[1]);


    while ($user = $users->fetch_assoc()) {


        if (($user['adminname'] == $adminname) &&
            ($user['password'] == $password)
        ) {
            $_SESSION["cargo"] = "admin";
            header("Location: " . $path . "index.php");
            return "Validation success";
        }
    }
    
    return "Validation failed";
}
