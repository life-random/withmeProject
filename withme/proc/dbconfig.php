<?php
    function dbconn() {
        $host = "localhost";
        $user = "wmcho";
        $pw = "sky!091929";
        $dbName = "wmcho";
    return new mysqli($host, $user, $pw, $dbName);
    }
?>
