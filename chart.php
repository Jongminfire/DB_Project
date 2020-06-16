<?php
include './user_check.php';

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
        <div class="split left">
            <ul>
                <li><button onclick="hideANDshow(1)">강의</button></li>
                <li><button onclick="hideANDshow(2)">교수</button></li>
                <li><button onclick="hideANDshow(3)">가</button></li>
                <li><button onclick="hideANDshow(4)">나</button></li>
                <li><button onclick="hideANDshow(5)">다</button></li>
            </ul>
        <div id="pick_sub">
            <table>
                <tr>
                  <td>교과목명</td>
                  <td>학년</td>
                  <td>학과</td>
                  <td>담당교수</td>
                  <td>강의실</td>
                  <td>강의시간</td>
                  <td>분반</td>
                  <td>경쟁률 <button onclick="rating()"><span id="rating">오름차순</span></button></td>
                </tr>
                <?
                  include './dbconn.php'; //dpconn 내용 중복되지 않게

                  $query = "call competition_ASC('$dept_name')";
                  $result = mysqli_query($conn,$query);

                  while($row = mysqli_fetch_array($result))
                  {
                    echo "
                    <tr>
                      <td>$row[교과목명]</td>
                      <td>$row[학년]</td>
                      <td>$row[학과]</td>
                      <td>$row[담당교수]</td>
                      <td>$row[강의실]</td>
                      <td>$row[강의시간]</td>
                      <td>$row[분반]</td>
                      <td>$row[경쟁률]</td>
                    </tr>";
                  }
                  mysqli_close($conn);
                ?>
            </table>
        </div>
        <div id="pick_sub2" style=display:none>
          <table>
              <tr>
                <td>교과목명</td>
                <td>학년</td>
                <td>학과</td>
                <td>담당교수</td>
                <td>강의실</td>
                <td>강의시간</td>
                <td>분반</td>
                <td>경쟁률 <button onclick="rating()"><span id="rating">내림차순</span></button></td>
              </tr>
              <?
                include './dbconn.php'; //dpconn 내용 중복되지 않게

                $query = "call competition_DESC('$dept_name')";
                $result = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($result))
                {
                  echo "
                  <tr>
                    <td>$row[교과목명]</td>
                    <td>$row[학년]</td>
                    <td>$row[학과]</td>
                    <td>$row[담당교수]</td>
                    <td>$row[강의실]</td>
                    <td>$row[강의시간]</td>
                    <td>$row[분반]</td>
                    <td>$row[경쟁률]</td>
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
                <tr>
                    <td>김교수</td>
                    <td>1점</td>
                </tr>
                <tr>
                    <td>이교수</td>
                    <td>2점</td>
                </tr>
            </table>
        </div>
        <div id="pick_temp1" style=display:none>
            <table>
                <tr>
                    <th>교ㄴ수명</th>
                    <th>평점</th>
                </tr>
                <tr>
                    <td>김ㄴ교수</td>
                    <td>1점</td>
                </tr>
                <tr>
                    <td>이ㄴ교수</td>
                    <td>2점</td>
                </tr>
            </table>
        </div>
        <div id="pick_temp2" style=display:none>
            <table>
                <tr>
                    <th>교ㅋ수명</th>
                    <th>평점</th>
                </tr>
                <tr>
                    <td>김ㅋ교수</td>
                    <td>1점</td>
                </tr>
                <tr>
                    <td>이ㅋ교수</td>
                    <td>2점</td>
                </tr>
            </table>
        </div>
        <div id="pick_temp3" style=display:none>
            <table>
                <tr>
                    <th>교ㅁ수명</th>
                    <th>평점</th>
                </tr>
                <tr>
                    <td>김ㅁ교수</td>
                    <td>1점</td>
                </tr>
                <tr>
                    <td>이ㅁ교수</td>
                    <td>2점</td>
                </tr>
            </table>
        </div>

    </div>

    <script type="text/javascript">
      function hideANDshow(mode)
      {
        var x = document.getElementById("pick_sub");
        var x2= document.getElementById("pick_sub2");
        var y = document.getElementById("pick_prof");
        var a = document.getElementById("pick_temp1");
        var b = document.getElementById("pick_temp2");
        var c = document.getElementById("pick_temp3");
        var but = document.getElementById("rating");

        if(mode === 1)
        {
          x.style.display="block";
          x2.style.display="none";
          y.style.display="none";
          a.style.display="none";
          b.style.display="none";
          c.style.display="none";
          but.innerHTML = "오름차순";

        }
        else if(mode === 2)
        {
          x.style.display="none";
          x2.style.display="none";
          y.style.display="block";
          a.style.display="none";
          b.style.display="none";
          c.style.display="none";
        }
        else if(mode === 3)
        {
          x.style.display="none";
          x2.style.display="none";
          y.style.display="none";
          a.style.display="block";
          b.style.display="none";
          c.style.display="none";
        }
        else if(mode === 4)
        {
          x.style.display="none";
          x2.style.display="none";
          y.style.display="none";
          a.style.display="none";
          b.style.display="block";
          c.style.display="none";
        }
        else if(mode === 5)
        {
          x.style.display="none";
          x2.style.display="none";
          y.style.display="none";
          a.style.display="none";
          b.style.display="none";
          c.style.display="block";
        }
      }

      function rating()
      {
        var x = document.getElementById("rating");
        var a = document.getElementById("pick_sub");
        var b = document.getElementById("pick_sub2");
        

        if (x.innerHTML === "오름차순")
        {
          x.innerHTML = "내림차순";
          a.style.display="none";
          b.style.display="block";
        }
        else
        {
          x.innerHTML = "오름차순";
          a.style.display="block";
          b.style.display="none";
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
