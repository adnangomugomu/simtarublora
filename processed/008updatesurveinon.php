<?php
error_reporting(0);
session_start();
include '../library/config.php';
//check_injection2();
check_login();

  $tempkodeid = $_POST['tempkodeid'];	
  
  $kegiatan = $_POST['kegiatan'];
  $alamatkegiatan = $_POST['alamatkegiatan'];
  $kecamatan = $_POST['kecamatan'];
  $kelurahan = $_POST['kelurahan'];
  $kodeperuntukkan = $_POST['kodeperuntukkan'];
  $statustanah = $_POST['statustanah'];
  $nomor_sertifikat = $_POST['nomor_sertifikat'];
  $gunatanahsekarang = $_POST['gunatanahsekarang'];
  $luastanahbukti = $_POST['luastanahbukti'];
  $luastanahbangunan = $_POST['luastanahbangunan'];
  $jumlahlantai = $_POST['jumlahlantai'];
  $tinggibangunan = $_POST['tinggibangunan'];
  $luaslantai = $_POST['luaslantai'];
  $ttd_oleh = $_POST['ttd_oleh'];
  
  $skalausaha = $_POST['skalausaha'];
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
  $gsbmin = $_POST['gsbmin'];
  $gspmin = $_POST['gspmin'];
  $jbbmin = $_POST['jbbmin'];
  $kdhmin = $_POST['kdhmin'];
  $ktbmaks = $_POST['ktbmaks'];
  $ktb2maks = $_POST['ktb2maks'];
  $juk = $_POST['juk'];
  $lkmmin = $_POST['lkmmin'];
  $persyaratan = $_POST['persyaratan'];
  $kwtmaks = $_POST['kwtmaks'];
  
  $kawasanpemanfaatanruang = $_POST['kawasanpemanfaatanruang'];
  $letakkawasan = $_POST['letakkawasan'];
  $keterangankawasanpemanfaatanruang = $_POST['keterangankawasanpemanfaatanruang'];
  
  $pasal = $_POST['pasal'];
  $ayat = $_POST['ayat'];
  $huruf = $_POST['huruf'];
  $keterangan_rtrw = $_POST['keterangan_rtrw'];
  $persyaratan_rtrw = $_POST['persyaratan_rtrw'];
  $klasifikasi = $_POST['klasifikasi'];
  
  
  $tanggalcetak= tomysqldate($_POST['tanggalcetak']);
  $tanggalterbit= tomysqldate($_POST['tanggalterbit']);
  $nomorsurat = $_POST['nomorsurat'];
  
  $nomorba=$_POST['nomorba'];
  $jeniskegiatan=$_POST['jeniskegiatan'];
  $lampiranptp = "";
  if ($_FILES['lampiranptp']['name'])
  {
	mt_srand (time ());
    $rand = mt_rand (100000, 999999);
    $newfilename = $rand . '_' . $_FILES['lampiranptp']['name'];
    $attachdir = '../upload/';  
    copy ($_FILES['lampiranptp']['tmp_name'], $attachdir . $newfilename);
    $lampiranptp = $newfilename;
  }
  $lampiranfpr = "";
  if ($_FILES['lampiranfpr']['name'])
  {
	mt_srand (time ());
    $rand = mt_rand (100000, 999999);
    $newfilename = $rand . '_' . $_FILES['lampiranfpr']['name'];
    $attachdir = '../upload/';  
    copy ($_FILES['lampiranfpr']['tmp_name'], $attachdir . $newfilename);
    $lampiranfpr = $newfilename;
  }
  
  $gambar_peta = "";
  if ($_FILES['gambar_peta']['name'])
  {
	mt_srand (time ());
    $rand = mt_rand (100000, 999999);
    $newfilename = $rand . '_' . $_FILES['gambar_peta']['name'];
    $attachdir = '../upload/';  
    copy ($_FILES['gambar_peta']['tmp_name'], $attachdir . $newfilename);
    $gambar_peta = $newfilename;
  }
  
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
  $sub_kalimat = substr($fotosurvei,-3);
  if (($sub_kalimat!='png') && ($sub_kalimat!='PNG') && ($sub_kalimat!='jpg') && ($sub_kalimat!='JPG') && ($sub_kalimat!='peg') && ($sub_kalimat!='PEG'))
  {
  	$fotosurvei="";
  }
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
  $fixkoordinatlagi = substr_replace($fixkoordinat,'',-2);
  if ($fixkoordinat<>'')
  {
  	$fixkoordinat="ST_GEOMETRYFROMTEXT('POLYGON((".$fixkoordinat."))')";
  }
  else
  {
  	$fixkoordinat='';
  }
  //echo $fixkoordinat."<br>";

