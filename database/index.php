<?php

session_start();
function db_query($func_name, $args = false, $path = "./")
{
    require_once($path . "database/config.php");
    
    // CrUD
    require_once($path . "database/fetch_bacteries.php");
    require_once($path . "database/insert.php");
    require_once($path . "database/update.php");
    require_once($path . "database/delete.php");
    
    // Autentification
    require_once($path . "database/is_signed.php");
    require_once($path . "database/register.php");
    require_once($path . "database/fetch_bacteries.php");

    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return call_user_func($func_name, $conn, $args);

    $conn->close();
}
