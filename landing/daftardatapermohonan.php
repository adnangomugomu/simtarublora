<?php 
include '../library/config.php'; 
date_default_timezone_set("Asia/Jakarta");
check_injection();
check_login();
$action=urlencode($_POST['action']);
$ket=urlencode($_GET['ket']);
$tempkodeid=$_POST['tempkodeid'];
if (($_POST['action']=='edit') || ($tempkodeid) || ($tempkodeid<>''))
{
	$sql="select * from si_permohonan where deleted='0' and id='".$tempkodeid."'";
	$result = mysqli_query ($link,$sql);
	if ($result)
	{
	while ($row=mysqli_fetch_array($result))
	{
	$kodeid=$row['id'];
	$nama=$row['nama'];
	$formattanggal= date_format(date_create($row['createddate']),'Ymd');
	$tanggalmohon=$row['createddate'];
	$registrasi=$formattanggal.str_pad($row['registrasi'], 3, '0', STR_PAD_LEFT);
	$nomorktp=$row['nomorktp'];
	$nomortelp=$row['nomortelp'];
	$alamat=$row['alamat'];
	$fc_ktp=$row['fc_ktp'];
	$fc_siup=$row['fc_siup'];
	$fc_kuasa=$row['fc_kuasa'];
	$gb_denah=$row['gb_denah'];
	$gb_lokasi=$row['gb_lokasi'];
	$fc_sertifikat=$row['fc_sertifikat'];
	$fc_rekomendasi=$row['fc_rekomendasi'];
	$fc_persetujuan=$row['fc_persetujuan'];
	$hasil=$row['hasil'];
	$keterangan=$row['keterangan'];
	$peruntukkanpermohonantataruang=$row['peruntukkanpermohonantataruang'];
	$tanggalsurvei=frommysqldate($row['tanggalsurvei']);
	$petugassurvei=$row['petugassurvei'];
	$luastanah=$row['luastanah'];
	$hasilsurvei=$row['hasilsurvei'];
	$sketsa=$row['sketsa'];
	$latitudesurvei=$row['latitudesurvei'];
	$templatitudesurvei=explode('|',$latitudesurvei);
    $jumlahkoordinat=1;
	$countlatitudesurvei=count($templatitudesurvei);
	if ($countlatitudesurvei > 1)
	{
		$jumlahkoordinat=$countlatitudesurvei;
	}
	$longitudesurvei=$row['longitudesurvei'];
	$templongitudesurvei=explode('|',$longitudesurvei);
	$countlongitudesurvei=count($templongitudesurvei);
	
	$fotosurvei=$row['fotosurvei'];
	$tempfotosurvei=explode('|',$fotosurvei);
    $jumlahfotosurvei=1;
	$countfotosurvei=count($tempfotosurvei);
	if ($countfotosurvei > 1)
	{
		$jumlahfotosurvei=$countfotosurvei;
	}

	}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judulWeb; ?></title>
  <link rel="shortcut icon" href="<?php echo $ikon ; ?>" >
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="gaya.css" type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
		<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

		<link href="css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/snippet/snippet.css" rel="stylesheet" type="text/css" />

        <!-- SELECT2 -->

        <link href="plugins/select2/select2.css" rel="stylesheet" type="text/css" />

        <link href="plugins/select2/select2-bootstrap.css" rel="stylesheet" type="text/css" />

        <!-- date picker -->

        <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />

        <!-- bootstrap wysihtml5 - text editor -->

        <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

		<!-- fullCalendar -->

        <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />

        <link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media="print" />

		<link href="css/login.css" rel="stylesheet" type="text/css" />
		<link href="css/css.css" rel="stylesheet">


<script src="landing/bootstrap.bundle.min.js"></script>
<script src="landing/jquery.min.js"></script>

    <link rel="stylesheet" href="landing/adi/ol.css" type="text/css">
	<link rel="stylesheet" href="landing/adi/ol3gm.css" type="text/css" />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE&libraries=places"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/place/autocomplete/xml?input=pasta&types=establishment&location=37.76999,-122.44696&radius=500&key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE"></script>

	<script src="landing/adi/ol3gm.js"></script>
	<script src="landing/adi/FileSaver.min.js"></script>		

<style type="text/css">
<!--

* {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

#grad1 {
    background-color: : #9C27B0;
    background-image: linear-gradient(120deg, #FF4081, #81D4FA)
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
	font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative;
	font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative;
	font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}


#msform .action-button {
    width: 100px;
    background: skyblue;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
	font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}

#msform .action-button:hover,
#msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
	font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 50%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: skyblue
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
    width: 100%;
    object-fit: cover
}

body {
    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 400;
	font-size: 12px;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
	letter-spacing: 2px;
	font-size: 12px;
}

.button {
    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}


input {
    font-family: 'Bookman Old Style', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}


nav.navbar li a {
  	font-family: 'Bookman Old Style', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}

p {
    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

div {
    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

button {
    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}


/* Input field */
.select2-selection__rendered { 

    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Around the search field */
.select2-search { 

    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Search field */
.select2-search input { 

    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Each result */
.select2-results { 

    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Higlighted (hover) result */
.select2-results__option--highlighted { 

    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Selected option */
.select2-results__option[aria-selected=true] { 

    font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
 
 
 #divLoading {
	display:none;

    /*set the div in the top-left corner of the screen*/
    position:absolute;
    top:0;
    left:0;
    background: white url(loading.gif) no-repeat;
    /*set the width and height to 100% of the screen*/
    width:100%;
    height:100%;
    z-index:999;
    opacity: 0.9; 
	filter: progid:DXImageTransform.Microsoft.Alpha(opacity=50);
	background-position: center center;
 }


.navbar .navbar-nav > .active{
  color: #000; background: black;
}
.navbar .navbar-nav > .active > a, 
.navbar .navbar-nav > .active > a:hover, 
.navbar .navbar-nav > .active > a:focus {
  color: #000;
  background: black;
}

#costumModallogin{
    height: 400px;
    top: calc(50% - 200px) !important;
}
-->

.ml2 {
  font-weight: 900;
  font-size: 2.0em;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1.5em;
}

.ml15 {
  font-weight: 800;
  font-size: 3.8em;
  
  letter-spacing: 0.5em;
}

.ml15 .word {
  display: inline-block;
  line-height: 1em;
}

textarea {
  width: 100%;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

#map{
    z-index:1;
    width:100%; height:80vh;
    top:0px; bottom:0;
	padding:6px;
}

#sampingkanan{
	min-height: 82vh;
}
.ol-popup {
    position: absolute;
    background-color: white;
    -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
    filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #cccccc;
    bottom: -45px;
    left: -50px;
}
.ol-popup:after, .ol-popup:before {
    top: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
.ol-popup:after {
    border-top-color: white;
    border-width: 10px;
    left: 48px;
    margin-left: -10px;
}
.ol-popup:before {
    border-top-color: #cccccc;
    border-width: 11px;
    left: 48px;
    margin-left: -11px;
}
.ol-popup-content {
    position: relative;
    min-width: 250px;
    min-height: 250px;
    height: 100%;
    max-height: 350px;
    padding:2px;
    white-space: normal;        
    background-color: #f7f7f9;
    border: 1px solid #e1e1e8;
    overflow-y: auto;
    overflow-x: hidden;
}
.ol-popup-content p{
    font-size: 14px;
    padding: 2px 4px;
    color: #222;
    margin-bottom: 15px;
}
.ol-popup-closer {
    position: absolute;
    top: -4px;
    right: 2px;
    font-size: 100%;
    color: #0088cc;
    text-decoration: none;
}
a.ol-popup-closer:hover{
    color: #005580;
    text-decoration: underline;
}
.ol-popup-closer:after {
    content: "✖";
}


</style>


</head>
<body class="hold-transition skin-green layout-top-nav" onLoad="AdiLoad()" oncontextmenu="return false;">
<div class="wrapper">

<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url(<?php echo $background ; ?>)">


    <!-- Main content -->
    <section class="content">
				
				<div class="row">
					<div class="col-md-12">
					<center>
					<h1 class="ml2" style="color:#000000;">DAFTAR PERMOHONAN INFORMASI TATA RUANG</h1>
					</center>
					<p>&nbsp;
					
					</p>
					<?php
					if (($_GET['ket']=='add') && (!$action))
					{
					?>
					<div class="col-md-10 col-md-offset-1">	
					<div class="alert alert-success alert-dismissable">
			
					<i class="fa fa-check"></i>
			
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			
					<b>Penambahan Berhasil</b> Data baru Telah ditambahkan.
			
					</div>
					</div>
					<?php
					}
					?>
					
					<?php
					if (($_GET['ket']=='edit') && (!$tempkodeid))
					{
					?>
					<div class="col-md-10 col-md-offset-1">	
					<div class="alert alert-info alert-dismissable">
			
					<i class="fa fa-check"></i>
			
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			
					<b>Update Berhasil</b> Data telah berhasil diupdate.
			
					</div>
					</div>
					<?php
					}
					?>
					<?php
					if (($_GET['ket']=='deleted') && (!$tempkodeid))
					{
					?>
					<div class="col-md-10 col-md-offset-1">	
					<div class="alert alert-danger alert-dismissable">
			
					<i class="fa fa-check"></i>
			
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			
					<b>Hapus Berhasil</b> Data telah berhasil dihapus.
			
					</div>
					</div>
					<?php
					}
					?>

					</div>
				</div>
				<?php
				if ((!$action) && (!$tempkodeid))
				{
				?>
				<div class="row" style="opacity:0.85;">
					<div class="col-md-10 col-md-offset-1">	
						<div class="box box-primary">
								<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
								  <div class="col-md-12">
								  <h3 class="box-title" id="namaurusan">DATA PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG</small></h3>
								  </div>
								  <div class="col-md-12">	
								  <div class="box-tools pull-right">
									<button class="btn btn-sm btn-warning btn-block" data-toggle="tooltip" data-placement="top" title="Tambah Data" onClick="tambah()" style="width:150px;"><i class="fa fa-plus"></i> Tambah</button>
								  </div>
								  </div>
								</div>
						
						<div id="no-more-tables" class="box-body table-responsive no-padding">
						<table class="table table-striped table-bordered table-hover">
						<thead class="cf">
						<tr style="background-color:#00a65a;color:#FFFFFF;">
						<th>No</th>
						<th>Registrasi</th>
						<th>Pemohon</th>
						<th>Nomor Telepon</th>
						<th>Alamat</th>
						<th>Tanggal</th>
						<th>Opsi</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
						<?php
						$sql="select a.* from si_permohonan a 
						where a.deleted='0' 
						";
						$sql=$sql."	order by a.createddate desc";
						$result = mysqli_query ($link,$sql);
						if ($result)
						{
						$i=1;
						while ($row=mysqli_fetch_array($result))
						{
						$kodeid=$row['id'];
						?>
						<tr>
							<td data-title="No">
							<?php echo $i; ?>
							</td>
							<td data-title="Registrasi">
							<?php 
							$formattanggal= date_format(date_create($row['createddate']),'Ymd');
							echo $formattanggal.str_pad($row['registrasi'], 3, '0', STR_PAD_LEFT); 
							?>
							</td>
							<td data-title="Pemohon">
							<?php echo $row['nama']; ?>
							</td>
							<td data-title="Nomor Telepon">
							<?php echo $row['nomortelp']; ?>
							</td>
							<td data-title="Alamat">
							<?php echo $row['alamat']; ?>
							</td>
							<td data-title="Tanggal">
							<?php echo tgl_indo($row['createddate']); ?>
							</td>
							<td data-title="Opsi">
							<form id="form<?php echo $i; ?>" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="tempkodeid" class="rounded" id="tempkodeid" value="<?php echo $kodeid; ?>">
							<input type="hidden" name="action" class="rounded" id="action" value="edit">
							<button class="btn btn-sm btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Lihat Data" onClick="this.form.submit()" style="width:150px;background-color:#00a65a;border:#00a65a;"><i class="fa fa-edit"></i> Lihat Data</button>
							</form>
							<form id="formsurvei<?php echo $i; ?>" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="tempkodeid" class="rounded" id="tempkodeid" value="<?php echo $kodeid; ?>">
							<input type="hidden" name="action" class="rounded" id="action" value="survei">
							<button class="btn btn-sm btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Input Data Survei" onClick="this.form.submit()" style="width:150px;background-color:#92d22b;border:#92d22b;"><i class="fa fa-map-marker"></i> Survei</button>
							</form>
							<button class="btn btn-sm btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Cetak Peta" onClick="cetakpeta('<?php echo encrypt($kodeid); ?>')" style="width:150px;background-color:#CC9966;border:#CC9966;"><i class="fa fa-print"></i> Cetak Peta</button>
							<form id="formhasil<?php echo $i; ?>" action="" method="post" enctype="multipart/form-data">
							<input type="hidden" name="tempkodeid" class="rounded" id="tempkodeid" value="<?php echo $kodeid; ?>">
							<input type="hidden" name="action" class="rounded" id="action" value="hasil">
							<button class="btn btn-sm btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Input Hasil Permohonan" onClick="this.form.submit()" style="width:150px;background-color:#39dee4;border:#39dee4;"><i class="fa fa-area-chart"></i> Hasil</button>
							</form>
							<form id="hapus<?php echo $i; ?>" action="simtaru-hapusdata" method="post" enctype="multipart/form-data">
							<input type="hidden" name="kodeid" class="rounded" id="kodeid" value="<?php echo $kodeid; ?>">
							<input type="hidden" name="proses" class="rounded" id="proses" value="2">
							<button class="btn btn-sm btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Hapus Data" onClick="this.form.submit()" style="width:150px;background-color:#ff0301;border:#ff0301;"><i class="fa fa-trash"></i> Hapus Data</button>
							</form>
							</td>
						</tr>
						<?php
						$i++;
						}
						}
						?>
						</table>	
						</div>
						
						</div>
					</div>
					
					
                </div>
				<?php
				}
				?>
				<?php
				if (($action) || ($tempkodeid) || ($tempkodeid<>''))
				{
				if ($action=='edit')
				{
				?>
				<div class="row" style="opacity:0.85;">
					<div class="col-md-10 col-md-offset-1">	
						<div class="box box-primary">
								<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
								  <h3 class="box-title" id="namaurusan">DATA PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG</small></h3>
								</div>
						<table class="table table-striped table-bordered table-hover">
						<thead class="cf">
						</thead>
						<tbody>
						</tbody>
						<tr>
							<td data-title="Nomor Registrasi">
							Nomor Registrasi
							</td>
							<td data-title="Nomor Registrasi">
							<?php echo $registrasi; ?>
							</td>
						</tr>
						<tr>
							<td data-title="Nomor KTP">
							Nomor KTP
							</td>
							<td data-title="Nomor KTP">
							<?php echo $nomorktp; ?>
							</td>
						</tr>
						<tr>
							<td data-title="Nama">
							Nama
							</td>
							<td data-title="Nama">
							<?php echo $nama; ?>
							</td>
						</tr>
						<tr>
							<td data-title="Alamat">
							Alamat
							</td>
							<td data-title="Alamat">
							<?php echo $alamat; ?>
							</td>
						</tr>
						<tr>
							<td data-title="Nomor Telepon">
							Nomor Telepon
							</td>
							<td data-title="Nomor Telepon">
							<?php echo $nomortelp; ?>
							</td>
						</tr>
						<tr>
							<td data-title="Fotocopy KTP">
							Fotocopy KTP
							</td>
							<td data-title="Fotocopy KTP">
							<?php
							if ($fc_ktp<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Fotocopy KTP" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $fc_ktp; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data KTP';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Fotocopy SIUP/TDP">
							Fotocopy SIUP/TDP
							</td>
							<td data-title="Fotocopy SIUP/TDP">
							<?php
							if ($fc_siup<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Fotocopy SIUP/TDP" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $fc_siup; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data Fotocopy SIUP/TDP';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Surat Kuasa Bermaterai (jika dikuasakan)">
							Surat Kuasa Bermaterai (jika dikuasakan)
							</td>
							<td data-title="Surat Kuasa Bermaterai (jika dikuasakan)">
							<?php
							if ($fc_kuasa<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Surat Kuasa Bermaterai (jika dikuasakan)" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $fc_kuasa; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Surat Kuasa Bermaterai (jika dikuasakan)';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Gambar Denah Lokasi / Peta Rencana Tambang">
							Gambar Denah Lokasi / Peta Rencana Tambang
							</td>
							<td data-title="Gambar Denah Lokasi / Peta Rencana Tambang">
							<?php
							if ($gb_denah<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Gambar Denah Lokasi / Peta Rencana Tambang" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $gb_denah; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data Gambar Denah Lokasi / Peta Rencana Tambang';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Foto Lokasi">
							Foto Lokasi
							</td>
							<td data-title="Foto Lokasi">
							<?php
							if ($gb_lokasi<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Foto Lokasi" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $gb_lokasi; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data Foto Lokasi';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Fotocopy sertifikat / petuk / bukti kepemilikan tanah / surat perjanjian sewa/ surat perjanjian jual-beli">
							Fotocopy sertifikat / petuk / bukti kepemilikan tanah / surat perjanjian sewa/ surat perjanjian jual-beli
							</td>
							<td data-title="Fotocopy sertifikat / petuk / bukti kepemilikan tanah / surat perjanjian sewa/ surat perjanjian jual-beli">
							<?php
							if ($fc_sertifikat<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Fotocopy sertifikat/petuk/bukti kepemilikan tanah/surat perjanjian sewa/ surat perjanjian jual-beli" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $fc_sertifikat; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data Fotocopy sertifikat / petuk / bukti kepemilikan tanah / surat perjanjian sewa/ surat perjanjian jual-beli';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Surat Rekomendasi / Persetujuan dari Kepala Desa yang diketahui Camat (Permohonan Pertambangan)">
							Surat Rekomendasi / Persetujuan dari Kepala Desa yang diketahui Camat (Permohonan Pertambangan)
							</td>
							<td data-title="Surat Rekomendasi / Persetujuan dari Kepala Desa yang diketahui Camat (Permohonan Pertambangan)">
							<?php
							if ($fc_rekomendasi<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Surat Rekomendasi / Persetujuan dari Kepala Desa yang diketahui Camat (Permohonan Pertambangan)" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $fc_rekomendasi; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data Surat Rekomendasi / Persetujuan dari Kepala Desa yang diketahui Camat (Permohonan Pertambangan)';
							}
							?>
							</td>
						</tr>
						<tr>
							<td data-title="Berita Acara Persetujuan Pemilik Lahan (Permohonan Pertambangan)">
							Berita Acara Persetujuan Pemilik Lahan (Permohonan Pertambangan)
							</td>
							<td data-title="Berita Acara Persetujuan Pemilik Lahan (Permohonan Pertambangan)">
							<?php
							if ($fc_persetujuan<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Berita Acara Persetujuan Pemilik Lahan (Permohonan Pertambangan)" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $fc_persetujuan; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							else
							{
								echo 'Tidak Ada Data Berita Acara Persetujuan Pemilik Lahan (Permohonan Pertambangan)';
							}
							?>
							</td>
						</tr>
						</table>
						<div class="box-footer" style="border:none;">
						<button type="button" class="btn btn-sm btn btn-warning" onClick="batal()" data-toggle="tooltip" data-placement="top" title="Tutup Detail Data Permohonan" style="width:100px;background-color:#f3c951;border:#f3c951;"><i class="fa fa-reply"></i> Tutup</button>
						</div>
						</div>
					</div>
				</div>
				
				<?php
				}
				else if ($action=='survei')
				{
				?>
				<form name="form" action="simtaru-simpandatapermohonan" method="post" enctype="multipart/form-data">
				<div class="row" style="opacity:0.85;">
					<div class="col-md-10 col-md-offset-1">	
						<div class="box box-primary">
								<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
								  <h3 class="box-title" id="namaurusan">DATA PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG</small></h3>
								</div>
						<div id="no-more-tables" class="box-body table-responsive no-padding">		
						<table class="table table-bordered table-hover">
						<thead class="cf">
						</thead>
						<tbody>
						</tbody>
						<tr>
							<td data-title="Data Pemohon" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="4">
							Data Pemohon
							</td>
						</tr>
						<tr>
							<td data-title="Nomor Registrasi" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Nomor Registrasi
							</td>
							<td data-title="Nomor Registrasi">
							<?php echo $registrasi; ?>
							</td>
							<td data-title="Tanggal Permohonan" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Tanggal Permohonan
							</td>
							<td data-title="Tanggal Permohonan">
							<?php echo tgl_indo($tanggalmohon); ?>
							</td>
						</tr>
						<tr>
							<td data-title="Nama Pemohon" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Nama Pemohon
							</td>
							<td data-title="Nama Pemohon">
							<?php echo $nama; ?>
							</td>
							<td data-title="Alamat" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Alamat
							</td>
							<td data-title="Alamat">
							<?php echo $alamat; ?>
							</td>
						</tr>
						</table>
						</div>
						<table class="table table-striped table-bordered table-hover">
						<tr>
							<td data-title="Lokasi Survei" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="4">
							Lokasi Survei
							</td>
						</tr>
						<tr>
							<td data-title="Peta" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="4">
							<div class="col-md-9">
							<div class="box box-widget">
							<div class="box-header with-border">
							  <div class="user-block">
								<img src="<?php echo $ikon; ?>" alt="User Image" height="30">
								<span class="username"><a href="#"><?php echo $judulWeb; ?></a></span>
								<span class="description">Peta Spasial</span>
							  </div>
				
							  <!-- /.user-block -->
							  <div class="box-tools">
								<button type="button" class="btn btn-box-tool" id="export-png" data-toggle="tooltip" title="Cetak Peta">
								  <i class="fa fa-print"></i> Cetak Peta</button>
				
								
							  </div>
							  <!-- /.box-tools -->
							</div>
							<!-- /.box-header -->

							<div id="divLoading"></div>
							<div class="box-body" id="map">
							  <div id="mouse-position" style="top:90px; right:20px; z-index:2;position:absolute;color:#FF0000;font-family:'Mangal',Verdana, Arial, Helvetica, sans-serif;"></div>
							  <div id="divMainLayer"></div>
							</div>
							</div>
							</div>
							<div class="col-md-3">
							  <div class="nav-tabs-custom" id="sampingkanan">
								<ul class="nav nav-tabs">
								  <li class="active"><a href="#activity" data-toggle="tab">Layer</a></li>
								  <li><a href="#timeline" data-toggle="tab">Pencarian</a></li>
								  <li><a href="#settings" data-toggle="tab">Setting</a></li>
								</ul>
								<div class="tab-content">
							   <div class="active tab-pane" id="activity">
									<!-- /.box-header -->
								<div class="box-body">
								  <!-- post text -->
								  
					
								  
								  <p>
								  <h6 class="attachment-heading"><b><a href="#">Indikator Sebaran</a></b></h6>
								  <div class="checkbox">
										<label style="color:#000000;">
										  <input type="checkbox" id="pola_ruang" name="pola_ruang">
										  Rencana Pola Ruang
										</label>
								 
								  </div>
								  <h6 class="attachment-heading"><b><a href="#">Keterangan</a></b></h6>
								  </p>
								  <table>
								  <?php
								  $sql="select PERUNTUKAN,fillku from rencana_pola_ruang group by PERUNTUKAN; ";
								  $result=mysqli_query($link,$sql);
								  if ($result)
								  {
									$i=1;
									while ($row=mysqli_fetch_array($result))
									{
									?>
									<tr>
									<td style="background-color:<?php echo $row['fillku']; ?>;padding:1px;" width="24px;">&nbsp;&nbsp;</td>
									<td valign="top" style="padding:1px;color:#000000;font-size:9px;"><?php echo $row['PERUNTUKAN']; ?></td>
									</tr>
									<?php 
									$i++;
									}
								  }
								  ?>
								  </table>
								  
								  <div class="box-footer box-comments">
								  <p>
								  <h6 class="attachment-heading"><b><a href="#">Lokasi Survei</a></b></h6>
								  <input type="hidden" name="koordinatpopup" id="koordinatpopup" value="" style="width:100%">
								  <input type="hidden" name="koordinatpopuphdms" id="koordinatpopuphdms" value="" style="width:100%">
								  <input type="text" name="koordinatku" id="koordinatku" value="" style="width:100%;display:none;color:#000000;">	
								  <form class="form-inline">
								  <select id="type" class="form-control " style="width:100%">
									<option value="None">Pilih Model Survei</option>
									<option value="length">Jarak</option>
									<option value="area">Luas</option>
								  </select>
								  </p>
								  <button type="button" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;width:100%;" onClick="klikku6()"><b>Hapus Lokasi Survei</b></button>
								  </form>
								  
								  <p>
								  <ol id="measureOutput" reversed style="color:#333333;display:block;" ></ol>
								  </p>
								  </div>
								  
								  </p>
						
								  
								  
								  
								  
								</div>
								<!-- /.box-body -->
								
								
								  </div>
								  <!-- /.tab-pane -->
								  <div class="tab-pane" id="timeline">
									
								  <p>
								  <h6 class="attachment-heading"><b><a href="#">Pencarian Koordinat Lokasi</a></b></h6>
								  <input class="rounded" id="searchTextField" placeholder="Masukkan nama lokasi yang dicari" type="text" style="color:#000000;">
								  <input class="rounded" id="city" type="text" size="47" style="font-family:Verdana;display:none;" style="color:#000000;">
								  <input class="rounded" id="latitude" placeholder="Latitude" type="text" size="10" onKeyPress="return isNumberKey(event)" style="color:#000000;">
								  <input class="rounded" id="longitude" placeholder="Longitude" type="text" size="10" onKeyPress="return isNumberKey(event)" style="color:#000000;">
								  <input class="rounded" id="location_id" type="text" size="47" style="font-family:Verdana;display:none;" style="color:#000000;">
								  <br>
								  <br>
								  <center>
								  <button type="button" class="btn btn-default" id="lariku" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;"><b>Ke Lokasi!!</b></button>
								  <button type="button" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;" onClick="clearku()"><b>Clear</b></button>
								  <button type="button" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;" onClick="klikku5()"><b>Hapus</b></button>
								  </center>
								  </p>
								  
								  
									
								  </div>
								  <!-- /.tab-pane -->
					
								  <div class="tab-pane" id="settings">
									
								  <div class="box-footer box-comments">
								  <p>
								  <h6 class="attachment-heading"><b><a href="#">Base Map</a></b></h6>
								  <div class="radio">
									<label>
									  <input type="radio" name="optionsRadios" id="radio1" value="1">
									  Google Map (ROADMAP)
									</label>
								  </div><br>
								  <div class="radio">
									<label>
									  <input type="radio" name="optionsRadios" id="radio6" checked="checked" value="6">
									  Google Map (Hybrid)
									</label>
								  </div><br>
								  <div class="radio">
									<label>
									  <input type="radio" name="optionsRadios" id="radio2" value="2">
									  MapQuest OSM
									</label>
								  </div><br> 
								  <div class="radio">
									<label>
									  <input type="radio" name="optionsRadios" id="radio3" value="3">
									  Bing Maps (Satellite)
									</label>
								  </div><br>
								  <div class="radio">
									<label>
									  <input type="radio" name="optionsRadios" id="radio4" value="4">
									  Esri
									</label>
								  </div><br>
								  <div class="radio">
									<label>
									  <input type="radio" name="optionsRadios" id="radio5" value="5">
									  Stamen
									</label>
								  </div> 			  
								  </p>
								  </div>
								  
								  
								  
									
								  </div>
								  <!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							  </div>
							  
					
							</div>
							<!-- /.col -->
							</td>
						</tr>
						</table>
						<div id="no-more-tables" class="box-body table-responsive no-padding">
						<table class="table table-striped table-bordered table-hover">
						<tr>
							<td data-title="Data Survei" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="4">
							Data Survei
							</td>
						</tr>
						<tr>
							<td data-title="Permohoanan Tata Ruang" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Permohonan Tata Ruang
							</td>	
							<td data-title="Permohoanan Tata Ruang" colspan="3">
							<input type="text" name="peruntukkanpermohonantataruang" class="rounded" id="peruntukkanpermohonantataruang" placeholder="Permohonan Tata Ruang" value="<?php echo $peruntukkanpermohonantataruang; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Permohonan Tata Ruang" required>
							</td>	
						</tr>
						<tr>
							<td data-title="Tanggal Survei" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Tanggal Survei
							</td>
							<td data-title="Tanggal Survei">
							<div class="input-group date">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" name="tanggalsurvei" class="form-control pull-right" id="tanggalsurvei" data-toggle="tooltip" data-placement="top" title="Masukkan Tanggal Survei" value="<?php echo $tanggalsurvei; ?>" required>
							</div>
							</td>
							<td data-title="Petugas Survei" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Petugas Survei
							</td>
							<td data-title="Petugas Survei">
							<input type="text" name="petugassurvei" class="rounded" id="petugassurvei" placeholder="Petugas Survei" value="<?php echo $petugassurvei; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Petugas Survei" required>
							</td>
						</tr>
						<tr>
							<td data-title="Luas Tanah" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Luas Tanah (m<sup>2</sup>)
							</td>
							<td data-title="Luas Tanah">
							<input type="text" name="luastanah" class="rounded" id="luastanah" placeholder="Luas Tanah" value="<?php echo $luastanah; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Luas Tanah" onKeyPress="return isNumberKey(event)" required>
							</td>
							<td data-title="Hasil Survei" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Hasil Survei
							</td>
							<td data-title="Hasil Survei">
							<textarea class="rounded" rows="4" name="hasilsurvei" id="hasilsurvei" data-toggle="tooltip" data-placement="top" title="Masukkan Hasil Survei" required><?php echo $hasilsurvei; ?></textarea>
							</td>
						</tr>
						<tr>
							<td data-title="Sketsa Survei" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Sketsa Survei
							</td>	
							<td data-title="Sketsa Survei" colspan="3">
							<input type="file" name="sketsa" class="rounded" id="sketsa" placeholder="Sketsa Survei" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Sketsa Survei" onChange="cekfile('sketsa',this.value)">
							<?php
							if ($sketsa<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Sketsa Survei" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $sketsa; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							?>
							</td>	
						</tr>
						</table>
						<table class="table table-bordered table-hover" id="1">
						<tr>
							<td data-title="Koordinat Dimohon" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="5">
							 Koordinat Dimohon
							 <input type="hidden" name="jumlahrowkoordinat" class="rounded" id="jumlahrowkoordinat" value="<?php echo $jumlahkoordinat; ?>">
							</td>
						</tr>
						<tr>
							<td data-title="Latitude" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Latitude
							</td>
							<td data-title="Latitude">
							<input type="text" name="latitudesurvei[]" class="rounded" id="latitudesurvei" placeholder="Latitude" value="<?php echo $templatitudesurvei[0]; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Latitude" onKeyPress="return isNumberKey(event)" required>
							</td>
							<td data-title="Longitude" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Longitude
							</td>
							<td data-title="Longitude">
							<input type="text" name="longitudesurvei[]" class="rounded" id="longitudesurvei" placeholder="Longitude" value="<?php echo $templongitudesurvei[0]; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Longitude" onKeyPress="return isNumberKey(event)" required>&nbsp;
							</td>
							<td data-title="Hapus Koordinat">
							<i class="fa fa-plus-square fa-2x" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Tambah Koordinat" onClick="addRow(1)"></i> 
							</td>
						</tr>
						<?php
						for ($i = 1; $i <= $countlatitudesurvei-1; $i++) {
						?>
						<tr>
							<td data-title="Latitude" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Latitude
							</td>
							<td data-title="Latitude">
							<input type="text" name="latitudesurvei[]" class="rounded" id="latitudesurvei" placeholder="Latitude" value="<?php echo $templatitudesurvei[$i]; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Latitude" onKeyPress="return isNumberKey(event)" required>
							</td>
							<td data-title="Longitude" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Longitude
							</td>
							<td data-title="Longitude">
							<input type="text" name="longitudesurvei[]" class="rounded" id="longitudesurvei" placeholder="Longitude" value="<?php echo $templongitudesurvei[$i]; ?>" data-toggle="tooltip" data-placement="top" title="Masukkan Longitude" onKeyPress="return isNumberKey(event)" required>&nbsp;
							</td>
							<td data-title="Tambah Koordinat">
							<i class="fa fa-minus-square fa-2x" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Hapus Koordinat" onClick="deletedRowkoordinat(1,<?php echo $i+1; ?>)"></i> 
							</td>
						</tr>
						<?php
						}
						?>
						</table>
						<table class="table table-bordered table-hover" id="2">
						<tr>
							<td data-title="Foto Survei" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="5">
							 Foto Survei
							 <input type="hidden" name="jumlahrowsurvei" class="rounded" id="jumlahrowsurvei" value="<?php echo $jumlahfotosurvei; ?>">
							</td>
						</tr>
						<tr>
							<td data-title="Foto Survei" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Foto Survei
							</td>	
							<td data-title="Foto Survei" colspan="3">
							<input type="file" name="fotosurvei[]" class="rounded" id="fotosurvei" placeholder="Foto Survei" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Foto Survei" onChange="cekfile('fotosurvei',this.value)">
							<?php
							if ($tempfotosurvei[0]<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Sketsa Survei" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $tempfotosurvei[0]; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							?>
							
							</td>	
							<td data-title="Tambah Foto Survei" >
							<i class="fa fa-plus-square fa-2x" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Tambah Foto Survei" onClick="addRowFoto(2)"></i> 
							</td>
						</tr>
						<?php
						for ($i = 1; $i <= $countfotosurvei-1; $i++) {
						?>
						<tr>
							<td data-title="Foto Survei" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Foto Survei
							</td>	
							<td data-title="Foto Survei" colspan="3">
							<input type="file" name="fotosurvei[]" class="rounded" id="fotosurvei<?php echo $i; ?>00" placeholder="Foto Survei" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Foto Survei" onChange="cekfile('fotosurvei<?php echo $i; ?>00',this.value)" >
							<?php
							if ($tempfotosurvei[$i]<>'')
							{
							?>
							<button type="button" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Unduh Sketsa Survei" style="width:150px;background-color:#92d22b;border:#92d22b;" onClick="DownloadFile('<?php echo $tempfotosurvei[$i]; ?>')"><i class="fa fa-download"></i> Unduh Data</button>
							<?php
							}
							?>
							</td>	
							<td data-title="Tambah Foto Survei" >
							<i class="fa fa-minus-square fa-2x" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Hapus Foto Survei" onClick="deletedRowfoto(2,<?php echo $i+1; ?>)"></i> 
							</td>
						</tr>
						<?php
						}
						?>
						</table>
						</div>
						<div class="box-footer" style="border:none;" align="center">
						<input type="hidden" name="tempkodeid" class="rounded" id="tempkodeid" value="<?php echo $tempkodeid; ?>">
						<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Simpan Data" style="width:100px;background-color:#00a65a;border:#00a65a;"><i class="fa fa-archive"></i> Simpan</button>
						<button type="button" class="btn btn-sm btn btn-warning" onClick="batal()" data-toggle="tooltip" data-placement="top" title="Batal Input Survei" style="width:100px;background-color:#f3c951;border:#f3c951;"><i class="fa fa-reply"></i> Batal</button>
						</div>
						</div>
					</div>
				</div>
				</form>
				<?php 
				}
				else
				{
				?>
				<form name="form" action="simtaru-simpanhasilpermohonan" method="post" enctype="multipart/form-data">
				<div class="row" style="opacity:0.85;">
					<div class="col-md-10 col-md-offset-1">	
						<div class="box box-primary">
								<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
								  <h3 class="box-title" id="namaurusan">HASIL PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG</small></h3>
								</div>
						<div id="no-more-tables" class="box-body table-responsive no-padding">		
						<table class="table table-bordered table-hover">
						<thead class="cf">
						</thead>
						<tbody>
						</tbody>
						<tr>
							<td data-title="Data Pemohon" style="background-color:#333333;color:#FFFFFF;border:#333333;" colspan="4">
							Data Pemohon
							</td>
						</tr>
						<tr>
							<td data-title="Nomor Registrasi" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Nomor Registrasi
							</td>
							<td data-title="Nomor Registrasi">
							<?php echo $registrasi; ?>
							</td>
							<td data-title="Tanggal Permohonan" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Tanggal Permohonan
							</td>
							<td data-title="Tanggal Permohonan">
							<?php echo tgl_indo($tanggalmohon); ?>
							</td>
						</tr>
						<tr>
							<td data-title="Nama Pemohon" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Nama Pemohon
							</td>
							<td data-title="Nama Pemohon">
							<?php echo $nama; ?>
							</td>
							<td data-title="Alamat" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Alamat
							</td>
							<td data-title="Alamat">
							<?php echo $alamat; ?>
							</td>
						</tr>
						<tr>
							<td data-title="Hasil Permohonan" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Hasil Permohonan
							</td>
							<td data-title="Hasil Permohonan">
							<select name="hasil" id="hasil" name="hasil"  class="form-control select2" required>
							<?php 
							$sql = "select * from si_m_hasil where deleted = '0' order by id asc";
							$result = mysqli_query ($link,$sql);
							if ($result) {
								while ($row = mysqli_fetch_array ($result)) {
									$idsifat=$row['id'];
									$namasifat=$row['nama'];
									?>
							<option value="<?php echo $idsifat; ?>" <?php if ($idsifat==$hasil) { ?> selected="selected" <?php } ?> ><?php echo $namasifat; ?></option>
							
							<?php
								}
							}
							?>
							</select>
							</td>
							<td data-title="Keterangan" style="background-color:#66CC99;color:#FFFFFF;border:#66CC99;">
							Keterangan
							</td>
							<td data-title="Keterangan">
							<textarea class="rounded" rows="4" name="keterangan" id="keterangan" data-toggle="tooltip" data-placement="top" title="Masukkan Keterangan Hasil Permohonan" required><?php echo $keterangan; ?></textarea>
							</td>
						</tr>
						</table>
						</div>
						<div class="box-footer" style="border:none;" align="center">
						<input type="hidden" name="tempkodeid" class="rounded" id="tempkodeid" value="<?php echo $tempkodeid; ?>">
						<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Simpan Data" style="width:100px;background-color:#00a65a;border:#00a65a;"><i class="fa fa-archive"></i> Simpan</button>
						<button type="button" class="btn btn-sm btn btn-warning" onClick="batal()" data-toggle="tooltip" data-placement="top" title="Batal Input Survei" style="width:100px;background-color:#f3c951;border:#f3c951;"><i class="fa fa-reply"></i> Batal</button>
						</div>
						</div>
					</div>
				</div>
				<?php 
				}
				?>
				
				<?php 
				}
				?>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
<?php include 'footer.php'; ?>

</div>
<!-- ./wrapper -->



<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->

<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="plugins/chartjs1/Chart.bundle.js"></script>
<!-- page script -->
<script>
  $(function () {
	
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
	
	//Date picker
    $('#tanggalsurvei').datepicker({
      format: "dd/mm/yyyy",

				language: "id",

				autoclose: true,

				todayHighlight: true

    });

    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
	
	$('[data-toggle="tooltip"]').tooltip()

	
  });
  
</script>


<script type="text/javascript">
//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<script src="js/velocity.min.js"></script>
<script src="js/velocity.ui.min.js"></script>
<script src="js/index.js"></script>

<script type="text/javascript">
	function tambah()
	{
		window.location='simtaru-tambahdata';
	}
	function batal()
	{
		window.location='simtaru-daftardatapermohonan';
	}
</script>
<script src="js/anime.min.js"></script>

<script>
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 950,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
  
anime.timeline({loop: true})
  .add({
    targets: '.ml15 .word',
    scale: [14,1],
    opacity: [0,1],
    easing: "easeOutCirc",
    duration: 2950,
    delay: (el, i) => 2950 * i
  }).add({
    targets: '.ml15',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });  
  
</script>

    <script type="text/javascript">
        function DownloadFile(fileName) {
            //Set the File URL.
            var url = "upload/" + fileName;
 
            //Create XMLHTTP Request.
            var req = new XMLHttpRequest();
            req.open("GET", url, true);
            req.responseType = "blob";
            req.onload = function () {
                //Convert the Byte Data to BLOB object.
                var blob = new Blob([req.response], { type: "application/octetstream" });
 
                //Check the Browser type and download the File.
                var isIE = false || !!document.documentMode;
                if (isIE) {
                    window.navigator.msSaveBlob(blob, fileName);
                } else {
                    var url = window.URL || window.webkitURL;
                    link = url.createObjectURL(blob);
                    var a = document.createElement("a");
                    a.setAttribute("download", fileName);
                    a.setAttribute("href", link);
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }
            };
            req.send();
        };
    </script>

    <script src="landing/adi/ol.js" type="text/javascript"></script>
    <script src="landing/adi/ol-popup.js"></script>

<script>

var customStyleLokasi = new ol.style.Style({
        image: new ol.style.Icon({
          anchor: [0.5, 0.5],
          size: [150, 150],
          offset: [0, 0],
          opacity: 1,
          scale: 0.25,
          src: 'landing/img/marker.png'
		  
        }),
		text: new ol.style.Text({
          text: '',
          fill: new ol.style.Fill({color: 'black'}),
          stroke: new ol.style.Stroke({color: 'yellow', width: 1}),
          offsetX: -20,
          offsetY: 20
		 })
      });

	  

function addMainLayerPoint(mytable,mystyle,mycheck,myvec){
				//alert("ccc");
				$.ajax({
                    type: "GET",
                    url:"landing/getLayerPoint.php",
                    data: { table: mytable, styleku: mystyle, checkku: mycheck, vecku: myvec},
                    beforeSend:function() {
						
                        
                    },
                    success:function(result){
                        $("#divMainLayer").html(result);
                        processLayer();
						
                       
                  }});
}

function removeFeatures(id) {
	var features = id.getFeatures();
	for(var i=0; i< features.length && i<10000; i++) {
		id.removeFeature(features[i]);

	}
}

function addMainLayerMap_Label(mytable,mytampil,mysource){
popup.hide();
$.ajax({
	type: "GET",
	url:"landing/getLayerMap_Label.php",
	data: { table: mytable, tampil: mytampil, source: mysource},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLayer();
		document.getElementById("divLoading").style.display = "none"; 
	   
  }});
  
}


function addMainLayerMap_LabelPermohonan(mytable,mytampil,mysource){
popup.hide();
$.ajax({
	type: "GET",
	url:"landing/getLayerMap_LabelPermohonan.php",
	data: { table: mytable, tampil: mytampil, source: mysource},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLayer();
		document.getElementById("divLoading").style.display = "none"; 
	   
  }});
  
}



function addMainLayerMap_Label_Filter(mytable,mytampil,mysource,myfilter,myfieldku){
popup.hide();
$.ajax({
	type: "GET",
	url:"landing/getLayerMap_Label_Filter.php",
	data: { table: mytable, tampil: mytampil, source: mysource, filter: myfilter, fieldku: myfieldku},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLayer();
		document.getElementById("divLoading").style.display = "none"; 
	   
  }});
  
}


function addMainLayerMap(mytable,mytampil,mysource){
popup.hide();
$.ajax({
	type: "GET",
	url:"landing/getLayerMap.php",
	data: { table: mytable, tampil: mytampil, source: mysource},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLayer();
		document.getElementById("divLoading").style.display = "none"; 
	   
  }});
  
}



function addLogin(myuser,mypass){
//popup.hide();
var myuser=document.getElementById("username").value;
var mypass=document.getElementById("password").value;

if (myuser==="")
{
	alert("Harap Isikan username..");
	return false;
}
if (mypass==="")
{
	alert("Harap Isikan password..");
	return false;
}

$.ajax({
	type: "GET",
	url:"getLoginMap.php",
	data: { userku: myuser, passku: mypass},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLogin();
		document.getElementById("divLoading").style.display = "none"; 
		document.location.reload();
	   
  }});
  
}


var hybridku = new ol.layer.Tile({
        'title': 'Google Maps Uydu',
        'type': 'base',
         visible: true,
        'opacity': 1.000000,
         source: new ol.source.XYZ({
         attributions: [new ol.Attribution({ html: '<a href=""></a>' })],
         url: 'http://mt0.google.com/vt/lyrs=y&hl=en&x={x}&y={y}&z={z}&s=Ga'
         })
});

var bingku = new ol.layer.Tile({
              preload: 0, // default value
              source: new ol.source.BingMaps({
              key: 'YcHsPRIl55DObJxVZHeO~Uv5_7jLMz9SXEQRXcK6hmQ~Aqax40e1y3NgVz7T3txCRt7TAsWpwON5ZTnVosELPPSbFo4i8KqtoBls159gL7xz',
              imagerySet: 'AerialWithLabels'
             })
            });
var attribution = new ol.Attribution({
  				html: 'Tiles &copy; <a href="http://services.arcgisonline.com/ArcGIS/' +
      					'rest/services/World_Topo_Map/MapServer">ArcGIS</a>'
			});
			
var esriku = new ol.layer.Tile({
      			source: new ol.source.XYZ({
        		attributions: [attribution],
        		url: 'http://server.arcgisonline.com/ArcGIS/rest/services/' +
            	'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
      			})
    		});
var osmku = new ol.layer.Tile({
            	source: new ol.source.OSM()
          	});
			
var stamenku = new ol.layer.Tile({
            	source: new ol.source.Stamen({
       	 		layer: 'watercolor'
      			})
          	});
			
var stamenkulabel = new ol.layer.Tile({
            	source: new ol.source.Stamen({
       	 		layer: 'terrain-labels'
      			})
          	});

var googleku = new ol.layer.Tile({
                        //source: new ol.source.OSM()
						
						source: new ol.source.OSM({
                			url: 'http://mt{0-3}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
                			attributions: [
                    			new ol.Attribution({ html: '© Google' }),
                    			new ol.Attribution({ html: '<a href="https://developers.google.com/maps/terms"><?php echo $judul; ?></a>' })
                			]
            			})
             });

var olview = new ol.View({
    center: ol.proj.transform([109.392347, -7.027497], 'EPSG:4326', 'EPSG:3857'),
	minZoom: 2,
    maxZoom: 19,
    zoom: 10
}); 

var scaleLineControl = new ol.control.ScaleLine();

var scaleLineZoom = new ol.control.Zoom();

			
var mousePositionControl = new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.createStringXY(4),
  projection: 'EPSG:4326',
  // comment the following two lines to have the mouse position
  // be placed within the map.
  className: 'custom-mouse-position',
  target: document.getElementById('mouse-position'),
  undefinedHTML: '&nbsp;'
});

var vectorSourceLokasi = new ol.source.Vector({
	projection: 'EPSG:4326'
}); 

var vectorLayerLokasi = new ol.layer.Vector({
	source: vectorSourceLokasi
});

var sourceFeatures = new ol.source.Vector(),
    layerFeatures = new ol.layer.Vector({source: sourceFeatures});
	
var sourceFeaturesSurvei = new ol.source.Vector(),
    layerFeaturesSurvei = new ol.layer.Vector({source: sourceFeaturesSurvei});	
	
	
var source = new ol.source.Vector();

var vector = new ol.layer.Vector({
  source: source,
  style: new ol.style.Style({
    fill: new ol.style.Fill({
      color: 'rgba(255, 255, 255, 0.2)'
    }),
    stroke: new ol.style.Stroke({
      color: '#ffcc33',
      width: 2
    }),
    image: new ol.style.Circle({
      radius: 7,
      fill: new ol.style.Fill({
        color: '#ffcc33'
      })
    })
  })
});


/**
 * Currently drawed feature
 * @type {ol.Feature}
 */
var sketch;
sketch=null;


/**
 * Element for currently drawed feature
 * @type {Element}
 */
var sketchElement;
sketchElement=null;


var sketch1;
sketch1=null;


/**
 * Element for currently drawed feature
 * @type {Element}
 */
var sketchElement1;
sketchElement1=null;


var sketchadi;
sketchadi = "selesai" ;


/**
 * handle pointer move
 * @param {Event} evt
 */



var map = new ol.Map({
	controls: [scaleLineControl,mousePositionControl,scaleLineZoom,new ol.control.OverviewMap()],

    target: document.getElementById('map'),
    loadTilesWhileAnimating: true,
    loadTilesWhileInteracting: true,
    view: olview,
    renderer: 'canvas',
    layers: [
      googleku,bingku,esriku,osmku,stamenku,stamenkulabel,hybridku,
	  layerFeatures,vectorLayerLokasi,vector,layerFeaturesSurvei
    ]
});

osmku.setVisible(false);
stamenku.setVisible(false);
stamenkulabel.setVisible(false);
esriku.setVisible(false);
bingku.setVisible(false);
googleku.setVisible(false);
hybridku.setVisible(true);


var popup = new ol.Overlay.Popup;
popup.setOffset([0, -55]);
map.addOverlay(popup);

map.on('dblclick', function(evt) {
	sketchadi='selesai';
});

map.on('click', function(evt) {
	
	var content = '<div id="Adi"></div>';
	popup.hide();
	//document.getElementById("boxku4").style.display  = "none";
	var f = map.forEachFeatureAtPixel(
        evt.pixel,
        function(ft, layer)
		{
		
			//alert(sketchadi);
			//var geometry = f.getGeometry();
			popup.hide();
			
			//alert(sketchadi);
			//sketchadi = "selesai";
			var coord = evt.coordinate;
			var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
            coord, 'EPSG:3857', 'EPSG:4326'));
			var xy = ol.coordinate.toStringXY(ol.proj.transform(
            coord, 'EPSG:3857', 'EPSG:4326'),5);
			//alert("aaa");
			
			//alert(ft.getId());
			//document.getElementById("measureOutput").innerHTML='<div id="Adi"></div>';
			var lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
			var lon = lonlat[0];
			var lat = lonlat[1];
			//alert(lon+" "+lat);
			document.getElementById('koordinatku').value=document.getElementById('koordinatku').value+" , "+lon+" "+lat;
			
			if (ft.getId() === undefined)
			{
			//alert('tes');
			var content = '<div id="Adi">'+getKonten('',xy,document.getElementById("measureOutput").innerHTML,document.getElementById('koordinatku').value)+'</div>';
			}
			else
			{
			var content = '<div id="Adi">'+getKonten(ft.getId(),xy,hdms,document.getElementById('koordinatku').value)+'</div>';
			
			}
			
			if (sketchadi=='selesai')
			{
			popup.show(coord, content);	
			document.getElementById('koordinatpopup').value=xy;
			document.getElementById('koordinatpopuphdms').value=hdms;
			return ft;
			}
			
		}
    );
	
    
    
});

document.getElementById('export-png').addEventListener('click', function() {
  map.once('postcompose', function(event) {
    var canvas = event.context.canvas;
    event.context.textAlign = 'right';
    event.context.fillText('© '+'<?php echo date("Y"); ?> <?php echo $judul; ?>', canvas.width - 5, canvas.height - 5);
    canvas.toBlob(function(blob) {
      saveAs(blob, 'map.png');
    });
  });
  map.renderSync();
});


</script>

<script>

function AdiLoad() {
document.getElementById("measureOutput").innerHTML="";
document.getElementById("koordinatku").value = "";
		
var mouseMoveHandler = function(evt) {
  if (sketch) {
    var output;
    var geom = (sketch.getGeometry());
    if (geom instanceof ol.geom.Polygon) {
      output = formatArea(/** @type {ol.geom.Polygon} */ (geom));

    } else if (geom instanceof ol.geom.LineString) {
      output = formatLength( /** @type {ol.geom.LineString} */ (geom));
    }
    sketchElement.innerHTML = output;
  }
  
  
};

$('#zoom2').click(function(){
	var view = map.getView();
    var zoom = view.getZoom();
    view.setZoom(zoom - 1);
});
$('#zoom1').click(function(){
	var view = map.getView();
    var zoom = view.getZoom();
    view.setZoom(zoom + 1);
	//alert(map.getView().getZoom());
});

$('#radio1').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(true);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(false);
		hybridku.setVisible(false);
		
		
	}
	
});

$('#radio2').click(function(){
	if (this.checked) {
		osmku.setVisible(true);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(false);
		hybridku.setVisible(false);
		
		
	}
	
});

$('#radio3').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(true);
		esriku.setVisible(false);
		hybridku.setVisible(false);
		
	}
	
});

$('#radio4').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(true);
		hybridku.setVisible(false);
		
	}
	
});

