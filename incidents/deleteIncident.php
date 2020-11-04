<?php

    declare (strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    function sanitize(string $value): string {
        return htmlspecialchars(stripslashes(trim($value)));
    }

    $id = sanitize($_POST['id']);

    try {
        $DSN = "mysql:host=localhost;dbname:portal";
        $USER = $PWD = 'root';
        $pdo = new PDO($DSN, $USER, $PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from portal.incident where id=?;";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);
        $affectedRows = $statement->execute();
        $pdo = null;
        if($affectedRows == 1)  { 
            echo "success";
        } else {
            echo "DELETE failed in deleteIncident.php";
        }
    } catch(PDOException $e) {
        echo "Database error in incidents/deleteIncident.php: " . $e->getMessage();
    }
    
?>