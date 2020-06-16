<?php
session_start();
if($_SESSION['id']!=null) {
?>

<body>
    <center>
      <span style="font-size:100px; color:#bd1c11; font-family:Lucida Console; font-weight:bold;">SEJONG.GG</span><br><br><br><br>
      <p>  <? echo $_SESSION['id'] ?>님 안녕하세요!
      <input type = "button" value ="로그아웃" onClick= "location.href ='logout.php'">
      </p>
      <p>
        <input type = "button" value ="차트" onClick= "location.href ='chart.php'">
        <input type = "button" value ="분석" onClick= "location.href ='analysis.php'">
        <input type = "button" value ="강의목록" onClick= "location.href ='lecture.php'">
        <input type = "button" value ="마이페이지" onClick= "location.href ='mypage.php'">
      </p
    </center>
</body>

<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
