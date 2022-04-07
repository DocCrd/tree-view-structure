<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bacteries Tree</title>
    <link rel='stylesheet' href='view/styles/index.css'>
</head>

<body>
    <?php
    require_once("./database/index.php");
    require_once("./view/index.php");
    require_once("./data.php");

    $data = db_query("fetch_bacteries");

    prepare_to_read($data);
    read_sql_data($data);


    create_view($data);

    echo ($_SESSION["cargo"] ?  "~" . $_SESSION["cargo"] : "");
    ?>
</body>

</html>