<?php
	session_start(); // 세션					
	mysqli_set_charset($conn, 'utf8'); 	
	include ("./lib/db_connect.php");				  
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>index</title>

<link href="./css/common.css" rel="stylesheet" type="text/css">
<link href="./css/index.css" rel="stylesheet" type="text/css">
<!--전체메뉴 펼치기-->
<script type="text/javascript" src="http://fllkorea2.mireene.com/test/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(function(){
    $('#inner').hide();
	$('#navi a').click(function(){
        $('#inner').slideToggle(500, function(){
            if($(this).is(':hidden')) $('#navi a').html('<img src="./img/bullets-white.png">');
            else $('#navi a').html('<img src="./img/bullets-white.png">'); 
        });
    });
});
</script>
<script type="text/javascript">

$(function(){

 $(".rbdc").click(function(){
       $(".rbdlistc").show();
       $('.rcmtlistc').hide();
 });
});
$(function(){
	$('.rcmtlistc').hide();
   $(".rcmtc").click(function(){
       $(".rcmtlistc").show();
       $('.rbdlistc').hide();
 });
});


</script>

<script type="text/javascript">

$(function(){

 $(".rbdj").click(function(){
       $(".rbdlistj").show();
       $('.rcmtlistj').hide();
 });
});
$(function(){
	$('.rcmtlistj').hide();
   $(".rcmtj").click(function(){
       $(".rcmtlistj").show();
       $('.rbdlistj').hide();
 });
});


</script>

<script type="text/javascript">

$(function(){

 $(".rbdh").click(function(){
       $(".rbdlisth").show();
       $('.rcmtlisth').hide();
 });
});
$(function(){
	$('.rcmtlisth').hide();
   $(".rcmth").click(function(){
       $(".rcmtlisth").show();
       $('.rbdlisth').hide();
 });
});


</script>

<script type="text/javascript">

$(function(){

 $(".rbdp").click(function(){
       $(".rbdlistp").show();
       $('.rcmtlistp').hide();
 });
});
$(function(){
	$('.rcmtlistp').hide();
   $(".rcmtp").click(function(){
       $(".rcmtlistp").show();
       $('.rbdlistp').hide();
 });
});


</script>
</head>

<body>
		<header>
			<ul id="left_nav">
				<li>Ha Seojin</li>
				<li class="space"></li>
				<li id="navi"><a href="#"><img src="./img/bullets-white.png"></a></li>

	




				<li class="login">	

					<?php

						if($_SESSION['id']==null&&$_SESSION['aid']==null) { // 로그인 하지 않았다면

?>
						
</li>
					 <li class="login"><a href="./member/login.php">로그인</a></li>
					 <li class="login"><a href="./member/admin_login.php">관리자 로그인</a></li>


<?php

}

?>

<?php
if($_SESSION['id']!=null&$_SESSION['aid']==null){ // 로그인 했다면


    echo "<a href='./member/member_form.php'>".$_SESSION['n_name']."(".$_SESSION['id'].")님이 로그인 하였습니다.</a>";


   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='./member/logout.php'>로그아웃</a>";
}

?>

