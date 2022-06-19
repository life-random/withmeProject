<?php 
require 'db.php';
session_start();
$userid = $_SESSION['userid'];
$profile = $_POST["profile"];
$name = $_POST["name"];
$birthday = $_POST["birthday"];
$intro = $_POST["intro"];
$ret = update_member($profile, $name, $birthday, $intro, $userid);
echo $ret;
?> 