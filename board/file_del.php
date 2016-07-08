<?php
	include('../lib/db_connect.php');

	$no=$_GET[no];
	$id=$_GET[no];
	$query = "SELECT * FROM $id WHERE no='$no'";

	$result= mysqli_query($con, $query);
	$data= mysqli_fetch_array($result);
	if(!$result)die("연결에 실패 하였습니다.".mysqli_error());

	if($data[file01]){
	$qy = "UPDATE $id SET file01='' where no='$no'";

	mysqli_query($con, $qy);

	$del_file= "./data/$data[file01]";
	if($data[file01] && is_file($del_file)) unlink($del_file);
	}
?>

<script language="JavaScript">
	alert('파일이 삭제 되었습니다.');
	opener.location.reload();
	window.close();
</script>