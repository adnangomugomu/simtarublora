<?php
session_start();
require_once 'library/config.php';
$namapesanku=$_POST['namapesanku'];
$judulpesanku=$_POST['judulpesanku'];
$pesanpesanku=$_POST['pesanpesanku'];
$ipku=get_client_ip();
?>



<script type="text/javascript">
function processPesan() {

<?php

   $query = "insert into one_pesan (id,nama,judul,pesan,createdate,ipaddess,deleted) values (null, '".$namapesanku."', '".$judulpesanku."', '".$pesanpesanku."', SYSDATE(),'".$ipku."' ,'0')";
  //echo $query;
  $result = mysqli_query ($link,$query);
?> 
}    

</script>

