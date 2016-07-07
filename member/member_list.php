<?php
	session_start(); // 세션
	mysqli_set_charset($conn, 'utf8'); 				  
?>

<?php
	include ("../lib/db_connect.php"); // DB접속

	$_page=$_GET[_page];

	$view_total = 10; //한 페이지에 3개 게시글이 보인다.
	if(!$_page)($_page=1); //페이지 번호가 지정이 안되었을 경우
	$page= ($_page-1)*$view_total;

	$query="select count(*) from member";
	$result=  mysqli_query($con, $query);
	$temp= mysqli_fetch_array($result);
	$totals= $temp[0];

	$sql2= "select * from member limit $page, $view_total";
	$result2 = mysqli_query($con, $sql2); 

	$member_count=1;


	/////////////////////검색
	if($_GET['Search_text']){//검색시
		$sql2 = "SELECT * FROM member WHERE ".$_GET['Search_mode']." LIKE '%".$_GET['Search_text']."%'  limit $page, $view_total";
		$result2 = mysqli_query($con, $sql2); 

		$query="select count(*) from member WHERE ".$_GET['Search_mode']." LIKE '%".$_GET['Search_text']."%'  limit $page, $view_total";
		//mysql_query("set names utf8");  //언어셋 utf8
		$result=  mysqli_query($con, $query);
		$temp= mysqli_fetch_array($result);
		$totals= $temp[0];
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>

<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/member_list.css" rel="stylesheet" type="text/css">
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

		<li class="login"><a href="./login.php">로그인</a></li>
		<li class="login"><a href="./admin_login.php">관리자 로그인</a></li>
			<?php }?>
			<?php
			if($_SESSION['aid']!=null){ // 관리자 로그인 했다면
				echo "<a href='./member_list.php'>관리자(".$_SESSION['aid'].")님이 로그인 하였습니다.</a>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='./admin_logout.php'>로그아웃</a>";
			}
			if($_SESSION['id']!=null){ // 로그인 했다면
			echo "<a href='./member_form.php'>".$_SESSION['n_name']."(".$_SESSION['id'].")님이 로그인 하였습니다.</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='./logout.php'>로그아웃</a>";
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
			<li><a href="../board/c_bbs.php">C/C++</a></li>
			<li><a href="../board/j_bbs.php">Java/Jsp</a></li>
			<li><a href="../board/h_bbs.php">HTML/CSS</a></li>
			<li><a href="../board/p_bbs.php">PHP</a></li>
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
	<p id="header2p">회원목록</p>
</div>

		<!--<div id='sidebar'>
			<h3>SNS 등록</h3>
			<ul>
				<li><a href='#'>페이스북</a></li>
				<li><a href='#'>트위터</a></li>
			</ul>
			<h3>카테고리</h3>
			<ul>
				<li><a href='#'>디지털 아트</a></li>
				<li><a href='#'>사운드 아트</a></li>
				<li><a href='#'>정보 가시화</a></li>
				<li><a href='#'>뉴 미디어 프로그래밍</a></li>
			</ul>					
		</div>  'sidebar' 끝-->
<section>
	<article>
	<br><br><br>
	<table id="member_list1">
		<tr>
			<th>회원명부</th>
			<td class="total_member">총회원</td>
			<td class="total_member"><?php echo $totals;?> 명</td>
		</tr>
	</table>

	<table id="member_list2">
		<tr>
			<th class="num"	>순번</th>
			<th class="id">ID</th>
			<th class="n_name">닉네임</th>
			<th class="p_number">전화번호</th>
			<th class="email">e-mail</th>
			<th class="gender">성별</th>
			<th class="area">지역</th>
			<th class="insert_date">가입일</th>
			<th class="last_date">마지막 방문일</th>
			<th class="cnt">방문횟수</th>
		</tr>
	</table>
	<table id="member_list3">
		<!--<c:if test="${reqPage != null }">
		<c:set var="seq_no" value="${(dbCount -(reqPage-1)*pageSize) }" />
		</c:if>-->
		<?php 
		//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
		while($row = mysqli_fetch_array($result2)){
		?> 
			<tr class="m_list3_line">
			<td class="num"><?php echo $member_count; ?></td>
			<td class="id"><?php echo $row[id]; ?></td>
			<td class="n_name"><?php echo $row[n_name]; ?></td>
			<td class="p_number"><?php echo $row[p_number]; ?></td>
			<td class="email"><?php echo $row[e_mail]; ?></td>
			<td class="gender"><?php echo $row[gender]; ?></td>
			<td class="area"><?php echo $row[area]; ?></td>
			<td class="insert_date"><?php echo $row[insert_date]; ?></td>
			<td class="last_date"><?php echo $row[last_date]; ?></td>
			<td class="cnt"><?php echo $row[cnt]; ?></td>
		</tr>
		<?php $member_count++;}?>
	</table>
	<br>
	<!---게시물 검색-->
	<div colspan='5' id="search"> 
		<form method="get" name=fname>
			Search &nbsp;
			<select name='Search_mode'>
			<option value='id'> ID</option>
			<option value='n_name'> 닉네임</option>
			<option value='e_mail'> 이메일</option>
			<option value='p_number'> 폰번호</option>
			<option value='area'> 지역</option>
			<option value='gender'> 성별</option>
			</select>
			<input type='text' name='Search_text' size='10'>
			<input type="button" value='Search' onClick="checkInput()">
		</form>
	</div>
	<!-- //////////////////////////////////////////////-->
	<div>
		<?php include ('./list_page.php');?>
	</div>
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


