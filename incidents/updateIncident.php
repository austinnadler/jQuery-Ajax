<?php

    declare (strict_types=1);
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    function sanitize(string $value): string {
        return htmlspecialchars(stripslashes(trim($value)));
    }

    $id = sanitize($_POST['id']);
    $short_desc = sanitize($_POST['short_desc']);
    $opened = sanitize($_POST['opened']);
    $resolved = sanitize($_POST['resolved']);
    if($resolved = '') { $resolved = null; }
    // else { $resolved = "\'$resolved\'"}
    $priority = sanitize($_POST['priority']);
    $state = sanitize($_POST['state']);
    $resolution = sanitize($_POST['resolution']);

    try {
        $DSN = "mysql:host=localhost;dbname:portal";
        $USER = $PWD = 'root';
        $pdo = new PDO($DSN, $USER, $PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "update portal.incident set short_desc=:short_desc, opened=:opened, resolved=null, priority=:priority, state=:state, resolution=:resolution where id=:id";
        // $sql = "update portal.incident set short_desc='$short_desc', opened='$opened', resolved=null, priority='$priority', state='$state', resolution='$resolution' where id=$id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':short_desc', $short_desc);
        $stmt->bindParam(':opened', $opened);
        // $stmt->bindParam(':resolved', $resolved);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':resolution', $resolution);
        $stmt->bindParam(':id', $id);
        $n = $stmt->execute();
        // $n = $pdo->exec($sql);
        $pdo = null;
        if($n == 1) {
            echo "success";
        } else {
            echo "UPDATE failed in updateIncident.php?id=".$id;
            echo $n. " rows affected";
            echo "$short_desc";
        }
    } catch(Exception $e) {
        echo "Database error in incidents/postIncidents.php: " . $e->getMessage();
    }

?>