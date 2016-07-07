<?php
	include ("../lib/db_connect.php"); // DB접속
	mysqli_set_charset($con, 'utf8'); 

	$no=$_GET[no];
	$id=$_GET[id];

	$query = "DELETE FROM $id ". 
	       "WHERE no='". $no. "' ;";

	mysqli_query($con,$query); 
?>

<script>
	window.alert('삭제 되었습니다.');
	//location.href='./c_bbs.php';
	location.href='./<?=$id?>.php';
</script>