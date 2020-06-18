<?php
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
           background-color: #bd1c11;
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

  <body>

  <h2><a href ="../main2.php" style="text-decoration:none; color:#bd1c11; font-weight:bold;">SEJONG.GG</a></h2>
    <div>
      <div>
        <ul>
            <li><button onclick="hideANDshow(1)">강의명↑</button></li>
            <li><button onclick="hideANDshow(2)">강의명↓</button></li>
            <li><button onclick="hideANDshow(3)">학년↑</button></li>
            <li><button onclick="hideANDshow(4)">학년↓</button></li>
         </ul>
        <div id="pick_sub_name_ASC">
          <table>
            <tr>
              <th>강의명</th>
              <th>학점</th>
              <th>교수명</th>
              <th>학과</th>
              <th>학년</th>
            </tr>

            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "Select * from subject inner join professor on professor.prof_id = subject.prof_id order by sub_name ASC";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[sub_name]</a></td>
                  <td>$row[sub_credit]</td>
                  <td>$row[prof_name]</td>
                  <td>$row[dept_name]</td>
                  <td>$row[sub_grade]</td>
                </tr>";
              }
              mysqli_close($conn);
            ?>

          </table>
        </div>
        <div id="pick_sub_name_DESC" style=display:none>
          <table>
            <tr>
              <th>강의명</th>
              <th>교수명</th>
              <th>학과</th>
              <th>학년</th>
            </tr>
            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "Select * from subject inner join professor on professor.prof_id = subject.prof_id order by sub_name DESC";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[sub_name]</a></td>
                  <td>$row[prof_name]</td>
                  <td>$row[dept_name]</td>
                  <td>$row[sub_grade]</td>
                </tr>";
              }
              mysqli_close($conn);
            ?>
          </table>
        </div>
        <div id="pick_sub_grade_ASC" style=display:none>
          <table>
            <tr>
              <th>강의명</th>
              <th>교수명</th>
              <th>학과</th>
              <th>학년</th>
            </tr>
            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "Select * from subject inner join professor on professor.prof_id = subject.prof_id order by sub_grade ASC";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[sub_name]</a></td>
                  <td>$row[prof_name]</td>
                  <td>$row[dept_name]</td>
                  <td>$row[sub_grade]</td>
                </tr>";
              }
              mysqli_close($conn);
            ?>
          </table>
        </div>
        <div id="pick_sub_grade_DESC" style=display:none>
          <table>
            <tr>
              <th>강의명</th>
              <th>교수명</th>
              <th>학과</th>
              <th>학년</th>
            </tr>
            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "Select * from subject inner join professor on professor.prof_id = subject.prof_id order by sub_grade DESC";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[sub_name]</a></td>
                  <td>$row[prof_name]</td>
                  <td>$row[dept_name]</td>
                  <td>$row[sub_grade]</td>
                </tr>";
              }
              mysqli_close($conn);
            ?>
          </table>
        </div>
      </div>

    <script type="text/javascript">
      function hideANDshow(mode)
      {
        var a = document.getElementById("pick_sub_name_ASC");
        var b = document.getElementById("pick_sub_name_DESC");
        var c = document.getElementById("pick_sub_grade_ASC");
        var d = document.getElementById("pick_sub_grade_DESC");

        if(mode === 1)
        {
          a.style.display="block";
          b.style.display="none";
          c.style.display="none";
          d.style.display="none";
        }
        else if(mode === 2)
        {
          a.style.display="none";
          b.style.display="block";
          c.style.display="none";
          d.style.display="none";
        }
        else if(mode === 3)
        {
          a.style.display="none";
          b.style.display="none";
          c.style.display="block";
          d.style.display="none";
        }
        else if(mode === 4)
        {
          a.style.display="none";
          b.style.display="none";
          c.style.display="none";
          d.style.display="block";
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
