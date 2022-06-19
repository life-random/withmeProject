<?php
// 설정
$uploads_dir = $_SERVER["DOCUMENT_ROOT"].'/img/profile';
$allowed_ext = array('jpg','jpeg','png','gif');
 
// 변수 정리
$error = $_FILES['img']['error'];
$name = $_FILES['img']['name'];
$ext = array_pop(explode('.', $name));
 
// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
            // header('location:/');
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
            // header('location:/');
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
    // header('location:/');
}
 
// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo "<script>alert(\"허용되지 않는 확장자입니다.\")</script>";

    header('location:/');
	// exit;
}
 
// 파일 이동
move_uploaded_file( $_FILES['img']['tmp_name'], "$uploads_dir/$name");

// 파일 정보 출력   
echo "<h2>파일 정보</h2>
<ul>
	<li>파일명: $name</li>
	<li>확장자: $ext</li>
	<li>파일형식: {$_FILES['img']['type']}</li>
	<li>파일크기: {$_FILES['img']['size']} 바이트</li>
</ul>";

require 'dbconfig.php';
session_start();

$userid = $_SESSION['userid'];
$text = $_POST['text'];
$text2 = nl2br($text);

$conn = dbconn();
$sql = "INSERT INTO `post` (`id`, `date`, `image`, `text`) VALUES ('$userid', now(), '$name', '$text2');";
$result = mysqli_query($conn, $sql);
header('location:/');
?>
