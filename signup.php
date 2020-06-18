<script>
  function checkform(){
    if (!document.signup_form.user_id.value){
      alert('아이디를 입력하세요');
      document.signup_form.user_id.focus();
      return;
    }
    else if(!document.signup_form.user_pwd.value){
      alert('패스워드를 입력하세요');
      document.signup_form.user_password.focus();
      return;
    }

    document.signup_form.submit();
  }
</script>

<body>
    <center>
      <form name="signup_form" action = './signup_check.php' method = "post">
      <p><h1> 회원가입 </h1></p>
      <label>아이디: </label> <input type = "text" name = "user_id"><p>
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
      <input type = "button" value ="회원가입" onClick= "checkform()">
      <input type = "button" value ="취소" onClick= "location.href='main1.php'">
      </form>
    </center>
</body>
