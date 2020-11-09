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
<?
	include "../lib/dbconn.php";

	
  if (!$scale)
    $scale=5;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from product where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from product order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>
<body>
    <? include "../common/sub_head.html" ?>
        <!-- 서브5 비주얼+네비 공통 영역 -->
        <!-- 서브5 메인 비주얼 영역 -->
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
           <h3 class="hidden">공지사항 목록</h3>
            <div class="inner">
            <div class="product_top">
    <!-- 게시물 현황 + 검색 기능 -->
                <form  name="board_form" method="post" action="list.php?mode=search">
                    <ul class="search_wrap">
                        <li>
                            <select name="find">
                                <option value='subject'>제품명</option>
                                <option value='category'>종류</option>
                                <option value='sorting'>분류</option>
                                <option value='content'>용도</option>
                            </select>
                        </li>
                        <li class="search_border">
                           <label for="search" class="hidden">검색창</label>
                            <input type="text" name="search" id="searchProduct" placeholder="검색어 입력">
                            <input type="image" src="images/search_icon.jpg" class="search_icon" alt="검색">
                        </li>
                    </ul>
                    <ul class="keyword">
                       <ul> 
                           <li><strong>연관검색어</strong></li>
                           <li>타이어코오드</li>
                           <li>에어백</li>
                           <li>증착필름</li>
                           <li>모니터</li>
                           <li>잉크</li>
                       </ul>
                       
                    </ul>
                    <ul class="list_statue">
                        <li>
                        <p>총 
                            <span><?= $total_record ?></span>건의 검색결과가 있습니다.
                        </p>
                        </li>
                    </ul>
                </form>
             <!-- 게시물 현황 + 검색 기능 end -->
            </div>
            <div class="product_list">
               
               <div class="list_content">
                   <?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];

      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);
       
       

	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
      $item_content = str_replace(" ", "&nbsp;", $row[content]);
      $item_category = str_replace(" ", "&nbsp;", $row[category]);
      $item_sorting = str_replace(" ", "&nbsp;", $row[sorting]);
      $item_manager = str_replace(" ", "&nbsp;", $row[manager]);
      $item_email = str_replace(" ", "&nbsp;", $row[email]); 

?>
              <ul class="list_row">
                <? 
                        if($userid==$item_id || $userlevel==1 || $userid=="master")
                        {
                    ?> 
                 <li class="row subject">
                     <a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>"><?= $item_subject ?></a>
                 </li>
                 <? 
                }else {
                ?>
                    <li class="row subject only">
                     <?= $item_subject ?>
                    </li>
                        <?} 
                ?>
                 <li class="row">
                     <ul>
                         <li>
                             <ul class="row_grid">
                                 <li class="tit">종류</li>
                                 <li><?= $item_category ?></li>
                             </ul>
                         </li>
                         <li>
                             <ul class="row_grid">
                                 <li class="tit">분류</li>
                                 <li><?= $item_sorting ?></li>
                             </ul>
                         </li>
                     </ul>
                 </li>
                 <li class="row row_full">
                    <ul>
                        <li class="tit">용도</li>
                        <li><?= $item_content ?></li>
                    </ul>
                 </li>
                 <li class="row">
                     <ul>
                         <li>
                             <ul class="row_grid">
                                 <li class="tit">담당자</li>
                                 <li><?= $item_manager ?></li>
                             </ul>
                         </li>
                         <li>
                             <ul class="row_grid">
                                 <li class="tit">이메일</li>
                                 <li>
                                 <a class="under_1" href="mailto:<?= $item_email ?>">
                                 <?= $item_email ?></a>
                                 </li>
                             </ul>
                         </li>
                     </ul>
                 </li>
                  
              </ul>
              <?
   	            $number--;
                }
              ?>
              </div>
              <div class="buttons">
                  <ul>
                    <li>
                          <a href="list.php?page=<?=$page?>">
					    목록</a>
                     </li>
                     <li>
                         <? 
	if($userid==$item_id || $userlevel==1 || $userid=="master")
                        {
?>
		<a href="write_form.php?page=<?=$page?>">제품등록</a>
<?
	}
?>
                     </li>
                  </ul>
              </div>
               <div class="paging_wrap">
                  <div class="page_num">
                      <?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
           if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
            }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
		}      
   }
?>	
                  </div>
              </div>
                
            </div>

            </div>
        </section>
    </div>
    <? include "../common/fixed_top.html" ?>  
      </article> 
      <? include "../common/sub_foot.html" ?>  
  
</body>
</html>