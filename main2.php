<?php
session_start();
if($_SESSION['id']!=null) {
?>

<body>
    <center>
      <img src="https://log.op.gg/wp-content/uploads/1999/01/logo_opgg_blue_18x3.png" alt="logo" style="width:720px;height:120px;"><br><br><br><br>
      <p>  <? echo $_SESSION['id'] ?>님 안녕하세요!
      <input type = "button" value ="로그아웃" onClick= "location.href ='logout.php'">
      </p>
      <p>
        <input type = "button" value ="차트" onClick= "location.href ='chart.html'">
      <input type = "button" value ="분석" onClick= "location.href ='analysis.html'">
      <input type = "button" value ="마이페이지" onClick= "location.href ='mypage.html'">
      </p
    </center>
</body>

<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
