<?
  include './user_check.php';
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $user_id;
  $class_id = $_POST['class_id'];

  $query = "Select * from user_subject where user_id = '$id' and class_id='$class_id'";
  $result = mysqli_query($conn,$query);
  $num = mysqli_num_rows($result);    //mysql_num_rows() 함수로 result 값이 몇개인지 알 수 있음

  if(!$num)
  {
    $query2 = "insert into user_subject (user_id,class_id) values ('$id','$class_id')";
    $result2 = mysqli_query($conn,$query2);

    echo "<script>alert('강의를 담았습니다.'); location.href='chart.php';</script>";
  }

  else
  {
    echo "<script>alert('이미 담은 강의입니다!'); location.href='chart.php';</script>";
  }
?>
