<?
   function latest_notice($table, $loop, $sub_char_limit, $con_char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];
            $content = $row[content];
            $is_html      = $row[is_html];
            $len_content = mb_strlen($row[content], 'utf-8');

			if ($len_subject > $sub_char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                 $subject = mb_substr($subject, 0, $sub_char_limit, 'utf-8');
				 $subject = $subject."...";
			}
            
            if ($len_content > $con_char_limit)
            {     
                $content = str_replace( "&#039;", "'", $content);
                $content = mb_substr($content, 0, $con_char_limit, 'utf-8');
                $content = $content."...";
                
            }

			$regist_day0 = substr($row[regist_day], 0, 10);
            $regist_day1 = substr($row[regist_day], 8, 2);           
            $regist_day2 = substr($row[regist_day], 0, 7);
            
            if ($is_html!="y")
            {
                $content = str_replace(" ", "&nbsp;", $content);
                $content = str_replace("\n", "<br>", $content);
            }	
            if ($is_html="y"){
                $content = str_replace("&lt;", "<", $content);
                $content = str_replace("&gt;", ">", $content);
            }
            
            if($table=='news'){
                //목록 이미지 경로 불러오기
                $img_name = $row[file_copied_0]; // 첨부된 첫번째 이미지의 변환된 파일명
                if($img_name){ //첨부된 이미지가 있으면
                    $img_name = "./$table/data/".$img_name;
                }else{ //없으면
                    $img_name = "./$table/data/default.jpg"; 
                }  
            }
            if($table=='greet'){
            echo "      
	           <li>
      <a href='./$table/view.php?table=$table&num=$num'>
       <p class='notice_date'>
          $regist_day1
           <span>
            $regist_day2   
           </span>
       </p>
        <dl>
            <dt>$subject</dt>
            <dd>$content</dd>
        </dl>
        <span class='more'><img src='images/news_arrow.jpg' alt='더보기'></span>
     </a>
    </li>
				
			";
            }else if($table=='news'){
             echo "      
	           <li>
       <a href='./$table/view.php?table=$table&num=$num'>
           <span class='news_img'>
               <img src='$img_name' alt=''>
           </span>
           <dl>
                <dt>$subject</dt>
                <dd>$regist_day0</dd>
           </dl>
       </a> 
    </li>
			";   
            }
		}
		mysql_close();
   }


?>