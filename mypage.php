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

      td, th
      {
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
      /* Create two equal columns that floats next to each other */
      .split
      {
        height: 100%;
        width: 50%;
        position: fixed;
        overflow-x: hidden;
        padding-top: 20px;
      }

      .left
      {
        left: 0;
      }

      .right
      {
        right: 0;
      }
    </style>
  </head>
<table>
    <tr>
      <td>아이디</td>
      <td>비밀번호</td>
      <td>학과</td>
      <td>학년</td>
    </tr>
    <tr>
      <td><? echo "$user_id";?></td>
      <td><? echo "$user_pwd";?></td>
      <td><? echo "$dept_name";?></td>
      <td><? echo "$user_grade";?></td>
    </tr>
  </table>

<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
