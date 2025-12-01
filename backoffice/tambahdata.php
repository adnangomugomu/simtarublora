<?php
session_start();
include '../library/config.php';
$tabel="rtlh";

$qcek="select max(ID) as jumlah from ".$tabel." ";
$rcek=mysqli_query($link,$qcek);
if ($rcek)
{
while ($owcek=mysqli_fetch_array($rcek))
{
	$jum=$owcek['jumlah']+1;
}
}

$query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field <> 'ID'  and Field not like 'kode' and Field not like '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%' and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' and Field not like '%deleted%' and Field not like '%ORIG_FID%' and Field not like '%IDSHP%' and Field not like '%NAMA_FILE%' and Field not like '%NAMA_FIL_1%' and Field not like '%NAMA_FIL_2%' and Field not like '%NAMA_FIL_3%' and Field not like '%KODE_FOTO%' and Field not like '%KODE_FOTO1%' ";
$hasil=mysqli_query($link,$query);
if ($hasil)
{
$field=" ";
$isifield=" ";
$tambahfield=" ";
$tambahisifield=" ";
$x=1;
while ($ro=mysqli_fetch_array($hasil))
{
	if ($x==1)
	{ 
		$field= $field.$ro['Field'];
		$tmp=$_POST[$ro['Field']];
		if ($tmp=="")
		{
			$isifield= $isifield." null ";
		}
		else
		{
			$isifield= $isifield."'".$_POST[$ro['Field']]."'";
		}
	}
	else
	{
		$tmp=$_POST[$ro['Field']];
		if ($tmp=="")
		{
			$field= $field." ,".$ro['Field'];
			$isifield= $isifield." ,"." null ";
		}
		else
		{
			$field= $field." ,".$ro['Field'];
			$isifield= $isifield." ,"."'".$_POST[$ro['Field']]."'";
		}
	}

$x++;
}
}

$gambar="";
if ($_FILES['NAMA_FILE']['name']<>"")
{
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['NAMA_FILE']['name'];
          $attachdir = '../foto/rtlh/';  

          copy ($_FILES['NAMA_FILE']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  
}
if ($gambar<>"")
{
$tambahfield=$tambahfield." ,NAMA_FILE";
$tambahisifield=$tambahisifield." ,'".$gambar."'";
}


$gambar="";
if ($_FILES['NAMA_FIL_1']['name']<>"")
{
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['NAMA_FIL_1']['name'];
          $attachdir = '../foto/rtlh/';  

          copy ($_FILES['NAMA_FIL_1']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  
}
if ($gambar<>"")
{
$tambahfield=$tambahfield." ,NAMA_FIL_1";
$tambahisifield=$tambahisifield." ,'".$gambar."'";
}

$gambar="";
if ($_FILES['NAMA_FIL_2']['name']<>"")
{
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['NAMA_FIL_2']['name'];
          $attachdir = '../foto/rtlh/';  

          copy ($_FILES['NAMA_FIL_2']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  
}
if ($gambar<>"")
{
$tambahfield=$tambahfield." ,NAMA_FIL_2";
$tambahisifield=$tambahisifield." ,'".$gambar."'";
}

$gambar="";
if ($_FILES['NAMA_FIL_3']['name']<>"")
{
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['NAMA_FIL_3']['name'];
          $attachdir = '../foto/rtlh/';  

          copy ($_FILES['NAMA_FIL_3']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  
}
if ($gambar<>"")
{
$tambahfield=$tambahfield." ,NAMA_FIL_3";
$tambahisifield=$tambahisifield." ,'".$gambar."'";
}

$gambar="";
if ($_FILES['KODE_FOTO']['name']<>"")
{
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['KODE_FOTO']['name'];
          $attachdir = '../foto/rtlh/';  

          copy ($_FILES['KODE_FOTO']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  
}
if ($gambar<>"")
{
$tambahfield=$tambahfield." ,KODE_FOTO";
$tambahisifield=$tambahisifield." ,'".$gambar."'";
}

$gambar="";
if ($_FILES['KODE_FOTO1']['name']<>"")
{
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['KODE_FOTO1']['name'];
          $attachdir = '../foto/rtlh/';  

          copy ($_FILES['KODE_FOTO1']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  
}
if ($gambar<>"")
{
$tambahfield=$tambahfield." ,KODE_FOTO1";
$tambahisifield=$tambahisifield." ,'".$gambar."'";
}

if ($_POST['PERNAH_MEN']=="BELUM PERNAH")
{
$tambahfield=$tambahfield." ,simbol";
$tambahisifield=$tambahisifield." ,'968728_Home-icon_merah.png'";
}
else
{
$tambahfield=$tambahfield." ,simbol";
$tambahisifield=$tambahisifield." ,'838544_icon-home-vert_hijau.png'";
}

$tambahfield=$tambahfield." ,tipe";
$tambahisifield=$tambahisifield." ,'1'";

$sql="insert into rtlh(ID,".$field.",ogc_geom ".$tambahfield.") values ('".$jum."',".$isifield.",GeometryFromText('POINT (".$_POST['LONGITUDE']." ".$_POST['LATITUDE']." )',-1) ".$tambahisifield.")";
//echo $sql;

$proses=mysqli_query($link,$sql);
header ('Location: ../pemetaan.php?xx=XyZ');
exit;

?>