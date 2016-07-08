<?php     
	session_start(); // 세션  
	include ("../lib/db_connect.php"); // DB접속
	mysqli_set_charset($conn, 'utf8'); 

	$id = $_SESSION['id'];

	####데이터베이스 서버에 연결한다.## 
	$no=$_GET[no];
	$id=$_GET[id];
	$cnt=$_GET[cnt];

	$c_bbs_cmt="c_bbs_cmt";
	$j_bbs_cmt="j_bbs_cmt";
	$h_bbs_cmt="h_bbs_cmt";
	$p_bbs_cmt="p_bbs_cmt";


	$str1=strcmp("$id","c_bbs");
	$str2=strcmp("$id","j_bbs");
	$str3=strcmp("$id","h_bbs");
	$str4=strcmp("$id","p_bbs");

	if($str1==0){$comment_db=$c_bbs_cmt;}
	else if($str2==0){$comment_db=$j_bbs_cmt;}
	else if($str3==0){$comment_db=$h_bbs_cmt;}
	else if($str4==0){$comment_db=$p_bbs_cmt;}

	$query = "DELETE FROM $comment_db WHERE cnt=' $cnt'";
	$result = mysqli_query($con,$query); 

	echo("<meta http-equiv='Refresh' content='0; URL=../index.php'>"); 
?>

<script>
	window. alert('삭제 되었습니다.');
	location.href='./c_view.php?id=<?= $id?>&no=<?= $no?>';
</script>