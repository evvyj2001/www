<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>코오롱 인더스트리::홍보센터</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="../greet/greet.css">
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <? include "../common/sub_head.html" ?>
        <!-- 서브5 비주얼+네비 공통 영역 -->
        <!-- 서브5 메인 비주얼 영역 -->
        <div class="visual">
            <img src="../sub5/common/images/sub5_main_bg.jpg" alt="">
            <div class="text_box">
                <h3>홍보센터</h3>
                <p>pr center</p>
                <span></span> 
            </div>
        </div>
        <!-- 서브5 네비 영역 -->
        <div class="subnav_box">
               <div class="inner">
                <ul>
                    <li><a id="nav1" href="../sub5/sub5_1.html">CI</a></li>
                    <li><a id="nav2" href="../news/list.php">뉴스</a></li>
                    <li><a id="nav3" href="../greet/list.php" class="current">공지사항</a></li>
                </ul>
                </div>
        </div>
<!-- 본문 컨텐츠 영역 -->
<article id="content">
    <div class="title_area">
       <div class="inner">
        <div class="linemap">
            <span><i class="fas fa-home"></i></span> &gt; <span>홍보센터</span> &gt; <strong>공지사항</strong>
        </div>
        <h2>공지사항</h2>
      </div>
    </div>
    <div class="content_area">
        <section class="notice">
           <h3 class="hidden">새글쓰기</h3>
            <div class="inner">
                <form  name="board_form" method="post" action="insert.php">
                    <ul class="row1">
                        <li>
                            <ul>
                                <li class="tit">글쓴이</li>
                                <li>
                                   <?=$usernick?> 
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="tit html">
                                <input type="checkbox" id="html_ok" name="html_ok"> 
                            <label for="html_ok">Html 사용</label></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="row2">
                        <li class="tit"><label for="subject">제목</label></li>
                        <li>
                            <input type="text" name="subject" id="subject">
                        </li>
                    </ul>
                    <ul class="row3">
                        <li class="tit"><span>
                        게시글 내용</span></li>
                        <li>
                            <textarea rows="15" cols="79" name="content" id="content"></textarea>
                        </li>
                    </ul>
                    <ul class="buttons write">
                        <li>
                            <input type="submit" value="등록">
                        </li>
                        <li>
                            <a href="list.php?page=<?=$page?>">목록</a>
                        </li>
                    </ul>
                    
                </form>

            </div>
        </section>
    </div>
    <? include "../common/fixed_top.html" ?>  
</article>
      <? include "../common/sub_foot.html" ?>  

</body>
</html>