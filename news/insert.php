<? session_start(); ?>

<meta charset="utf-8">
<?
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글삽입  $table='concert' , 폼입력값 , 세션변수
    /*
    $html_ok =
    $subject =
    $content = 
    
    $upfile[0] = 실제파일이름.jpg
    $upfile[1] =
    $upfile[2] =
    */


	if(!$userid) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	$regist_day = date("Y-m-d H:i");  // 현재의 '년-월-일-시-분'을 저장
		/*   단일 파일 업로드 $_FILES=> 파일에 대한 정보를 빼낼 수 있다.
        파일 업로드를 조건으로 걸러내야하니까 정보를 미리 잡아놔야한다
        (배열형태로 되어있다)
        $_FILES["업로드된파일"]["빼낼정보"]
		$upfile_name	 = $_FILES["upfile"]["name"];
		$upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; 임시파일
		$upfile_type     = $_FILES["upfile"]["type"];
		$upfile_size     = $_FILES["upfile"]["size"];
		$upfile_error    = $_FILES["upfile"]["error"]; 파일이 문제가 있으면 여기서 확인.
		*/

    //다중 파일 업로드는 3차원 배열 형태로 
    //$_FILES["upfile"]["name"][0];
    //$_FILES["upfile"]["name"][1];
    //$_FILES["upfile"]["name"][2];

	// 다중 파일 업로드
	$files = $_FILES["upfile"]; //input name을 upfile[]로 잡아서 아래같이 배열형태로 들어온다.
    //$files[0] , $files[1], $files[2]
	$count = count($files["name"]); //배열의 개수 => 업로드된 파일의 개수 => 3
			
	$upload_dir = './data/';  //업로드될 서버의 저장경로

	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];  //a1.jpg .. 
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];
		$upfile_type[$i]     = $files["type"][$i]; 
		$upfile_size[$i]     = $files["size"][$i];
		$upfile_error[$i]    = $files["error"][$i];
      
		$file = explode(".", $upfile_name[$i]); // a1.jpg
		$file_name = $file[0];  //a1
		$file_ext  = $file[1];  //jpg
        //실제로 서버에 올라갈때의 변환되는 이름 마지막에 중복적으로 확장자명이 들어가지 않도록 하기 위해서 파일명/확장자 나눈다.

		if (!$upfile_error[$i]) //에러가 발생되지 않으면
		{
			$new_file_name = date("Y_m_d_H_i_s");
                   // 2019_03_22_10_07_15 형식 저장
			$new_file_name = $new_file_name."_".$i;
                 // 2019_03_22_10_07_15_0 , 이미지 중복 첨부될 경우 맨 뒤에 0부터 숫자들어감
			$copied_file_name[$i] = $new_file_name.".".$file_ext;  
               // 2019_03_22_10_07_15_0.jpg 확장자 합친다
			$uploaded_file[$i] =   $upload_dir.$copied_file_name[$i]; // 저장경로
               // ./data/2019_03_22_10_07_15_0.jpg

			if( $upfile_size[$i]  > 500000 ) { //용량 체크
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과하오니 파일 크기를 확인해주세요. ');
				history.go(-1)
				</script>
				");
				exit;
			}
            // 파일 타입 체크 (gif/jpg/png만 업로드 가능)
			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpeg") &&
				($upfile_type[$i] != "image/pjpeg") &&
				($upfile_type[$i] != "image/png") &&
				($upfile_type[$i] != "image/x-png") )
			{
				echo("
					<script>
						alert('JPG와 GIF, PNG 이미지 파일만 업로드 가능합니다.');
						history.go(-1)
					</script>
					");
				exit;
			}

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) ) //이미지 업로드가 처리 안되면
                
            // move_uploaded_file(임시저장파일명,실제저장할 서버경로 파일명 )  => 파일 업로드시키는 함수
            //파일을 업로드하고 업로드 처리가 안되었을때 메세지    
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}

	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ($mode=="modify")
	{
		$num_checked = count($_POST['del_file']);
		$position = $_POST['del_file'];

		for($i=0; $i<$num_checked; $i++)                      
            // delete checked item
		{
			$index = $position[$i];
			$del_ok[$index] = "y";
		}

		$sql = "select * from $table where num=$num";   
        // get target record
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

		for ($i=0; $i<$count; $i++)					
            // update DB with the value of file input box
		{

			$field_org_name = "file_name_".$i;
			$field_real_name = "file_copied_".$i;

			$org_name_value = $upfile_name[$i];
			$org_real_value = $copied_file_name[$i];
			if ($del_ok[$i] == "y") //삭제 체크박스 체크된 상태라면
			{
				$delete_field = "file_copied_".$i;
				$delete_name = $row[$delete_field];
				
				$delete_path = "./data/".$delete_name;
                // 업로드된 삭제할 파일 경로 완성

				unlink($delete_path); //업로드된 파일 삭제 unlink(파일경로)

				$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
				mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
			}
			else
			{
				if (!$upfile_error[$i])
				{
					$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
					mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행					
				}
			}

		}
		
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);
		
		$sql = "update $table set subject='$subject', content='$content' where num=$num";
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	}
	else
	{
		if ($html_ok=="y")
		{
			$is_html = "y";
		}
		else
		{
			$is_html = "";
		}
		
		$subject = htmlspecialchars($subject);
		$content = htmlspecialchars($content);
		$subject = str_replace("'", "&#039;", $subject);
		$content = str_replace("'", "&#039;", $content);

		$sql = "insert into $table (id, name, nick, subject, content, regist_day, hit, is_html, ";
		$sql .= " file_name_0, file_name_1, file_name_2, file_copied_0,  file_copied_1, file_copied_2) ";
		$sql .= "values('$userid', '$username', '$usernick', '$subject', '$content', '$regist_day', 0, '$is_html', ";
		$sql .= "'$upfile_name[0]', '$upfile_name[1]',  '$upfile_name[2]', '$copied_file_name[0]', '$copied_file_name[1]','$copied_file_name[2]')";
		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
	}

	mysql_close();                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'list.php?table=$table&page=$page';
	   </script>
	";
?>

  
