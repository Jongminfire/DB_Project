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
    <br><br>
    <div>
        <div style="float:left; font-size:50px;">컴퓨터그래픽스__<span style="font-size:35px;">송오영  </span><button onclick="">과목 담기</button></div>        
    </div>
    <br><br><br><br>
    <div>
        <form action="/action_page.php">
            <label for="cars">평점 남기기: </label>
            <select id="cars" name="cars">
                <option value="0">0점</option>
                <option value="1">1점</option>
                <option value="2">2점</option>
                <option value="3">3점</option>
                <option value="4">4점</option>
                <option value="5">5점</option>
            </select>
            <input type="submit" value="입력">
        </form><br>

        <p>후기 남기기</p>
        <form action="/action_page.php">
            <textarea name="message" rows="10" cols="30">코멘트를 남기세요.</textarea>
            <input type="submit" value="입력">
        </form>
    </div>
    <br><br><br>
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
