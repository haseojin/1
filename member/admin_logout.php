<?php
	session_start(); // 세션

	if($_SESSION['aid']!=null){
		session_destroy();
	}
	echo"<script>
		window. alert('관리자 로그아웃 하였습니다.');
		location.replace='../index.php'
		</script>";
?>
