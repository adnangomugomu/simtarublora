<?php
session_start();
//setting header to json
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang = date('Y-m-d');
include '../library/config.php';

check_injection();


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
  	$fixkoordinat="ST_GEOMETRYFROMTEXT('POLYGON((".$fixkoordinat."))')";
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


$sql ="update si_permohonan_non set peruntukkanpermohonantataruang='".$_POST['isiperuntukkan']."' ";
$sql =$sql." , luastanah='".$_POST['luastanah']."' ";
$sql =$sql." , alamatkegiatan='".$_POST['alamatkegiatan']."' ";
$sql =$sql." , kecamatan='".$_POST['kecamatan']."' ";
$sql =$sql." , luastanahbukti='".$_POST['luastanahbukti']."' ";
$sql =$sql." , luastanahbangunan='".$_POST['luastanahbangunan']."' ";
$sql =$sql." , kodeperuntukkan='".$_POST['kodeperuntukkan']."' ";
$sql =$sql." , statustanah='".$_POST['statustanah']."' ";
$sql =$sql." , gunatanahsekarang='".$_POST['gunatanahsekarang']."' ";
$sql =$sql." , jumlahlantai='".$_POST['jumlahlantai']."' ";
$sql =$sql." , tinggibangunan='".$_POST['tinggibangunan']."' ";
$sql =$sql." , luaslantai='".$_POST['luaslantai']."' ";
$sql =$sql." , kelurahan='".$_POST['kelurahan']."' ";
$sql =$sql." , kegiatan='".$_POST['kegiatan']."' ";
$sql =$sql." , tipe='".$_POST['tipe']."' ";
$sql =$sql." , nomor_sertifikat='".$_POST['nomor_sertifikat']."' ";
if ($_POST['koordinatku']<>'kosong')
{
	$sql =$sql." , latitudesurvei='".$latitude."' , longitudesurvei='".$longitude."'
	, latitudesurveisetuju='".$latitude."' , longitudesurveisetuju='".$longitude."'
	, ogc_geom=".$fixkoordinat.", ogc_geom_setuju=".$fixkoordinat." ";
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
if ($_POST['fc_permohononan_tmp']<>'')
{
	$sql =$sql." ,fc_permohononan='".$_POST['fc_permohononan_tmp']."'";
}
if ($_POST['fc_pernyataan_pemohon_tmp']<>'')
{
	$sql =$sql." ,fc_pernyataan_pemohon='".$_POST['fc_pernyataan_pemohon_tmp']."'";
}

if ($_POST['gbm_utara_tmp']<>'')
{
	$sql =$sql." ,gbm_utara='".$_POST['gbm_utara_tmp']."'";
}
if ($_POST['gbm_barat_tmp']<>'')
{
	$sql =$sql." ,gbm_barat='".$_POST['gbm_barat_tmp']."'";
}
if ($_POST['gbm_selatan_tmp']<>'')
{
	$sql =$sql." ,gbm_selatan='".$_POST['gbm_selatan_tmp']."'";
}
if ($_POST['gbm_timur_tmp']<>'')
{
	$sql =$sql." ,gbm_timur='".$_POST['gbm_timur_tmp']."'";
}

$sql =$sql." , updatedate=SYSDATE(), updateby='".$_COOKIE['oneid']."' where id='".$_POST['kodeid']."'";
$result=mysqli_query($link,$sql);

//$data['sql']=$sql; 
//echo json_encode($data);
exit;

?>