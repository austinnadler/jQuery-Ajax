<?php

    declare (strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    try {
        $DSN = "mysql:host=localhost;dbname:portal";
        $USER = $PWD = 'root';
        $pdo = new PDO($DSN, $USER, $PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select number, id, prefix, short_desc, priority, state, opened, resolved, resolution from portal.incident;";
        $statement = $pdo->query($sql);
        while($row = $statement->fetch()) {
            $rows[] = $row;
        }        
        $pdo = null;
        echo json_encode($rows);
    } catch(PDOException $e) {
        echo "Database error in incidents/getIncidents.php: " . $e->getMessage();
    }

?>