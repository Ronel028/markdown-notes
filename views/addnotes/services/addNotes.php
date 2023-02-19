<?php 
    session_start();
    include_once("../../../database/config.php");

    $userID = $_SESSION['userID'];
    $notes_title = $_POST["notes_title"];
    $notes_content = $_POST["notes_content"];

    try{
        $stmt = $connection->prepare("INSERT INTO `notes`(`userID`, `notes_title`, `notes_content`) VALUES (?,?,?)");
        $stmt->bind_param("iss", $userID, $notes_title, $notes_content);
    
        $stmt->execute();
        $result = $stmt->affected_rows;
    
        if($result > 0){
            echo json_encode(array("msg"=>"Add new notes successfully"));
        }else{
            echo json_encode(array("error"=>"Failed to save notes"));
        }
    }catch(Exception $error){
        echo json_encode(array("error"=>"Something went wrong with the server"));
    }

?>