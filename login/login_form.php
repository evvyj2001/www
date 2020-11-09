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
    <title>코오롱 인더스트리 로그인</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="member.css">
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<body>
  <div id="content">
     <h2 class="hidden">로그인페이지</h2>
      <div class="inner_wrap">
         <h1><a href="../" class="logo">코오롱인더스트리</a></h1>
         <div class="login_wrap">
             <form  name="member_form" method="post" action="login.php">
                 <div class="login_form">
                     <h3>로그인</h3>
                     <div class="input_box">
                        <ul>
                            <li>
                                <label class="hidden" for="id">아이디</label>
                                <input type="text" name="id" id="id" class="login_input" placeholder="아이디를 입력해주세요">
                            </li>
                            <li>
                                <label class="hidden" for="pass">비밀번호</label>   
                                <input type="password" name="pass" id="pass" class="pass_input" placeholder="비밀번호를 입력해주세요">
                                <a href="#java" class="lock">
                                    <i class="fas fa-lock"></i>
                                </a>
                            </li>
                        </ul>						
                     </div>
                     <div class="find_box">
                         <ul>
                            <li class="join_btn">
                             <a href="../member/join.html" >회원가입</a>
                             </li>
                            <li class="find_right">
                               <ul>
                                   <li><a href="findid_form.php">아이디 찾기</a></li>
                                   <li class="pw"><a href="findpw_form.php">비밀번호 재설정</a></li>
                               </ul> 
                            </li>
                             
                         </ul>
                     </div>
                     <ul class="buttons">
                         <li class="login_button">
                             <input type="submit" value="로그인"> 
                         </li>
                         
                     </ul>
                 </div> <!-- end of form_login --> 
                <div class="banner_wrap">
                    <a href="../sub6/sub6_4.html">
                    <img src="image/banner.jpg" alt="합리적인소비로의지름길"></a>
                </div> 
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
    <script>
        $(document).ready(function(){
            $('.input_box .lock').toggle(function(){
                $('#pass').attr('type','text');
                $(this).find('i').removeClass('fa-lock').addClass('fa-lock-open').css('color','#999');
            },function(){
                $('#pass').attr('type','password');
                 $(this).find('i').removeClass('fa-lock-open').addClass('fa-lock').css('color','#ddd');
            })
        });
      </script>
    </div>
</body>
</html>