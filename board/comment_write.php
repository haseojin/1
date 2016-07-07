<?php

						
session_start(); // 세션
	 include ('../lib/db_connect.php');				
mysqli_set_charset($conn, 'utf8'); 

if($_SESSION['aid']==null){
	$user_id=$_SESSION['id'];
 $user_n_name=$_SESSION['n_name'];
}

if($_SESSION['id']==null){
	$user_id=$_SESSION['aid'];
 	$user_n_name="관리자";
}
					  
 
 $no=$_GET[no];
 $id=$_GET[id];
 $comment=$_GET[comment_insert];

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


	$regdate= date("YmdHis", time()); //날짜/시간
/*
$query="insert into c_bbs_cmt(id, c_bbs_no, u_id, n_name, memo, replys, regdate)
                           values('$id', '$bbs1_no', '$user_id', '$user_n_name', '$memo', '$replys', '$regdate')";
						   mysqli_query($con, $query);*/
	$query="insert into $comment_db(b_num, b_comment, b_date, b_id, b_n_name)
                           values('$no', '$comment', '$regdate', '$user_id','$user_n_name')";
						   mysqli_query($con, $query);					   

//$query=" update bbs1 set comment=c

?>


<script>
  window. alert('댓글이 등록 되었습니다.');
location.href='./c_view.php?id=<?= $id?>&no=<?= $no?>';
</script>