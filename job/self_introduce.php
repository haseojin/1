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
<link href="../css/job.css" rel="stylesheet" type="text/css">
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

</head>

<body>
<header>
	<ul id="left_nav">
		<li>Ha Seojin</li>
		<li class="space"></li>
		<li id="navi"><a href="#"><img src="../img/bullets-white.png"></a></li>
		<li class="login">	
			<a href='./member/member_form.php'>
			<?php
				if($_SESSION['id']==null&&$_SESSION['aid']==null) { // 로그인 하지 않았다면
			?>
				
		</li>
		<li class="login"><a href="../member/login.php">로그인</a></li>
		<li class="login"><a href="../member/admin_login.php">관리자 로그인</a></li>
			<?php }?>

		<?php
		if($_SESSION['id']!=null&$_SESSION['aid']==null){ // 로그인 했다면
			echo $_SESSION['n_name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='../member/logout.php'>로그아웃</a>";
		}
		?>
		</a>
		<a href='../member/member_list.php'>
		<?php
			if($_SESSION['id']==null&&$_SESSION['aid']!=null){ // 관리자 로그인 했다면
				echo "관리자(".$_SESSION['aid'].")님이 로그인 하였습니다.";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='../member/admin_logout.php'>로그아웃</a>";
			}
		?>
		</a>
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
					<li><a href="./resume.php">이력서</a></li>
					<li><a href="./self_introduce.php">자기소개서</a></li>
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
			<p id="header2p">포트폴리오</p>
		</div>

		<section>
		<article>
		<table>
			<caption>
				자 기 소 개 서 
			</caption>
				<tr>
					<td class ="td1" rowspan=2 >지원사항</td>
					<th>지원구분</th>
					<th>지원회사</th>
					<th>지원부문</th>
					<th>지원자</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>

		<p>
	<table>
			<tr>
				<td class ="td1" >성장과정</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<p>
		<table>
			<tr>
				<td class ="td1" >성격 및 장단점</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<p>
		<table>
			<tr>
				<td class ="td1" >입사지원동기</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<p>
		<table>
			<tr>
				<td class ="td1" >입사 후 포부</td>
				<td>&nbsp;</td>
			</tr>
		</table>
		<p>
			
		<table>
			<tr>
				<td class ="td1" >작성자</td>
				<td>&nbsp;</td>
			</tr>
		</table>
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
