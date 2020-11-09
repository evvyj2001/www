<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    // 새글쓰기 =>  $table ='concert'
    // 수정글쓰기 => $table='concert' $mode=modify $num=1 $page=1


	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
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
    <link rel="stylesheet" href="../news/news.css">
    <script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/2d56222f57.js" crossorigin="anonymous"></script>
    <script>
  function check_input()
   {
      if (!document.board_form2.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form2.subject.focus();
          return;
      }

      if (!document.board_form2.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form2.content.focus();
          return;
      }
      document.board_form2.submit();
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
           <h3 class="hidden">새글쓰기</h3>
            <div class="inner">
               
<?
	if($mode=="modify") //수정모드
	{
?>
    <form  name="board_form2" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">	
<?
	}
	else //새글쓰기모드
	{
?>
    <form  name="board_form2" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
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
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기에서만 HTML 쓰기가 보인다
?>
            <ul>
                <li class="tit html">
                <input type="checkbox" id="html_ok" name="html_ok"> 
                <label for="html_ok">Html 사용</label></li>
            </ul>   
<?
	}
?>
       </li>
    </ul>
    <ul class="row2">
        <li class="tit"><label for="subject">제목</label></li>
        <li>
            <input type="text" name="subject" id="subject" value="<?=$item_subject?>">
        </li>
    </ul>
    <ul class="row3">
        <li class="tit"><span>
        게시글 내용</span></li>
        <li>
            <textarea rows="15" cols="79" name="content" id="content"><?=$item_content?></textarea>
        </li>
    </ul>
    <div class="add_file">
    <ul class="row_file">
        <li class="tit">이미지 파일 1</li>
        <li>
          <span>
              <input type="file" name="upfile[]" id="upload0">
          </span>
          <label for="upload0" class="sel">파일찾기</label>
          
        </li>
    
			
<?  // 수정모드일때 + 이미지가 업로드되어있을경우
    if ($mode=="modify" && $item_file_0)
	{
?>
<li class="delete_ok">
   <ul>
       
       <li>
           <input type="checkbox" name="del_file[]" value="0" id="del_file0"><label for="del_file0">삭제</label>
       </li>
       <li>
           <p><strong><?=$item_file_0?></strong>이 등록되어 있습니다.</p>
       </li>
   </ul>
</li>		
<?
	}
?>
   </ul>
    <ul class="row_file">
        <li class="tit">이미지 파일 2</li>
        <li>
          <span>
              <input type="file" name="upfile[]" id="upload1">
          </span>
          <label for="upload1" class="sel">파일찾기</label>
          
        </li>
    
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
<li class="delete_ok">
   <ul>
       
       <li>
           <input type="checkbox" name="del_file[]" value="1" id="del_file1"><label for="del_file1">삭제</label>
       </li>
       <li>
           <p><strong><?=$item_file_1?></strong>이 등록되어 있습니다.</p>
       </li>
   </ul>
</li>			
<?
	}
?>
   </ul>
    <ul class="row_file">
        <li class="tit">이미지 파일 3</li>
        <li>
          <span>
              <input type="file" name="upfile[]" id="upload2">
          </span>
          <label for="upload2" class="sel">파일찾기</label>
          
        </li>
    

<? 	if ($mode=="modify" && $item_file_2)
	{
?>
<li class="delete_ok">
   <ul>
       
       <li>
           <input type="checkbox" name="del_file[]" value="2" id="del_file2"><label for="del_file2">삭제</label>
       </li>
       <li>
           <p><strong><?=$item_file_2?></strong>이 등록되어 있습니다.</p>
       </li>
   </ul>
</li>			
<?
	}
?>
   </ul>
   </div>
   <div class="upload_guide">
       <ul>
           <li>* 크기가 500KB를 넘는 파일은 업로드하실 수 없습니다.</li>
           <li>* JPG, GIF, PNG 파일만 업로드 가능합니다.</li>
       </ul>
   </div>
    <ul class="buttons write">
        <li class="subm">
<!--            <input type="submit" value="등록">-->
           <a href="#" onclick="check_input()"> 등록</a>
        </li>
        <li>
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
        </li>
    </ul>			

<?
	if($mode=="modify") //수정모드
	{
?>
        </form>	
<?
	}
	else //새글쓰기모드
	{
?>
		 </form>
<?
	}
?>    
		</div>
        </section>
    </div>
    <? include "../common/fixed_top.html" ?>  
</article>
      <? include "../common/sub_foot.html" ?>  

</body>
</html>