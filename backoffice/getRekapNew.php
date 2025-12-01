<html>
<head>
</head>
<body>
<?php
require_once '../library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];
$no3=$_GET['no3'];
$no4=$_GET['no4'];
$no5=$_GET['no5'];
$judul=$_GET['judul'];

$sql="select * from one_rekap where nama='".$no1."'";
$result=mysqli_query($link,$sql);
$num=mysqli_num_rows($result);
if ($num=='0')
{
	$sql1="insert into one_rekap (id,nama,judul";
	if ($no2<>"")
	{
		$sql1=$sql1.",fil1";
	}
	if ($no3<>"")
	{
		$sql1=$sql1.",fil2";
	}
	if ($no4<>"")
	{
		$sql1=$sql1.",fil3";
	}
	if ($no5<>"")
	{
		$sql1=$sql1.",fil4";
	}
	$sql1=$sql1." ) values (null,'".$no1."','".$judul."'";
	if ($no2<>"")
	{
		$sql1=$sql1.",'".$no2."'";
	}
	if ($no3<>"")
	{
		$sql1=$sql1.",'".$no3."'";
	}
	if ($no4<>"")
	{
		$sql1=$sql1.",'".$no4."'";
	}
	if ($no5<>"")
	{
		$sql1=$sql1.",'".$no5."'";
	}
	$sql1=$sql1." )";
	$result1=mysqli_query($link,$sql1);
}
else
{
	if ($result)
	{
	while ($row=mysqli_fetch_array($result))
	{
		$kode=$row['id'];
		$sql1="update one_rekap set nama='".$no1."',judul='".$judul."'";
		if ($no2<>"")
		{
			$sql1=$sql1." ,fil1='".$no2."'";
		}
		if ($no3<>"")
		{
			$sql1=$sql1." ,fil2='".$no3."'";
		}
		if ($no4<>"")
		{
			$sql1=$sql1." ,fil3='".$no4."'";
		}
		if ($no5<>"")
		{
			$sql1=$sql1." ,fil4='".$no5."'";
		}
		$sql1=$sql1." where id='".$kode."' ";
		$result1=mysqli_query($link,$sql1);
	}
	}
}

?>
					
</body>
</html>
