<?
  include './dbconn.php';

  $cid = $_GET['id'];

  $query ="Select * from login where id = '$cid'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

?>
<script>
  function del()
  {
    location.href="./delete.php?did=<? echo $cid; ?>";
  }
</script>
<center>
  <h2> 회원정보 </h2>
  <p align="center"><a href ="./test.html">login</a></p>
  <form name="frm_content" action="update.php?uid=<? echo $cid; ?>" method="post">
  <table width = "800" border = "1">
    <tr>
      <td>아이디</td>
      <td>비밀번호</td>
    </tr>
    <tr>
      <td><input type = "text" name = "user_id" value = "<? echo $row['id'] ?>"></td>
      <td><input type = "text" name = "user_password" value = "<?= $row['pwd'] ?>"></td>
    </tr>
    <tr>
      <td><input type = "submit" value = "수정"></td>
      <td><input type = "button" value = "삭제" Onclick="del()"></td>
    </tr>
  </table>
</form>
</center>
