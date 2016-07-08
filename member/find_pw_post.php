<?php
####데이터베이스 서버에 연결한다.## 
  include ("../lib/db_connect.php"); // DB접속
  mysqli_set_charset($con, 'utf8'); 

  $id=$_POST[id];

  $tel1=$_POST[tel1];
  $tel2=$_POST[tel2];
  $tel3=$_POST[tel3];
  $p_number=$tel1. $tel2. $tel3;
  $e_mail=$_POST[email];
  
  $sql = "SELECT * FROM member WHERE id='$id'";
  $result = mysqli_query($con,$sql); 
  $num_record=mysqli_num_rows($result);

  $sql2 = "SELECT * FROM member WHERE p_number=$p_number";
  $result2 = mysqli_query($con,$sql2); 
  $num_record2=mysqli_num_rows($result2);

  $sql3 = "SELECT * FROM member WHERE e_mail='$e_mail'";
  $result3 = mysqli_query($con,$sql3); 
  $num_record3=mysqli_num_rows($result3);

  if($num_record)
  {
    if($num_record2 && $num_record3){
    echo"<script>
          window. alert('비밀번호 변경페이지로 이동합니다.');
          location.href='./change_pw_form.php';
          </script>";
    }else{
    echo"<script>
          window. alert('다시한번 확인해 주세요.');
          location.href='./find_pw_form.php';
          </script>";
    }
  }else{
  echo"<script>
        window. alert('없는 아이디입니다. 다시한번 확인해 주세요.');
        location.href='./find_pw_form.php';
        </script>";
  }
?>



