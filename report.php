<?php
    include "_header.php";
    require "functions/function.php";
    $sistem = new System;
    $id = $_GET["id"];
    $diz = $sistem->genelsorgu($db, "SELECT * FROM user WHERE id= $id",1);
    
?>
