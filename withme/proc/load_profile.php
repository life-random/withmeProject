<?
 require 'dbconfig.php';
 session_start();
$p = '/img/profile/';
 $id = $_SESSION['userid'];
 $conn = dbconn();
 $sql = "SELECT profile, name FROM member WHERE id = '$id'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result);
 $myprofile = $row['profile'];
 $myname = $row['name'];;
?>
