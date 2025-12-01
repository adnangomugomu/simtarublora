<?php
session_start();
//setting header to json
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang = date('Y-m-d');
include '../library/config.php';

check_injection();


$luas=str_replace('<sup>2</sup>','',$_POST['measureOutput']);
$luas=str_replace('<li>','',$luas);
$luas=str_replace('</li>','',$luas);
$luas=str_replace('Luas = ','',$luas);
$templuas=explode(' ',$luas);
if($templuas[1]=='km')
{
$luas=$templuas[0]*1000000;
}
else
{
$luas=$templuas[0];
}

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
  $fixkoordinatlagi = substr_replace($fixkoordinat,'',-2);
  if ($fixkoordinat<>'')
  {
  	$fixkoordinat="GeometryFromText('POLYGON((".$fixkoordinat."))')";
  }
  else
  {
  	$fixkoordinat='';
  }
  
  $tempkoordinatlatlong=explode(',',$fixkoordinatlagi);
  $counttempkoordinatlatlong = count($tempkoordinatlatlong);
  $longitude="";
  $latitude="";
  for ($i = 0; $i <= $counttempkoordinatlatlong-1; $i++) {
  	$temptes=explode(' ',trim($tempkoordinatlatlong[$i]));
	if ($i==0)
	{
		$longitude=$temptes[0];
		$latitude=$temptes[1];
	}
	else
	{
		$longitude=$longitude."|".$temptes[0];
		$latitude=$latitude."|".$temptes[1];
	}
  }


$sql ="update si_permohonan set peruntukkanpermohonantataruang='".$_POST['isiperuntukkan']."' ";
if ($_POST['koordinatku']<>'kosong')
{
	$sql =$sql." , latitudesurvei='".$latitude."' , longitudesurvei='".$longitude."', ogc_geom=".$fixkoordinat.",luastanah='".$luas."' ";
}
if ($_POST['fc_ktp_tmp']<>'')
{
	$sql =$sql." ,fc_ktp='".$_POST['fc_ktp_tmp']."'";
}
if ($_POST['fc_siup_tmp']<>'')
{
	$sql =$sql." ,fc_siup='".$_POST['fc_siup_tmp']."'";
}
if ($_POST['fc_kuasa_tmp']<>'')
{
	$sql =$sql." ,fc_kuasa='".$_POST['fc_kuasa_tmp']."'";
}
if ($_POST['gb_denah_tmp']<>'')
{
	$sql =$sql." ,gb_denah='".$_POST['gb_denah_tmp']."'";
}
if ($_POST['gb_lokasi_tmp']<>'')
{
	$sql =$sql." ,gb_lokasi='".$_POST['gb_lokasi_tmp']."'";
}
if ($_POST['fc_sertifikat_tmp']<>'')
{
	$sql =$sql." ,fc_sertifikat='".$_POST['fc_sertifikat_tmp']."'";
}
if ($_POST['fc_rekomendasi_tmp']<>'')
{
	$sql =$sql." ,fc_rekomendasi='".$_POST['fc_rekomendasi_tmp']."'";
}
if ($_POST['fc_persetujuan_tmp']<>'')
{
	$sql =$sql." ,fc_persetujuan='".$_POST['fc_persetujuan_tmp']."'";
}
$sql =$sql." , updatedate=SYSDATE(), updateby='".$_COOKIE['oneid']."' where id='".$_POST['kodeid']."'";
$result=mysqli_query($link,$sql);

//$data['sql']=$sql; 
//echo json_encode($data);
exit;

?>