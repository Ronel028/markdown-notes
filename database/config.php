<?php 
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DATABASE", "nstk");

    // create connection
    $connection = new mysqli(HOST, USER, PASSWORD, DATABASE);

    if($connection -> connect_error){
        die("Connection failed: ". $connection->connect_error);
    }
?>