<?php
	session_start(); // 세션

	if($_SESSION['id']!=null){
	   session_destroy();
	}
	echo"<script>
			window. alert('로그아웃 하였습니다.');
			location.replace='../index.php'
		</script>";
	//echo "<script>location.replace='../index.php';</script>";
?>
