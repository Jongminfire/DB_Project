<?
  session_start();
  ini_set('display_errors', '0');   //오류 메세지 무시
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id = $_POST['user_id'];
  $pwd = $_POST['user_pwd'];

  $query = "Select * from user where user_id = '$id' and user_pwd='$pwd'";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_array($result);

  if($id == $row['user_id'] && $pwd == $row['user_pwd']){
    $_SESSION['id'] = $row['user_id'];
    echo "<script>alert('로그인 완료!'); location.href='./main2.php';</script>";
  }
  else {
    echo "<script>alert('아이디나 비밀번호가 틀렸습니다'); location.href='./main1.php';</script>";
}
?>
