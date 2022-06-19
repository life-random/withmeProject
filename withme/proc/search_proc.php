<?php 
require 'dbconfig.php';
$keyword = $_POST["keyword"];
search_keyword($keyword, $id);
function search_keyword($keyword, $id) {
    $retlist = array();  // 디비에 리스트를 전달
    $conn = dbconn();  // db 연결
    /* DB 연결 확인 */
    // if($conn){ echo "Connection established"."<br>"; }
    // else{ die( 'Could not connect: ' . mysqli_error($conn) ); }
    
    /* SELECT 예제 */
    $sql = "INSERT INTO keyword (keyword, id, date)
    VALUES ('$keyword', '$id', now())
    WHERE NOT EXISTS 
    (SELECT * FROM keyword WHERE keyword = '$keyword' AND id = '$id' AND date = now())";
    $result = mysqli_query($conn, $sql);
    // $row = mysqli_fetch_array($result);
    while($row = mysqli_fetch_array($result)){
        array_push($retlist, $row['seq']."/".$row['keyword']."/".$row['cnt']);
    }
    $sql2 = "SELECT no, id, date, image, text FROM post where '$keyword' like text";
    $result2 = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            array_push($retlist, $row['no']."/".$row['id']."/".$row['date'].$row['image']."/".$row['text']);
        }

    mysqli_close($conn);
    return $retlist;
}

header("locarion: /slist.php");
$dblist = json_keyword();
$jsonlist = json_encode($dblist, JSON_UNESCAPED_UNICODE);   // json 포맷으로 변경
//header("location: /slist.php");
//echo urldecode($jsonlist);
header('Content-type: application/json'); // json을 화면 출력하기
echo $jsonlist;
?>