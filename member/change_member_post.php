<?php
  session_start(); // 세션
  ####데이터베이스 서버에 연결한다.## 
  include ("../lib/db_connect.php"); // DB접속
  mysqli_set_charset($con, 'utf8'); 
  //이부분 추가 해주시면 됩니다. 

  $id=$_SESSION['id'];
  $pws=$_POST[pwd];
  $pw=md5($pws);
  $n_name=$_POST[n_name];
  $tel1=$_POST[tel1];
  $tel2=$_POST[tel2];
  $tel3=$_POST[tel3];
  $p_number=$tel1. $tel2. $tel3;
  $e_mail=$_POST[email];
  $gender=$_POST[gender];
  $area=$_POST[area];

  if($n_name==null){
    $n_name = $_SESSION['n_name'];
  }else{
    $sql = "UPDATE member SET n_name = '$n_name' WHERE id='$id'";
    mysqli_query($con,$sql);
  }
  if($pw==null){
    $pw = $_SESSION['pw'];
  }else{
    $sql = "UPDATE member SET pw = '$pw' WHERE id='$id'";
    mysqli_query($con,$sql);
  }
  if( $tel2==null || $tel3==null){
    $p_number=$_SESSION['p_number'];
  }else{
    $sql = "UPDATE member SET p_number = '$p_number' WHERE id='$id'";
    mysqli_query($con,$sql);
  }
  if($e_mail==null){
    $e_mail=$_SESSION['e_mail'];
  }else{
    $sql = "UPDATE member SET e_mail = '$e_mail' WHERE id='$id'";
    mysqli_query($con,$sql);
  }
  if($gender==null){
    $gender=$_SESSION['gender'];
  }else{
    $sql = "UPDATE member SET gender = '$gender' WHERE id='$id'";
    mysqli_query($con,$sql);
  }
  if($area==null){
    $area=$_SESSION['area'];
  }else{
    $sql = "UPDATE member SET area = '$area' WHERE id='$id'";
    mysqli_query($con,$sql);
  }
?>



<script>
  window. alert('변경완료. 다시 로그인 해주세요.');
  location.href='./logout.php';
</script>