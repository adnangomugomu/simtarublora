<?php
error_reporting(0);
session_start();
include '../library/config.php';
check_injection();
check_login();

  $kodeid = $_POST['kodeid'];	
  
  $sql="update si_permohonan_non set deleted='1'
  ,deleteddate = SYSDATE()
  ,deletedby = '".$_COOKIE['oneid']."'
  where id ='".$kodeid."'
  ";
  //echo $sql;
  $result=mysqli_query($link,$sql);
  header ('Location: simtaru-d4t4nnonkkpr?ket=deleted');
  exit;
  
  
?>