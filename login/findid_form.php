<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>코오롱 인더스트리 아이디찾기</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../login/member.css">
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<body>
  <div id="content">
     <h2 class="hidden">아이디찾기</h2>
      <div class="inner_wrap find">
         <h1><a href="../" class="logo">코오롱인더스트리</a></h1>
         <div class="login_wrap">
             <form action="findid.php" method="post">
                <div>
                 <h3>아이디 찾기</h3>
                 <div class="input_box">
                     <ul>
                         <li>
                             <label for="name" hidden>이름</label>
                             <input type="text" name="name" id="name" placeholder="이름을 입력해주세요.">
                         </li>
                         <li>
                             <label for="email" hidden>
                             이메일
                         </label>
                         <input type="text" name="email" id="email" placeholder="이메일을 입력해주세요">
                         </li>
                     </ul>
                 </div>

                </div>
                 
                 <ul class="buttons">
                     <li>
                         <input type="submit" value="아이디 찾기">
                     </li>
                 </ul>
                 <p class="forgot_pw">비밀번호를 잃어버리셨나요? <a href="findpw_form.php"><i class="fas fa-key"></i>비밀번호 재설정</a></p>
             </form>
         </div>
         <a href="javascript:;" class="close_icon" onclick="join_cancel()"><img src="image/siteMapClose.png" alt=""></a>
      </div>  
    <? include "../common/sub_foot.html" ?>
    <script>        
        function join_cancel(){
            history.go(-1);
        }
    </script>
    
    </div>
</body>
</html>