<?php

session_start(); // 세션

if($_SESSION['id']!=null){
   session_destroy();
}

echo "<script>location.href='main1.php';</script>";

?>
