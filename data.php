<?php

function read_sql_data(&$data_array)
{
    $length = count($data_array);
    $iterable = $data_array[0];
    for ($i = 0; $i <= $length; $i++) {


        $current = $data_array[$i];
        if (get_parent($current) === get_last_child($iterable)) {
            $iterable = create_relation($iterable, $current);

            array_splice($data_array, 0, 1, array($iterable));
            array_splice($data_array, $i, 1);

            read_sql_data($data_array);

            break;
        }

        if ($i === $length && search_relation($data_array)) {
            $iterable = array_splice($data_array, 0, 1);

            $data_array[] = array($iterable)[0][0];

            read_sql_data($data_array);
        }
    }
}

function prepare_to_read(&$arr)
{
    foreach ($arr as $key => $value) {
        $arr[$key] = array($value);
    }
}

function search_relation($data_array)
{
    for ($i = 0; $i <= count($data_array); $i++) {
        for ($j = 0; $j <= count($data_array); $j++) {
            if ($data_array[$i] && get_last_child($data_array[$i]) === get_parent($data_array[$j])) {

                return true;
            }
        }
    }

    return false;
}

function get_last_child($parent_array)
{
    return $parent_array["id"] ?? end($parent_array)["id"];
}

function get_parent($parent_array)
{
    return $parent_array["parent_id"] ?? $parent_array[0]["parent_id"];
}

function create_relation($parent, $child)
{
    return array_merge($parent, $child);
}