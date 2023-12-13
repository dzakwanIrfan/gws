<?php 
    error_reporting(E_ALL ^ E_NOTICE AND E_DEPRECATED);
    $host = "localhost";
    $user = 'root';
    $pass = '';
    $db = 'gws';

    $conn = mysqli_connect($host, $user, $pass, $db);
    if ( !$conn ) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>