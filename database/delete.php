<?php

function delete($conn, $ids)
{
  $sql = "";
  foreach ($ids as $id) {
    $sql .= "DELETE FROM bacteries WHERE id=$id;";
  }

  if ($conn->multi_query($sql) === TRUE) {
    return "Records deleted successfully.";
  } else {
    return "Error deleting record: " . $conn->error;
  }
}
