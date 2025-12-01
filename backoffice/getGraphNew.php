<html>
<head>
</head>
<body>
<?php
require_once '../library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];
$no3=$_GET['no3'];

$sql="select * from one_grafik where nama='".$no1."'";
$result=mysqli_query($link,$sql);
$num=mysqli_num_rows($result);
if ($num=='0')
{
	$sql1="insert into one_grafik (id,nama,".$no2.") values (null,'".$no1."','".$no3."')";
	$result1=mysqli_query($link,$sql1);
}
else
{
	if ($result)
	{
	while ($row=mysqli_fetch_array($result))
	{
		$kode=$row['id'];
		$sql1="update one_grafik set ".$no2."='".$no3."' where id='".$kode."' ";
		$result1=mysqli_query($link,$sql1);
	}
	}
}

?>
					
</body>
</html>