$('#radio5').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(true);
		stamenkulabel.setVisible(true);
		bingku.setVisible(false);
		esriku.setVisible(false);
		hybridku.setVisible(false);
		
	}
	
});


$('#radio6').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(false);
		hybridku.setVisible(true);
		
	}
	
});

	  var input = document.getElementById('searchTextField');
	  var autocomplete = new google.maps.places.Autocomplete(input);
	  google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById("city").value = val;
        }
      }
      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;
      document.getElementById("location_id").value = placeId;
	  				var satu=parseFloat(document.getElementById("longitude").value);
					var dua=parseFloat(document.getElementById("latitude").value);
					//alert (satu);
					//alert (dua);
					addMainLayerPoint('','customStyleLokasi',satu,dua);
					map.getView().setCenter(ol.proj.transform([satu, dua], 'EPSG:4326', 'EPSG:3857'));
					map.getView().setZoom(16);
    });

$('#lariku').click(function(){
					var satu=parseFloat(document.getElementById("longitude").value);
					var dua=parseFloat(document.getElementById("latitude").value);
					var aa=document.getElementById("longitude").value;
					var bb=document.getElementById("latitude").value;
					if (aa==null || aa=="",bb==null || bb=="")
      				{
      					alert("Isikan Longitude dan Latitude");
      					return false;
      				}
					//alert (aa);
					//alert (bb);
					
					addMainLayerPoint('','customStyleLokasi',satu,dua);
					
					map.getView().setCenter(ol.proj.transform([satu, dua], 'EPSG:4326', 'EPSG:3857'));
					map.getView().setZoom(16);
					klikku4();
					
				});	



