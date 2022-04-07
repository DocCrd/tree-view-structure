<?php

session_start();
require_once('../database/index.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $adminname = test_input($_POST["adminname"]);
    $password = test_input($_POST["password"]);


    
    $validation = reg_or_sign([$adminname, $password]);
    

    // echo json_encode(array($adminname, $password));
    echo json_encode(array($validation));
}
// echo json_encode(array($adminname));

function reg_or_sign($user_data)
{
    $path = "../";
    if(isset($_POST["login"])) {
        // return $user_data;
        return db_query("is_signed", $user_data, $path);
    }
    if(isset($_POST["registration"])) {
        // return $user_data;
        return db_query("register", $user_data, $path);
    }
}

function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
