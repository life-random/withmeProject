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
<?php
    include_once  $_SERVER["DOCUMENT_ROOT"].'/proc/check_login_proc.php';
    
    ?>
    <!-- The Modal -->
    <form enctype='multipart/form-data' action="proc/upload_proc.php" method="POST">
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content" style="z-index: 9999;">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">게시하기</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    
                    <div class="modal-body">          
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" name="text" placeholder="여러소식을 사람들과 공유해보세요!"></textarea>
                        </div> 
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input type="file" name="img" />                
                        <button type="submit" class="btn btn-primary" sytle="background-color:orange; border: orange;">게시하기</button>
                    </div>
                
                </div>
            </div>
        </div>   
    </form>
    <?php
    include 'menu.php';
    
    ?>
    <div class="main" style=" border: none;">
        <div class="post"style="width: 100; border-left: 1px solid #000;
                        border-right: 1px solid #000;">
                <?php
                    $p = '/img/profile/';
                    
                    include_once $_SERVER["DOCUMENT_ROOT"].'/proc/select_proc.php';
                    $retlist = select_main();
                    foreach($retlist as $key => $value) {
                        echo "<table class=\"main_post\">";
                        $sp = explode("/", $value);
                        // <img src=\"".$src."\" class=\"icon_menu\">
                        echo "<tr style=\"text-align: left;width: 100%;\"><td><a href=\"profile\" name=\"".$sp[0]."\" class=\"btn\"></td><td><img src=\"".$p.$sp[1]."\" class=\"icon_menu\"><strong>"
                        .$sp[2]."</strong></td></a><td>".$sp[3]."</td></tr>";
                        $src = $p.$sp[4];
                    
                        if($sp[4] != ""){
                            echo "<tr><td colspan='3'><div sytle=\"margin: 0px auto;\"><img src=\"".$p.$sp[4]."\" style=\"min-width: 50%; max-width: 80%; height: auto;\"></div></td></tr>";
                        }
                        echo "<tr><td colspan='3' style=\"text-align: left;width: 100%;\">".$sp[5]."</td></tr></table><hr>";

                    } 
                ?>
        </div>
    </div>
    
    <?php
    include 'sub.php';
    ?>

    

</body>
</html>
