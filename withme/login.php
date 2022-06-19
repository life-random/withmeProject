<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WITHME - 로그인</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
    
</head>
<body>
    <div class="wrapper" style="float: left;">
        <div class="content">
            <h1 id="title">WITH ME</h1>
            <img src="img/common/bg1.jpg" alt="" id="bg">
        </div>
    </div>
    <div class="wrapper" style="float: right;">

     <div class="container" id="logindiv">
            <form action="proc/login_proc.php" class="needs-validation"  method="POST" novalidate>
                <div class="form-group">
                    <input type="text" class="form-control" id="id" placeholder="아이디" name="id" required>
                    <div class="invalid-feedback">아이디를 입력하지 않았습니다</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="pw" placeholder="비밀번호" name="pw" required>
                    <div class="invalid-feedback">비밀번호를 입력하지 않았습니다</div>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">로그인</button>
            </form>
            <hr>
            <p>혹시 계정이 없으신가요?</p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="width: 100%; background-color:orange; border: orange;">
                새 계정 만들기
            </button>
        </div>    
        <!-- The Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">가입하기</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                    <form action="proc/sign_up_proc.php" method="POST" novalidate>
                        <div class="form-group">
                            <input type="email" class="form-control" id="sid" placeholder="아이디" name="sid" required>
                            <div class="invalid-feedback">아이디를 입력하지 않았습니다</div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="spw" placeholder="비밀번호" name="spw" required>
                            <div class="invalid-feedback">비밀번호를 입력하지 않았습니다</div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="sname" placeholder="사용자명" name="sname" required>
                            <div class="invalid-feedback">사용자명를 입력하지 않았습니다</div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="sdate" placeholder="생년월일 8자리" name="sdate" required>
                            <div class="invalid-feedback">생년월일를 입력하지 않았습니다</div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color:orange; border: orange; ">회원가입</button>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
// 유효성 검사
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>