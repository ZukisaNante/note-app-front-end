<?php
/**
 * Returns the list of notes.
 */
require 'database.php';

$notes = [];
$sql = "SELECT id, title, notes, author FROM my_notes";

if($result = mysqli_query($con,$sql))
{
  $i = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $notes[$i]['id']    = $row['id'];
    $notes[$i]['title'] = $row['title'];
    $notes[$i]['notes'] = $row['notes'];
    $notes[$i]['author'] = $row['author'];
    $i++;
  }

  echo json_encode($notes);
}
else
{
  http_response_code(404);
}

?>