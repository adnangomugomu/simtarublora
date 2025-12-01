<html>
<head>
</head>
<body>
<?php
ini_set("memory_limit",-1);
require_once '../library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];

$tempno2=explode("|",$no2);
$id=$tempno2[0];
$tabel=$tempno2[1];
$fieldku=$tempno2[2];

if  ( ($fieldku=="fillku") || ($fieldku=="tebalfillku") || ($fieldku=="garisku") || ($fieldku=="tebalgarisku") )
{
$isi="#".$no1;
}
else
{
$isi=$no1;
}

if ($fieldku=="PERNAH_MEN")
{
	if ($isi=="BELUM PERNAH")
	{
		$sql="update ".$tabel." set simbol='968728_Home-icon_merah.png' where ID='".$id."' ";
		$result=mysqli_query($link,$sql);
	}
	else
	{
		$sql="update ".$tabel." set simbol='838544_icon-home-vert_hijau.png' where ID='".$id."' ";
		$result=mysqli_query($link,$sql);
	}
$sql="update ".$tabel." set ".$fieldku."='".$isi."' where ID='".$id."' ";

$result=mysqli_query($link,$sql);
}

else if ($fieldku=="LONGITUDE")
{
	$sqlcek="select LATITUDE from ".$tabel." where ID='".$id."' ";
	$resultcek=mysqli_query($link,$sqlcek);
	if ($resultcek)
	{
		while ($rowcek=mysqli_fetch_array($resultcek))
		{
			$LATITUDE=$rowcek['LATITUDE'];
			$sqlkoordinat="update ".$tabel." set ogc_geom=GeometryFromText('POINT (".$isi." ".$LATITUDE." )',-1) where ID='".$id."' ";
			$resultkoordinat=mysqli_query($link,$sqlkoordinat);
		}
	}

$sql="update ".$tabel." set ".$fieldku."='".$isi."' where ID='".$id."' ";

$result=mysqli_query($link,$sql);
}

else if ($fieldku=="LATITUDE")
{

	$sqlcek="select LONGITUDE from ".$tabel." where ID='".$id."' ";
	$resultcek=mysqli_query($link,$sqlcek);
	if ($resultcek)
	{
		while ($rowcek=mysqli_fetch_array($resultcek))
		{
			$LONGITUDE=$rowcek['LONGITUDE'];
			$sqlkoordinat="update ".$tabel." set ogc_geom=GeometryFromText('POINT (".$LONGITUDE." ".$isi.")',-1) where ID='".$id."' ";
			$resultkoordinat=mysqli_query($link,$sqlkoordinat);
		}
	}

$sql="update ".$tabel." set ".$fieldku."='".$isi."' where ID='".$id."' ";

$result=mysqli_query($link,$sql);
}


else
{
$sql="update ".$tabel." set ".$fieldku."='".$isi."' where ID='".$id."' ";

$result=mysqli_query($link,$sql);
}

?>
					
</body>
</html>
