<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);
?>
<meta charset="utf-8">
<?

if(!$name) {   // == null
     echo("
           <script>
             window.alert('이름을 입력해주세요.');
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

   $sql = "select * from member where name='$name'"; 
   //입력한 name값으로  레코드 검색
   $result = mysql_query($sql, $connect);
   $num_match = mysql_num_rows($result);

if(!$num_match) // 이름이 등록되어있지 않으면 == 검색레코드 null
   {
     echo("
           <script>
             window.alert('해당 이름으로 등록되어있는 아이디가 없습니다. 다시 확인바랍니다.');
             history.go(-1);
           </script>
         ");
    }
else    // 검색 레코드가 있으면 
{
    $row = mysql_fetch_array($result); 
    $sql ="select * from member where name='$name' and email='$email'"; 
    
    $result = mysql_query($sql, $connect); 
    $num_match = mysql_num_rows($result);
    
    if(!$num_match)  //적은 이름과 이메일이 일치하지 않으면
        {
           echo("
              <script>
                window.alert('입력하신 정보로는 아이디 검색이 되지 않습니다. 회원가입 페이지로 이동합니다.');
                location.href ='../member/join.html';
              </script>
           ");

           exit;
        }else   // 적은 이름과 이메일이 일치한다면
    {
        echo("
              <script>
                window.alert('회원님의 아이디는 $row[id] 입니다.');
                location.href = 'login_form.php';
              </script>
           ");
    }
}


?>