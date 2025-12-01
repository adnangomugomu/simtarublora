<?php
ini_set("memory_limit",-1);
require_once 'library/config.php';
$no1=$_GET['no1'];

	$sqlcek="select KODE_ZONASI from rdtr where ID='".$no1."' ";
	$resultcek=mysqli_query($link,$sqlcek);
	if ($resultcek)
	{
		while ($rowcek=mysqli_fetch_array($resultcek))
		{
			$KODE_ZONASI=$rowcek['KODE_ZONASI'];
			echo $KODE_ZONASI;
		}
	}


?>
					