<?php


function fetch_bacteries($conn)
{

  $sql = "SELECT * FROM bacteries";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $bacteries = [];

    while ($row = $result->fetch_assoc()) {
      $bacteries[] = $row;
    }


    return $bacteries;
  } else {

    return false;
  }
}
