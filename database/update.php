<?php

function update_bacteries($conn, $data)
{
  // sql to update a record

  $sql = "";
  foreach ($data as $b) {
    $sql .= "UPDATE `mydb`.`bacteries` SET `name` = '" . $b["name"] . "', `description` = '" . $b["description"] . "', `parent_id` = '" . $b["parent_id"] . "' WHERE (`id` = '" . $b["id"] . "');";
  }

  if ($conn->multi_query($sql) === TRUE) {
    return "Record updated successfully";
  } else {
    return "Error updating record: " . $conn->error;
  }
}
