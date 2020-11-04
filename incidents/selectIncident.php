<?php 
     declare (strict_types=1);
     error_reporting(E_ALL);
     ini_set('display_errors', '1');

    function sanitize(string $value): string {
        return htmlspecialchars(stripslashes(trim($value)));
    }

    $id = sanitize($_GET['id']);
 
    try {
        $DSN = "mysql:host=localhost;dbname:portal";
        $USER = $PWD = 'root';
        $pdo = new PDO($DSN, $USER, $PWD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select number, id, prefix, short_desc, priority, state, opened, resolved, resolution from portal.incident where id=$id;";
        $statement = $pdo->query($sql);
        $n = 0;
        while($row = $statement->fetch()) {
            if($n > 1) {
                echo "Error - multiple records with id $id found.";
            }
            $rows[] = $row;
            $n++;
        }        
        $pdo = null;
        echo json_encode($rows);
    } catch(PDOException $e) {
        echo "Database error in incidents/getIncidents.php: " . $e->getMessage();
    }
?>