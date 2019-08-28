<?php

//delete.php

include('database.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$query = "DELETE FROM my_notes WHERE id = '".$form_data->id."'";

$statement = $connect->prepare($query);
if($statement->execute())
{
 $message = 'Data Deleted';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>