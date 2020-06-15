<?
include './dbconn.php'; //dpconn 내용 중복되지 않게

$prof_id = $_POST['prof_id'];
$dept_name = $_POST['dept_name'];
$sub_name = $_POST['sub_name'];
$sub_grade = $_POST['sub_grade'];

$query = "Select * from subject";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
?>
