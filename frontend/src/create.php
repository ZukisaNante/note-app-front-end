 <?php
//require '../backend/api/database.php';
// Declare Variables
$servername = "localhost";
$username = "admin";
$password = "S8RJ7DYvrxIF";
$dbname = "notes_api";

$conn = new mysqli($servername, $username, $password, $dbname);
$info = json_decode(file_get_contents("php://input"));
if(count($info) > 0){
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


?>