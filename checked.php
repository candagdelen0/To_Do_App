<?php
    require "functions/function.php";
    $sistem = new System;

    $taskid = $_GET["id"];
    $userid = $_GET["userid"];
    $gunid = $_GET["gunid"];
    $done = 1;
    $sistem->genelsorgu($db, "UPDATE tasks SET status=1 WHERE id = $taskid",1);
    header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
?>