<?php
	session_start(); // 세션
	mysqli_set_charset($conn, 'utf8'); 
?>
<?php
	include ("../lib/db_connect.php");
	$no=$_GET[no];
	$id=$_GET[id];
	$c_bbs="C/C++";
	$j_bbs="JAVA/JSP";
	$h_bbs="HTML/CSS";
	$p_bbs="PHP";
	$m_bbs="영화";
	
	$c_bbs_cmt="c_bbs_cmt";
	$j_bbs_cmt="j_bbs_cmt";
	$h_bbs_cmt="h_bbs_cmt";
	$p_bbs_cmt="p_bbs_cmt";

	$str1=strcmp("$id","c_bbs");
	$str2=strcmp("$id","j_bbs");
	$str3=strcmp("$id","h_bbs");
	$str4=strcmp("$id","p_bbs");
	$str5=strcmp("$id","m_bbs");

	if($str1==0){$bd_title=$c_bbs; $comment_db=$c_bbs_cmt;}
	else if($str2==0){$bd_title=$j_bbs; $comment_db=$j_bbs_cmt;}
	else if($str3==0){$bd_title=$h_bbs; $comment_db=$h_bbs_cmt;}
	else if($str4==0){$bd_title=$p_bbs; $comment_db=$p_bbs_cmt;}
	else if($str5==0){$bd_title=$m_bbs;}

?>
<?php
	$query = "SELECT * FROM $id ". 
	"WHERE no='". $no. "' ;";

	mysqli_query("set names utf8");
	$result= mysqli_query($con, $query);
	$data= mysqli_fetch_array($result);

	$cnt = $data['hit']+1;

	$sql3 = "UPDATE $id SET hit = '$cnt' WHERE no='$no'";
	mysqli_query($con,$sql3); 
?>

<?php
$tquery="select count(*) from $comment_db where b_num=$no";
//mysql_query("set names utf8");  //언어셋 utf8
$tresult=  mysqli_query($con, $tquery);
$ttemp= mysqli_fetch_array($tresult);
$ttotals= $ttemp[0];

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>

<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/board.css" rel="stylesheet" type="text/css">
<link href="../css/comment.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<!--전체메뉴 펼치기-->
<script type="text/javascript" src="http://fllkorea2.mireene.com/test/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#inner').hide();
	$('#navi a').click(function(){
        $('#inner').slideToggle(500, function(){
            if($(this).is(':hidden')) $('#navi a').html('<img src="../img/bullets-white.png">');
            else $('#navi a').html('<img src="../img/bullets-white.png">'); 
        });
    });
});
</script>
<script type="text/javascript">
$(function(){
	$('.comment').hide();
 $("#c_input").click(function(){
       $(".comment").toggle();
 });
});
</script>

<script language="JavaScript">
	function checkInput() {
		if(document.fname.Search_text.value == "") {
			alert("내용을 입력하세요");
			return;
		}
		document.fname.submit();
	}
</script>

</head>

<body>
<?php
	if($_SESSION['id']==null&$_SESSION['aid']==null){
		echo"<script>
		window. alert('로그인하고 이용하세요.');
		location.href='../member/login.php';
		</script>";
	}
?>

<header>
	<ul id="left_nav">
		<li>Ha Seojin</li>
		<li class="space"></li>
		<li id="navi"><a href="#"><img src="../img/bullets-white.png"></a></li>
		<li class="login">	
			<?php
				if($_SESSION['id']==null&&$_SESSION['aid']==null) { // 로그인 하지 않았다면
			?>
		</li>
		<li class="login"><a href="../member/login.php">로그인</a></li>
		<li class="login"><a href="../member/admin_login.php">관리자 로그인</a></li>
			<?php
				}
			?>
		<?php
			if($_SESSION['id']!=null&$_SESSION['aid']==null){ // 로그인 했다면
			echo "<a href='../member/member_form.php'>".$_SESSION['n_name']."(".$_SESSION['id'].")님이 로그인 하였습니다.</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='../member/logout.php'>로그아웃</a>";
			}
		?>
		<?php
			if($_SESSION['id']==null&&$_SESSION['aid']!=null){ // 관리자 로그인 했다면
			echo "<a href='../member/member_list.php'>관리자(".$_SESSION['aid'].")님이 로그인 하였습니다.</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='../member/admin_logout.php'>로그아웃</a>";
		}
		?>
	</ul>
	<div id="slide">
		<div id="inner">---내용---</div>
	</div>

	<hgroup>
		<p id="title"><a href="../index.php">포트폴리오</a></p>
		<p id="subtitle"><small>Coding Study</small></p>
		<p>
	</hgroup>


	<nav id="main_menu">
	<ul>
		<li>
		<a href="#">취업준비</a>
			<ul>
				<li><a href="../job/resume.php">이력서</a></li>
				<li><a href="../job/self_introduce.php">자기소개서</a></li>
			</ul>
		</li>
		<li>
		<a href="#">공부</a>
			<ul>
				<li><a href="./c_bbs.php">C/C++</a></li>
				<li><a href="./j_bbs.php">Java/Jsp</a></li>
				<li><a href="./h_bbs.php">HTML/CSS</a></li>
				<li><a href="./p_bbs.php">PHP</a></li>
			</ul>
		</li>
		<li>
			<a href="#">기타</a>
			<ul>
			<li><a href="#">영화</a></li>
			<li><a href="#">일기</a></li>
			</ul>
		</li>
	</ul>
	</nav>
