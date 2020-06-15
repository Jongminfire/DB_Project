<?
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $uid = $_GET['uid'];

  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  $query = "UPDATE login set id ='$id', pwd = '$pwd' where id = '$uid'";
  mysqli_query($conn,$query);

  echo "<script>location.href = './main2.php';</script>";
?>
