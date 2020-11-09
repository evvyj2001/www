<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);
?>
<meta charset="utf-8">
<?

if(!$id) {   // == null
     echo("
           <script>
             window.alert('아이디를 입력해주세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

if(!$email) {
     echo("
           <script>
             window.alert('이메일을 입력해주세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

// 입력을 모두 받았을 경우
   include "../lib/dbconn.php";

   $sql = "select * from member where id='$id'"; 
   //입력한 name값으로  레코드 검색
   $result = mysql_query($sql, $connect);
   $num_match = mysql_num_rows($result);

if(!$num_match) // 아이디가 등록되어있지 않으면 == 검색레코드 null
   {
     echo("
           <script>
             window.alert('가입되어있지 않은 아이디입니다. 다시 확인바랍니다. ');
             history.go(-1);
           </script>
         ");
    }
else    // 검색 레코드가 있으면 
{
    $row = mysql_fetch_array($result); 
    $sql ="select * from member where id='$id' and email='$email'"; 
    
    $result = mysql_query($sql, $connect); 
    $num_match = mysql_num_rows($result);
    
    if(!$num_match)  //적은 이름과 이메일이 일치하지 않으면
        {
           echo("
              <script>
                window.alert('입력하신 정보에 해당하는 내용을 찾을 수 없습니다. 다시 확인바랍니다.');
                history.go(-1);
              </script>
           ");

           exit;
        }else   // 적은 이름과 이메일이 일치한다면
    {
        
        $row = mysql_fetch_array($result); 
        $sql = "update member set pass=password('@1234#')"; 
        
        mysql_query($sql, $connect);
        
        mysql_close();
        echo("
              <script>
                window.alert('회원님의 임시비밀번호는 @1234# 입니다. 해당 비밀번호로 로그인 후 비밀번호를 변경해주세요.');
                location.href = 'login_form.php';
              </script>
           ");
    }
}


?>