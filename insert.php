<?php  

//insert.php

// Connect to database.php
include('database.php');

$form_data = json_decode(file_get_contents("php://input"));
// declare variables
$error = '';
$message = '';
$validation_error = '';
$title = '';
$notes = '';
$author = '';

  $data = array(
 ':title'  => $form_data->title,
 ':notes'  => $form_data->notes,
 ':author'  => $form_data->author
);

$query = "
 INSERT INTO my_notes 
 (title, notes, author) VALUES 
 (:title, :notes, :author)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $message = 'Data Inserted';
}

$output = array(
 'message' => $message
);

echo json_encode($output);  

?>
