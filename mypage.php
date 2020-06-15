<?php

include './user_check.php';

if($_SESSION['id']!=null) {
?>

<h2><a href ="../main2.php" style="text-decoration:none">세종GG</a></h2>
<html>
  <head>
    <meta charset="utf-8">
    <title>분석페이지</title>
    <style>
      table
      {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td
      {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      th
      {
        background-color: #AAAAFF;
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }

      ul
      {
  			background-color: #AAAAFF;
  			list-style-type: none;
  			margin: 0;
  			padding: 0;
  			overflow: hidden;
        width: 100%;
		  }
  		li
      {
  			float: left;
  		}
      p
      {
        margin: 30px;
        margin-top:50px; 
        margin-bottom: 50px;
      }
    </style>
  </head>
  <body>
    <p>
      <table><h1>회원 정보</h1>
        <tr>
          <th>아이디</th>
          <th>비밀번호</th>
          <th>학과</th>
          <th>학년</th>
        </tr>
        <tr>
          <td><? echo "$user_id";?></td>
          <td><? echo "$user_pwd";?></td>
          <td><? echo "$dept_name";?></td>
          <td><? echo "$user_grade";?></td>
        </tr>
      </table>
    </p>
    <p>
      <table><h1>내가 남긴 평점</h1>
        <tr>
          <th>과목명</th>
          <th>교수님</th>
          <th>평점</th>
          <th>코멘트</th>
        </tr>
        <tr>
          <td><? echo "$user_id";?></td>
          <td><? echo "$user_pwd";?></td>
          <td><? echo "$dept_name";?></td>
          <td><? echo "$user_grade";?></td>
        </tr>
      </table>
    </p>
    <p>
      <table><h1>내가 담은 과목</h1>
        <tr>
          <th>과목명</th>
          <th>교수님</th>
          <th>학과</th>
          <th>학년</th>
          <th>평점</th>
          <th>경쟁률</th>
        </tr>
        <tr>
          <td><? echo "$user_id";?></td>
          <td><? echo "$user_pwd";?></td>
          <td><? echo "$dept_name";?></td>
          <td><? echo "$user_grade";?></td>
          <td><? echo "$user_grade";?></td>
          <td><? echo "$user_grade";?></td>
        </tr>
      </table>
    </p>
  </body>

<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
