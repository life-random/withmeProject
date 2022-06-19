<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>with me - 메인</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <style type="text/css">
        @import url("/css/main.css");
    </style>
</head>

<body>
    <?
        include_once  $_SERVER["DOCUMENT_ROOT"].'/proc/check_login_proc.php';
    ?>
    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">수정</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
              <label for="profile">프로필 사진:</label>
              <input type="text" class="form-control" id="profile" name="profile" readonly>
              <label for="name">이름:</label>
              <input type="text" class="form-control" id="name" name="name">
              <label for="date">생일:</label>
              <input type="text" class="form-control" id="birthday" name="birthday" readonly>
              <label for="intro">소개:</label>
              <textarea name="intro" id="intro" cols="30" rows="10"></textarea>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick='modi()'>수정</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">취소</button>
        </div>

      </div>
    </div>
  </div>

<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/proc/check_login_proc.php';
    
    ?>

    <?php
    include 'menu.php';
    
    ?>
    <div class="main" style=" border: none;">
        <!-- <div id="myprofile" style="width: 100; border-left: 1px solid #000;
                        border-right: 1px solid #000;">
            
        </div> -->
        <div class="post"style="width: 100; border-left: 1px solid #000;
                        border-right: 1px solid #000;">
                        <?
                // require '/proc/dbconfig.php';
                session_start();

                $userid = $_SESSION['userid'] ;
            
                $conn = dbconn();
                $sql = "SELECT * FROM member WHERE id = '$userid'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo"<table>
                <tr>
                    <td><img src=\"img/profile/".$row['profile']."\" alt='' class=\"icon_menu\" style=\"width: 100px; max-height: 100px;height: auto; \"></td>
                    <td><strong>".$row['name']."</strong><br>".$row['birthday']."</td></tr>";
                echo"<tr>
                    <td colspan=\"2\">".$row['intro']."</td>
                </tr><tr>";
                echo "<td><button type='button' class='btn btn-primary' onclick='showmodal(\"".$row['profile']."\",\"". $row['name']."\",\"".$row['birthday']."\",\"".$row['intro']."\")'>수정</button></td>";
                echo "<td><button type='button' class='btn btn-danger' onclick='del($userid)'>계정삭제</button></td></tr></table>";
            ?>
            <hr>
                <?php
                    $p = '/img/profile/';
                    
                    include_once $_SERVER["DOCUMENT_ROOT"].'/proc/select_proc.php';
                    $retlist = select_mypage();
                    foreach($retlist as $key => $value) {
                        echo "<table class=\"main_post\">";
                        $sp = explode("/", $value);
                        // <img src=\"".$src."\" class=\"icon_menu\">
                        echo "<tr style=\"text-align: left;width: 100%;\"><td><a href=\"profile\" name=\"".$sp[0]."\" class=\"btn\"></td><td><img src=\"".$p.$sp[1]."\" class=\"icon_menu\"><strong>"
                        .$sp[2]."</strong></td></a><td>".$sp[3]."</td></tr>";
                    $src = $p.$sp[4];
                    
                        if($sp[4] != ""){
                            echo "<tr><td colspan='3'><div sytle=\"margin: 0px auto;\"><img src=\"".$p.$sp[4]."\"></div></td></tr>";
                        }
                        echo "<tr><td colspan='3' style=\"text-align: left;width: 100%;\">".$sp[5]."</td></tr></table><hr>";

                    } 
                ?>
            
            <!--     min-width: 50%;
    max-width: 80%;
    height: auto;
    margin: 0px auto; -->
        </div>
    </div>
    
    <?php
    include 'sub.php';
    ?>
<script>

// 수정 모달창 띄우기
function showmodal(profile, name, birthday, intro){
  // alert(seq + " " + keyword);
  $("#profile").val(profile);
  $("#name").val(name);
  $("#birthday").val(birthday);
  $("#intro").val(intro);
  $('#myModal').modal('show');
}

// 수정 버튼
function modi(){
  var ret = confirm("수정 할래?");
  if (ret != true) {
    //alert("삭제 되었습니다");
    return;
  }
  // 모달창 텍스트 박스 값 읽기
  var profile = $("#profile").val(profile);
  var name =$("#name").val(name);
  var birthday =$("#birthday").val(birthday);
  var intro =$("#intro").val(intro);
  // 데이터 보내기
  $.post("proc/modimember.php",
  {
    profile: profile,
    name: name,
    birthday: birthday,
    intro: intro
  },
  function(data, tatus){
    if (data == 1) {
      alert("수정 되었습니다.");
    } else {
      alert("수정 실패!!\n관리자에게 문의");
    }
    location.reload();
    // $("div").html(data);
  });
}
function del(userid){
  var ret = confirm("삭제 할래?");
  if (ret != true) {
    //alert("삭제 되었습니다");
    return;
  }
  $.post("proc/delkeyword.php",
  {
    seq: seq
  },
  function(data, tatus){
    if (data == 1) {
      alert("삭제 되었습니다.");
    } else {
      alert("삭제 실패!!\n관리자에게 문의");
    }
    location.reload();
    // $("div").html(data);
  });
}
</script>

</body>
</html>
