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
    <title>코오롱 인더스트리::고객센터</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
    <link rel="stylesheet" href="../product/product.css">
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <? include "../common/sub_head.html" ?>
        <!-- 서브6 비주얼+네비 공통 영역 -->
        <!-- 서브6 메인 비주얼 영역 -->
        <div class="visual">
            <img src="../sub6/common/images/sub6_main_bg.jpg" alt="">
            <div class="text_box">
                <h3>고객센터</h3>
                <p>customer service</p>
                <span></span> 
            </div>
        </div>
        <!-- 서브6 네비 영역 -->
        <div class="subnav_box">
               <div class="inner">
                <ul>
                    <li><a id="nav1" href="../sub6/sub6_1.html">온라인문의</a></li>
                    <li><a id="nav2" href="../sub6/sub6_2.html">자주하는질문</a></li>
                    <li><a id="nav3" href="list.php" class="current">제품검색</a></li>
                    <li><a id="nav4" href="../sub6/sub6_4.html">eKOLON CARD</a></li>
                </ul>
                </div>
        </div>
<!-- 본문 컨텐츠 영역 -->
<article id="content">
    <div class="title_area">
       <div class="inner">
        <div class="linemap">
            <span><i class="fas fa-home"></i></span> &gt; <span>고객센터</span> &gt; <strong>제품검색</strong>
        </div>
        <h2>제품검색</h2>
      </div>
    </div>
    <div class="content_area">
        <section class="notice">
           <h3 class="hidden">새글쓰기</h3>
            <div class="inner">
               <div class="form_wrap">
                   <form  name="board_form_product" method="post" action="insert.php">
                <ul>
                    <li class="row">
                        <ul>
                            <li class="ea_info_wrap">
                                <ul>
                                    <li class="tit">글쓴이</li>
                                    <li class="nick_box"><?=$usernick?> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="row">
                        <ul>
                            <li class="ea_info_wrap">
                                <ul>
                                    <li class="tit">
                                        <label for="subject">제품명</label>
                                    </li>
                                    <li>
                                        <input type="text" name="subject" id="subject">
                                    </li>
                                </ul>
                            </li>
                            <li class="ea_info_wrap">
                                <ul>
                                    <li class="tit">
                                        <label for="category">
                                            종류
                                        </label>
                                    </li>
                                    <li>
                                        <input type="text" name="category" id="category">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="row">
                        <ul>
                           <li class="ea_info_wrap">
                               <ul>
                                    <li class="tit">
                                        <label for="sorting">분류</label>
                                    </li>
                                    <li>
                                        <input type="text" name="sorting" id="sorting">
                                    </li>
                                </ul>
                           </li>
                           <li class="ea_info_wrap">
                              <ul>
                                    <li class="tit">
                                        <label for="content_use">용도</label>
                                    </li>
                                    <li>
                                        <input type="text" name="content" id="content_use">
                                    </li>
                                </ul>
                           </li>
                        </ul>
                    </li>
                    <li class="row bdb_1">
                        <ul>
                            <li class="ea_info_wrap">
                               <ul>
                                    <li class="tit">
                                        <label for="manager">
                                            담당자
                                        </label>
                                    </li>
                                    <li>
                                        <input type="text" name="manager" id="manager">
                                    </li>
                                </ul> 
                            </li>
                            <li class="ea_info_wrap">
                              <ul>
                                    <li class="tit">
                                        <label for="email">이메일</label>
                                    </li>
                                    <li>
                                        <input type="text" name="email" id="email">
                                    </li>
                                </ul>  
                            </li>
                        </ul>
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
             </div>
        </section>
    </div>
    <? include "../common/fixed_top.html" ?>  
</article>
      <? include "../common/sub_foot.html" ?>  

</body>
</html>