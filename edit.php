<?php  

//edit.php

include('database.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':title'  => $form_data->title,
 ':notes'  => $form_data->notes,
 ':author'  => $form_data->author,
 ':id'    => $form_data->id
);
// Update database
$query = "
 UPDATE my_notes 
 SET title = :title, notes = :notes, author = :author
 WHERE id = :id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Data Edited';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>