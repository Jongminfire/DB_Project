<?php
session_start();
ini_set('display_errors', '0');   //오류 메세지 무시
if($_SESSION['id']!=null) {
?>

<script>
  function modify_checkform(){

    if(!document.modification_form.user_pwd.value){
      alert('패스워드를 입력하세요');
      document.modification_form.user_password.focus();
      return;
    }

    document.modification_form.submit();
  }
</script>

<body>
    <center>
      <form name="modification_form" action = './modify_check.php' method = "post">
      <p><h1> 회원정보 수정 </h1></p>
      <label>비밀번호: </label><input type = "password" name = "user_pwd"<p>
      <p>학과:
      <select name = "dept_name">
      <?
        include './dbconn.php'; //dpconn 내용 중복되지 않게

        $query = "select dept_name from department order by dept_name ASC;";
        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result))
        {
          echo "
          <tr>
            <option value = $row[dept_name]> $row[dept_name]
          </tr>";
        }
      ?>
      </select>
      <p>학년:
      <select name = "user_grade">
      <option value = "1"> 1
      <option value = "2"> 2
      <option value = "3"> 3
      <option value = "4"> 4
      </select></p>
      <input type = "button" value ="확인" onClick= "modify_checkform()">
      <input type = "button" value ="취소" onClick= "location.href='mypage.php'">
      </form>
    </center>
</body>
<?}
else {
  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}?>
