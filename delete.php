<?
  include './dbconn.php';

  $id = $_GET['did'];

  $query ="delete from login where id = '$id'";
  mysqli_query($conn, $query);

  echo "<script> location.href = './main2.php'; </script>";

?>