</header>


<div id="header2">
	<p id="header2p"><?php echo $bd_title?></p>
</div>
<section>
	<article>
	<br><br><br>

			
	<table id="board_view">  
	<tr>
			

		<td id="board_title">
			<!--<span id="space_pre"></span>-->
			<span id="board_title_title"><?php echo $data[title]?> </span>

			<span id="board_title_link">&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
				<a href="./<?=$id?>.php"><?php echo $bd_title?></a>
			</span>

			<!--<span id="space2"></span>-->
			<div id="board_title_date">
				<?php echo $data[insert_date] ?>
			</div>
		</td>
	</tr>


	<tr id="board_view_story">
		<td>
			<?php 
			if($data[file01]) {?>
			<img src='./data/<?=$data[file01]?>' style="max-width:75%; height:auto;">
			<?php }?>

			<br>
			<?php echo $data[story]?>
		</td>
	</tr>

<tr>
		<td bgcolor="#d4d5d3" width="100%" height="50px" align="right" valign="top">
			<span class="a_style"><a href='./<?=$id?>.php'>글목록</a></span> &nbsp; &nbsp; 
			<?php if($_SESSION['id']==null&&$_SESSION['aid']!=null){?>
			<span class="a_style"><a href="./c_edit.php?id=<?=$id?>&no=<?= $data[no]?>">글수정</a></span> &nbsp; &nbsp; 
			<span class="a_style"><a href="./c_delete.php?id=<?=$id?>&no=<?=$data[no]?>" onclick="return confirm('정말 삭제 하시겠습니까?');">삭 제</a></span>
			<?php }?>
			<?php
				if($str5==0){
					echo "";
				}else{
			?>
			<p id="c_input">
			덧글보기  <?php echo $ttotals?> 개
			</p>
			<?php }?>
			</td>
			</tr>
		

	

	</table>
	<br>

<!-- comment DB -->
<?php
$query2 = "SELECT * FROM $comment_db WHERE b_num= $no";

mysqli_query("set names utf8");
$result2= mysqli_query($con, $query2);
?>
<!-- -->



<!--

$(function(){
    $('#inner').hide();
	$('#navi a').click(function(){
        $('#inner').slideToggle(500, function(){
            if($(this).is(':hidden')) $('#navi a').html('<img src="../img/bullets-white.png">');
            else $('#navi a').html('<img src="../img/bullets-white.png">'); 
        });
    });
});
-->
<!-- 댓글 리스트 시작 -->

<div class="comment">
	<table id="c_table">
	<?php
		if($ttotals==0){
			echo "댓글없음";
		}

		while($row = mysqli_fetch_array($result2)){
		?>

	<tr>
		<td id="c_id"><strong><?php echo $row[b_id]?>(<?php echo $row[b_n_name]?>)</strong></td>
		<td id="c_date"><?php echo $row[b_date]?>
		<?php if($row[b_id] == $_SESSION[id] || $row[b_id] == $_SESSION[aid])
		{?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='./comment_del.php?cnt=<?=$row[cnt]?>&no=<?=$no?>&id=<?=$id?>' 
		onclick="return confirm('정말 삭제 하시겠습니까?');">[삭제]</a> <?php }?>
		</td>
	</tr>
	<tr>
		<td colspan="2" id="c_content"><?php echo $row[b_comment]?></td>
	</tr>
	<?php }?>
	</table>
</div>

<!-- 댓글 리스트 끝-->

<?php
				if($str5==0){
					echo "";
				}else{
			?>
<!-- 댓글 입력창 시작 -->
<div id="comment_insert">

<form name="comment_insert" action="./comment_write.php" method="get">
<input type='hidden' name='id' value='<?php echo $id?>'>
<input type='hidden' name='no' value='<?php echo $data[no]?>'>
<textarea name="comment_insert" rows="3" cols="80" placeholder="내용을 입력하세요."
style="resize:none;width:90% ;overflow:auto;"  wrap="hard"></textarea>
<input id="c_input" type='Submit' value='&nbsp;&nbsp;&nbsp;입력&nbsp;&nbsp;&nbsp;'>



</form>
</div>
<!-- 댓글 입력창 끝 -->

<?php }?>

	<br><br><br>

	</article>
</section>	
<footer>
	<address>
		Copyright &copy; 2016 hsj All Rights Reserved
	</address>
</footer>




<a style="display:scroll; position:fixed; bottom:10px; right:20px;" href="#" title=Top>
	<img src="../img/top.png">
</a>
</body>
</html>
