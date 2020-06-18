<?
  session_start();
  ini_set('display_errors', '0');   //오류 메세지 무시
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id=$_SESSION['id'];
  $pwd = $_POST['user_pwd'];
  $grade = $_POST['user_grade'];
  $dept = $_POST['dept_name'];

  $query = "update user set user_pwd = '$pwd' ,user_grade = '$grade' ,dept_name = '$dept' where user_id = '$id';";
  mysqli_query($conn, $query);

  echo "<script>alert('회원정보 변경완료!'); location.href='./mypage.php';</script>";

?>
