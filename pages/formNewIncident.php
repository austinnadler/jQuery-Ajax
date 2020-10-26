<?php
    // File: index.php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Service Portal</title>
        <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
        <link href="../styles.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/09a54ca737.js" crossorigin="anonymous"></script>
        <script src="../js/incidents.js"></script>
    </head>

    <body>
        <header></header>

        <main>
            <form id="incidentForm" name="incidentForm" action="" method="POST">
                <p><input name="desc" id="desc" type="text" placeholder="Short description"></p>
                <select name="priority" id="priority">
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                    <option value="Critical">Critical</option>
                </select>
                <p><button id="btnSubmit">Submit</button></p>
            </form>
        </main>

        <footer class="w3-panel w3-center w3-text-gray w3-small">

        </footer>
    </body>
</html>