<?
  include './user_check.php';
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $user_id;
  $subject_id = $_POST['subject_id'];

  $query = "delete from evaluation where sub_id = '$subject_id' and user_id = '$id'";
  $result = mysqli_query($conn,$query);

  echo "<script>alert('남긴 후기를 삭제했습니다.'); location.href='mypage.php';</script>";

?>
