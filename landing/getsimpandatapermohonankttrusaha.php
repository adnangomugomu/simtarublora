<?php
session_start();
//setting header to json
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang = date('Y-m-d');
include '../library/config.php';

check_injection();

$sqljumlah="select ifnull(max(registrasi),0) as jumlah from si_permohonan_usaha where deleted='0' and DATE(createddate)='".$tanggalsekarang."'";
$resultsqljumlah=mysqli_query($link,$sqljumlah);
$rowjumlah=mysqli_fetch_array($resultsqljumlah);
$nomorregistrasiawal=$rowjumlah['jumlah'];
$nomorregistrasidipakai=$nomorregistrasiawal+1;

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

$sql = "insert into si_permohonan_usaha (id, registrasi, nomorktp, nomortelp, nama, alamat, fc_ktp, fc_siup, fc_kuasa, gb_denah, gb_lokasi, fc_sertifikat
, fc_rekomendasi, fc_persetujuan, peruntukkanpermohonantataruang, latitudesurvei, longitudesurvei, createddate, createby, deleted,ogc_geom,luastanah, nomornpwp, email, pekerjaan, alamatkegiatan, kecamatan, kelurahan, luastanahbukti, luastanahbangunan, kodeperuntukkan, statustanah, gunatanahsekarang, jumlahlantai, tinggibangunan, luaslantai, fc_permohononan, fc_pernyataan_pemohon, gbm_utara, gbm_barat, gbm_selatan, gbm_timur, nib, namakegiatanusaha, skalausaha, statusmodal, fc_nib, fc_aktausahakunham)
values (null, '".$nomorregistrasidipakai."', '".$_POST['nomorktp']."', '".$_POST['nomortelp']."'
, '".$_POST['nama']."', '".$_POST['alamat']."', '".$_POST['fc_ktp_tmp']."'
, '".$_POST['fc_siup_tmp']."', '".$_POST['fc_kuasa_tmp']."', '".$_POST['gb_denah_tmp']."', '".$_POST['gb_lokasi_tmp']."'
, '".$_POST['fc_sertifikat_tmp']."', '".$_POST['fc_rekomendasi_tmp']."', '".$_POST['fc_persetujuan_tmp']."', '".$_POST['isiperuntukkan']."'
, '".$latitude."', '".$longitude."'
, SYSDATE(), '".$_COOKIE['oneid']."', '0',".$fixkoordinat.",'".$_POST['luastanah']."','".$_POST['nomornpwp']."','".$_POST['email']."','".$_POST['pekerjaan']."','".$_POST['alamatkegiatan']."','".$_POST['kecamatan']."','".$_POST['kelurahan']."','".$_POST['luastanahbukti']."','".$_POST['luastanahbangunan']."','".$_POST['kodeperuntukkan']."','".$_POST['statustanah']."','".$_POST['gunatanahsekarang']."','".$_POST['jumlahlantai']."','".$_POST['tinggibangunan']."','".$_POST['luaslantai']."','".$_POST['fc_permohononan_tmp']."','".$_POST['fc_pernyataan_pemohon_tmp']."','".$_POST['gbm_utara_tmp']."','".$_POST['gbm_barat_tmp']."','".$_POST['gbm_selatan_tmp']."','".$_POST['gbm_timur_tmp']."' ,'".$_POST['nib']."','".$_POST['namakegiatanusaha']."','".$_POST['skalausaha']."','".$_POST['statusmodal']."','".$_POST['fc_nib_tmp']."','".$_POST['fc_aktausahakunham_tmp']."')";
$result=mysqli_query($link,$sql);

//$data['sql']=$sql; 
//echo json_encode($data);
exit;

?>