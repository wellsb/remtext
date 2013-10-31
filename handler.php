<?php

include('remtextlib.php');
$dbaction = new dbstuff();
$dbaction->dbconnect();

if (!empty($_POST)) {
    if ($dbaction->CheckState($_POST["uid"]) === '1') {
        $dbaction->UpdState($_POST["uid"],$_POST["data"],$_POST["colo"],$_POST["size"],$_POST["debug"]);
    } else {
        $dbaction->SetState($_POST["uid"],$_POST["data"],$_POST["colo"],$_POST["size"],$_POST["debug"]);
    }
}
echo json_encode($dbaction->GetState());
?>