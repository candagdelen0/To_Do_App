<?php
    session_start();
    require "functions/connection.php";
    session_destroy();
    header("Location: index.php");
?>