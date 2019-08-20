<?php
require 'database.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);

   // Validate.
   if((int)$request->id < 1 || trim($request->title) === '' || trim($request->notes) === '' || trim($request->author) === '')
   {
     return http_response_code(400);
   }

  // Sanitize.
  $id    = mysqli_real_escape_string($con, (int)$request->id);
  $title = mysqli_real_escape_string($con, trim($request->title));
  $notes = mysqli_real_escape_string($con, trim($request->notes));
  $author = mysqli_real_escape_string($con, trim($request->author));
  

  // Update.
  $sql = "UPDATE `my_notes` SET `title`='$title',`notes`='$notes',`author`='$author' WHERE `id` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}

?>