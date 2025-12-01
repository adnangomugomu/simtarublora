<?php
error_reporting(0);
session_start();
include '../library/config.php';
check_injection();
check_login();

  $tempkodeid = $_POST['tempkodeid'];	
  $hasil = $_POST['hasil'];
  $keterangan = $_POST['keterangan'];
  $sql="update si_permohonan_non set hasil='".$hasil."'
  ,keterangan = '".$keterangan."'
  ,resultdate = SYSDATE()
  ,resultby = '".$_COOKIE['oneid']."'
  where id ='".$tempkodeid."'
  ";
  //echo $sql;
  $result=mysqli_query($link,$sql);
  header ('Location: simtaru-d4t4nnonkkpr?ket=edit');
  exit;
  
  
?>