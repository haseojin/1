<?php
	session_start();

	$aid="hsj";
	$apw="sj7861";

	if($aid==$_POST['aid'] && $apw==$_POST['apwd']){
		$_SESSION['aid'] = $aid;
		echo ("
			<script>
			window. alert('로그인 하였습니다');
			location.href='../index.php';
			</script>");
	}else{
		echo ("
			<script>
			window. alert('아이디, 비밀번호가 일치하지 않습니다.');
			location.href='./admin_login.php';
			</script>");
	}	
?>