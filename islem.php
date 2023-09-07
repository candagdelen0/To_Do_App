<?php
    require "functions/function.php";
    include "_header.php";
    $sistem = new System;
    
    $userid = $sistem->safety($_GET["userid"]);
    $gunid = $sistem->safety($_GET["gunid"]);

    @$islem = $sistem->safety($_GET["islem"]);
    switch ($islem) {
        case 'checked': 
            $taskid = $sistem->safety($_GET["id"]);
            $sistem->genelsorgu($db, "UPDATE tasks SET status=1 WHERE id = $taskid",1);
            $oran = $sistem->genelsorgu($db, "SELECT * FROM basariorani WHERE userid = $userid",1);
            $orangor = $oran->FETCH_ASSOC();
            if ($oran->num_rows != 0) {
                $done = $orangor["done"] + 1;
                $beklemede = $orangor["beklemede"] - 1;
                $sistem->genelsorgu($db, "UPDATE basariorani SET beklemede = $beklemede, done = $done WHERE userid = $userid",1);
            } else {
                $tasknum = $sistem->genelsorgu($db, "SELECT * FROM tasks WHERE id = $taskid",1)->num_rows;
                $beklemede = $tasknum - 1;
                $sistem->genelsorgu($db, "INSERT INTO basariorani (userid, tasknum, beklemede, done, notdone) VALUES ($userid, $tasknum, $beklemede, 1, 0)",1);
            }
            header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
            break;

        case 'failed':
            $taskid = $sistem->safety($_GET["id"]);
            $sistem->genelsorgu($db, "UPDATE tasks SET status=2 WHERE id = $taskid",1);
            $oran = $sistem->genelsorgu($db, "SELECT * FROM basariorani WHERE userid = $userid",1);
            $orangor = $oran->FETCH_ASSOC();
            if ($oran->num_rows != 0) {
                $notdone = $orangor["notdone"] + 1;
                $beklemede = $orangor["beklemede"] - 1;
                $sistem->genelsorgu($db, "UPDATE basariorani SET beklemede = $beklemede, notdone = $notdone WHERE userid = $userid",1);
            } else {
                $tasknum = $sistem->genelsorgu($db, "SELECT * FROM tasks WHERE id = $taskid",1)->num_rows;
                $beklemede = $tasknum - 1;
                $sistem->genelsorgu($db, "INSERT INTO basariorani (userid, tasknum, beklemede, done, notdone) VALUES ($userid, $tasknum, $beklemede, 0, 1)",1);
            }
            header("Location: gundetay.php?id=".$userid."&gunid=".$gunid." ");
            break;
    }
?>