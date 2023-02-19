<?php 
    include_once("../../../database/config.php");

    $userID = $_GET["userID"];

    $stmt = $connection->prepare("DELETE FROM notes WHERE id=?");
    $stmt->bind_param("i", $userID);
    
    if($stmt->execute()){
        header("Location: http://".$_SERVER['HTTP_HOST']."/views/nstk/nstk.php");
    }


?>