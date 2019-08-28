<?php
    /******************************************
    * Programmer: Zukisa NANTE                *
    * BeCode: Web Developer                   *
    * Qualifications: ELectrical Engineering */

    // Response Headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    // Declare Variables
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'notes_db');

    // Database Connection
    $connect = new PDO("mysql:host=localhost;dbname=notes_db", "root", "");


    /* function connect()
        {
            $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);
            if (mysqli_connect_errno($connect)) {
                die("Failed to connect:" . mysqli_connect_error());
                }
            mysqli_set_charset($connect, "utf8");
        return $connect;
        }
$con = connect(); */

?>