$('#pola_ruang').click(function(){
	if (document.getElementById("pola_ruang").checked==true) 
	{
		//alert('klik');
		addMainLayerMap_Label('one_peta','rencana_pola_ruang','sourceFeatures');
		document.getElementById("koordinatku").value = "";
	}
	else
	{
		//alert('unklik');
		removeFeatures(sourceFeatures);
		document.getElementById("koordinatku").value = "";
	}
	
});	

map.on('pointermove', function(e) {
    if (e.dragging) { popup.hide(); return; }
    
    var pixel = map.getEventPixel(e.originalEvent);
    var hit = map.hasFeatureAtPixel(pixel);
    
    map.getTarget().style.cursor = hit ? 'pointer' : '';
});

$(map.getViewport()).on('mousemove', mouseMoveHandler);

var typeSelect = document.getElementById('type');


var draw; // global so we can remove it later



function addInteraction() {
  //var type = (typeSelect.value == 'area' ? 'Polygon' : 'LineString');
  if (typeSelect.value === 'Square') {
      type = 'Circle';
  }
  else if (typeSelect.value === 'area')
  {
  	type = 'Polygon';
  }
  else if (typeSelect.value === 'length')
  {
  	type = 'LineString';
  }

  
  draw = new ol.interaction.Draw({
    source: source,
    type: /** @type {ol.geom.GeometryType} */ (type)
  });
  map.addInteraction(draw);

  draw.on('drawstart',
      function(evt) {
        // set sketch
		document.getElementById("measureOutput").innerHTML="";
        sketch = evt.feature;
        sketchElement = document.createElement('li');
		sketchadi = "mulai" ;
        var outputList = document.getElementById('measureOutput');

        if (outputList.childNodes) {
          outputList.insertBefore(sketchElement, outputList.firstChild);
        } else {
          outputList.appendChild(sketchElement);
        }
      }, this);

  draw.on('drawend',
      function(evt) {
        // unset sketch
        sketch = evt.feature;
        sketchElement = null;
		sketchadi = "mulai" ;
		map.removeInteraction(draw);
		//document.getElementById("type").value="None";
		
		document.getElementById('type').innerText = null;
		
		$('#type')
		.find('option')
		.remove()
		.end()
		.append('<option value="None">Pilih Model Survei</option>')
		.append('<option value="length">Jarak</option>')
		.append('<option value="area">Luas</option>')
		.val('None')
		;
		
		$("#type").val($("#type option:first").val());
		$("#type option:first").attr('selected','selected');
		$('#type option:first').prop('selected', true);
		
      }, this);
	  
	  
	  
	  
}





