<?php
	session_start(); // 세션				
	mysqli_set_charset($conn, 'utf8'); 
?>

<?php
	include ("../lib/db_connect.php");
	mysqli_set_charset($con, 'utf8'); 
	$sql = "SELECT * FROM member ". 
	"WHERE id='". $id. "';";
	$result = mysqli_query($con,$sql); 
	$num_record=mysqli_num_rows($result);

	$sql2 = "UPDATE member SET pw = '$pw' WHERE id='$id'";
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>
<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/member.css" rel="stylesheet" type="text/css">


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
	function showConfirm() {
		if(confirm("정말 탈퇴하시겠습니까?")){
			alert("확인버튼을 누르셨습니다.");
			location.href='./m_delete.php';
		} else {
			alert("취소하였습니다.");
		}
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
		<a href='#'>
			<?php
				if($_SESSION['id']==null) { // 로그인 하지 않았다면
			?>
		</a>					
		</li>
		<li class="login"><a href="./login.php">로그인</a></li>
		<li class="login"><a href="./admin_login.php">관리자 로그인</a></li>
			<?php
				}else{ // 로그인 했다면
					echo $_SESSION['n_name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
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
	<p id="header2p">
		<?php
			echo $_SESSION['n_name']."(".$_SESSION['id'].")님의 회원정보";
		?>
	</p>
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
	<form method=post action="#" name=form_name>
		<div id="member_form">
		<div id="big_label">회원정보</div>

		<div class="line"></div>
		<div id="middle">

			<dl>
				<dt class="label1"><label>닉네임</label></dt>
				<dd>
					<?php
						echo $_SESSION['n_name'];
					?>
				</dd>
				<dt class="label1"><label>아이디</label></dt>
				<dd>
					<?php
						echo $_SESSION['id'];
					?>
				</dd>
				<dt class="label1"><label>전화번호</label></dt>
				<dd>
					<?php
						echo $_SESSION['p_number'];
					?>
				</dd>
				<dt class="label1"><label>e-mail</label></dt>
				<dd>
					<?php
						echo $_SESSION['e_mail'];
					?>
				</dd>
				<dt class="label1"><label>성별</label></dt>
				<dd>
					<?php
						echo $_SESSION['gender'];
					?>
				</dd>

				<dt class="label1"><label>사는지역</label></dt>
				<dd>
					<?php
						echo $_SESSION['area'];
					?>
				</dd>
				<dt class="label1"><label>가입날짜</label></dt>
				<dd>
					<?php
						echo $_SESSION['insert_date'];
					?>
				</dd>
				<dt class="label1"><label>방문횟수</label></dt>
				<dd>
					<?php
						echo $_SESSION['cnt']." 회";
					?>
				</dd>
			</dl>
			<div id="btns2">
				<p>
				<input type="button"  class="icon_login" name="formcheck" value="수   정" onclick="location.href='./change_member_form.php' ">
				<input type="button"  class="icon_login" name="formcheck2" value="탈   퇴" onclick="showConfirm()">
				<input type="reset" class="icon_login" value="취   소">
				</p>
			</div>
		</div>
		</div>
	</form>
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
