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
    
    <title>코오롱 인더스트리 회원가입</title>
    <link rel="apple-touch-icon-precomposed" href="app_icon.png">
    <link rel="apple-touch-startup-image" href="startup.png">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Questrial&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/sub_common.css">
    <link rel="stylesheet" href="css/member_form.css">
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
              <li><a href="ekolon.html"><img src="../images/common/icon_cardx2.jpg" alt="" width="37"><span>eKOLON</span></a></li>
               <li><a href="faq.html"><img src="../images/common/icon_faqx2.jpg" alt="" width="37"><span>FAQ</span></a></li>
               
               <li><a href="contact.html"><img src="../images/common/icon_contactx2.jpg" alt="" width="37"><span>Contact</span></a></li>
           </ul>
        </nav>    
    </header>
<!-- header 끝 -->
<article id="content">
<h2 class="hidden">회원가입</h2>
<section class="form_wrap">
<!-- 회원가입 시작 -->
<form  name="member_form" method="post" action="insert.php"> 
            <ul class="list_wrap">
                <li class="form_row">
                    <ul>
                        <li class="tit">
                            <label for="id">아이디</label>
                        </li>
                        <li>
                            <input type="text" name="id" id="id" required>
                             <span id="loadtext"></span>
                        </li>
                    </ul>
                </li>
                <li class="form_row pw">
                    <ul>
                        <li class="tit">
                            <label for="pass">비밀번호</label>
                        </li>
                        <li>
                            <input type="password" name="pass" id="pass" required>
                        </li>
                    </ul>
                </li>
                <li class="form_row pw_check">
                    <ul>
                        <li class="tit">
                            <label for="pass_confirm">비밀번호 확인</label>
                        </li>
                        <li>
                            <input type="password" name="pass_confirm" id="pass_confirm"  required>
                        </li>
                    </ul>
                </li>
                <li class="form_row">
                    <ul>
                        <li class="tit">
                            <label for="name">이름</label>
                        </li>
                        <li>
                            <input type="text" name="name" id="name"  required>
                        </li>
                    </ul>
                </li>
                <li class="form_row">
                    <ul>
                        <li class="tit">
                            <label for="nick">닉네임</label>
                        </li>
                        <li>
                             <input type="text" name="nick" id="nick"  required>
                         <span id="loadtext2"></span>

                        </li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="form_row tel">
                    <ul>
                        <li class="tit">
                            <span>휴대폰 번호</span>
                        </li>
                        <li>
                            <ul class="tel_num">
                                <li>
                                    <label class="hidden" for="hp1">전화번호앞3자리</label>
                    <select class="hp" name="hp1" id="hp1"> 
                  <option value='010'>010</option>
                  <option value='011'>011</option>
                  <option value='016'>016</option>
                  <option value='017'>017</option>
                  <option value='018'>018</option>
                  <option value='019'>019</option>
                  </select> 
                                </li>
                                <li>
                                    <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2"  required>
                                </li>
                                <li>
                                    <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3"  required>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="form_row email">
                    <ul>
                        <li class="tit">
                            <span>이메일</span>
                        </li>
                        <li class="email_input">
                            <ul>
                                <li>
                                    <label class="hidden" for="email1">이메일아이디</label>
                                    <input type="text" id="email1" name="email1"  required> 
                                </li>
                                <li class="dot">
                                    <span>@ </span>
                                </li>
                                <li>
                                    <label class="hidden" for="email2">이메일주소</label>
                                    <input type="text" name="email2" id="email2"  required>
                                </li>
                            </ul>
                          
                    
                       </li>
                    </ul>
                </li>
            </ul>
            <ul class="button">
                <li class="join_btn"><a href="#" onclick="check_input()">회원가입</a></li>
                <li class="reset_btn"><a href="#" onclick="reset_form()">지우기</a></li>
                <li class="cancel_btn"><a href="../" onclick="">취소</a></li>
            </ul>
        </form> 
    </section>    
</article>   
 <div class="fixed">
       <!-- ekolon 버튼 -->
        <a href="../ekolon.html" class="ekolon_btn">
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
	 $(document).ready(function() {
  
   
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시 
     //(.keyup-> 바로확인가능하게)
    var id = $('#id').val(); //aaa value 가져오는 함수

    $.ajax({
        type: "POST", // get, post
        url: "check_id.php", // 중복검사 처리되는 php 파일 경로
        data: "id="+ id, // 넘어가는 ? 뒤의 값 (?id=aaa)
        cache: false, // 캐시 남기지 말것
        success: function(data) //위의 처리가 완료되면 
        {
             $("#loadtext").html(data); //#loadtext에 check_id.php의 내용 출력
            //스크립트에서 ajax쓸때는 data란 매개변수 넣어줘야 한다. 
            //success의 data 란 변수 안에 check_id.php에서 처리된 값이 들어간다.
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
    </script>
	<script>
    function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
    </div>
    </body>
</html>