/**
 * Let user change the geometry type.
 * @param {Event} e Change event.
 */
typeSelect.onchange = function(e) {
  map.removeInteraction(draw);
  klikku4();
  var isi=document.getElementById('type').value;
  if (isi=="None")
  {
  document.getElementById("koordinatku").value = "";
  document.getElementById("measureOutput").innerHTML="";
  removeFeatures(vectorSourceLokasi);
  source.clear();
  map.removeInteraction(draw);
  }
  else
  {
  document.getElementById("koordinatku").value = "";
  document.getElementById("measureOutput").innerHTML="";
  removeFeatures(vectorSourceLokasi);
  source.clear();
  addInteraction();
  }
};


/**
 * Let user change the geometry type.
 * @param {Event} e Change event.
 */


/**
 * format length output
 * @param {ol.geom.LineString} line
 * @return {string}
 */
var formatLength = function(line) {
  var length = Math.round(line.getLength() * 100) / 100;
  var output;
  if (length > 100) {
    output = 'Panjang = ' +(Math.round(length / 1000 * 100) / 100) +
        ' ' + 'km';
  } else {
    output = 'Panjang = ' +(Math.round(length * 100) / 100) +
        ' ' + 'm';
  }
  return output;
};


/**
 * format length output
 * @param {ol.geom.Polygon} polygon
 * @return {string}
 */
