<?php

    declare (strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    function sanitize(string $value): string {
        return htmlspecialchars(stripslashes(trim($value)));
    }

    $short_desc = sanitize($_POST['desc']);
    $priority = sanitize($_POST['priority']);

    $success = false;

    try {
        $DSN = "mysql:host=localhost;dbname:portal";
        $USER = $PWD = 'root';
        $pdo = new PDO($DSN, $USER, $PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into portal.incident (number, short_desc, priority) values (concat(prefix, LPAD(id, 7, 0)), '${short_desc}', '${priority}');";
        $n = 0;
        $n = $pdo->exec($sql);
        if($n == 1) { $success = true; }
        $sql = "update portal.incident set number=concat(prefix, LPAD(id, 7, 0)) where number='INC0000000';";
        $n += $pdo->exec($sql);
        $pdo = null;
        if($success == true) {
            echo "success";
        }
    } catch(Exception $e) {
        echo "Database error in incidents/postIncidents.php: " . $e->getMessage();
    }

?>