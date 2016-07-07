<?php
	session_start(); // 세션
	mysqli_set_charset($conn, 'utf8'); 
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>

<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/board.css" rel="stylesheet" type="text/css">
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


<?php
	include ("../lib/db_connect.php");
	$_page=$_GET[_page];

	$view_total = 10; //한 페이지에 3개 게시글이 보인다.
	if(!$_page)($_page=1); //페이지 번호가 지정이 안되었을 경우
	$page= ($_page-1)*$view_total;

	$query="select count(*) from c_bbs";
	//mysql_query("set names utf8");  //언어셋 utf8
	$result=  mysqli_query($con, $query);
	$temp= mysqli_fetch_array($result);
	$totals= $temp[0];

	$sql2= "select * from c_bbs  order by no desc limit $page, $view_total";
	$result2 = mysqli_query($con, $sql2); 



	/////////////////////검색
	if($_GET['Search_text']){//검색시
	$sql2 = "SELECT * FROM c_bbs WHERE ".$_GET['Search_mode']." LIKE '%".$_GET['Search_text']."%'   order by no desc limit $page, $view_total";
	$result2 = mysqli_query($con, $sql2); 

	$query="select count(*) from c_bbs WHERE ".$_GET['Search_mode']." LIKE '%".$_GET['Search_text']."%'  limit $page, $view_total";
	//mysql_query("set names utf8");  //언어셋 utf8
	$result=  mysqli_query($con, $query);
	$temp= mysqli_fetch_array($result);
	$totals= $temp[0];


	}

	$id="c_bbs";

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
			<li><a href="./m_bbs.php">영화</a></li>
			<li><a href="#">일기</a></li>
			</ul>
		</li>
	</ul>
	</nav>
</header>
<div id="header2">
	<p id="header2p">C/C++</p>
</div>
<section>
	<article>
	<br>
	<table id="board_list2">
		<tr>
			<th>C/C++</th>
			<td class="total_member">총 게시글</td>
			<td class="total_member"><?php echo $totals;?> 개</td>
		</tr>
	</table>

	<table id="list_table">  
		<tr> 
			<td id="list_table_td" colspan='5'>&nbsp;</td>
		</tr>
		<tr id="list_table_title">
			<td class="no">no</td>
			<td class="bd_title">제목</td>
			<td class="date">최초날짜</td>
			<td class="date">최근수정날짜</td>
			<td class="hit">hit</td>
		</tr>
			<?php 
				while($row = mysqli_fetch_array($result2)){

			?> 

		<tr id="list_table_content"> 
		
			<td class="no"><?php echo $row[no]?></td>
			<td class="bd_title">
			<?php
			if(strlen($row[title]>20)){ 
					   $note = substr($row[title], 0, 20).'...'; 
			}else{
				$note=$row[title];
			} 
			?>
				<a href="./c_view.php?id=<?= $id?>&no=<?= $row[no]?>">
				<?php echo $note ?></a>
			</td>
			<td class="date"><?php echo date("Y-m-d", strtotime($row['insert_date'])) ?></td>
				
				<?php
				if($row['edit_date']!=NULL){?>
			<td class="date"><?php echo date("Y-m-d", strtotime($row['edit_date'])) ?></td>
				<?php 
			}else{?>
			<td class="date">&nbsp;</td>
				<?php }?>
			<td class="hit"><?php echo $row[hit]?></td>
		</tr>
		<?php } ?>

		<tr> 
		<?php 
		if($_SESSION['id']==null&$_SESSION['aid']!=null){?>
		<td height='20' align='right' colspan='5' bgcolor='FFFFF'>
		<br>
		<div class="a_style"><a href='./c_write.php'>[게시판 글쓰기]</a></div>
		<br>
		</td>

		<?php
		} ?>
		</tr>


		<tr>
		<!---게시물 검색-->
		<form method="get" name=fname>
			<td height='20' colspan='5' bgcolor='#FFFFFF' align='right'> 
			Search &nbsp;
			<select name='Search_mode'>
				<option value='title'>제목</option>
				<option value='story'>내용</option>
			</select>
			<input type='text' name='Search_text' size='10'>
			<input type='submit' value='Search'>
			</td>
		</form>
		</tr>
	</table>

	<div>
		<?php include ('./list_page.php');?>
	</div>
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
