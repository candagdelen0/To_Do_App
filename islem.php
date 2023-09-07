<?php
    require "functions/function.php";
    include "_header.php";
    $sistem = new System;
    
    $userid = $sistem->safety($_GET["userid"]);
    $gunid = $sistem->safety($_GET["gunid"]);

    @$islem = $sistem->safety($_GET["islem"]);
    switch ($islem) {

    }
?>