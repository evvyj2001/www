<?
           session_start();
?>
<meta charset="utf-8">
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION);  
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   // $id=>입력id값    $pass=>입력 pass post방식으로 넘어옴
   
  

   if(!$id) {   // == null
     echo("
           <script>
             window.alert('아이디를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$pass) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.');
             history.go(-1);
           </script>
         ");
         exit;
   }

 
   // 입력을 모두 받았을 경우
   include "../../lib/dbconn.php";

   $sql = "select * from member where id='$id'"; 
   //입력한 id값으로  레코드 검색
   $result = mysql_query($sql, $connect);
   $num_match = mysql_num_rows($result);  // 1 또는 null

   if(!$num_match) // 아이디가 등록되어있지 않으면 == 검색레코드 null
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.');
             history.go(-1);
           </script>
         ");
    }
    else    // 검색 레코드가 있으면 
    {
		 $row = mysql_fetch_array($result); 
         //$row[id] ,.... $row[level] -> pass를 빼와야함
         $sql ="select * from member where id='$id' and pass=password('$pass')"; 
         //1.아이디 검색 + 2.암호화되어있는 pass값을 다시 십진화 시키지 못하므로 로그인창에서 입력한 비번값을 암호화한 것과 기존에 등록되어있는 비번과 대조해서 체크한다.
         $result = mysql_query($sql, $connect); 
         $num_match = mysql_num_rows($result); // 1 또는 null
     
  

        if(!$num_match)  //적은 패스워드와 디비 패스워드가 같지않을때
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else   // 입력한 아이디와 비번이 모두 일치한다면
        {
           $userid = $row[id];
		   $username = $row[name];
		   $usernick = $row[nick];
		   $userlevel = $row[level];
           //변수로 나중에 다른 페이지에서 사용할 필드값들을 담아놓는다
            
           //필요한 세션변수에 id~level 값을 저장한다(로그인상태 유지)
           $_SESSION['userid'] = $userid;
            //$_SESSION['userid'] = $row[id];
           $_SESSION['username'] = $username;
            //$_SESSION['username'] = $row[name];
           $_SESSION['usernick'] = $usernick;
            //$_SESSION['usernick'] = $row[nick];
           $_SESSION['userlevel'] = $userlevel;
            //$_SESSION['userlevel'] = $row[level];

           echo("
              <script>
			    alert('로그인이 되었습니다.');
                location.href = '../index.html';
              </script>
           ");
        }
   }          
?>
