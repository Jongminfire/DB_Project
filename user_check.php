<?
  session_start();
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id= $_SESSION['id'];
  $query ="Select * from user where user_id = '$id'";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  $user_id = $row['user_id'];
  $user_pwd = $row['user_pwd'];
  $dept_name = $row['dept_name'];
  $user_grade = $row['user_grade'];

  mysqli_close($conn);
?>
