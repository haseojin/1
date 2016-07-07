<?php
	session_start(); // 세션
	include ("../lib/db_connect.php"); // DB접속
	mysqli_set_charset($conn, 'utf8'); 
	$id = $_POST['uid']; // 아이디 
	$pws = $_POST['pwd']; // 패스워드
	$last = date(YmdHis);
	$pw=md5($pws);

	   
	$sql = "SELECT * FROM member ". 
	       "WHERE id='". $id. "' and pw='". $pw."';";


	$result = $con->query($sql);



	if ($result->num_rows > 0) {

		$row = $result->fetch_assoc();  // 검색된 레코드를 $row에 저장.

		//echo "<h2>로그인 성공<h2>";

		//echo "<h3>". $row['n_name']. "님이 로그인하였습니다.</h3>";

		//echo "<a href='./index.php'>메인으로 이동</a>";

		// Session 변수 만들기

		$cnt = $row['cnt']+1;

		$_SESSION['id'] = $id;
		$_SESSION['pw'] = $pw; 
		$_SESSION['n_name'] = $row['n_name']; 
		$_SESSION['p_number'] = $row['p_number']; 
		$_SESSION['e_mail'] = $row['e_mail']; 
		$_SESSION['area'] = $row['area']; 
		$_SESSION['gender'] = $row['gender'];
		$_SESSION['insert_date'] =$row['insert_date'];
		$sql3 = "UPDATE member SET cnt = '$cnt', last_date='$last' WHERE id='$id'";
		 mysqli_query($con,$sql3); 
		$_SESSION['cnt']=$row['cnt'];
		echo ("<script>
				window. alert('로그인 하였습니다');
				location.href='../index.php';
				</script>");
	}
	else{
		echo ("<script>
				window. alert('로그인실패');
				location.href='./login.php';
				</script>");
	}
?>
