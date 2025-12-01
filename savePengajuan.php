<?php
ini_set("memory_limit",-1);
require_once 'library/config.php';
$ijinnamapemohon=base64_decode($_GET['ijinnamapemohon']);
$ijinalamatpemohon=base64_decode($_GET['ijinalamatpemohon']);
$ijintempatlahirpemohon=base64_decode($_GET['ijintempatlahirpemohon']);
$ijintanggallahirpemohon=base64_decode($_GET['ijintanggallahirpemohon']);
$ijinpekerjaan=base64_decode($_GET['ijinpekerjaan']);
$ijinnotelp=base64_decode($_GET['ijinnotelp']);
$ijinnamaperusahaan=base64_decode($_GET['ijinnamaperusahaan']);
$ijinalamatperusahaan=base64_decode($_GET['ijinalamatperusahaan']);
$ijinalamatkegiatan=base64_decode($_GET['ijinalamatkegiatan']);
$ijinluas=base64_decode($_GET['ijinluas']);
$ijinluasbangunan=base64_decode($_GET['ijinluasbangunan']);
$ijinsertifikat=base64_decode($_GET['ijinsertifikat']);
$ijinkoordinat=base64_decode($_GET['ijinkoordinat']);
$ijinkoordinathdms=str_replace(","," ",base64_decode($_GET['ijinkoordinat']));
$ijinkode=base64_decode($_GET['ijinkode']);
$kodeijinpenggunaan=base64_decode($_GET['kodeijinpenggunaan']);
$ijinjeniskegiatan=base64_decode($_GET['ijinjeniskegiatan']);
$hasilajuan=base64_decode($_GET['hasilajuan']);


	$sqlcek="INSERT INTO one_master_pengajuan(id, tanggal, kode_pola_ruang, zonasi, peruntukkan, diterima, ijinnamapemohon, ijinalamatpemohon, ijintempatlahirpemohon, ijintanggallahirpemohon, ijinpekerjaan, ijinnotelp, ijinnamaperusahaan, ijinalamatperusahaan, ijinalamatkegiatan, ijinluas, ijinluasbangunan, ijinsertifikat, ijinkoordinat, ijinkoordinathdms, tanggapi, deleted) VALUES 
	(null,SYSDATE(),'".$ijinkode."','".$kodeijinpenggunaan."','".$ijinjeniskegiatan."','".$hasilajuan."'
	, '".$ijinnamapemohon."', '".$ijinalamatpemohon."', '".$ijintempatlahirpemohon."', '".$ijintanggallahirpemohon."', '".$ijinpekerjaan."', '".$ijinnotelp."', '".$ijinnamaperusahaan."', '".$ijinalamatperusahaan."', '".$ijinalamatkegiatan."', '".$ijinluas."', '".$ijinluasbangunan."', '".$ijinsertifikat."', '".$ijinkoordinat."',GeometryFromText('POINT (".$ijinkoordinathdms.")',-1),0,0)
	";
	$resultcek=mysqli_query($link,$sqlcek);

?>
					