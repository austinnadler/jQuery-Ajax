<?php
    // File: index.php
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Service Portal</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
        <link href="styles.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/09a54ca737.js" crossorigin="anonymous"></script>
        <script src="js/selectAllIncidents.js"></script>
        <script src="js/deleteIncident.js"></script>
    </head>

    <body>
        <header></header>
        
        <main>
            <div id="incidents-widget">
                <h1 class="w3-center">Incidents</h1>
                <table class="w3-table w3-table-all">
                    <thead>
                        <th>Number</th>
                        <th>Short description</th>
                        <th>Priority</th>
                        <th>State</th>
                        <th>Opened</th>
                        <th>Resolved</th>
                        <th>Resolution</th>
                        <th></th>
                    </thead>
                    <tbody id="incidents-list">
                        <!-- js/incidents.js -->
                    </tbody>
                </table>
            </div>
            <p class="w3-center">
                <span class="w3-center"><a class="w3-btn w3-blue w3-margin" href="pages/formNewIncident.php">Create new</a></span>
            </p>
        </main>

        <footer class="w3-panel w3-center w3-text-gray w3-small"></footer>
    </body>
</html>