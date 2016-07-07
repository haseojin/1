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

<script language="JavaScript">
	function checkInput() {
		if(document.fname.uid.value == "") {
			alert("ID를 입력하세요");
			return;
		}
		if(document.fname.pwd.value == "") {
			alert("비밀번호를 입력하세요");
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
				<li class="login"><a href="./login.php">로그인</a></li>
				<li class="login"><a href="./admin_login.php">관리자 로그인</a></li>
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
			<p id="header2p">로그인</p>
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
			<form method=post action="./login_post.php" name=fname>
				<div id="login_form">
				<div id="big_label">로그인</div>
				<div class="line"></div>
				<div id="middle">
					<dl>
						<dt class="label1"><label>아이디</label></dt>
						<dd><input type=text name="uid" size=40 style="width:200"></dd>
						<dt class="label1"><label>비밀번호</label></dt>
						<dd><input type=password name="pwd" size=40 style="width:200">&nbsp;</dd>
					</dl>
					<p id="remember"><input type="checkbox" id="rememberme" name="rememberme" value="on"><label for="rememberme">&nbsp;로그인 유지</label></p>
					<div id="btns">
						<p><input type="button" class="icon_login" value="로그인" onClick="checkInput()"> <input type="reset" class="icon_login" value="취  소"></p>
					</div>
					<div class="line"></div>
					<div id="login_bottom">
						<a href='./find_pw_form.php'>비밀번호 찾기</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href='./insert_form.php'>회원가입</a>
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
