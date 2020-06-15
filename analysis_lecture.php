<?
  include './dbconn.php';

  $sub_id = $_GET['id'];

  $query ="select sub_id,dept_name,subject.prof_id,sub_name,sub_grade,prof_name from subject inner join professor on professor.prof_id=subject.prof_id where sub_id = '$sub_id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);

  $sub_name=$row['sub_name'];
  $dept_name=$row['dept_name'];
  $prof_id=$row['prof_id'];
  $sub_grade=$row['sub_grade'];
  $prof_name=$row['prof_name'];

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
    <div style="float:left; font-size:50px;"><? echo"$sub_name","   "?> &nbsp &nbsp; <span style="font-size:35px;"><? echo"$prof_name","   "?>  </span><button onclick="">과목 담기</button></div>
    <br><br><br><br>
    <label style="font-size:20px;"><? echo "&nbsp;&nbsp;&nbsp;&nbsp;<","$dept_name","  ","$sub_grade","학년>";?></label>
    <br><br>
    <div style = "border: solid 1px; width: 33%; padding: 20px;">
        <form action="/action_page.php">
            <label for="score">평점 남기기: </label>
            <select id="score" name="sc">
                <option value="0">0점</option>
                <option value="1">1점</option>
                <option value="2">2점</option>
                <option value="3">3점</option>
                <option value="4">4점</option>
                <option value="5">5점</option>
            </select><br>

        <p>후기 남기기</p>
            <textarea name="message" rows="10" cols="30">코멘트를 남기세요.</textarea>
            <input type="submit">
        </form>
    </div>
    <br><br>
    <div>
        <div class="split left">
            <ul>
                <li style="font-size:25px;">강의 후기</li>
            </ul>
            <div id="pick_sub">
                <table>
                    <tr>
                        <td>별로에요</td>
                        <td>0점</td>
                    </tr>
                    <tr>
                        <td>좋아요</td>
                        <td>4점</td>
                    </tr>
                    <tr>
                        <td>그냥 그래요</td>
                        <td>2점</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

  </body>
</html>