<?php
if($_SESSION['id']==null&&$_SESSION['aid']!=null){ // 관리자 로그인 했다면
echo "<a href='./member/member_list.php'>관리자(".$_SESSION['aid'].")님이 로그인 하였습니다.</a>";

   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='./member/admin_logout.php'>로그아웃</a>";
}
?>




			</ul>
			<div id="slide">
				<div id="inner">---내용---</div>
			</div>

			<hgroup>
				<p id="title"><a href="./index.php">포트폴리오</a></p>
				<p id="subtitle"><small>Coding Study</small></p>
				<p>
			</hgroup>


			<nav id="main_menu">
				<ul>

					<li>
						<a href="#">취업준비</a>
						<ul>
							<li><a href="./job/resume.php">이력서</a></li>
							<li><a href="./job/self_introduce.php">자기소개서</a></li>
						</ul>
					</li>
					<li>
						<a href="#">공부</a>
						<ul>
							<li><a href="./board/c_bbs.php">C/C++</a></li>
							<li><a href="./board/j_bbs.php">Java/Jsp</a></li>
							<li><a href="./board/h_bbs.php">HTML/CSS</a></li>
							<li><a href="./board/p_bbs.php">PHP</a></li>
						</ul>
					</li>
					<li>
						<a href="#">기타</a>
						<ul>
							<li><a href="./board/m_bbs.php">영화</a></li>
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

		<div id='sidebar'>
			<p>취업준비</p>
			<ul>
				<li><a href='#'>이력서</a></li>
				<li><a href='#'>자기소개서</a></li>
			</ul>
			<p>공부</p>
			<ul>
				<li><a href='#'>C/C++</a></li>
				<li><a href='#'>JAVA/JSP</a></li>
				<li><a href='#'>HTML/CSS</a></li>
				<li><a href='#'>PHP</a></li>
			</ul>	
			<p>기타</p>
			<ul>
				<li><a href='#'>영화</a></li>
				<li><a href='#'>일기</a></li>
			</ul>				
		</div>
			<!-- ################################### -->
		
		<?php
			

			$sqlc= "select * from c_bbs  order by no desc limit 5";
			$resultc = mysqli_query($con, $sqlc); 


			$sqlj= "select * from j_bbs  order by no desc limit 5";
			$resultj = mysqli_query($con, $sqlj); 

			$sqlh= "select * from h_bbs  order by no desc limit 5";
			$resulth = mysqli_query($con, $sqlh); 

			$sqlp= "select * from p_bbs  order by no desc limit 5";
			$resultp = mysqli_query($con, $sqlp); 

			$sqlm= "select * from m_bbs  order by no desc limit 5";
			$resultpm= mysqli_query($con, $sqlm); 
		?>
			
			<?php
				$sqlcc= "select * from c_bbs_cmt  order by b_date desc limit 5";
				$resultcc = mysqli_query($con, $sqlcc); 

				$sqljc= "select * from j_bbs_cmt  order by b_date desc limit 5";
				$resultjc = mysqli_query($con, $sqljc); 

				$sqlhc= "select * from h_bbs_cmt  order by b_date desc limit 5";
				$resulthc = mysqli_query($con, $sqlhc); 

				$sqlpc= "select * from p_bbs_cmt  order by b_date desc limit 5";
				$resultpc = mysqli_query($con, $sqlpc); 
			?>


