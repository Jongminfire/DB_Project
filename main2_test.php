<center>
  <h2> 회원정보 </h2>
  <p align="center"><a href ="./test.html">login</a></p>
  <table width = "800" border = "1">
    <tr>
      <td>아이디</td>
      <td>비밀번호</td>
    </tr>
  <?
    include './dbconn.php';

    $query ="Select * from login";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($result))
    {
      echo"
        <tr>
          <td><a href='content.php?id=$row[id]'>$row[id]</a></td>
          <td>$row[pwd]</td>
        </tr>";
    }
    mysqli_close($conn);
   ?>


  </table>
</center>
