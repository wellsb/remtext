<!DOCTYPE html>
<html>
    <head>
        <title>Remote That</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="remote.css" />
        <script type="text/javascript" src="http://shuttle.brendanwells.co.uk/webdev/jquery/jquery.js"></script>
        <script type="text/javascript" src="http://shuttle.brendanwells.co.uk/webdev/jquery/jquery-ui-1.8.20.custom.min.js"></script>
    </head>
    <body>

<?php
include('remotelib.php');
$dbaction = new dbstuff();
$dbaction->dbconnect();

if ($_GET["data"]) {
    echo $_GET["data"];
    $dbaction->SetState($_GET["data"]);
}
?>
        <div id="controls">
            <div id="control01" onclick="window.location = 'remote_get.php?data=ff0000'">
            </div>
            <div id="control02" onclick="window.location = 'remote_get.php?data=00ff00'">
            </div>
            <div id="control03" onclick="window.location = 'remote_get.php?data=0000ff'">
            </div>
            <div id="control04" onclick="window.location = 'remote_get.php?data=9980BA'">
            </div>            
        </div>
    </body>
</html>