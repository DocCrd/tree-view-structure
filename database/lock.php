<?php

function is_logged_in($conn)
{
    session_start();
    $user_check = $_SESSION['login_user'];

    $sql = "SELECT username FROM admin WHERE username='$user_check' ";

    if ($conn->query($sql) === TRUE) {
        $row = mysqli_fetch_array($conn, MYSQLI_ASSOC);
        $login_session = $row['username'];
        if (!isset($login_session)) {
            header("Location: login.php");
        }
        return "User is logged in successfully.";
    } else {
        return "Error accessing user: " . $conn->error;
    }
}
