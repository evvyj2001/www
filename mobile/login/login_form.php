<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    
    <title>코오롱 인더스트리 로그인</title>
    <link rel="apple-touch-icon-precomposed" href="app_icon.png">
    <link rel="apple-touch-startup-image" href="startup.png">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sub_common.css">
    <link rel="stylesheet" href="member.css">
<!--    <link rel="stylesheet" href="../css/ekolon.css">-->
    <script src="../js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <script>
      // <![CDATA[
      try {
       window.addEventListener('load', function(){
        setTimeout(scrollTo, 0, 0, 1); 
       }, false);
      } 
      catch(e) {}
      // ]]>
     </script>
     <!--[if lt IE 9]> 
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
</head>
<body>
 <!-- 스킵 네비게이션 -->
<div id="skipNav">
    <a href="#content">본문바로가기</a>
    <a href="#gnb">네비게이션바로가기</a>
</div>
<div id="wrap">
<!-- header 시작 -->
    <!-- 스킵 네비게이션 -->
<div id="skipNav">
    <a href="#content">본문바로가기</a>
    <a href="#gnb">네비게이션바로가기</a>
</div>
<div id="wrap">
    <header id="headerArea" class="mn_open">
       <div class="header_inner">
            <h1><a href="../">로고</a></h1>
            <a href="#vi1" class="menu_ham">
                <span>햄버거</span>
            </a>
       </div>
        <nav id="gnb">
           <h2 class="hidden">글로벌 네비게이션 영역</h2>
           <div class="user_menu">
              <?
                if(!$userid) //세션변수가 생성되어있지 않으면 == 로그인 안된 상태
                {
              ?> 
               <ul>
                   <li class="user_info hidden">
                       <p><span>*** </span>님 (Level.*)</p>
                   </li>  
                   <li class="login">
                       <a href="../login/login_form.php">로그인</a>
                   </li>
                   <li class="modify">
                       <a href="../member/join.html">회원가입</a>
                   </li>
               </ul>
               <?
                    }
                    else //세션변수 생성되어있는 상태 == 로그인 되어있는 상태
                    {                
                ?>
                <ul>
                   <li class="user_info">
                       <p><span><?=$usernick?> </span>님 (LV.<?=$userlevel?>)</p>
                   </li>  
                   <li class="login">
                       <a href="../login/logout.php">로그아웃</a>
                   </li>
                   <li class="modify">
                       <a href="../login/member_form_modify.php">정보수정</a>
                   </li>
               </ul>
                <?
                    }
                ?>
           </div>
           <ul class="main_menu">
               <li class="d1 hide">
                   <h3><a class="depth1" href="#">company<span>회사소개</span></a></h3>
                   <ul class="depth2">
                       <li><a href="../sub1_1.html">기업개요</a></li>
                       <li><a href="../sub1_2.html">경영철학</a></li>
                   </ul>
               </li>
               <li class="d2 hide">
                   <h3><a class="depth1" href="#">business<span>사업분야</span></a></h3>
                   <ul class="depth2">
                       <li><a href="../sub2_1.html">산업자재</a></li>
                       <li><a href="../sub2_2.html">필름/전자재료</a></li>
                       <li><a href="../sub2_3.html">패션</a></li>
                   </ul>
               </li>
               <li class="d3 hide">
                   <h3><a class="depth1" href="#">r &amp; d<span>연구개발</span></a></h3>
                   <ul class="depth2">
                       <li><a href="../sub3_1.html">R&amp;D 개요</a></li>
                       <li><a href="../sub3_2.html">지식재산권</a></li>
                       <li><a href="../sub3_3.html">연구분야</a></li>
                   </ul>
               </li>
               <li class="d4 hide">
                   <h3><a class="depth1" href="#">incruit<span>채용정보</span></a></h3>
                   <ul class="depth2">
                       <li><a href="../sub4_1.html">인재상</a></li>
                       <li><a href="../sub4_2.html">인사제도</a></li>
                   </ul>
               </li>
           </ul>
           <ul class="btm_menu">
              <li><a href="../ekolon.html"><img src="../images/common/icon_cardx2.jpg" alt="" width="37"><span>eKOLON</span></a></li>
               <li><a href="../faq.html"><img src="../images/common/icon_faqx2.jpg" alt="" width="37"><span>FAQ</span></a></li>
               
               <li><a href="../contact.html"><img src="../images/common/icon_contactx2.jpg" alt="" width="37"><span>Contact</span></a></li>
           </ul>
        </nav>    
    </header>
