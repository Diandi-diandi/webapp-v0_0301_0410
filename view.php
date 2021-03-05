<?php
    require_once 'conn.php';
    $sql = "CREATE OR REPLACE VIEW `cmd`['search_user'] AS 'SELECT * FROM `users` WHERE `uid`='";
?>