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
	var msg;
	var exptext = /^[A-Za-z0-9_\.\-]+@[A-Za-z0-9\-]+\.[A-Za-z0-9\-]+/;

	function checkInput(){
		var form = document.form_name;
		msg = "== 비밀번호찾기시 오류사항 ==\n\n";
		if(form.id.value=="")
			msg += "회원ID를 입력하세요.\n\n";
		else if(form.id.value.length < 5)
			msg += "회원ID는 5자 이상 입력해야 합니다.\n\n";
		else if(!a_or_d(form.id.value))
			msg +="회원ID는 영문이나 숫자로 입력하세요\n\n";
		
		if(form.email.value=="")
			msg += "이메일을 입력하세요\n\n"

 
		else if(exptext.test(form.email.value)==false)
		//이메일 형식이 알파벳+숫자@알파벳+숫자.알파벳+숫자 형식이 아닐경우
		msg +="이메일형식이 올바르지 않습니다.\n\n";

 		if((form.tel2.value=="") && (form.tel3.value==""))
			msg += "전화번호를 입력하세요\n\n";
		if(isNaN(form.tel2.value) || (isNaN(form.tel3.value)))
			msg +="전화번호는 숫자만 입력가능합니다.\n\n";
		if(((form.tel2.value!="") && (form.tel3.value=="")) ||((form.tel2.value=="") && (form.tel3.value!="")) )
			msg +="전화번호를 끝까지 입력해 주세요.\n\n";

		if(msg == "== 비밀번호찾기시 오류사항 ==\n\n"){
			form.submit();
		}else{
			alert(msg);
			return;
		}
	}
	function a_or_d(str) {
		lower_str = str.toLowerCase();
		
		for(i=0; i<lower_str.length; i++) {
			ch=lower_str.charAt(i);
			if(((ch<'a')|| (ch>'z')) && ((ch<'0')||(ch>'9')))
				return 0;
		}
		return 1;
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
	<p id="header2p">비밀번호 찾기</p>
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
		<form method=post action="./find_pw_post.php" name=form_name>
		<div id="findpw_form">
			<div id="big_label">비밀번호 찾기</div>
			<div class="line"></div>
			<div id="middle">
				<dl>
					<dt class="label1"><label>아이디</label></dt>
					<dd><input type=text name="id" size=40 style="width:200"></dd>
					<dt class="label1"><label>이메일</label></dt>
					<dd><input type=text name="email" size=40 style="width:200">&nbsp;</dd>
					<dt class="label1"><label>전화번호</label></dt>
					<dd>
						<select name="tel1">
							<option>010</option>
							<option>02</option>
							<option>051</option>
							<option>053</option>
							<option>032</option>
							<option>062</option>
							<option>042</option>
							<option>052</option>
							<option>044</option>
							<option>031</option>
							<option>033</option>
							<option>043</option>	
							<option>041</option>
							<option>063</option>
							<option>061</option>
							<option>054</option>
							<option>055</option>
							<option>064</option>
						</select> -
					<input type=text name=tel2 size=4 maxlength=4 value=""> -
					<input type=text name=tel3 size=4 maxlength=4 value="">
				</dl>

				<div id="btns2">
					<p><input type="button" class="icon_login" value="찾기" onClick="checkInput()"> <input type="reset" class="icon_login" value="취  소"></p>
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
