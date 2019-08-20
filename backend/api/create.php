<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
  if(trim($request->title) === '' || trim($request->notes) === '' || trim($request->author) === '')
  {
    return http_response_code(400);
  }

  // Sanitize.
  $title = mysqli_real_escape_string($con, trim($request->title));
  $notes = mysqli_real_escape_string($con, trim($request->notes));
  $author = mysqli_real_escape_string($con, trim($request->author));
  


  // Create.
  $sql = "INSERT INTO `my_notes`(`id`,`title`,`notes`, `author` ) VALUES (null,'{$title}','{$notes}', '{author}')";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
    $notes = [
      'title' => $title,
      'notes' => $notes,
      'author' => $author,
      'id'    => mysqli_insert_id($con)
    ];
    echo json_encode($notes);
  }
  else
  {
    http_response_code(422);
  }
}?>