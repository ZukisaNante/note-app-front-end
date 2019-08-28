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
    define('DB_USER', '24843');
    define('DB_PASS', 'zukisa31');
    define('DB_NAME', '24843');

    // Database Connection
    $connect = new PDO("mysql:host=localhost;dbname=notes_db", "root", "");

?>