<!-- header 끝 -->
<article id="content">
    <form  name="member_form" method="post" action="login.php">
                <h3 class="hidden">로그인</h3>
                 <div class="login_form">
                     <div class="input_box">
                        <ul class="insert_wrap">
                            <li>
                                <label class="hidden" for="id">아이디</label>
                                <input type="text" name="id" id="id" class="login_input" placeholder="아이디를 입력해주세요">
                            </li>
                            <li>
                                <label class="hidden" for="pass">패스워드</label>   
                                <input type="password" name="pass" id="pass" class="pass_input" placeholder="패스워드를 입력해주세요">
                                <a href="#java" class="lock">
                                    <i class="fas fa-lock"></i>
                                </a>
                            </li>
                        </ul>						
                     </div>

                 </div> <!-- end of form_login --> 
                <ul class="buttons">
                         <li class="login_button">
                             <input type="submit" value="로그인"> 
                         </li>
                         <li class="join_btn">
                            <p>아직 회원이 아니신가요?</p>
                             <a href="../member/join.html" >회원가입</a>
                         </li>
                     </ul>
             </form> 
</article>
 <div class="fixed">
       <!-- ekolon 버튼 -->
        <a href="ekolon.html" class="ekolon_btn">
            <i class="fas fa-user-alt"></i>
        </a>
        <!-- top 버튼-->
        <a href="javascript:void(0);" class="top_btn">
            <i class="fas fa-chevron-up"></i>
        </a>   
    </div>
    
    <!-- 푸터 영역 -->
    <footer id="footerArea">
        <ul class="footer_link">
            <li><a href="#">개인정보 처리방침</a></li>
            <li><a href="#">표준공시정보관리규정</a></li>
        </ul>
        <img src="../images/common/footer_logox2.jpg" alt="" class="footer_logo" width="180">
        <p>서울특별시 강서구 마곡동로 110(마곡동) 코오롱타워<br>COPYRIGHT© KOLON INDUSTRIES</p>
        <div class="family_wrap">
            <a href="#fs" class="arrow">
               패밀리 사이트
                <span><span class="hidden">패밀리사이트열기</span><i class="fas fa-chevron-up"></i></span>
            </a>
            <ul class="family_list">
                        <li><a href="https://www.kolon.com/main/main.do" target="_blank">코오롱 그룹</a></li>
                        <li><a href="http://www.kolonglobal.com/main.asp" target="_blank">코오롱 글로벌</a></li>
                        <li><a href="https://kolonfnc.com/" target="_blank">코오롱 FnC</a></li>
                        <li><a href="https://www.kolonls.co.kr/main" target="_blank">코오롱 생명과학</a></li>
                        <li><a href="http://www.kolonpharm.co.kr/" target="_blank">코오롱 제약</a></li>
                    </ul>
        </div>
        <ul class="sns_wrap">
                   <li><a href="#"><span class="hidden">페이스북</span>
                   <i class="fab fa-facebook-f"></i></a></li>
                   <li><a href="#"><span class="hidden">트위터</span>
                   <i class="fab fa-twitter"></i></a></li>
                   <li><a href="#"><span class="hidden">인스타그램</span>
                   <i class="fab fa-instagram"></i></a></li>
                   <li><a href="#"><span class="hidden">유투브</span>
                   <i class="fab fa-youtube"></i></a></li>
        </ul>
        <a href="http://evvyj2001.cafe24.com/" class="view_pc" target="_blank">PC 버전으로 보기</a>
    </footer>
</div>


<!-- 공통 스크립트 -->
<script src="../js/jquery-1.12.4.min.js"></script> 
<script src="../js/jquery-migrate-1.4.1.min.js"></script>
<script src="../js/common/script.js"></script>
<script src="../js/common/header.js"></script>
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