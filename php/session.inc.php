<?php 
    session_start();
    if(!isset($_SESSION["userID"], $_SESSION["userType"]))
    {
        $_SESSION["userID"] = "Guest";
        $_SESSION["userType"] = "Guest";
        // echo $_SESSION["userID"] .' '. $_SESSION["userType"];
    }
    // echo $_SESSION["userID"] .' '. $_SESSION["userType"];
?>