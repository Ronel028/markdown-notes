<?php
    // start the session
    session_start();
    
    // unset all session variables
    $_SESSION = array();
    
    // destroy the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // destroy the session
    session_destroy();
    
    // redirect to the login page
    header("Location: http://".$_SERVER['HTTP_HOST']."/views/nstk/nstk.php");
    exit;
    

?>