<!-- ##################################################################################### -->
			<div class="i_div rbdlistc" >
			<table class="i_table">
				<caption><strong><a href="./board/c_bbs.php">C/C++</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdc">게시글</span><span class="rcmt rcmtc">댓글</span></td></tr>
			</caption>

			<th class="i_no">번호</th>
			<th class="i_title">제목</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
				while($row = mysqli_fetch_array($resultc )){
					$a =$row[insert_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
					
			
			?> 
			

			<tr>

			<td class="i_no"><?php echo $row[no]?></td>
			<?php
			if(strlen($row[title])>50){ 
					   $note = substr($row[title], 0, 50).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[title];
			} 
			?>
			<td class="i_title"><a href="./board/c_view.php?id=c_bbs&no=<?= $row[no]?>"><?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
		

		<div class="i_div rcmtlistc">

			<table class="i_table">
			<caption><strong><a href="./board/c_bbs.php">C/C++</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdc">게시글</span><span class="rcmt rcmtc">댓글</span></td></tr>
			</caption>
			<th class="i_cb_title">게시글</th>
			<th class="i_cb_cmt">댓글</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
		
				while($row = mysqli_fetch_array($resultcc )){
					$a =$row[b_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
					$sqlcdc = "select * from c_bbs where no = $row[cnt]";
					$c_bbs_c = mysqli_query($con, $sqlcdc); 
					$note2 = mysqli_fetch_array($c_bbs_c);

			?> 
			
			<tr>
				<?php
			if(strlen($note2[title])>20){ 
					   $cbtitle = substr($note2[title], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$cbtitle=$note2[title];
			} 
			?>
		
			<td class="i_cb_title" align="center"><?php echo $cbtitle?></td>
			<td class="i_cb_cmt" align="center">
			<?php
			if(strlen($row[b_comment])>20){ 
					   $note = substr($row[b_comment], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[b_comment];
			} 
			?>

			<a href="./board/c_view.php?id=c_bbs&no=<?= $row[b_num]?>"><?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
<!-- ################################################################################### -->



<!-- ##################################################################################### -->
			<div class="i_div rbdlistj" >
			<table class="i_table">
				<caption><strong><a href="./board/j_bbs.php">JAVA/JSP</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdj">게시글</span><span class="rcmt rcmtj">댓글</span></td></tr>
			</caption>

			<th class="i_no">번호</th>
			<th class="i_title">제목</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
			
				while($row = mysqli_fetch_array($resultj )){
					$a =$row[insert_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31

			
			?> 
			

			<tr>

			<td class="i_no"><?php echo $row[no]?></td>
			<?php
			if(strlen($row[title])>50){ 
					   $note = substr($row[title], 0, 50).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[title];
			} 
			?>
			<td class="i_title"><a href="./board/c_view.php?id=j_bbs&no=<?= $row[no]?>"><?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
		

		<div class="i_div rcmtlistj">

			<table class="i_table">
			<caption><strong><a href="./board/c_bbs.php">JAVA/JSP</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdj">게시글</span><span class="rcmt rcmtj">댓글</span></td></tr>
			</caption>
			<th class="i_cb_title">게시글</th>
			<th class="i_cb_cmt">댓글</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
		
				while($row = mysqli_fetch_array($resultjc )){
					$a =$row[b_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
					$sqlcdc = "select * from j_bbs where no = $row[cnt]";
					$c_bbs_c = mysqli_query($con, $sqlcdc); 
					$note2 = mysqli_fetch_array($c_bbs_c);

			?> 
			
			<tr>
		

			<?php
			if(strlen($note2[title])>20){ 
					   $cbtitle = substr($note2[title], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$cbtitle=$note2[title];
			} 
			?>
		
			<td class="i_cb_title" align="center"><?php echo $cbtitle?></td>
			<td class="i_cb_cmt" align="center">
			<?php
			if(strlen($row[b_comment])>20){ 
					   $note = substr($row[b_comment], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[b_comment];
			} 
			?>

			<a href="./board/c_view.php?id=j_bbs&no=<?= $row[b_num]?>"><?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
<!-- ################################################################################### -->

<!-- ##################################################################################### -->
			<div class="i_div rbdlisth" >
			<table class="i_table">
				<caption><strong><a href="./board/h_bbs.php">HTML/CSS</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdh">게시글</span><span class="rcmt rcmth">댓글</span></td></tr>
			</caption>

			<th class="i_no">번호</th>
			<th class="i_title">제목</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
			
				while($row = mysqli_fetch_array($resulth )){
					$a =$row[insert_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
			
			?> 
			

			<tr>

			<td class="i_no"><?php echo $row[no]?></td>
			<?php
			if(strlen($row[title])>50){ 
					   $note = substr($row[title], 0, 50).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[title];
			} 
			?>
			<td class="i_title"><a href="./board/c_view.php?id=h_bbs&no=<?= $row[no]?>"><?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
		

		<div class="i_div rcmtlisth">

			<table class="i_table">
			<caption><strong><a href="./board/h_bbs.php">HTML/CSS</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdh">게시글</span><span class="rcmt rcmth">댓글</span></td></tr>
			</caption>
			<th class="i_cb_title">게시글</th>
			<th class="i_cb_cmt">댓글</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
		
				while($row = mysqli_fetch_array($resulthc )){
					$a =$row[b_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
					$sqlcdc = "select * from h_bbs where no = $row[cnt]";
					$c_bbs_c = mysqli_query($con, $sqlcdc); 
					$note2 = mysqli_fetch_array($c_bbs_c);

			
			?> 
			
			<tr>

			<?php
			if(strlen($note2[title])>20){ 
					   $cbtitle = substr($note2[title], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$cbtitle=$note2[title];
			} 
			?>
		
			<td class="i_cb_title" align="center"><?php echo $cbtitle?></td>
			<td class="i_cb_cmt" align="center">
			<?php
			if(strlen($row[b_comment])>20){ 
					   $note = substr($row[b_comment], 0, 21).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[b_comment];
			} 
			?>

			<a href="./board/c_view.php?id=h_bbs&no=<?= $row[b_num]?>">
			<?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
<!-- ################################################################################### -->

<!-- ##################################################################################### -->
			<div class="i_div rbdlistp" >
			<table class="i_table">
				<caption><strong><a href="./board/p_bbs.php">PHP</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdp">게시글</span><span class="rcmt rcmtp">댓글</span></td></tr>
			</caption>

			<th class="i_no">번호</th>
			<th class="i_title">제목</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
			
				while($row = mysqli_fetch_array($resultp )){
					$a =$row[insert_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31

			
			?> 
			

			<tr>

			<td class="i_no"><?php echo $row[no]?></td>
			<?php
			if(strlen($row[title])>50){ 
					   $note = substr($row[title], 0, 51).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note = $row[title];
			} 


			?>
			<td class="i_title"><a href="./board/c_view.php?id=p_bbs&no=<?= $row[no]?>">
			<?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
		

		<div class="i_div rcmtlistp">

			<table class="i_table">
			<caption><strong><a href="./board/p_bbs.php">PHP</a></strong>
					<tr><td colspan="3" class="i_table_title"><span class="rbd rbdp">게시글</span><span class="rcmt rcmtp">댓글</span></td></tr>
			</caption>
			<th class="i_cb_title">게시글</th>
			<th class="i_cb_cmt">댓글</th>
			<th class="i_hit">날짜</th>
			</tr>

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
		
				while($row = mysqli_fetch_array($resultjp )){
					$a =$row[b_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
					$sqlcdc = "select * from p_bbs where no = $row[cnt]";
					$c_bbs_c = mysqli_query($con, $sqlcdc); 
					$note2 = mysqli_fetch_array($c_bbs_c);

			
			?> 
			
			<tr>

			<?php
			if(strlen($note2[title])>20){ 
					   $cbtitle = substr($note2[title], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$cbtitle=$note2[title];
			} 
			?>
		
			<td class="i_cb_title" align="center"><?php echo $cbtitle?></td>
			<td class="i_cb_cmt" align="center">
			<?php
			if(strlen($row[b_comment]>20)){ 
					   $note = substr($row[b_comment], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[b_comment];
			} 
			?>

			<a href="./board/c_view.php?id=p_bbs&no=<?= $row[b_num]?>"><?php echo $note?></a></td>
			<td class="i_hit"><?php echo $b?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
<!-- ################################################################################### -->


<!-- ################################################################################### -->
<style>
a:link{color:#000;text-decoration:none;}
a:visited{color:#000;text-decoration:none;}
a:hover{color:#000;text-decoration:none;}
a:active{color:#000;text-decoration:none;}
</style>
<br>
<p style="margin-left:15%; font-size:25px;  font-weight:50; padding-bottom:10px"><a href="./board/m_bbs.php">영화</a></p>

<div align="center" style="width:80%; border:1px solid black; margin-right: auto; margin-left: auto; margin-bottom:50px;">
			
				

		

			<?php 
			//for($i = 0; $row = mysqli_fetch_array($result2); $i++){ //결과물을 뿌려줌 
			
				while($row = mysqli_fetch_array($resultpm )){
					$a =$row[insert_date];
					$b = date("n월 j일", strtotime($a)); // n(월)는 1~12,  j(일)는 1~31,  m(월)는 01~12,   d(일)는 01~31
			
			?> 
			
			<table style="width:15%;display:inline-block; margin-right:20px; margin-top:20px; margin-bottom:20px; margin-left:20px;">
			<tr><td style="border-bottom:1px solid black;padding-bottom:20px;">
			<a href="./board/c_view.php?id=m_bbs&no=<?= $row[no]?>">
			<img src='./board/data/<?=$row[file01]?>'  style="max-width:100%; height:120px;">
			</a>
			</td></tr>
			<?php
			if(strlen($row[title]>20)){ 
					   $note = substr($row[title], 0, 20).'...'; 
					   //echo $note; 
					   //echo "..."; 
			}else{
				$note=$row[title];
			} 
			?>
			
			<tr><td><a href="./board/c_view.php?id=m_bbs&no=<?= $row[no]?>"><?php echo $note?></a></td></tr>
			</table>
			<?php } ?>
			
			</div>
		

		




<!-- ################################################################################### -->
			</article>
		</section>	
		<footer>
			<address>
				Copyright &copy; 2016 hsj All Rights Reserved
			</address>
		</footer>




	<a style="display:scroll; position:fixed; bottom:10px; right:20px;" href="#" title=Top>
		<img src="./img/top.png">
	</a>
</body>
</html>
