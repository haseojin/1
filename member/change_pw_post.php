<?php
####데이터베이스 서버에 연결한다.## 
include ("../lib/db_connect.php"); // DB접속
mysqli_set_charset($con, 'utf8'); 
$id=$_POST[id];
$pw=$_POST[pwd];

$sql = "SELECT * FROM member ". "WHERE id='". $id. "';";
$result = mysqli_query($con,$sql); 
$num_record=mysqli_num_rows($result);
$sql2 = "UPDATE member SET pw = '$pw' WHERE id='$id'";
  if($num_record)
  {
  mysqli_query($con,$sql2); 
  echo"<script>
        window. alert('변경되었습니다.로그인해주세요');
        location.href='./login.php';
        </script>";
  }
  else{
  echo"<script>
        window. alert('없는 아이디입니다. 다시한번 확인해 주세요.');
        location.href='./change_pw_form.php';
        </script>";
  }
?>



