<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
 
	$table = "news"; // 게시판마다 table이 다르니까 아예 변수에 테이블이름 넣어서 여기만 바꾸면 되게 한다.
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>코오롱 인더스트리::홍보센터</title>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../sub5/common/css/sub5common.css">
    <link rel="stylesheet" href="../news/news.css">
<!--    <link rel="stylesheet" href="../greet/greet.css">-->
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=6;			// 한 화면에 표시되는 글 수

    
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
            <span><i class="fas fa-home"></i></span> &gt; <span>홍보센터</span> &gt; <strong>뉴스</strong>
        </div>
        <h2>뉴스</h2>
      </div>
    </div>
    <div class="content_area">
        <section class="news">
           <h3 class="hidden">뉴스 목록</h3>
            <div class="inner">
            <div class="notice_top">
    <!-- 게시물 현황 + 검색 기능 -->
                <form  name="board_form" method="post" action="list.php?mode=search">
                    <ul class="list_statue">
                        <li>
                        <p>Total 
                            <span><?= $total_record ?></span>건  ㅣ  Page <span><?= $page ?></span>
                        </p>
                        </li>
                        <li>
                       <select name="scale" onchange="location.href='list.php?scale='+this.value">
                            <option value=''>보기</option>
                            <option value='3'>3</option>
                            <option value='5'>5</option>
                            <option value='10'>10</option>
                            <option value='20'>20</option>
                        </select>
                        </li>
                        <li>
                           <ul class="view_box">
                               <li class="view_list">
                                  <a href="#">
                                  <i class="fas fa-list"></i>
                                <span class="hidden">리스트로보기</span>  
                                </a> 
                               </li>
                               <li class="view_grid">
                                    <a href="#">
                                      <i class="fas fa-grip-horizontal"></i>
                                    <span class="hidden">그리드로보기</span>  
                                    </a>
                                </li>
                           </ul>
                            
                        </li>
                        
                    </ul>
                    <ul class="search_wrap">
                        <li>
                        <select name="find">
                            <option value='subject'>제목</option>
                            <option value='content'>내용</option>
                            <option value='nick'>글쓴이</option>
                            <option value='name'>이름</option>
				        </select>
                        </li>
                        <li>
                           <label for="search" class="hidden">검색창</label>
                            <input type="text" name="search" id="searchnews">
                        </li>
                        <li>
                            <input type="image" src="../greet/images/search_icon.jpg" class="search_icon" alt="검색">
                        </li>
                    </ul>
                </form>
             <!-- 게시물 현황 + 검색 기능 end -->
            </div>
            <div class="news_list">
<!--
               <ul class="list_head">
                   <li class="number">NO.</li>
                   <li class="subject">제목</li>
                   <li class="author">작성자</li>
                   <li class="date">등록일</li>
                   <li class="view">조회수</li>
               </ul>
-->
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
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
      $item_content = $row[content];
        
       
      // 이미지 처리를 위해 추가된 부분
      if($row[file_copied_0]){ // 첨부이미지가 한개라도 있으면 
        $item_img = './data/'.$row[file_copied_0];  //첨부된 첫번째 이미지 출력
      }else{ // 첨부이미지가 없으면
        $item_img = './data/default.jpg'  ;
      } // 없을 경우 default 이미지 출력
      
?>
            <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                <ul class="list_row">
                    <li class="left_imgwrap">
                        <img src="<?=$item_img?>" alt="">
                        <span class="plus_icon">+</span>
                        <p class="view"><i class="far fa-grin"></i><span class="hidden">조회수</span><span><?= $item_hit ?></span></p>
                    </li>
                    <li class="right_info">
                        <h4><?= $item_subject ?></h4>
                        <p class="content"><?= $item_content ?></p>
                        <p class="date"> <?= $item_date ?></p>
                        <span class="detail">자세히 보기</span>
                    </li>
                </ul>
            </a>
              <?
   	            $number--;
                }
              ?>
              </div>
              <div class="buttons news_list">
                  <ul>
                     <li>
                          <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
                     </li>
                     <li>
                         <? 
	if($userid)
	{
?>
		<a href="write_form.php?page=<?=$page?>&table=<?=$table?>">글쓰기</a>
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
<!-- 페이지별 스크립트 -->
<script>
    $(document).ready(function(){
        $('.view_list').addClass('view_selected_btn');
        $('.view_grid').click(function(e){
            e.preventDefault();
            $('.view_box li').removeClass('view_selected_btn');
            $('.list_content').addClass('list_grid');
            $(this).addClass('view_selected_btn');
        });
        $('.view_list').click(function(e){
            e.preventDefault();
            $('.view_box li').removeClass('view_selected_btn');
            $('.list_content').removeClass('list_grid');
            $(this).addClass('view_selected_btn');
        });
        
    });
</script>
</body>
</html>