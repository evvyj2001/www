<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1
    
    
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];
    
    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")// 일반 글쓰기 모드일때
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
        // 엔터해서 줄내림 처리 
	}	
    if ($is_html="y"){
    $item_content = str_replace("&lt;", "<", $item_content);
    $item_content = str_replace("&gt;", ">", $item_content);
    }

	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
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
    <script>
        function del(href) 
        {
            if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                    document.location.href = href;
            }
        }
    </script>
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
           <h3 class="hidden">게시글보기</h3>
            <div class="inner">
                <div class="view_wrap">
                    <h4 class="view_tit"><?= $item_subject ?></h4>
                    <ul class="view_info">
                        <li>
                            <ul>
                                <li class="tit">글쓴이</li>
                                <li><?= $item_nick ?></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li class="tit">등록일</li>
                                <li><?= $item_date ?></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="view_content">
                        <p><?= $item_content ?></p>
                    </div>
                    <ul class="buttons">
                        <li>
                            <a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
                        </li>
                    <? 
                        if($userid )  //로그인이 되면 글쓰기
                        {
                    ?>  
                        
                        
                        <li class="buttons_right">
                            <ul>
                                <li>
                                    <a href="write_form.php">글쓰기</a>
                                </li>
                    <?
                        }
                    ?>            
                    <? 
                        if($userid==$item_id || $userlevel==1 || $userid=="master")
                        {
                    ?>            
                                   
                                <li>
                                    <a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>
                                </li>
                                <li>
                                    <a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>
                                </li>
                    <?
                        }
                    ?>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </section>
    </div>
    <? include "../common/fixed_top.html" ?>  
</article>
      <? include "../common/sub_foot.html" ?>  

</body>
</html>