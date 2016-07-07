<?php     
  session_start(); // 세션  
  mysqli_set_charset($conn, 'utf8'); 

  $id = $_SESSION['id'];
  ####데이터베이스 서버에 연결한다.## 
  include ("../lib/db_connect.php"); // DB접속
  mysqli_set_charset($con, 'utf8'); 
  $query = "DELETE FROM member ". 
  "WHERE id='". $id. "' ;";
  $result = mysqli_query($con,$query); 
  if($result){ 
    echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>"); 
  } else { 	
  //$errNO=mysqli_errno($con); 
  //$errMSG=mysqli_error($con); 
  //echo("에러코드 $errNO : $errMSG<br>");
  echo"<script>
        window. alert('잘못 입력하였습니다.');
        location.href='./member_form.php';
        </script>";
    exit; 
  } 
?>

<script>
  window. alert('탈퇴 완료 되었습니다.');
  <?php
    if($_SESSION['id']!=null){
    session_destroy();
  }?>
</script>