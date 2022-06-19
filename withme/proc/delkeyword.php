<?php 
require '/proc/select_proc.php';

session_start();
$userid = $_SESSION['userid'];
$ret = delete_keyword($userid);
echo $ret;

?> 