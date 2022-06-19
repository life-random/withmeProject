<?
    
    // include_once $_SERVER["DOCUMENT_ROOT"].'/proc/dbconfig.php';
    function select_main() {
        $retlist = array();  // 디비에 리스트를 전달
        $conn = dbconn();  // db 연결
        /* DB 연결 확인 */
        // if($conn){ echo "Connection established"."<br>"; }
        // else{ die( 'Could not connect: ' . mysqli_error($conn) ); }
        
        /* SELECT 예제 */
        $sql = "SELECT m.id, m.profile, m.name, p.date, p.image, p.text FROM post AS p JOIN member AS m ON p.id = m.id ORDER BY p.date DESC;";
        $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            array_push($retlist, $row['id']."/".$row['profile']."/".$row['name']."/".$row['date']."/".$row['image']."/".$row['text']);
            // echo $retlist, $row['id']."/".$row['profile']."/".$row['name']."/".$row['date']."/".$row['image']."/".$row['text'];
        }
        // echo $retlist, "안녕";
        mysqli_close($conn);
        return $retlist;
}

    function select_mypage() {
        $retlist = array();  // 디비에 리스트를 전달
        $conn = dbconn();  // db 연결
        session_start();
        $userid = $_SESSION['userid'];

        /* SELECT 예제 */
        $sql = "SELECT m.id, m.profile, m.name, p.date, p.image, p.text FROM post AS p JOIN member AS m ON p.id = m.id WHERE p.id = '$userid' ORDER BY p.date DESC;";
        $result = mysqli_query($conn, $sql);
        // $row = mysqli_fetch_array($result);
        while($row = mysqli_fetch_array($result)){
            array_push($retlist, $row['id']."/".$row['profile']."/".$row['name']."/".$row['date']."/".$row['image']."/".$row['text']);
            // echo $retlist, $row['id']."/".$row['profile']."/".$row['name']."/".$row['date']."/".$row['image']."/".$row['text'];
        }
        // echo $retlist, "안녕";
        mysqli_close($conn);
        return $retlist;
    }
    
    function update_member($profile, $name, $birthday, $intro, $userid) {
        
        $conn = dbconn();  // db 연결
        /* DB 연결 확인 */
        // if($conn){ echo "연결성공"."<br>"; }
        // else{ die( '연결실패: ' . mysqli_error($conn) ); }
        
        $sql = "UPDATE member SET profile = '$profile', name = '$name', birthday = '$birthday', intro = '$intro' WHERE id = '$userid'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function delete_member($userid) {
        $conn = dbconn();  // db 연결
        $sql = "DELETE FROM member WHERE id = '$userid'";
        $result = mysqli_query($conn, $sql);
        $sql2= "DELETE FROM post WHERE id = '$userid'";
        mysqli_query($conn, $sql2);
        mysqli_close($conn);

        return $result;
    }
?>