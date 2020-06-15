<?php
session_start();
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

    <h2><a href ="../main2.php" style="text-decoration:none">세종GG</a></h2>
    <div>
      <div class="split left">
        <ul>
      		<li><button onclick="hideANDshow(1)">강의</button></li>
      		<li><button onclick="hideANDshow(2)">교수</button></li>
    	  </ul>
        <div id="pick_sub">
          <table>
            <tr>
              <th>학과</th>
              <th>교수님 아이디</th>
              <th>강의명</th>
              <th>학년</th>
            </tr>

            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "Select * from subject inner join professor on professor.prof_id = subject.prof_id";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td><a href = 'analysis_lecture.php?id=$row[dept_name]'> $row[dept_name]</a></td>
                  <td>$row[prof_name]</td>
                  <td>$row[sub_name]</td>
                  <td>$row[sub_grade]</td>
                </tr>";
              }
              mysqli_close($conn);
            ?>

          </table>
        </div>
        <div id="pick_prof" style=display:none>
          <table>
            <tr>
              <th>교수명</th>
              <th>평점</th>
            </tr>
            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "Select * from professor";
              $result = mysqli_query($conn,$query);

              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td>$row[prof_name]</td>
                  <td>$row[prof_id]</td>
                </tr>";
              }
              mysqli_close($conn);
            ?>
          </table>
        </div>
      </div>


      <div class="split right">
        <ul>
          <li><button onclick="hideANDshow2(1)">바텀</button></li>
          <li><button onclick="hideANDshow2(2)">탑</button></li>
          <li><button onclick="hideANDshow2(3)">정글</button></li>
          <li><button onclick="hideANDshow2(4)">미드</button></li>
        </ul>
        <div id="pick1">
          <table>
            <tr>
              <th>챔피언</th>
              <th>승률</th>
              <th>픽률</th>
              <th>티어</th>
            </tr>
            <tr>
              <td>바텀</td>
              <td>11</td>
              <td>16</td>
              <td>21</td>
            </tr>
            <tr>
              <td>바텀</td>
              <td>23</td>
              <td>82</td>
              <td>92</td>
            </tr>
          </table>
        </div>
        <div id="pick2" style=display:none>
          <table>
            <tr>
              <th>챔피언</th>
              <th>승률</th>
              <th>픽률</th>
              <th>티어</th>
            </tr>
            <tr>
              <td>탑</td>
              <td>7</td>
              <td>18</td>
              <td>11</td>
            </tr>
            <tr>
              <td>탑</td>
              <td>12</td>
              <td>22</td>
              <td>23</td>
            </tr>
          </table>
        </div>
        <div id="pick3" style=display:none>
          <table>
            <tr>
              <th>챔피언</th>
              <th>승률</th>
              <th>픽률</th>
              <th>티어</th>
            </tr>
            <tr>
              <td>정글</td>
              <td>11</td>
              <td>41</td>
              <td>15</td>
            </tr>
            <tr>
              <td>정글</td>
              <td>12</td>
              <td>25</td>
              <td>2</td>
            </tr>
          </table>
        </div>
        <div id="pick4" style=display:none>
          <table>
            <tr>
              <th>챔피언</th>
              <th>승률</th>
              <th>픽률</th>
              <th>티어</th>
            </tr>
            <tr>
              <td>미드</td>
              <td>12</td>
              <td>3</td>
              <td>1</td>
            </tr>
            <tr>
              <td>미드</td>
              <td>23</td>
              <td>21</td>
              <td>52</td>
            </tr>
          </table>
        </div>
      </div>

    </div>

    <script type="text/javascript">
      function hideANDshow(mode)
      {
        var x = document.getElementById("pick_sub");
        var y = document.getElementById("pick_prof");

        if(x.style.display === "none" && mode === 1)
        {
          x.style.display="block";
          y.style.display="none";
        }
        else if(x.style.display === "none" && mode === 2)
        {
          x.style.display="none";
          y.style.display="block";
        }
        else if(y.style.display === "none" && mode === 1)
        {
          x.style.display="block";
          y.style.display="none";
        }
        else if(y.style.display === "none" && mode === 2)
        {
          x.style.display="none";
          y.style.display="block";
        }
      }

      function hideANDshow2(mode)
      {
        var a = document.getElementById("pick1");
        var b = document.getElementById("pick2");
        var c = document.getElementById("pick3");
        var d = document.getElementById("pick4");

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
