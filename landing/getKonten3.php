
<?php
ini_set("memory_limit",-1);
require_once '../library/config.php';

function onereplace($str,$replaced_character){
$spt = str_split($str,1);
for($i=0; $i <= (count($spt) - 1) ; $i++){
 if($spt[$i] == $replaced_character){
   unset($spt[$i]);
   break;
 }
}

return implode('',$spt);
}

$no1=$_GET['no1'];
$no2=$_GET['no2'];
$data2=explode(",",$no2);
$lat=$data2[1];
$longitude=$data2[0];
$no3=$_GET['no3'];
$no4=$_GET['no4'];
$koordinatku=$no4;
$newkoordinatku = implode(',',array_unique(explode(',',onereplace($koordinatku,",")))); 
$temptambahkoordinat=explode(",",$newkoordinatku);
$tambahkoordinat=$temptambahkoordinat[0];
$fixkoordinat="
SELECT ID_AUTO, PERUNTUKAN, sum(ST_Area(ST_INTERSECTION(ST_GeomFromText('POLYGON((".$newkoordinatku." ,".$tambahkoordinat."))', 4326),ogc_geom))) as area FROM rencana_pola_ruang
WHERE ST_Intersects(ST_GeomFromText('POLYGON((".$newkoordinatku." ,".$tambahkoordinat."))', 4326), ogc_geom
)=1
group by PERUNTUKAN
";


$data=explode("|",$no1);
//echo $data[0]."<br>".$data['1'];
$id=$data[0];
$tabel=$data[1];



	//echo $data[0]."<br>".$data['1'];
	if ($no1<>"")
	{
	
	if ($tabel=='si_permohonan')
	{
		echo "";
	}
	else
	{
	$sql="select DESA, KECAMATAN, KAWASAN, PERUNTUKAN, Kol1, Kol2, Kol3, Kol4, Kol5, Kol6, Kol7 from ".$tabel." where ID_AUTO='".$id."'";
	//echo $sql;
	$result=mysqli_query($link,$sql);
	if ($result)
	{
		$i=1;
		$tulis='';
		$isi='';
		while ($row=mysqli_fetch_array($result))
		{
			
			if ($row['PERUNTUKAN']<>$isi)
			{
				$tulis=$tulis.", ".$row['PERUNTUKAN'];
				$isi=$row['PERUNTUKAN'];
			}
			
			$i++;
		}
		$tulisfix=substr_replace($tulis,'',0,2);
		//echo $tulis."<br>";
		echo $tulisfix;
	}
	
	}
	// bukan permohonan
	}
	else
	{
	$sql=$fixkoordinat;
	//echo $sql;
	$result=mysqli_query($link,$sql);
	if ($result)
	{
		
		$i=1;
		$tulis='';
		$isi='';
		while ($row=mysqli_fetch_array($result))
		{
			if ($row['area']<>'')
			{
				
				if ($row['PERUNTUKAN']<>$isi)
				{
					$tulis=$tulis.", ".$row['PERUNTUKAN'];
					$isi=$row['PERUNTUKAN'];
				}
				
			}
			$i++;
			$tulisfix=substr_replace($tulis,'',0,2);
			//echo $tulis."<br>";
			echo $tulisfix;
		}
	}
	
	}



?>
