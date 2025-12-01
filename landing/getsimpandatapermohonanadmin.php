<?php
session_start();
//setting header to json
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang = date('Y-m-d');
include '../library/config.php';

check_injection();

$sqljumlah="select ifnull(max(registrasi),0) as jumlah from si_permohonan where deleted='0' and DATE(createddate)='".$tanggalsekarang."'";
$resultsqljumlah=mysqli_query($link,$sqljumlah);
$rowjumlah=mysqli_fetch_array($resultsqljumlah);
$nomorregistrasiawal=$rowjumlah['jumlah'];
$nomorregistrasidipakai=$nomorregistrasiawal+1;

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

$sql = "insert into si_permohonan (id, registrasi, nomorktp, nomortelp, nama, alamat, fc_ktp, fc_siup, fc_kuasa, gb_denah, gb_lokasi, fc_sertifikat
, fc_rekomendasi, fc_persetujuan, peruntukkanpermohonantataruang, latitudesurvei, longitudesurvei, createddate, createby, deleted,ogc_geom,luastanah)
values (null, '".$nomorregistrasidipakai."', '".$_POST['nomorktp']."', '".$_POST['nomortelp']."'
, '".$_POST['nama']."', '".$_POST['alamat']."', '".$_POST['fc_ktp_tmp']."'
, '".$_POST['fc_siup_tmp']."', '".$_POST['fc_kuasa_tmp']."', '".$_POST['gb_denah_tmp']."', '".$_POST['gb_lokasi_tmp']."'
, '".$_POST['fc_sertifikat_tmp']."', '".$_POST['fc_rekomendasi_tmp']."', '".$_POST['fc_persetujuan_tmp']."', '".$_POST['isiperuntukkan']."'
, '".$latitude."', '".$longitude."'
, SYSDATE(), '".$_COOKIE['oneid']."', '0',".$fixkoordinat.",'".$luas."')";
$result=mysqli_query($link,$sql);

//$data['sql']=$sql; 
//echo json_encode($data);
exit;

?>