<?php
function insert_bacteries($conn, $data = [])
{


  $sql = "";
  foreach ($data as $value) {
    $sql .= "INSERT INTO bacteries (id, name, description, parent_id) VALUES ";
    $sql .= "(" . $value['id'] . ", '" . $value['name'] . "', '" . $value['description'] . "', " . $value['parent_id'] . ");";
  }

  if ($conn->multi_query($sql) === TRUE) {
    return "New record created successfully";
  } else {
    return "Error: " . $sql . "<br>" . $conn->error;
  }
}
