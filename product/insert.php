<? session_start(); ?>
<meta charset="utf-8">
<?

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //수정=>mode=modify&num=7&page=1
  

	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	if(!$subject) {
		echo("
	   <script>
	     window.alert('제목을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	if(!$content) {
		echo("
	   <script>
	     window.alert('내용을 입력하세요.')
	     history.go(-1)
	   </script>
		");
	 exit;
	}

	$regist_day = date("Y-m-d H:i");  // 현재의 '년-월-일-시-분'을 저장
	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ($mode=="modify")
	{
        $subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
        $category = htmlspecialchars($category);
        $sorting = htmlspecialchars($sorting);
        $manager = htmlspecialchars($manager);
        $email = htmlspecialchars($email);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
        $category = str_replace("'", "&#039;", $category);
        $sorting = str_replace("'", "&#039;", $sorting);
        $manager = str_replace("'", "&#039;", $manager);
        $email = str_replace("'", "&#039;", $email);

		$sql = "update product set subject='$subject', content='$content', category='$category', sorting='$sorting', manager='$manager', email='$email' where num=$num";
	}
	else  //새글쓰기
	{
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
        $category = htmlspecialchars($category);
        $sorting = htmlspecialchars($sorting);
        $manager = htmlspecialchars($manager);
        $email = htmlspecialchars($email);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
        $category = str_replace("'", "&#039;", $category);
        $sorting = str_replace("'", "&#039;", $sorting);
        $manager = str_replace("'", "&#039;", $manager);
        $email = str_replace("'", "&#039;", $email);
	 //  "(&quot;) '(&#039;) &(&amp;) <(&lt;) >(&gt;)

		$sql = "insert into product (id, name, nick, subject, content, category, sorting, manager, email, regist_day) ";
		$sql .= "values('$userid', '$username', '$usernick', '$subject', '$content', '$category', '$sorting', '$manager', '$email', '$regist_day')";
	}

	mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	mysql_close();                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?page=$page';
	   </script>
	";
?>

  
