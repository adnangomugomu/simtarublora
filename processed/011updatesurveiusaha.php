<?php
error_reporting(0);
session_start();
include '../library/config.php';
check_injection();
check_login();

  $tempkodeid = $_POST['tempkodeid'];	
  $peruntukkanpermohonantataruang = $_POST['peruntukkanpermohonantataruang'];
  $tanggalsurvei = tomysqldate($_POST['tanggalsurvei']);
  $petugassurvei =  $_POST['petugassurvei'];
  $luastanah = $_POST['luastanah'];
  $hasilsurvei = $_POST['hasilsurvei'];
  
  $luastanahsetuju = $_POST['luastanahsetuju'];
  $jenispemanfaatanruang = $_POST['jenispemanfaatanruang'];
  $kodekbli = $_POST['kodekbli'];
  $judulkbli = $_POST['judulkbli'];
  $kdbmaks = $_POST['kdbmaks'];
  $klbmaks = $_POST['klbmaks'];
  $indikasiprogram = $_POST['indikasiprogram'];
  
  $sketsa = "";
  if ($_FILES['sketsa']['name'])
  {
	mt_srand (time ());
    $rand = mt_rand (100000, 999999);
    $newfilename = $rand . '_' . $_FILES['sketsa']['name'];
    $attachdir = '../upload/';  
    copy ($_FILES['sketsa']['tmp_name'], $attachdir . $newfilename);
    $sketsa = $newfilename;
  }
  
  $latitudesurvei="";
  foreach ($_POST['latitudesurvei'] as $selectedOptionlatitudesurvei)
  {
  	$latitudesurvei=$latitudesurvei.$selectedOptionlatitudesurvei."|";
	
  }
  $fixlatitudesurvei = substr_replace($latitudesurvei,'',-1);
  
  $longitudesurvei="";
  foreach ($_POST['longitudesurvei'] as $selectedOptionlongitudesurvei)
  {
  	$longitudesurvei=$longitudesurvei.$selectedOptionlongitudesurvei."|";
  }
  $fixlongitudesurvei = substr_replace($longitudesurvei,'',-1);
  
  
  
  $latitudesurveisetuju="";
  foreach ($_POST['latitudesurveisetuju'] as $selectedOptionlatitudesurveisetuju)
  {
  	$latitudesurveisetuju=$latitudesurveisetuju.$selectedOptionlatitudesurveisetuju."|";
	
  }
  $fixlatitudesurveisetuju = substr_replace($latitudesurveisetuju,'',-1);
  
  $longitudesurveisetuju="";
  foreach ($_POST['longitudesurveisetuju'] as $selectedOptionlongitudesurveisetuju)
  {
  	$longitudesurveisetuju=$longitudesurveisetuju.$selectedOptionlongitudesurveisetuju."|";
  }
  $fixlongitudesurveisetuju = substr_replace($longitudesurveisetuju,'',-1);
  
  $fotosurvei="";
  $files=0;
  foreach ($_FILES['fotosurvei']['tmp_name'] as $selectedOptionfotosurvei)
  {
  	//echo $_FILES['fotosurvei']['name'][$files]."<br>";
	mt_srand (time ());
    $rand = mt_rand (100000, 999999);
    $newfilename = $rand . '_' . $_FILES['fotosurvei']['name'][$files];
    $attachdir = '../upload/';  
    copy ($selectedOptionfotosurvei, $attachdir . $newfilename);
	$fotosurvei=$fotosurvei.$newfilename."|";
	//echo $selectedOptionfotosurvei."<br>";
	$files++;
  } 
  $fotosurvei = substr_replace($fotosurvei,'',-1);
  //echo $fotosurvei."<br>";
  
  
  $koordinatawal = implode(',',array_unique(explode(',',substr($_POST['koordinatku'],2))));  
  //echo $koordinatawal."<br>";
  $tempfixkoordinat = explode(',',$koordinatawal);
  $counttempfixkoordinat = count($tempfixkoordinat);
  $fixkoordinat="";
  for ($i = 0; $i <= $counttempfixkoordinat-1; $i++) {
  	if ($i==($counttempfixkoordinat-1))
	{
		$tempfixkoordinat[$i]=$tempfixkoordinat[0];	
	}
	$fixkoordinat=$fixkoordinat.$tempfixkoordinat[$i].", ";
  }
  
  $fixkoordinat = substr_replace($fixkoordinat,'',-2);
  if ($fixkoordinat<>'')
  {
  	$fixkoordinat="GeometryFromText('POLYGON((".$fixkoordinat."))')";
  }
  else
  {
  	$fixkoordinat='';
  }
  //echo $fixkoordinat."<br>";
  
  $sql="update si_permohonan_usaha set peruntukkanpermohonantataruang='".$peruntukkanpermohonantataruang."'
  , tanggalsurvei='".$tanggalsurvei."'
  , petugassurvei='".$petugassurvei."'
  , luastanah='".$luastanah."'
  , hasilsurvei='".$hasilsurvei."'
  , luastanah='".$luastanah."' 
  , luastanahsetuju='".$luastanahsetuju."' 
  , jenispemanfaatanruang='".$jenispemanfaatanruang."' 
  , kodekbli='".$kodekbli."' 
  , judulkbli='".$judulkbli."' 
  , kdbmaks='".$kdbmaks."' 
  , klbmaks='".$klbmaks."' 
  , indikasiprogram='".$indikasiprogram."' 
  ";
  if ($sketsa<>'')
  {
  $sql=$sql."
  , sketsa='".$sketsa."' ";
  }
  $sql=$sql."
  , latitudesurvei='".$fixlatitudesurvei."'
  , longitudesurvei='".$fixlongitudesurvei."' ";
  
  $sql=$sql."
  , latitudesurveisetuju='".$fixlatitudesurveisetuju."'
  , longitudesurveisetuju='".$fixlongitudesurveisetuju."' ";
  
  if ($fotosurvei<>'')
  {
  $sql=$sql."
  , fotosurvei='".$fotosurvei."' ";
  }
  
  if ($fixkoordinat<>'')
  {
  $sql=$sql."
  , ogc_geom = ".$fixkoordinat." ";
  }
  $sql=$sql."
  , updatedate=SYSDATE()
  , updateby='".$_COOKIE['oneid']."'
  where id ='".$tempkodeid."'
  ";
  //echo $sql;
  $result=mysqli_query($link,$sql);
  header ('Location: simtaru-t4b3lkkpr?ket=edit');
  exit;
  
  
?>