var formatArea = function(polygon) {
  var area = polygon.getArea();
  var output;
  if (area > 10000) {
    output = 'Luas = ' +(Math.round(area / 1000000 * 100) / 100) +
        ' ' + 'km<sup>2</sup>';
  } else {
    output = 'Luas = ' +(Math.round(area * 100) / 100) +
        ' ' + 'm<sup>2</sup>';
  }
  return output;
};

addInteraction();
map.removeInteraction(draw);




}
</script>
<script>
function GetXmlHttpObject() {
  var xmlHttp=null;
  try {
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
  } catch (e) {
    // Internet Explorer
    try {
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return xmlHttp;
}
</script>


<script>
function getKonten(str,str1,str2,str3)
  {
  //alert("");	
  xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null) {
    alert ("Your browser does not support AJAX!");
    return;
  } 
  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
  var url="landing/getKonten2.php";
  url=url+"?no1="+str+"&no2="+str1+"&no3="+str2+"&no4="+str3;
  xmlHttp.onreadystatechange=kontenChanged;
  xmlHttp.open("GET",url,true); 
  //alert("hahahahaha");
  xmlHttp.send(null);
	//document.cookie = 'CookieTahunwilayah='+selValue;
  
  }
</script>

<script>
function kontenChanged() { 

	document.getElementById("loadingstat").innerHTML="";
    document.getElementById("Adi").innerHTML=xmlHttp.responseText;
}
</script>

<SCRIPT>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 45 || charCode > 57))
             return false;

          //alert(charCode);
		  return true;
       }
       //-->
