<?php
error_reporting(0);
session_start();
include '../library/config.php';
check_injection();
check_login();

  $tempkodeid = $_POST['tempkodeid'];	
  $personilfpr = $_POST['personilfpr'];
  $setuju =  $_POST['setuju'];
  $catatan = $_POST['catatan'];
    
  $sql="update si_permohonan_non set setuju".$personilfpr."='".$setuju."'
  , cacatansetuju".$personilfpr."='".$catatan."'
  , oleh".$personilfpr."='".$_COOKIE['oneid']."'
  , tanggalsetuju".$personilfpr."=SYSDATE()
  
  ";
  $sql=$sql."
  where id ='".$tempkodeid."'
  ";
  //echo $sql;
  $result=mysqli_query($link,$sql);
  header ('Location: simtaru-fprd4t4nnonkkpr?ket=edit');
  exit;
  
  
?>