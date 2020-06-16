<?
  include './user_check.php';
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $user_id;
  $sub_id = $_POST['sub_id'];
  $score = $_POST['score'];
  $comment =$_POST['comment'];
  $prof_id =$_POST['prof_id'];

  $query = "Select * from evaluation where user_id = '$id' and sub_id='$sub_id'";
  $result = mysqli_query($conn,$query);
  $num = mysqli_num_rows($result);    //mysql_num_rows() 함수로 result 값이 몇개인지 알 수 있음

  if(!$num)
  {
    $query2 = "insert into evaluation (sub_id,user_id,prof_id,score,comment) values ('$sub_id','$id','$prof_id','$score','$comment')";
    $result2 = mysqli_query($conn,$query2);

    echo "<script>location.href='analysis_lecture.php?id=$sub_id';</script>";
  }

  else
  {
    echo "<script>alert('이미 평가한 과목입니다!'); location.href='analysis_lecture.php?id=$sub_id';</script>";
  }
?>
