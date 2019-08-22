<?php
//require '../backend/api/database.php';
// Declare Variables
$servername = "localhost";
$username = "admin";
$password = "S8RJ7DYvrxIF";
$dbname = "notes_api";

// Create connection
/* $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO my_notes (title, notes, author) VALUES ('$title','$notes','$author')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); */





$conn = new mysqli($servername, $username, $password, $dbname);
$info = json_decode(file_get_contents("php://input"));
if(count($request) > 0){
  $title = mysqli_real_escape_string($conn, $info->title));
  $notes = mysqli_real_escape_string($conn, $info->notes));
  $author = mysqli_real_escape_string($conn, $info->author));
  $sql = "INSERT INTO my_notes (title, notes, author) VALUES ('$title','$notes','$author')";
  if(mysqli_query($conn, $sql)){
    echo "Inserted Successfully";
  }
  else{
    echo "Failed!";
  }
}
$conn->close();

/* // Get the posted data.
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
  } */
?>