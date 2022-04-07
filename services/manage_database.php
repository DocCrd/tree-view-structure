<?php


require_once("../database/index.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["cargo"] == "admin") {

    $set = $_POST["bacteries"];
    $remove = $_POST["remove"];
    $update = $_POST["update"];

    $answer = send_insert_update($set);
    $answer .= send_insert_update($update, true);
    $answer .= send_delete($remove);

    echo json_encode(array($answer));
} else {
    echo json_encode(array("Unauthorised"));
}


function send_delete($remove)
{
    if ($remove) {
        $remove = explode(",", $remove);
        return db_query("delete", $remove, get_path());
    }
}

function send_insert_update($set, $update = false)
{
    if ($set) {
        $set = explode(",", $set);
        $set = make_sets_from_raw($set);
        return db_query($update ? "update_bacteries" : "insert_bacteries", $set, get_path());
    }
}

function make_sets_from_raw($raw)
{
    for ($i = 0; $i < count($raw); $i + 3) {
        $array[] =
            array(
                "id" => $raw[$i++],
                "name" => $raw[$i++],
                "description" => $raw[$i++],
                "parent_id" => $raw[$i++]
            );
    }
    return $array;
}

function get_path()
{
    return "../";
}
