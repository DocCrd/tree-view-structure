<?php
require_once("view/html_blocks.php");

echo "<script src='view/front/html_js_blocks.js'></script>";
echo "<script src='view/front/index.js'></script>";
echo "<script src='view/front/helpers.js'></script>";

function create_view($arr)
{

    echo "<div>";

    echo ($_SESSION["cargo"] ?
        "Добавить новую ветвь?&nbsp;" .
        get_add_button("Добавить") .
        get_store_button() .
        get_logout_button() : 
        get_login_button() .
        get_floating());

    main_view($arr);


    echo "</div>";
}

function main_view($arr)
{
    foreach ($arr as $line) {
        $has_parent = $line[0]["parent_id"];

        if (!$has_parent) {
            next_child($arr, $line, '');
        }
    }
}

function parent_view($arr, $line, $parent_id)
{
    array_splice($arr, 0, 0, array($line));

    draw_children($arr, $parent_id);
}


function draw_children($arr, $parent_id)
{
    $children_arr = form_children($arr, $parent_id);

    foreach ($children_arr as $children) {
        next_child($arr, $children);
    }
}

function next_child($arr, $children, $hidden = "hidden")
{
    $child = array_splice($children, 0, 1)[0];
    $id = $child["id"];
    $name = $child["name"];
    $description = $child["description"];
    $has_child_line = has_child_line($arr, $child);
    $has_child = count($children);


    echo get_controls($id, $name, $description, $hidden);
    if ($has_child && !$_SESSION["cargo"]) echo get_show_button();

    if ($has_child_line) {
        $parent_id = $id;
        parent_view($arr, $children, $parent_id);
    } elseif ($has_child) {
        next_child($arr, $children);
    }

    echo "</div>";
}

function form_children($array, $id)
{
    $new_array = [];

    foreach ($array as $value) {
        $parent_id = $value[0]["parent_id"];

        if ($parent_id === $id) {
            $new_array[] = $value;
        }
    }


    return $new_array;
}

function has_child_line($array, $node)
{
    $id = $node["id"];
    foreach ($array as $value) {
        $parent_id = $value[0]["parent_id"];

        if ($parent_id === $id) {
            return true;
        }
    }
    return false;
}
