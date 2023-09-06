<?php
    require "functions/connection.php";
    $username = $_COOKIE["user"];
    setcookie("user", $username, time() - 10);
    header("Location: index.php");
?>