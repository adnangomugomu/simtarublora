<?php
ini_set("memory_limit",-1);
require_once '../library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];

	$sqlcek="update one_master_pengajuan set tanggapi='".$no1."' where id='".$no2."' ";
	$resultcek=mysqli_query($link,$sqlcek);

?>
					