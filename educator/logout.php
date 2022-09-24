<?php
    
    ini_set('session.save_path', '../tmp');
    session_start();

    unset($_SESSION["id"]);
    unset($_SESSION["user"]);
    header("Location:index.php");
?>