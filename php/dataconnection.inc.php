<?php
    require_once('config.inc.php');

    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected Succesfully";
    }

    catch (PDOException $e)
    {
        die($e->getMessage());
    }

?>