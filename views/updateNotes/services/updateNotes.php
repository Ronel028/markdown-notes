<?php 

    include_once("../../../database/config.php");

    try{

        // get the variable from the body and params using super global variable
        $userID = $_GET["userID"];
        $notes_title = $_POST["notes_title"];
        $notes_content = $_POST["notes_content"];


        // create mysql statement
        $stmt = $connection->prepare("UPDATE notes SET notes_title=?, notes_content=? WHERE id=?");
        $stmt->bind_param("ssi", $notes_title, $notes_content, $userID);
    
        // execute the query
        $stmt->execute();
        $result = $stmt->affected_rows;
        if($result > 0){
            echo json_encode(array("msg"=>"Success"));
        }else{
            echo json_encode(array("error"=>"Failed"));
        }

        // close the connection and mysql statement
        $stmt->close();
        $connection->close();
        
    }catch(Exception $error){
        echo json_encode(array("error"=>"Something's wrong in the server. Please try again"));
    }
    
?>