<?
   session_start();
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
   //$table, $num , 세션변수

   include "../lib/dbconn.php";

   $sql = "select * from $table where num = $num";
   $result = mysql_query($sql, $connect);

   $row = mysql_fetch_array($result);
    
   //날짜로 변환된 업로드된 파일 이름
   $copied_name[0] = $row[file_copied_0];
   $copied_name[1] = $row[file_copied_1];
   $copied_name[2] = $row[file_copied_2];

   for ($i=0; $i<3; $i++)  // 업로드된 파일 삭제
   {
		if ($copied_name[$i]) //
	   {
			$image_name = "./data/".$copied_name[$i];
			unlink($image_name);
            //unlink(업로드된 파일경로 파일명); => 파일삭제
	   }
   }

   $sql = "delete from $table where num = $num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'list.php?table=$table';
	   </script>
	";
?>

