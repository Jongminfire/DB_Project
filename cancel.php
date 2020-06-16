<?
  include './user_check.php';
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $user_id;
  $class_id = $_POST['class_id'];

  $query = "Select * from user_subject where user_id = '$id' and class_id='$class_id'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_fetch_array($result);    //mysql_num_rows() 함수로 result 값이 몇개인지 알 수 있음


  $query2 = "delete from user_subject where us_id = '$rows[us_id]'";
  $result2 = mysqli_query($conn,$query2);

  echo "<script>alert('담기를 취소했습니다.'); location.href='mypage.php';</script>";

?>
