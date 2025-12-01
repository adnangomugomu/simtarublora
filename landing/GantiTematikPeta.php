<?php 
session_start();
ini_set("memory_limit",-1);
include '../library/config.php'; 
if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid'])==""))
{
header("location:./");
?>
<script>
//alert("");
window.location='./';
</script>
<?php
}
?>
<html>
<head>
</head>
<body>
<?php
$no1=base64_decode($_GET['no1']);
$no2=base64_decode($_GET['no2']);
$no3=base64_decode($_GET['no3']);
$no4=base64_decode($_GET['no4']);
$no5=base64_decode($_GET['no5']);
$no6=base64_decode($_GET['no6']);

$sql="update ".$no4." set ".$no2."='".$no3."' where ".$no6."='".$no5."' ";
//echo $sql;
$result=mysqli_query($link,$sql);
?>
					
</body>
</html>
