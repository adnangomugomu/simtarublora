<html>
<head>
</head>
<body>
<?php
ini_set("memory_limit",-1);
require_once '../library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];
$no3=$_GET['no3'];

$sql="update ".$no1." set ".$no2."='".$no3."'  ";

$result=mysqli_query($link,$sql);

?>
					
</body>
</html>
