<?
  include './dbconn.php';

  $sub_id = $_GET['id'];

  $query ="select sub_id,sub_credit,dept_name,subject.prof_id,sub_name,sub_grade,prof_name from subject inner join professor on professor.prof_id=subject.prof_id where sub_id = '$sub_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $sub_name=$row['sub_name'];
  $dept_name=$row['dept_name'];
  $prof_id=$row['prof_id'];
  $sub_grade=$row['sub_grade'];
  $prof_name=$row['prof_name'];
  $sub_credit=$row['sub_credit'];

  $query3 = "select sum(score)/count(*) as '평균평점' from evaluation where sub_id='$sub_id'";
  $result3 = mysqli_query($conn, $query3);
  $row3 = mysqli_fetch_array($result3);

  $score = $row3['평균평점'];
  if($score==NULL)
  {
    $score=0;
  }
  
  session_start();
  ini_set('display_errors', '0');   //오류 메세지 무시
  if($_SESSION['id']!=null) {

?>

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
    </style>
  </head>

  <body>

    <h2><a href ="../main2.php" style="text-decoration:none">세종GG</a></h2>
    <br><br>
    <center>
    <div>
        <div style="font-size:50px;"><? echo"$sub_name","   "?> &nbsp &nbsp; <span style="font-size:35px;"><? echo"$prof_name","   "?>  </span></div>
        <br>
    <label style="font-size:20px;"><? echo "&nbsp;&nbsp;&nbsp;&nbsp;<","$dept_name","  ","$sub_grade","학년>"," ","평균평점:","$score"," ","$sub_credit","학점";?></label>
    <br><br><br>
    <div style = "border: solid 1px; width: 33%; padding: 20px;">
      <form action="/evaluate.php" method = "post">
            <label for="score">평점 남기기: </label>
            <select id="score" name="score">
                <option value="0">0점</option>
                <option value="1">1점</option>
                <option value="2">2점</option>
                <option value="3">3점</option>
                <option value="4">4점</option>
                <option value="5">5점</option>
            </select><br>
            <input type=hidden name="sub_id"  value=<?php echo $sub_id ?>>
            <input type=hidden name="prof_id"  value=<?php echo $prof_id ?>>
            <p>후기 남기기</p>
            <textarea name="comment" rows="10" cols="30">코멘트를 남기세요.</textarea>
            <input type="submit">
        </form>
    </div>
  </center>
    <br><br>
    <div>
        <div class="split left">
            <ul>
                <li style="font-size:25px;">강의 후기</li>
            </ul>
            <div id="pick_sub">
                <table>
                    <tr>
                      <td>아이디</td>
                      <td>평점</td>
                      <td>코멘트</td>

                      <?
                        include './dbconn.php'; //dpconn 내용 중복되지 않게

                        $query2 = "Select * from evaluation where prof_id = '$prof_id'";
                        $result2 = mysqli_query($conn,$query2);

                        while($row2 = mysqli_fetch_array($result2))
                        {
                          echo "
                          <tr>
                            <td>$row2[user_id]</td>
                            <td>$row2[score]</td>
                            <td>$row2[comment]</td>
                          </tr>";
                        }
                        mysqli_close($conn);
                      ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>

  </body>
</html>
<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
