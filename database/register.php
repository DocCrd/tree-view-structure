<?php

// session_start();

function register($conn, $user = [], $path = "../")
{
    $adminname = $user[0];
    $password = md5($user[1]);
    $sql = "INSERT INTO adminlogin (adminname, password) VALUES ('" . $adminname . "', '" . $password . "');";


    if ($conn->query($sql) === TRUE) {
        $_SESSION["cargo"] = "admin";
        header("Location: " . $path . "index.php");
        return "User account created successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}
