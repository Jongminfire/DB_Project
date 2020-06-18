<?
  include './dbconn.php'; //dpconn 내용 중복되지 않게

  $id = $_POST['user_id'];
  $pwd = $_POST['user_pwd'];
  $grade = $_POST['user_grade'];
  $dept = $_POST['dept_name'];

  $query = "Select * from user where user_id = '$id'";
  $result = mysqli_query($conn,$query);
  $num = mysqli_num_rows($result);    //mysql_num_rows() 함수로 result 값이 몇개인지 알 수 있음

  if(!$num){
    $query2 = "INSERT INTO user(user_id, dept_name, user_pwd, user_grade) VALUES('$id','$dept','$pwd','$grade')";
    mysqli_query($conn, $query2);
    echo "<script>alert('회원가입 완료!'); location.href='./main1.php';</script>";
  }
  else {
?>

  <script>
    alert('해당 아이디가 존재함!');
    location.href = './signup.html';
  </script>
<?
  }
?>

?>