</SCRIPT>

<script>
function klikku4()
{
	popup.hide();
	//if (document.getElementById("boxku4").style.display  == "none" )
	//{
	//	document.getElementById("boxku4").style.display  = "block";
		//document.getElementById("divLoading1").style.display = "block";
	//}
	//else
	//{
	//	document.getElementById("boxku4").style.display  = "none";
		//document.getElementById("divLoading1").style.display = "none";
	//}
	

}
</script>
<script>
function clearku()
{
	document.getElementById("latitude").value = "";
    document.getElementById("longitude").value = "";
}
</script>
<script>
function klikku5()
{
	
	document.getElementById("koordinatku").value = "";
	removeFeatures(vectorSourceLokasi);
	source.clear(); 

}
</script>


<script>
function klikku6()
{
	
	document.getElementById("koordinatku").value = "";
	document.getElementById("measureOutput").innerHTML="";
	removeFeatures(vectorSourceLokasi);
	source.clear(); 

}
</script>

<script>
function addbutton(str) {
  //Create an input type dynamically.   
  var btn = document.createElement("BUTTON");
  btn.id=str;
  var t = document.createTextNode(str);
  btn.appendChild(t);
  btn.onclick = function() { // Note this is a function
    showku(btn.id);
  };

  var foo = document.getElementById("fooBar");
  //Append the element in page (in span).  
  foo.appendChild(btn);
}
</script>
<script>
function removeElement(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}
</script>
<script>
function cekfile(namakolom,isifile)
{
	var str=document.getElementById(namakolom).files[0].name;
	//alert(namakolom);
	var res = str.substr((str.length-3), 3);
	if ((res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG'))
	{
		alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
		$('#'+namakolom).val('');
		return false;
	}
}
</script>
<script>
function addRow(top) {
  // (B1) GET TABLE
  var jumlahrowkoordinat = document.getElementById("jumlahrowkoordinat").value;
  jumlahrowkoordinat++;
  document.getElementById("jumlahrowkoordinat").value = jumlahrowkoordinat;
  var table = document.getElementById(top);

  // (B2) INSERT ROW
  var row = table.insertRow(); 

  // (B3) INSERT CELLS
  var cell = row.insertCell();
  cell.style.borderColor = '#66CC99';
  cell.style.backgroundColor = '#66CC99';
  cell.style.color  = '#FFFFFF';
  cell.innerHTML = 'Langitude';
  cell = row.insertCell();
  cell.innerHTML = '<input type="text" name="latitudesurvei[]" class="rounded" id="latitudesurvei" placeholder="Latitude" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Latitude" onKeyPress="return isNumberKey(event)" required>';
  cell = row.insertCell();
  cell.style.borderColor = '#66CC99';
  cell.style.backgroundColor = '#66CC99';
  cell.style.color  = '#FFFFFF';
  cell.innerHTML = 'Longitude';
  cell = row.insertCell();
  cell.innerHTML = '<input type="text" name="longitudesurvei[]" class="rounded" id="longitudesurvei" placeholder="Latitude" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Longitude" onKeyPress="return isNumberKey(event)" required>';
  cell = row.insertCell();
  cell.innerHTML = '<i class="fa fa-minus-square fa-2x" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Hapus Koordinat" onClick="deletedRowkoordinat(1,'+jumlahrowkoordinat+')"></i>';
  
}

function addRowFoto(top) {

  var jumlahrowsurvei = document.getElementById("jumlahrowsurvei").value;
  jumlahrowsurvei++;
  document.getElementById("jumlahrowsurvei").value = jumlahrowsurvei;
  var table = document.getElementById(top);

  // (B2) INSERT ROW
  var row = table.insertRow(); 
  var cell = row.insertCell();
  cell.style.borderColor = '#66CC99';
  cell.style.backgroundColor = '#66CC99';
  cell.style.color  = '#FFFFFF';
  cell.innerHTML = 'Foto Survei';
  cell = row.insertCell();
  cell.colSpan = '3';
  cell.innerHTML = '<input type="file" name="fotosurvei[]" class="rounded" id="'+jumlahrowsurvei+'00" placeholder="Foto Survei" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Foto Survei" onChange="cekfile('+jumlahrowsurvei+'00,this.value)" >';
  cell = row.insertCell();
  cell.innerHTML = '<i class="fa fa-minus-square fa-2x" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="Hapus Foto Survei" onClick="deletedRowfoto(2,'+jumlahrowsurvei+')"></i>';

}


</script>
<script>
function deletedRowkoordinat(tabel,rows)
{
	var jumlahrowkoordinat = document.getElementById("jumlahrowkoordinat").value;
	if (jumlahrowkoordinat != rows)
	{
		alert('Hapus Kolom Bawah Terlebih Dahulu');
		return false;
	}
	jumlahrowkoordinat--;
	document.getElementById("jumlahrowkoordinat").value = jumlahrowkoordinat;
	document.getElementById(tabel).deleteRow(rows);
}

function deletedRowfoto(tabel,rows)
{
	var jumlahrowsurvei = document.getElementById("jumlahrowsurvei").value;
	if (jumlahrowsurvei != rows)
	{
		alert('Hapus Kolom Bawah Terlebih Dahulu');
		return false;
	}
	jumlahrowsurvei--;
	document.getElementById("jumlahrowsurvei").value = jumlahrowsurvei;
	document.getElementById(tabel).deleteRow(rows);
}

</script>

<?php
if (($_POST['action']=='edit') || ($tempkodeid) || ($tempkodeid<>''))
{
?>
<script>
	addMainLayerMap_LabelPermohonan('si_permohonan','<?php echo $tempkodeid; ?>','sourceFeaturesSurvei');
</script>
<?php
}
?>
<script>
function cetakpeta(str)
{
window.open("simtaru-Print_itr?str="+str);
}
</script>
</body>
</html>
<div id="loadingstat" style="position: absolute; top: 10; left: 10px; width: 10px; height: 10px; z-index: 3">