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
$adiku=$tempno2[3];

if  ( ($fieldku=="fillku") || ($fieldku=="tebalfillku") || ($fieldku=="garisku") || ($fieldku=="tebalgarisku") )
{
$isi="#".$no1;
}
else
{
$isi=$no1;
}


$sql="update ".$tabel." set ".$fieldku."='".$isi."' where ".$id."='".$adiku."' ";
$result=mysqli_query($link,$sql);
$sql="update ".$tabel." set labelku='".$id."' ";
$result=mysqli_query($link,$sql);

?>
					
</body>
</html>
