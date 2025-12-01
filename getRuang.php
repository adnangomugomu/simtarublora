<?php
ini_set("memory_limit",-1);
require_once 'library/config.php';
$no1=$_GET['no1'];

	$sqlcek="select KELAS_III from rdtr where ID='".$no1."' ";
	$resultcek=mysqli_query($link,$sqlcek);
	if ($resultcek)
	{
		while ($rowcek=mysqli_fetch_array($resultcek))
		{
			$LAYER=$rowcek['KELAS_III'];
			echo $LAYER;
		}
	}


?>
					