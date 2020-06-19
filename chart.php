<?php
include './user_check.php';
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
    </style>
  </head>

  <body>

    <h2><a href ="../main2.php" style="text-decoration:none; color:#bd1c11; font-weight:bold;">SEJONG.GG</a></h2>

    <div>
        <div class="split left">
            <ul>
                <li><button onclick="hideANDshow(1)">전공</button></li>
                <li><button onclick="hideANDshow(2)">교양</button></li>
                <li style="float: right"><button onclick="hideANDshow(4)">추천순</button></li>
                <li style="float: right"><button onclick="hideANDshow(3)">경쟁률순</button></li>
            </ul>
        <div id="major_competition_ASC">
            <table>
                <tr>
                  <th>순위</th>
                  <th>교과목명</th>
                  <th>학년</th>
                  <th>학과</th>
                  <th>담당교수</th>
                  <th>강의실</th>
                  <th>강의시간</th>
                  <th>학점</th>
                  <th>분반</th>
                  <th>경쟁률 <button onclick="rating()"><span id="rating">오름차순</span></button></th>
                  <th>과목담기</th>
                </tr>
                <?
                  include './dbconn.php'; //dpconn 내용 중복되지 않게

                  // user의 학과(dept_name)과 학년(user_grade)를 프로시저의 parameter로 넘겨 user의 학과가 속한 단과대의 과목들과 user의 학년보다
                  // 낮거나 같은 과목들을 프로시저를 통해 접근한다. 
                  $query = "call major_competition_ASC('$dept_name','$user_grade')";  
                  $result = mysqli_query($conn,$query);
                  $count = 1;

                  while($row = mysqli_fetch_array($result))
                  {
                    echo "
                    <tr>
                      <td>$count</td>
                      <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                      <td>$row[학년]</td>
                      <td>$row[학과]</td>
                      <td>$row[담당교수]</td>
                      <td>$row[강의실]</td>
                      <td>$row[강의시간]</td>
                      <td>$row[학점]</td>
                      <td>$row[분반]</td>
                      <td>$row[경쟁률]</td>";?>
                      <form action="/pick.php" method = "post">
                      <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                      <td><button onclick="submit">과목 담기</button></td>
                      </form>
                      <? echo"
                    </tr>";

                    $count++;
                  }

                  mysqli_close($conn);
                ?>
            </table>
        </div>
        <div id="major_competition_DESC" style=display:none>
          <table>
            <tr>
              <th>순위</th>
              <th>교과목명</th>
              <th>학년</th>
              <th>학과</th>
              <th>담당교수</th>
              <th>강의실</th>
              <th>강의시간</th>
              <th>학점</th>
              <th>분반</th>
              <th>경쟁률 <button onclick="rating()"><span id="rating">내림차순</span></button></th>
              <th>과목담기</th>
            </tr>
            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "call major_competition_DESC('$dept_name','$user_grade')";
              $result = mysqli_query($conn,$query);
              $count2 = 1;
              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td>$count2</td>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                  <td>$row[학년]</td>
                  <td>$row[학과]</td>
                  <td>$row[담당교수]</td>
                  <td>$row[강의실]</td>
                  <td>$row[강의시간]</td>
                  <td>$row[학점]</td>
                  <td>$row[분반]</td>
                  <td>$row[경쟁률]</td>";?>
                  <form action="/pick.php" method = "post">
                  <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                  <td><button onclick="submit">과목 담기</button></td>
                  </form>
                  <? echo"
                </tr>";

                $count2++;
              }
              mysqli_close($conn);
            ?>
          </table>
        </div>
        <div id="major_recommendation_ASC" style=display:none>
          <?
            include './dbconn.php'; //dpconn 내용 중복되지 않게

            $query = "call major_recommendation_ASC('$dept_name','$user_grade')";
            $result = mysqli_query($conn,$query);
            $num = mysqli_num_rows($result);
            $count2 = 1;

            if(!$num)
            {
            echo "<br>평가 데이터가 없습니다.";
            }


            else {?>

          <table>
            <tr>
              <th>순위</th>
              <th>교과목명</th>
              <th>학년</th>
              <th>학과</th>
              <th>담당교수</th>
              <th>강의실</th>
              <th>강의시간</th>
              <th>학점</th>
              <th>분반</th>
              <th>추천지수 <button onclick="rating()"><span id="rating">오름차순</span></button></th>
              <th>과목담기</th>
            </tr>
              <?
              while($row = mysqli_fetch_array($result))
              {

                echo "
                <tr>
                  <td>$count2</td>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                  <td>$row[학년]</td>
                  <td>$row[학과]</td>
                  <td>$row[담당교수]</td>
                  <td>$row[강의실]</td>
                  <td>$row[강의시간]</td>
                  <td>$row[학점]</td>
                  <td>$row[분반]</td>
                  <td>$row[추천지수]</td>";?>
                  <form action="/pick.php" method = "post">
                  <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                  <td><button onclick="submit">과목 담기</button></td>
                  </form>
                  <? echo"
                </tr>";

                $count2++;
              }
              mysqli_close($conn);
            ?>
          </table>
            <?}?>
        </div>


        <div id="major_recommendation_DESC" style=display:none>
          <?
            include './dbconn.php'; //dpconn 내용 중복되지 않게

            $query = "call major_recommendation_DESC('$dept_name','$user_grade')";
            $result = mysqli_query($conn,$query);
            $num = mysqli_num_rows($result);
            $count2 = 1;

            if(!$num)
            {
            echo "<br>평가 데이터가 없습니다.";
            }
            else{?>

          <table>
            <tr>
              <th>순위</th>
              <th>교과목명</th>
              <th>학년</th>
              <th>학과</th>
              <th>담당교수</th>
              <th>강의실</th>
              <th>강의시간</th>
              <th>학점</th>
              <th>분반</th>
              <th>추천지수 <button onclick="rating()"><span id="rating">내림차순</span></button></th>
              <th>과목담기</th>
            </tr>
            <?
              while($row = mysqli_fetch_array($result))
              {

                echo "
                <tr>
                  <td>$count2</td>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                  <td>$row[학년]</td>
                  <td>$row[학과]</td>
                  <td>$row[담당교수]</td>
                  <td>$row[강의실]</td>
                  <td>$row[강의시간]</td>
                  <td>$row[학점]</td>
                  <td>$row[분반]</td>
                  <td>$row[추천지수]</td>";?>
                  <form action="/pick.php" method = "post">
                  <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                  <td><button onclick="submit">과목 담기</button></td>
                  </form>
                  <? echo"
                </tr>";

                $count2++;
              }
              mysqli_close($conn);
            ?>
          </table>
          <?}?>
        </div>

        <div id="elective_competition_ASC" style=display:none>
            <table>
                <tr>
                  <th>순위</th>
                  <th>교과목명</th>
                  <th>학년</th>
                  <th>학과</th>
                  <th>담당교수</th>
                  <th>강의실</th>
                  <th>강의시간</th>
                  <th>학점</th>
                  <th>분반</th>
                  <th>경쟁률 <button onclick="rating()"><span id="rating">오름차순</span></button></th>
                  <th>과목담기</th>
                </tr>
                <?
                  include './dbconn.php'; //dpconn 내용 중복되지 않게

                  $query = "call elective_competition_ASC('$dept_name')";
                  $result = mysqli_query($conn,$query);
                  $count = 1;

                  while($row = mysqli_fetch_array($result))
                  {
                    echo "
                    <tr>
                      <td>$count</td>
                      <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                      <td>$row[학년]</td>
                      <td>$row[학과]</td>
                      <td>$row[담당교수]</td>
                      <td>$row[강의실]</td>
                      <td>$row[강의시간]</td>
                      <td>$row[학점]</td>
                      <td>$row[분반]</td>
                      <td>$row[경쟁률]</td>";?>
                      <form action="/pick.php" method = "post">
                      <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                      <td><button onclick="submit">과목 담기</button></td>
                      </form>
                      <? echo"
                    </tr>";

                    $count++;
                  }

                  mysqli_close($conn);
                ?>
            </table>
        </div>

        <div id="elective_competition_DESC" style=display:none>
          <table>
            <tr>
              <th>순위</th>
              <th>교과목명</th>
              <th>학년</th>
              <th>학과</th>
              <th>담당교수</th>
              <th>강의실</th>
              <th>강의시간</th>
              <th>학점</th>
              <th>분반</th>
              <th>경쟁률 <button onclick="rating()"><span id="rating">내림차순</span></button></th>
              <th>과목담기</th>
            </tr>
            <?
              include './dbconn.php'; //dpconn 내용 중복되지 않게

              $query = "call elective_competition_DESC('$dept_name')";
              $result = mysqli_query($conn,$query);
              $count2 = 1;
              while($row = mysqli_fetch_array($result))
              {
                echo "
                <tr>
                  <td>$count2</td>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                  <td>$row[학년]</td>
                  <td>$row[학과]</td>
                  <td>$row[담당교수]</td>
                  <td>$row[강의실]</td>
                  <td>$row[강의시간]</td>
                  <td>$row[학점]</td>
                  <td>$row[분반]</td>
                  <td>$row[경쟁률]</td>";?>
                  <form action="/pick.php" method = "post">
                  <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                  <td><button onclick="submit">과목 담기</button></td>
                  </form>
                  <? echo"
                </tr>";

                $count2++;
              }
              mysqli_close($conn);
            ?>
          </table>
        </div>

        <div id="elective_recommendation_ASC" style=display:none>
          <?
            include './dbconn.php';

            $query = "call elective_recommendation_ASC('$dept_name')";
            $result = mysqli_query($conn,$query);
            $count2 = 1;
            $num = mysqli_num_rows($result);


            if(!$num)
            {
            echo "<br>평가 데이터가 없습니다.";
            }
            else{?>

          <table>
            <tr>
              <th>순위</th>
              <th>교과목명</th>
              <th>학년</th>
              <th>학과</th>
              <th>담당교수</th>
              <th>강의실</th>
              <th>강의시간</th>
              <th>학점</th>
              <th>분반</th>
              <th>추천지수 <button onclick="rating()"><span id="rating">오름차순</span></button></th>
              <th>과목담기</th>
            </tr>
            <?
              while($row = mysqli_fetch_array($result))
              {

                echo "
                <tr>
                  <td>$count2</td>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                  <td>$row[학년]</td>
                  <td>$row[학과]</td>
                  <td>$row[담당교수]</td>
                  <td>$row[강의실]</td>
                  <td>$row[강의시간]</td>
                  <td>$row[학점]</td>
                  <td>$row[분반]</td>
                  <td>$row[추천지수]</td>";?>
                  <form action="/pick.php" method = "post">
                  <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                  <td><button onclick="submit">과목 담기</button></td>
                  </form>
                  <? echo"
                </tr>";

                $count2++;
              }
              mysqli_close($conn);
            ?>
          </table>
          <?}?>
        </div>


        <div id="elective_recommendation_DESC" style=display:none>
          <?
            include './dbconn.php';

            $query = "call elective_recommendation_DESC('$dept_name')";
            $result = mysqli_query($conn,$query);
            $count2 = 1;
            $num = mysqli_num_rows($result);
            if(!$num)
            {
            echo "<br>평가 데이터가 없습니다.";
            }
            else{?>

          <table>
            <tr>
              <th>순위</th>
              <th>교과목명</th>
              <th>학년</th>
              <th>학과</th>
              <th>담당교수</th>
              <th>강의실</th>
              <th>강의시간</th>
              <th>학점</th>
              <th>분반</th>
              <th>추천지수 <button onclick="rating()"><span id="rating">내림차순</span></button></th>
              <th>과목담기</th>
            </tr>
              <?
              while($row = mysqli_fetch_array($result))
              {

                echo "
                <tr>
                  <td>$count2</td>
                  <td><a href = 'analysis_lecture.php?id=$row[sub_id]'> $row[교과목명]</a></td>
                  <td>$row[학년]</td>
                  <td>$row[학과]</td>
                  <td>$row[담당교수]</td>
                  <td>$row[강의실]</td>
                  <td>$row[강의시간]</td>
                  <td>$row[학점]</td>
                  <td>$row[분반]</td>
                  <td>$row[추천지수]</td>";?>
                  <form action="/pick.php" method = "post">
                  <input type=hidden name="class_id"  value=<?php echo $row['class_id']?>>
                  <td><button onclick="submit">과목 담기</button></td>
                  </form>
                  <? echo"
                </tr>";

                $count2++;
              }
              mysqli_close($conn);
            ?>
          </table>
          <?}?>
        </div>


    </div>

    <script type="text/javascript">
      var menu=1;
      var _mode=3;
      function hideANDshow(mode)
      {
        if(mode <=2 )
        {
          menu = mode;
          _mode = 3;
        }
        else
          _mode = mode;

        var mca = document.getElementById("major_competition_ASC");
        var mcd = document.getElementById("major_competition_DESC");
        var mra = document.getElementById("major_recommendation_ASC");
        var mrd = document.getElementById("major_recommendation_DESC");

        var eca = document.getElementById("elective_competition_ASC");
        var ecd = document.getElementById("elective_competition_DESC");
        var era = document.getElementById("elective_recommendation_ASC");
        var erd = document.getElementById("elective_recommendation_DESC");


        var but = document.getElementById("rating");

        if(menu===1 && (mode === 1 || mode ===3))
        {
          mca.style.display="block";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";

          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";

          but.innerHTML = "오름차순";
        }
        else if(menu===1 && mode === 4)
        {
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="block";
          mrd.style.display="none";

          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";

          but.innerHTML = "오름차순";
        }
        else if(menu===2 && (mode === 2 || mode ===3))
        {
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";

          eca.style.display="block";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";

          but.innerHTML = "오름차순";
        }
        else if(menu===2 && mode === 4)
        {
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";

          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="block";
          erd.style.display="none";

          but.innerHTML = "오름차순";
        }
      }

      function rating()
      {
        var but = document.getElementById("rating");

        var mca = document.getElementById("major_competition_ASC");
        var mcd = document.getElementById("major_competition_DESC");
        var mra = document.getElementById("major_recommendation_ASC");
        var mrd = document.getElementById("major_recommendation_DESC");

        var eca = document.getElementById("elective_competition_ASC");
        var ecd = document.getElementById("elective_competition_DESC");
        var era = document.getElementById("elective_recommendation_ASC");
        var erd = document.getElementById("elective_recommendation_DESC");


        if (menu=== 1 && _mode===3 && but.innerHTML === "오름차순")
        {
          but.innerHTML = "내림차순";
          mca.style.display="none";
          mcd.style.display="block";
          mra.style.display="none";
          mrd.style.display="none";
          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";
        }
        else if(menu=== 1 && _mode===3 && but.innerHTML === "내림차순")
        {
          but.innerHTML = "오름차순";
          mca.style.display="block";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";
          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";
        }
        else if(menu=== 1 && _mode===4 && but.innerHTML === "오름차순")
        {
          but.innerHTML = "내림차순";
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="block";
          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";
        }
        else if(menu=== 1 && _mode===4 && but.innerHTML === "내림차순")
        {
          but.innerHTML = "오름차순";
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="block";
          mrd.style.display="none";
          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";
        }
        else if(menu=== 2 && _mode===3 && but.innerHTML === "오름차순")
        {
          but.innerHTML = "내림차순";
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";
          eca.style.display="none";
          ecd.style.display="block";
          era.style.display="none";
          erd.style.display="none";
        }
        else if(menu=== 2 && _mode===3 && but.innerHTML === "내림차순")
        {
          but.innerHTML = "오름차순";
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";
          eca.style.display="block";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="none";
        }
        else if(menu=== 2 && _mode===4 && but.innerHTML === "오름차순")
        {
          but.innerHTML = "내림차순";
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";
          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="none";
          erd.style.display="block";
        }
        else if(menu=== 2 && _mode===4 && but.innerHTML === "내림차순")
        {
          but.innerHTML = "오름차순";
          mca.style.display="none";
          mcd.style.display="none";
          mra.style.display="none";
          mrd.style.display="none";
          eca.style.display="none";
          ecd.style.display="none";
          era.style.display="block";
          erd.style.display="none";
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
