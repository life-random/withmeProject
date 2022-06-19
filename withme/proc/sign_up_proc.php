<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/proc/dbconfig.php';

$id = $_POST["sid"];
$pw = $_POST["spw"];
$name = $_POST["sname"];
$date = $_POST["sdate"];

insert_sign_up($id, $pw, $name, $date);

function insert_sign_up($id, $pw, $name, $date) {
        
    $conn = dbconn();
    $sql = "INSERT INTO member (id, pw, name, birthday) VALUES ('$id', '$pw', '$name', '$date')";
    $result = mysqli_query($conn, $sql);
    
    mysqli_close($conn);
}
?>
<script>
    alert("회원가입 되었습니다");
    location.replace('/login.php');
</script>