<meta charset="utf-8">
<?
   
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);
  
    if(!$id) 
   {
      echo("아이디를 입력하세요.");
   }
   else
   {
      include "../../lib/dbconn.php";
 
      $sql = "select * from member where id='$id' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);


     
      if ($num_record) // 중복되는 아이디가 있으면
      {
       
         echo "<span style='color:#e60012'>다른 아이디를 사용하세요.</span>";
      }
      else // 중복되지 않는다면
      {
         echo "<span style='color:#006ebc'>사용가능한 아이디입니다.</span>";
      }
    
 
      mysql_close();
   }

?>

