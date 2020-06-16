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
          <?
            include './dbconn.php'; //dpconn 내용 중복되지 않게

            $query = "Select sub_name,subject.sub_id,prof_name,score,comment from evaluation inner join subject inner join professor on subject.prof_id = professor.prof_id on evaluation.sub_id = subject.sub_id where evaluation.user_id = '$user_id';";
            $result = mysqli_query($conn,$query);

            while($row = mysqli_fetch_array($result))
            {
              echo "
              <tr>
                <td><a href = 'analysis_lecture.php?id=$row[sub_id]'>$row[sub_name]</a></td>
                <td>$row[prof_name]</td>
                <td>$row[score]</td>
                <td>$row[comment]</td>
              </tr>";
            }
            mysqli_close($conn);
          ?>
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
          <th>분반</th>
          <th>평점</th>
          <th>경쟁률</th>
          <th>담기 취소</th>
        </tr>
        <?
          include './dbconn.php'; //dpconn 내용 중복되지 않게

          $query2 = "Select class.class_id,class_no,subject.sub_id,sub_name,prof_name,dept_name,sub_grade,class_pick/class_size as '경쟁률' from user_subject inner join class inner join subject inner join professor on professor.prof_id = subject.prof_id on class.sub_id = subject.sub_id on class.class_id = user_subject.class_id where user_id='$user_id' order by 경쟁률 DESC";
          $result2 = mysqli_query($conn,$query2);

          while($row2 = mysqli_fetch_array($result2))
          {
            $query3 = "select sum(score)/count(*) as '평균평점' from evaluation where sub_id= $row2[sub_id]";
            $result3 = mysqli_query($conn, $query3);
            $row3 = mysqli_fetch_array($result3);

            echo "
            <tr>
              <td><a href = 'analysis_lecture.php?id=$row2[sub_id]'>$row2[sub_name]</a></td>
              <td>$row2[prof_name]</td>
              <td>$row2[dept_name]</td>
              <td>$row2[sub_grade]</td>
              <td>$row2[class_no]</td>
              <td>$row3[평균평점]</td>
              <td>$row2[경쟁률]</td>";?>
              <form action="/cancel.php" method = "post">
                <input type=hidden name="class_id"  value=<?php echo $row2['class_id']?>>
                <td><button onclick="submit">취소</button></td>
              </form>
              <? echo"
            </tr>";
          }
          mysqli_close($conn);
        ?>
      </table>
    </p>
  </body>

<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
