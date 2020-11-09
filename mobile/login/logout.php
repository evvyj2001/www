<?
  session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usernick']);
  unset($_SESSION['userlevel']);
  // 세션 변수 삭제

  echo("
       <script>
          location.href = '../index.html'; 
       </script>
       ");
?>
