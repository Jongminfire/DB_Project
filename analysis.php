<?php
session_start();
ini_set('display_errors', '0');   //오류 메세지 무시
if($_SESSION['id']!=null) {
?>

<!DOCTYPE html>
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

      <div>
        <ul>
          <li><button onclick="hideANDshow2(1)">강의 평점 순</button></li>
          <li><button onclick="hideANDshow2(2)">교수님 평점 순</button></li>
        </ul>
        <div id="pick1">
        <?
          include './dbconn.php'; //dpconn 내용 중복되지 않게

          $query2 = "select subject.sub_id,sub_credit,sub_name,prof_name,dept_name,sum(score)/count(score) as '평균평점' from evaluation inner join subject inner join professor on professor.prof_id = subject.prof_id on subject.sub_id = evaluation.sub_id group by evaluation.sub_id order by 평균평점 DESC";
          $result2 = mysqli_query($conn,$query2);
          $num = mysqli_num_rows($result2);
          $count =1;

          if(!$num)
          {
            echo "<br>평가 데이터가 없습니다.";
          }

          else {

          ?>



          <table>
            <tr>
              <th>순위</th>
              <th>강의명</th>
              <th>학과</th>
              <th>학점</th>
              <th>교수</th>
              <th>평점</th>
            </tr>

            <?

              while($row2 = mysqli_fetch_array($result2))
              {
                $row2[평균평점]=round($row2[평균평점],2);
                echo "
                <tr>
                  <td>$count</td>
                  <td><a href = 'analysis_lecture.php?id=$row2[sub_id]'> $row2[sub_name]</a></td>
                  <td>$row2[dept_name]</td>
                  <td>$row2[sub_credit]</td>
                  <td>$row2[prof_name]</td>
                  <td>$row2[평균평점]</td>
                </tr>";

                $count++;
              }

              mysqli_close($conn);
    ?>
          </table>

      <?}?>
    </div>
        <div id="pick2" style=display:none>
          <?
            include './dbconn.php'; //dpconn 내용 중복되지 않게

            $query = "select prof_name,sum(score)/count(score) as '평점' from evaluation inner join professor on professor.prof_id = evaluation.prof_id group by evaluation.prof_id order by 평점 DESC;";
            $result = mysqli_query($conn,$query);
            $count =1;
            $num = mysqli_num_rows($result);
            if(!$num)
            {
              echo "<br>평가 데이터가 없습니다.";
            }

            else {

            ?>

          <table>
            <tr>
              <th>순위</th>
              <th>교수명</th>
              <th>평점</th>
            </tr>

<?
              while($row = mysqli_fetch_array($result))
              {
                $row[평점]=round($row[평점],2);

                echo "
                <tr>
                  <td>$count</td>
                  <td>$row[prof_name]</td>
                  <td>$row[평점]</td>
                </tr>";

                $count++;
              }


              mysqli_close($conn);
            ?>
          </table>
        </div>
        <?}?>
    </div>

    <script type="text/javascript">


      function hideANDshow2(mode)
      {
        var a = document.getElementById("pick1");
        var b = document.getElementById("pick2");

        if(mode === 1)
        {
          a.style.display="block";
          b.style.display="none";


        }
        else if(mode === 2)
        {
          a.style.display="none";
          b.style.display="block";
        }
      }
    </script>
  </body>
</html>

<?php
}else{

  echo "<script>alert('로그인이 필요합니다.'); location.href='./main1.php';</script>";
}
?>
