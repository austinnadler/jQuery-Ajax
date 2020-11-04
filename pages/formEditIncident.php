<?php
    // File: index.php
    $id = $_GET['id'];
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
        <script src="../js/updateIncident.js"></script>
    </head>

    <body>
        <input id="incId" value="<?php echo $id; ?>" style="display: none;" >
        <header></header>

        <main>
            <div class="w3-center">
                <form id="incidentForm" name="incidentForm" action="" method="POST">
                    <h1>Edit Incident
                        <br><span id="incNumber"></span>
                    </h1>
                    <textarea name="desc" id="desc" placeholder="Short description" cols="80" rows="3"></textarea>
                    <br><br>
                    <span>Opened </span>
                    <input readonly id="opened">
                    <span>Resolved </span>
                    <input readonly id="resolved">
                    <br><br>
                    <span>Priority </span>
                    <select name="priority" id="priority">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Critical">Critical</option>
                    </select>
                    <span>State </span>
                    <select id="state">
                        <option value="New">New</option>
                        <option value="Assigned">Assigned</option>
                        <option value="Pending">Pending</option>
                        <option value="Resolved">Resolved</option>
                        <option value="Closed">Closed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                    <br><br>
                    <textarea id="resolution" cols="80" rows="10"></textarea>
                    <p><a class="w3-btn w3-blue" id="btnSubmit">Submit</a></p> <!-- Submit cannot be a button tag or it interferes with redirecting back to index.php after insertion -->
                </form>
            </div>
        </main>

        <footer class="w3-panel w3-center w3-text-gray w3-small">

        </footer>
    </body>
</html>