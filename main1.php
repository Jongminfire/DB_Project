<script>
  function checkform(){
    if (!document.login_form.user_id.value){
      alert('아이디를 입력하세요');
      document.login_form.user_id.focus();
      return;
    }
    else if(!document.login_form.user_pwd.value){
      alert('패스워드를 입력하세요');
      document.login_form.user_pwd.focus();
      return;
    }

    document.login_form.submit();
  }
</script>

<center>
    <form name="login_form" action = './login.php' method = "post">
      <span style="font-size:100px; color:#bd1c11; font-weight:bold;">SEJONG.GG</span><br><br><br><br>
      <label>아이디: </label> <input type = "text" name = "user_id"></br>
      <label>비밀번호: </label><input type = "password" name = "user_pwd"<br>  <!--보안을 위해서 입력시에 값이 보이지 않게 설정함 -->
      </p>
      <input type = "button" value ="로그인" onClick= "checkform()">
      <input type = "button" value ="회원가입" onClick= "location.href='signup.php'">
    </form>
</center>
