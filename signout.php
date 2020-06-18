<?php
session_start();
ini_set('display_errors', '0');   //오류 메세지 무시
if($_SESSION['id']!=null) {

  $query ="delete from user where user_id = $_SESSION[id]";

  $result = mysqli_query($conn, $query);
  mysqli_close($conn);

  echo "<script>alert('탈퇴되었습니다.'); location.href='./main1.php';</script>";
}

else {
  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
