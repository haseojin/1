<?php
	session_start(); // 세션
	mysqli_set_charset($conn, 'utf8'); 
?>
<?php
	include ("../lib/db_connect.php");
	$no=$_GET[no];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>

<link href="../css/common.css" rel="stylesheet" type="text/css">
<link href="../css/board.css" rel="stylesheet" type="text/css">
<!-- 게시글 쓰기 -->
<script type="text/javascript" src="../SmartEditor2/js/HuskyEZCreator.js" charset="utf-8"></script>
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
	<br><br>
	<table id="board_write">  
	<form name='write' action='./c_write_post.php' method='post' enctype='multipart/form-data'>
	
	<tr>
	<td id="board_write_title_left">
	 <select name='Search_mode'>
		   <option value='c_bbs'>C/C++</option>
		   
		   <option value='j_bbs'>JAVA/JSP</option>
		   
		   <option value='h_bbs'>HTML/CSS</option>
		   
		   <option value='p_bbs'>PHP</option>

		   <option value='m_bbs'>영화</option>
	   </select>
	</td>

	<td id="board_write_title_right">
		<input type='text' name='subject' placeholder="&nbsp;&nbsp;&nbsp;포스트 제목을 입력하세요">
	</td>
	</tr>

	<tr><td>&nbsp;</td></tr>

	<tr>
	<td id="board_write_text" colspan='2'>
	  <textarea id='ir1' name='story' style="width:80%; height:400px;"></textarea>
	</td>
	</tr>

	<script type="text/javascript">
		var oEditors = [];
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: oEditors,
			elPlaceHolder: "ir1",
			sSkinURI: "../SmartEditor2/SmartEditor2Skin.html",	
			fCreator: "createSEditor2"
		});

		function submitContents(elClickedObj) {
			oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.
			
			// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

			try {
				elClickedObj.form.submit();
			} catch(e) {}
		}
	</script>

	<tr>
	<td width='100%' height='30'  align='right' valign='middle' colspan='2'>
		<input type='file' name='file01'>
	</td>
	</tr>

	<tr>
	<td width='100%' height='auto' colspan='2' align='center' valign='middle'>
		<br>
		<input type='Submit' value='쓰 기' onclick='submitContents()' style="width:10%; height: 30px;">
		<input type="reset" value="취  소" style="width:10%; height: 30px; margin-left:20px;">
	</td>
	</tr>
</form>
</table>
<br><br>

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
