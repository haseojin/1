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


<?php

}

?>

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
<table>
				<caption>
					입 사 지 원 서
				</caption>
					<tr>
						<td class ="td1" rowspan=2 >지원사항</td>
						<th>지원구분</th>
						<th>지원회사</th>
						<th>지원부문</th>
						<th>희망연봉</th>
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
					<td class ="td1" rowspan=4>인적사항</td>
					<td rowspan=4>사진</td>
					<th rowspan=2>성명</th>
					<td colspan=5>&nbsp;</td>	
				</tr>
				<tr>
					<td colspan=2>&nbsp;</td>	
					<th>생년월일</th>
					<td colspan=2>&nbsp;</td>	
				</tr>
				<tr>
					<th>주소</th>
					<td colspan=5>&nbsp;</td>
				</tr>
				<tr>
					<th>전화</th>
					<td>&nbsp;</td>
					<th>휴대폰</th>
					<td>&nbsp;</td>
					<th>이메일</th>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p>
			<table>
				<tr>
					<td class ="td1" rowspan=3>학력사항</td>
					<th>학 교 명</th>
					<th>전 공</th>
					<th>기 간</th>
					<th>소재지</th>
					<th>졸업구분</th>
					<th>학점</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p>
			<table>
				<tr>
					<td class ="td1" rowspan=2>격력사항</td>
					<th>근 무  처</th>
					<th>기 간</th>
					<th>지 위</th>
					<th>담 당 업 무</th>
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
					<td  class ="td1" rowspan=6>자격사항</td>
					<th>자 격 증 명</th>
					<th>발급기관명</th>
					<th>취득일</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p>
			<table>
				<tr>
					<td class ="td1" rowspan=6>전산능력</td>
					<th>종 류</th>
					<th>상.중.하</th>
					<td  class ="td1" rowspan=6>기타</td>
					<th>취 미</th>
					<th>특 기</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td rowspan=5>&nbsp;</td>
					<td rowspan=5>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p>
			<table>
				<tr>
					<td class ="td1" rowspan=4>가족사항</td>
					<th>관 계</th>
					<th>성 명</th>
					<th>연 령</th>
					<th>동거여부</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
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
