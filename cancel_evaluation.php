<?
  include './user_check.php';
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $user_id;
  $subject_id = $_POST['subject_id']; // mypage의 강의 평가 취소를 위해 넘어 온 sub_id

  //강의 평가 취소를 위해 mypage로 부터 넘어 온 sub_id와 
  //로그인 되어있는 user_id를 evaluation테이블에 저장되어있는 sub_id,user_id와
  //비교해서 그에 해당하는 데이터(강의 후기)를 삭제한다. 
  $query = "delete from evaluation where sub_id = '$subject_id' and user_id = '$id'";
  $result = mysqli_query($conn,$query);

  echo "<script>alert('남긴 후기를 삭제했습니다.'); location.href='mypage.php';</script>";

?>
