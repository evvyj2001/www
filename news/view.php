<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //$table=concert
    //$num=1
    //$page=1

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];
    
    // 이미지 추가되면서 추가된 내용 = 변수를 배열로 하는게 나중에 반복문등을 사용하기 편하다
	$image_name[0]   = $row[file_name_0]; // 첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0]; // 변환된 첨부파일 이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
    if ($is_html="y")
    {
    $item_content = str_replace("&lt;", "<", $item_content);
    $item_content = str_replace("&gt;", ">", $item_content);
    }
	
    // 추가된 내용
	for ($i=0; $i<3; $i++) // 첨부된 이미지 처리를 위한 for문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            // GetImageSize(서버에 업로드된 파일 경로 파일명)
            // 값이 배열형태로 리턴되는데
            // 파일의 너비[0]와 높이[1], 파일 종류[2]가 리턴된다. 
            
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

            if ($image_width[$i] > 785) 
            // 이미지 너비가 785이상일 경우 785로 최대너비 지정
                    $image_width[$i] = 785;
		}
		else // 첨부이미지 없을 경우
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
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
    <link rel="stylesheet" href="news.css">
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
                    <li><a id="nav2" href="../news/list.php" class="current">뉴스</a></li>
                    <li><a id="nav3" href="../greet/list.php">공지사항</a></li>
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
        <h2>뉴스</h2>
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
                        <div>
                   <?
                        for ($i=0; $i<3; $i++)  //업로드된 이미지를 for문으로 출력
                        {
                            if ($image_copied[$i]) //
                            {
                                $img_name = $image_copied[$i]; //실제 업로드된 이미지 변환 파일명
                                $img_name = "./data/".$img_name; 
                                 // ./data/2019_03_22_10_07_15_0.jpg
                                $img_width = $image_width[$i]; //이미지 너비 

                                echo "<img src='$img_name' width='$img_width'>";
                            }
                        }
                    ?>
                         </div>
                      <p><?= $item_content ?></p>
                    </div>
                    <ul class="buttons">
                        <li>
                            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
                        </li>
                    <? 
                        if($userid )  //로그인이 되면 글쓰기
                        {
                    ?>  
                        
                        
                        <li class="buttons_right">
                            <ul>
                                <li>
                                    <a href="write_form.php?table=<?=$table?>">글쓰기</a>
                                </li>
                    <?
                        }
                    ?>            
                    <? 
                        if($userid==$item_id || $userlevel==1 || $userid=="master")
                        {
                    ?>            
                                   
                                <li>
                                    <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>
                                </li>
                                <li>
                                    <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>
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