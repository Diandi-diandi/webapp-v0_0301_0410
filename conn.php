<?php
header('Content-Type" text/json; charset=utf-8');
$db_host = 'localhost';
$db_username = 'root' ;
$db_password = '';
$db = 'sizihwan' ;

$db_link = new mysqli($db_host, $db_username, $db_password, $db);
if($db_link === false){
    die('error:'.$db_link->connect_error);
}
mysqli_query($db_link, 'set names utf8');
?>