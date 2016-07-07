<?php
  ####데이터베이스 서버에 연결한다.## 
  include ("../lib/db_connect.php"); // DB접속
  mysqli_set_charset($con, 'utf8'); 

  $n_name=$_POST[n_name];
  $id=$_POST[id];
  $pwds=$_POST[pwd]; 
  $tel1=$_POST[tel1];
  $tel2=$_POST[tel2];
  $tel3=$_POST[tel3];
  $p_number=$tel1. $tel2. $tel3;
  $e_mail=$_POST[email];
  $gender=$_POST[gender];
  $area=$_POST[area];
  //$now = date("Y-m-d A h:i:s");
  $now = date(YmdHis);
  //$now = date("Y-m-d");
  $pwd=md5($pwds);

  $query = "INSERT INTO member(n_name,id, pw, p_number, e_mail, gender, area, insert_date) 
  VALUES('$n_name','$id','$pwd', '$p_number','$e_mail','$gender','$area','$now')"; 
  $result = mysqli_query($con,$query); 
  if($result){ 
    echo("<meta http-equiv='Refresh' content='0; URL=./index.php'>"); 
  } else { 	
    //$errNO=mysqli_errno($con); 
    //$errMSG=mysqli_error($con); 
    //echo("에러코드 $errNO : $errMSG<br>");

    echo"<script>
    window. alert('잘못 입력하였습니다.');
    location.href='./insert_form.php';
    </script>";
    exit; 
  } 
?>

<script>
  window. alert('회원가입이 완료 되었습니다.');
  location.href='../index.php';
</script>