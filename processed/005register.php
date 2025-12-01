<?php
  session_start();
  include '../library/config.php';
  check_injection();
  
  $query = "SELECT * FROM si_register WHERE username='".mysqli_real_escape_string($link,$_POST['usernameregister'])."' and deleted='0' ";
  //echo $query;
  $result = mysqli_query ($link,$query);
  $jum=mysqli_num_rows($result);
  if ($jum>0)
  {
  ?>
  <script>
  alert('Username Sudah Digunakan user lain, silahkan masukkan ulang data');
  window.location='simtaru-blora';
  </script>
  <?php   
  }
  else
  {
  $query = "insert into si_register (id_user, username, password, nama, pekerjaan, email, npwp, NIP, alamat, hp, gambar, createddate, createdby,deleted) values (null, '".mysqli_real_escape_string($link,$_POST['usernameregister'])."', '".encrypt(mysqli_real_escape_string($link,$_POST['passwordusernameregister']))."', '".mysqli_real_escape_string($link,$_POST['namapemohonregister'])."', '".mysqli_real_escape_string($link,$_POST['pekerjaanpemohonregister'])."', '".mysqli_real_escape_string($link,$_POST['emailpemohonregister'])."', '".mysqli_real_escape_string($link,$_POST['npwppemohonregister'])."', '".mysqli_real_escape_string($link,$_POST['noidentitaspemohonregister'])."', '".mysqli_real_escape_string($link,$_POST['alamatpemohonregister'])."', '".mysqli_real_escape_string($link,$_POST['notelpidentitaspemohonregister'])."','user.png',SYSDATE(),'0','0')";
  $result = mysqli_query ($link,$query);
  ?>
  <script>
  alert('Register Berhasil.. Silahkan Login');
  window.location='simtaru-blora';
  </script>
  <?php 
  }
   
  
?>