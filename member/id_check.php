<center>
<?php
  $url = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; 
  $aaa = strrpos($url, "=");
  $bbb = strlen($url);
  $id = substr($url, $aaa+1, $bbb);
  include ("./lib/db_connect.php"); // DB접속
  mysqli_set_charset($con, 'utf8'); 

  $sql = "SELECT * FROM member WHERE id='$id';";
  $result = mysqli_query($con,$sql); 
  $num_record=mysqli_num_rows($result);

  if($num_record)
  {
    echo $id;
    echo "가 중복됩니다.<br>";
    echo "다른 아이디를 사용하세요.<br>";

  }
  else
  {
    echo $id;
    echo "는 중복되지 않았습니다.<br>";
  }
?>
<br>
<input type=button value="닫기" onclick="self.close()"></center>

