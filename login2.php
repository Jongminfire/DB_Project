<?
  include './dbconn.php';

  $id = $_POST['user_id'];
  $pwd = $_POST['user_password'];

  $query ="Select * from login where id = '$id'";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);

  if(!$num)
  {
    $query2 ="INSERT INTO login VALUES ('$id', '$pwd')";
    mysqli_query($conn, $query2);
    echo "<script>alert('회원가입완료!'); location.href='./main2.php'</script>";
  }
  else
  {?>
    <script>
      alert('해당 아이디가 존재함!');
      location.href = './test.html';
    </script>
<?
  }
?>
