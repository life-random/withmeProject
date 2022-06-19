<?
    session_start();
    if(!isset($_SESSION['userid'])) {
        echo "<script>alert('로그인 후 다시 이용해주십시오');
        location.replace('login.php');</script>";            
    }
    else {
        $userid = $_SESSION['userid'];
    } 
?>