if ($fixkoordinat<>'')  
{  
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
  
  $fixlatitudesurveisetuju=$latitude;
  $fixlongitudesurveisetuju=$longitude;
  
}  
  
  $sql="update si_permohonan_non set peruntukkanpermohonantataruang='".$peruntukkanpermohonantataruang."'
  
  , kegiatan='".$kegiatan."'
  , alamatkegiatan='".$alamatkegiatan."'
  , kecamatan='".$kecamatan."'
  , kelurahan='".$kelurahan."'
  , kodeperuntukkan='".$kodeperuntukkan."' 
  , statustanah='".$statustanah."' 
  , nomor_sertifikat='".$nomor_sertifikat."'
  , gunatanahsekarang='".$gunatanahsekarang."' 
  , luastanahbukti='".$luastanahbukti."' 
  , luastanahbangunan='".$luastanahbangunan."' 
  , jumlahlantai='".$jumlahlantai."' 
  , tinggibangunan='".$tinggibangunan."' 
  , luaslantai='".$luaslantai."' 
  , ttd_oleh='".$ttd_oleh."' 
  
  , tanggalsurvei='".$tanggalsurvei."'
  , petugassurvei='".$petugassurvei."'
  , luastanah='".$luastanah."'
  , hasilsurvei='".$hasilsurvei."'
  , luastanah='".$luastanah."' 
  , luastanahsetuju='".$luastanahsetuju."' 
  , jenispemanfaatanruang='".$jenispemanfaatanruang."'
  , jeniskegiatan='".$jeniskegiatan."' 
  , kodekbli='".$kodekbli."' 
  , judulkbli='".$judulkbli."' 
  , skalausaha='".$skalausaha."' 
  , kdbmaks='".$kdbmaks."' 
  , klbmaks='".$klbmaks."' 
  , indikasiprogram='".$indikasiprogram."' 
  , gsbmin='".$gsbmin."'
  , gspmin='".$gspmin."'
  , jbbmin='".$jbbmin."'
  , kdhmin='".$kdhmin."'
  , ktbmaks='".$ktbmaks."'
  , ktb2maks='".$ktb2maks."'
  , juk='".$juk."'
  , lkmmin='".$lkmmin."'
  , persyaratan='".$persyaratan."'
  , kwtmaks='".$kwtmaks."'
  , kawasanpemanfaatanruang='".$kawasanpemanfaatanruang."'
  , letakkawasan='".$letakkawasan."'
  , keterangankawasanpemanfaatanruang='".$keterangankawasanpemanfaatanruang."'
  , pasal='".$pasal."'
  , ayat='".$ayat."'
  , huruf='".$huruf."'
  , keterangan_rtrw='".$keterangan_rtrw."'
  , persyaratan_rtrw='".$persyaratan_rtrw."'
  , klasifikasi='".$klasifikasi."'
  , nomorsurat='".$nomorsurat."'
  , nomorba='".$nomorba."'
  , tanggalcetak='".$tanggalcetak."'
  , tanggalterbit='".$tanggalterbit."'
  ";
  if ($sketsa<>'')
  {
  $sql=$sql."
  , sketsa='".$sketsa."' ";
  }
  
  if ($gambar_peta<>'')
  {
  $sql=$sql."
  , gambar_peta='".$gambar_peta."' ";
  }
  
  if ($lampiranptp<>'')
  {
  $sql=$sql."
  , lampiranptp='".$lampiranptp."' ";
  }
  
  if ($lampiranfpr<>'')
  {
  $sql=$sql."
  , lampiranfpr='".$lampiranfpr."' ";
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
  , ogc_geom_setuju = ".$fixkoordinat." ";
  }
  $sql=$sql."
  , updatedate=SYSDATE()
  , updateby='".$_COOKIE['oneid']."'
  where id ='".$tempkodeid."'
  ";
  //echo $sql;
  $result=mysqli_query($link,$sql);
  header ('Location: simtaru-d4t4nnonkkpr?ket=edit');
  exit;
  
  
?>