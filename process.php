<?php 
  session_start();
	$mysqli = new mysqli('localhost', 'root', '', 'notes_db') or die(mysqli_error($mysqli));

	// initialize variables
	$title = "";
  $notes = "";
  $author = "";
	$id = 0;
	$update = false; 

	if (isset($_POST['save'])) {
		$title = $_POST['title'];
    $notes = $_POST['notes'];
    $author = $_POST['author'];

    $mysqli->query("INSERT INTO my_notes (title, notes, author) VALUES ('$title', '$notes', '$author')") or die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: note.php");
 
  }

  if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM my_notes WHERE id=$id") or die($mysqli->error());
    //check if record exists
    if(count($result)== 1){
      $row = $result->fetch_array();
      $title = $row['title'];
      $notes = $row['notes'];
      $author = $row['author'];
    }
    //header('location: note.php');
  }
  if (isset($_POST['update'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $notes = $_POST['notes'];
    $author = $_POST['author'];

    $mysqli->query("UPDATE my_note SET title='$title', notes='$notes', author='$author' WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
 
    header('location: note.php');
  }

  if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM my_notes WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header('location: note.php');
  }
  ?>