<?php
/*
 * Returns the list of notes.
 */
require 'database.php';
$query = "SELECT * FROM my_notes ORDER BY id DESC"; // DESC -> descending order
$statement = $connect->prepare($query);
if($statement->execute())
{
  while($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    $data[] = $row;
  }
  echo json_encode($data);
}

?>
