<?
  // user_check.php: 같은 단과와 더 높은 학년 과목을 제외 하기 위해 user 값들을 받는 php

  session_start();
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $_SESSION['id'];   //SESSION으로 현재 로그인 되어있는 id 받음.
  $query ="Select * from user where user_id = '$id'";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  $user_id = $row['user_id'];
  $user_pwd = $row['user_pwd'];
  $dept_name = $row['dept_name'];
  $user_grade = $row['user_grade'];

  mysqli_close($conn);
?>
