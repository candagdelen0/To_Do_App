<?php
    require "functions/function.php";
    $sistem = new System;

    $taskid = $_GET["id"];
    $userid = $_GET["userid"];
    $gunid = $_GET["gunid"];
    $sistem->genelsorgu($db, "DELETE FROM tasks WHERE id = $taskid",1);
    header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
?>