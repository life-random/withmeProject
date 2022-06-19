

<!-- 메뉴 창 -->
<?session_start();?>
<div class="menu">
    <div class="setting_menu">
        <table>
            <tr>
                <td colspan="2"><a href="index.php"><p id="title">with me</p></a></td>
            </tr>
            <tr>
                <td>&nbsp<a href="/index.php"><img src="img/common/home.png" alt="" class="icon_menu"></a></td>
                <td><a href="/index.php">&nbsp메인</a></td>
            </tr>
            <tr>
                <td><a href="https://www.naver.com/">&nbsp<img src="img/common/users.png" alt="" class="icon_menu"></a></td>
                <td><a href="https://www.naver.com/">&nbsp친구</a></td>
            </tr>
            <tr>
                <td><a href="">&nbsp<img src="img/common/list.png" alt="" class="icon_menu"></a></td>
                <td><a href="">&nbsp즐겨찾기</a></td>
            </tr>
            <tr>
               <td>&nbsp <a href="/mypage.php"><img src="img/common/setting.png" alt="" class="icon_menu"></a></td>
                <td> <a href="/mypage.php">&nbsp프로필</a></td>
            </tr>
            <tr>
                <td colspan="2"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" class="posting" style="width: 100%; background-color:orange; border: orange;">
                    게시물 쓰기
                </button></td>
            </tr>
            <tr>
                <?
                require 'proc/load_profile.php';
                echo "<td>&nbsp&nbsp <img src=".$p.$myprofile." class=\"icon_menu\"></td>
                
                <td><strong>".$userid."</strong></td>"
                ?>
            </tr>
            <tr>
                <td colspan="2"><button type="button" class="btn btn-primary" style="width: 70px; height: 30px; font-size : 8px;" onclick="/proc/logout_proc.php">로그아웃</button></td>
            </tr>
        </table>
    </div>
<div>