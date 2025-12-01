<html>
<head>
</head>
<body>
<?php
ini_set("memory_limit",-1);
require_once '../library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];

$sql="ALTER TABLE ".$no1." ADD ".$no2." VARCHAR(255)  ";
$result=mysqli_query($link,$sql);

?>
					
</body>
</html>
