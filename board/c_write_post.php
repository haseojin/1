<?php 

include ("../lib/db_connect.php"); // DB접속



$subject=$_POST[subject]; //게시판 제목
$story=$_POST[story]; //게시판 내용
$now = date(YmdHis);

$type=$_POST[Search_mode];


////////////////////////////////////////////////////

 if($_FILES[file01][name]){
 $size= $_FILES['file01']['size'];
    if($size > 2097152) Error('파일용량:2MB 제한합니다.'); 

$file01_name=strtolower($_FILES['file01']['name']); //파일명과 확장자를 소문자로 변경
 $file01_split= explode(".",$file01_name);   // 파일명과 확장자를 분리

  $extexplode= $file01_split[count($file01_split)-2.3]; //파일명만 가져오기
  $file01_type= $file01_split[count($file01_split)-1]; // 확장자만 가져오기

$img_ext= array('jpg','jpeg','gif','png'); //이미지 확장자 종류를 배열에 넣는다.
  if(array_search($file01_type, $img_ext) === false)Error('이미지 파일이 아닙니다.');

 $tates= date("mdhis", time());  //날짜 (월,일,시간,분,초)
 $newfile01= chr(rand(97,122)).chr(rand(97,122)).$tates.rand(1,9).rand(1,9).".".$file01_type; //파일명 생성;

 $dir="./data/";  //업로드할 디렉터리 지정
 move_uploaded_file($_FILES['file01']['tmp_name'],$dir.$newfile01); //파일업로드;
  chmod($dir.$newfile01,0777);
 }








///////////////////////////////////////////////////


$ip=getenv("REMOTE_ADDR");
//$query = "INSERT INTO c_bbs(title,story,insert_date,w_ip) VALUES('$subject', '$story', '$now', '$ip')"; 
///////////////////////////////////////////////////
$query = "INSERT INTO $type (title,story,insert_date,w_ip,file01) VALUES('$subject', '$story', '$now', '$ip','$newfile01')"; 
mysqli_query($con,$query);

?>



<script>  
alert('게시글쓰기 완료');
location.href='./<?=$type?>.php';
</script>