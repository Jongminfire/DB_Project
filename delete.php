<?
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id = $_GET['did'];

  $query = "delete from login where id = '$id'";
  mysqli_query($conn,$query);

  echo "<script>location.href = './main2.php';</script>";
?>
