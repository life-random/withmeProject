<?php 
    require 'dbconfig.php';
    session_start();

    $id = $_POST["id"];
    $pw = $_POST["pw"];

    $conn = dbconn();
    $sql = "SELECT * FROM member WHERE id = '$id' and pw = '$pw'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_array($result)){
        $_SESSION['userid'] = $row['id'];
        mysqli_close($conn);
        echo "<script> alert('$name님 로그인 되었습니다');
        location.href='/' </script>";
        //header("location: /index.php");
    }
    else{
        mysqli_close($conn);
        echo "<script> alert('아이디가 없거나 패스워드가 틀렸습니다');
        location.href='/login.php' </script>";
        //header("location: /login.php");
    }
    
?> 