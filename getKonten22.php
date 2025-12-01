<html>
<head>
</head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:11px;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 3px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
	border-color: #4CAF50;
}
</style>
<body>
<?php
ini_set("memory_limit",-1);
require_once 'library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];
$no3=$_GET['no3'];
$sqlk="select ".$no1." from itbx where id='".$no3."' ";
$resultk=mysqli_query($link,$sqlk);
if ($resultk)
{
while ($rowk=mysqli_fetch_array($resultk))
{
	echo $rowk[$no1];
}
}
//echo $data[0]."<br>".$data['1'];
?>
	
</body>
</html>
