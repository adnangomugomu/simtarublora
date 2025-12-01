<?php 
	  include '../library/config.php'; 
	  date_default_timezone_set("Asia/Jakarta");
	  check_injection();
	  check_login();
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
    width: 33%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f041"
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
    background: white url(loader.gif) no-repeat;
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
  border-radius: 4px;
  font-family: 'Bookman Old Style', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}
</style>


</head>
<body class="hold-transition skin-green layout-top-nav">
<div id="divLoading"></div>
<div class="wrapper">

<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url(<?php echo $background ; ?>)">


    <!-- Main content -->
    <section class="content">
				
				<div class="row">
					<div class="col-md-12">
					<center>
					<h1 class="ml2" style="color:#000000;">TAMBAH PERMOHONAN INFORMASI TATA RUANG</h1>
					</center>
					<p>&nbsp;
					
					</p>
					</div>
				</div>
				
				<div class="row" style="opacity:0.85;">
					<div class="col-md-10 col-md-offset-1">	
						<div class="box box-success">
							<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
							  <div class="col-md-12">
							  <h3 class="box-title" id="namaurusan">FORMULIR PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG</small></h3>
							  </div>
							  <div class="col-md-12">
							  <div class="box-tools pull-right">
								<button class="btn btn-sm btn-info btn-block" data-toggle="tooltip" data-placement="top" title="Lihat Daftar Data Permohonan" onClick="daftar()" style="width:230px;"><i class="fa fa-calendar"></i> Daftar Data Permohonan</button>
							  </div>
							  </div>
							</div>
							<div class="box-body">

							<div class="card px-0 pt-4 pb-0 mt-3 mb-3">
				
										<form id="msform">
											<!-- progressbar -->
											<ul id="progressbar">
												<li class="active" id="account"><strong>DATA PEMOHON</strong></li>
												<li id="personal"><strong>LOKASI PERMOHONAN</strong></li>
												<li id="payment"><strong>KELENGKAPAN BERKAS</strong></li>
											</ul> <!-- fieldsets -->
											<fieldset>
												<div class="form-card">
													<div class="col-md-6">
														<div class="form-group">
														<label for="nama">Nomor KTP / NPWP </label>
														  <input type="text" name="nomorktp" class="rounded" id="nomorktp" placeholder="Nomor KTP / NPWP" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Nomor KTP / NPWP" required>
														</div>
														<div class="form-group">
														<label for="nama">Nomor Telepon </label>
														  <input type="text" name="nomortelp" class="rounded" id="nomortelp" placeholder="Nomor Telepon Aktif" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Nomor Telepon Yang Aktif" required>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
														<label for="nama">Nama Pemohon / Perusahaan </label>
														  <input type="text" name="nama" class="rounded" id="nama" placeholder="Nama Pemohon / Perusahaan" value="" data-toggle="tooltip" data-placement="top" title="Masukkan Nama Pemohon / Perusahaan" required>
														</div>
														<div class="form-group">
														<label for="nama">Alamat </label>
														  <textarea class="rounded" rows="4" name="alamat" id="alamat" data-toggle="tooltip" data-placement="top" title="Masukkan Alamat"></textarea>
														</div>
													</div>	
												</div>
												<button type="button" name="next" class="next action-button" data-toggle="tooltip" data-placement="top" title="Ke Halaman Selanjutnya" style="width:250px;background-color:#f3c951;border:#00a65a;">Selanjutnya <i class="fa fa-caret-square-o-right"></i></button>
											</fieldset>
											<fieldset>
											    <div class="form-card">
												<iframe src="simtaru-p3t4_p3rm0h0n4n" id="simtaru" style="width:100%;height:100vh;" frameborder="0" scrolling="no"></iframe>
												<input type="hidden" name="isilongitude" class="rounded" id="isilongitude" value="" readonly="yes" required>
												<input type="hidden" name="isilatitude" class="rounded" id="isilatitude" value="" readonly="yes" required>
												<input type="hidden" name="isiperuntukkan" class="rounded" id="isiperuntukkan" value="" readonly="yes" required>
												</div>
												<button type="button" name="previous" class="previous action-button-previous" data-toggle="tooltip" data-placement="top" title="Ke Halaman Sebelumnya" style="width:250px;background-color:#999999;border:#00a65a;"><i class="fa fa-caret-square-o-left"></i> Sebelumnya</button>
												<button type="button" name="nextnya" class="nextnya action-button" data-toggle="tooltip" data-placement="top" title="Ke Halaman Selanjutnya" style="width:250px;background-color:#f3c951;border:#00a65a;">Selanjutnya <i class="fa fa-caret-square-o-right"></i></button>
											</fieldset>
											<fieldset>
												<div class="form-card">
												<div class="alert alert-info border-0 alert-dismissible">
													<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
													<span class="font-weight-semibold">Perhatian!</span> Lampirkan File dalam format DOC/PDF/JPG.
												</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Fotokopi KTP</label>
														<div class="col-lg-8">
															<input type="file" name="fc_ktp" id="fc_ktp" class="rounded">
															<input type="hidden" name="fc_ktp_tmp" id="fc_ktp_tmp" class="rounded">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Surat Kuasa Bermaterai (jika dikuasakan)</label>
														<div class="col-lg-8">
															<input type="file" name="fc_kuasa" id="fc_kuasa" class="rounded">
															<input type="hidden" name="fc_kuasa_tmp" id="fc_kuasa_tmp" class="rounded">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Gambar Denah Lokasi / Peta Rencana Tambang</label>
														<div class="col-lg-8">
															<input type="file" name="gb_denah" id="gb_denah" class="rounded">
															<input type="hidden" name="gb_denah_tmp" id="gb_denah_tmp" class="rounded">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Foto Lokasi</label>
														<div class="col-lg-8">
															<input type="file" name="gb_lokasi" id="gb_lokasi" class="rounded">
															<input type="hidden" name="gb_lokasi_tmp" id="gb_lokasi_tmp" class="rounded">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Fotocopy sertifikat/petuk/bukti kepemilikan tanah/surat perjanjian sewa/ surat perjanjian jual-beli</label>
														<div class="col-lg-8">
															<input type="file" name="fc_sertifikat" id="fc_sertifikat" class="rounded">
															<input type="hidden" name="fc_sertifikat_tmp" id="fc_sertifikat_tmp" class="rounded">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Surat Rekomendasi/Persetujuan dari Kepala Desa yang diketahui Camat (Permohonan Pertambangan)</label>
														<div class="col-lg-8">
															<input type="file" name="fc_rekomendasi" id="fc_rekomendasi" class="rounded">
															<input type="hidden" name="fc_rekomendasi_tmp" id="fc_rekomendasi_tmp" class="rounded">
														</div>
													</div>
													<div class="form-group row">
														<label class="col-form-label col-lg-4">Berita Acara Persetujuan Pemilik Lahan (Permohonan Pertambangan)</label>
														<div class="col-lg-8">
															<input type="file" name="fc_persetujuan" id="fc_persetujuan" class="rounded">
															<input type="hidden" name="fc_persetujuan_tmp" id="fc_persetujuan_tmp" class="rounded">
														</div>
													</div>	
												</div> 
												<button type="button" name="previous" class="previous action-button-previous" data-toggle="tooltip" data-placement="top" title="Ke Halaman Sebelumnya" style="width:250px;background-color:#999999;border:#00a65a;"><i class="fa fa-caret-square-o-left"></i> Sebelumnya</button>
												<button type="button" name="make_payment" class="finish action-button" data-toggle="tooltip" data-placement="top" title="Kirim Dan Simpan Permohonan" style="width:250px;background-color:#0099FF;border:#00a65a;">Kirim Data <i class="fa fa-check-circle"></i></button>
												
											</fieldset>
											<fieldset>
												<div class="form-card" align="center">
													<center>
													<h1 style="font-size:26px;font-weight:bold;">Sukses !</h1> <br><br>
													<div class="row justify-content-center">
														<div class="col-3"> <img src="images/okcek.png" style="height:100px;"> </div>
													</div> <br><br>
													<div class="row justify-content-center">
														<div class="col-7 text-center">
															<h5>Data sukses dikirim dan disimpan</h5>
														</div>
													</div>
													<a href="simtaru-tambahdata"><button type="button" class="next action-button" data-toggle="tooltip" data-placement="top" title="Kembali Ke Permohonan" style="width:250px;background-color:#65b145;border:#00a65a;"><i class="fa fa-credit-card"></i> Kembali Ke Permohonan</button></a>
													</center>
													
												</div>
											</fieldset>
											
										</form>
				
							</div>

							</div>
						</div>
					</div>
					
					
                </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
<?php include 'footer.php'; ?>

</div>
<!-- ./wrapper -->


<script>
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){

var nomorktp=document.getElementById("nomorktp").value;
var nomortelp=document.getElementById("nomortelp").value;
var nama=document.getElementById("nama").value;
var alamat=document.getElementById("alamat").value;

if ((nomorktp=="") || (nomortelp=="") || (nama=="") || (alamat==""))
{
	alert("Mohon lengkapi data terlebih dahulu.. Terimakasih");
	return false;
}

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});


$(".nextnya").click(function(){

var iframe = document.getElementById("simtaru");
var koordinatku = iframe.contentWindow.document.getElementById("koordinatku").value;
var isiperuntukkan= iframe.contentWindow.document.getElementById("isiperuntukkan").value;

if ((koordinatku=="") || (isiperuntukkan==""))
{
	alert("Mohon lengkapi data terlebih dahulu.. Terimakasih");
	return false;
}

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});


$(".finish").click(function(){

if (confirm("Apakah data sudah benar dan lanjut simpan data?")) {

	var iframe = document.getElementById("simtaru");
	var isiperuntukkan= iframe.contentWindow.document.getElementById("isiperuntukkan").value;
	var koordinatku = iframe.contentWindow.document.getElementById("koordinatku").value;
	var measureOutput = iframe.contentWindow.document.getElementById("measureOutput").innerHTML;
	var nomorktp = document.getElementById("nomorktp").value;
	var nomortelp = document.getElementById("nomortelp").value;
	var nama = document.getElementById("nama").value;
	var alamat = document.getElementById("alamat").value;
	
	var fc_ktp_tmp = document.getElementById("fc_ktp_tmp").value;
	var fc_siup_tmp = '';
	var fc_kuasa_tmp = document.getElementById("fc_kuasa_tmp").value;
	var gb_denah_tmp = document.getElementById("gb_denah_tmp").value;
	var gb_lokasi_tmp = document.getElementById("gb_lokasi_tmp").value;
	var fc_sertifikat_tmp = document.getElementById("fc_sertifikat_tmp").value;
	var fc_rekomendasi_tmp = document.getElementById("fc_rekomendasi_tmp").value;
	var fc_persetujuan_tmp = document.getElementById("fc_persetujuan_tmp").value;
	
	
	$.ajax({
		type: "POST",
		url: "landing/getsimpandatapermohonanadmin.php",
		data: {
			nomorktp: nomorktp,
			nomortelp: nomortelp,
			nama: nama,
			alamat: alamat,
			measureOutput: measureOutput,
			isiperuntukkan: isiperuntukkan,
			fc_ktp_tmp: fc_ktp_tmp,
			fc_siup_tmp: fc_siup_tmp,
			fc_kuasa_tmp: fc_kuasa_tmp,
			gb_denah_tmp: gb_denah_tmp,
			gb_lokasi_tmp: gb_lokasi_tmp,
			fc_sertifikat_tmp: fc_sertifikat_tmp,
			fc_rekomendasi_tmp: fc_rekomendasi_tmp,
			koordinatku: koordinatku,
			fc_persetujuan_tmp: fc_persetujuan_tmp
		},
		cache: false,
		success: function(data) {
			//alert("Data Telah Tersimpan..");
			//alert(data);
			//document.location.reload();
		},
		error: function(xhr, status, error) {
			console.error(xhr);
		}
	});

} 

else {
	return false;
}

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 600
});
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 600
});
});

$('.radio-group .radio').click(function(){
$(this).parent().find('.radio').removeClass('selected');
$(this).addClass('selected');
});

$(".submit").click(function(){
return false;
})

});
</script>

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

<!-- Scripts -->
<script>
/**
 * Created by remi on 17/01/15.
 */
(function () {

	var uploadfiles = document.querySelector('#fc_ktp');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('fc_ktp').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#fc_ktp').val('');
			return false;
		}
		document.getElementById('fc_ktp_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'fc_ktp');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#fc_siup');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('fc_siup').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#fc_siup').val('');
			return false;
		}
		document.getElementById('fc_siup_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'fc_siup');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#fc_kuasa');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('fc_kuasa').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#fc_kuasa').val('');
			return false;
		}
		document.getElementById('fc_kuasa_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'fc_kuasa');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#gb_denah');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('gb_denah').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#gb_denah').val('');
			return false;
		}
		document.getElementById('gb_denah_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'gb_denah');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#gb_lokasi');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('gb_lokasi').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#gb_lokasi').val('');
			return false;
		}
		document.getElementById('gb_lokasi_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'gb_lokasi');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#fc_sertifikat');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('fc_sertifikat').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#fc_sertifikat').val('');
			return false;
		}
		document.getElementById('fc_sertifikat_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'fc_sertifikat');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#fc_rekomendasi');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('fc_rekomendasi').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#fc_rekomendasi').val('');
			return false;
		}
		document.getElementById('fc_rekomendasi_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'fc_rekomendasi');
        }

    }, false);
	
	var uploadfiles = document.querySelector('#fc_persetujuan');
    uploadfiles.addEventListener('change', function () {
		var str=document.getElementById('fc_persetujuan').files[0].name;
		//alert(str);
		var res = str.substr((str.length-3), 3);
		if ((res!='pdf') && (res!='PDF') && (res!='png') && (res!='PNG') && (res!='jpg') && (res!='JPG') && (res!='peg') && (res!='PEG') && (res!='doc') && (res!='ocx'))
		{
			alert("File harus berupa file yang direkomendasikan (ukuran direkomendasikan maksimal 500 KB)");
			$('#fc_persetujuan').val('');
			return false;
		}
		document.getElementById('fc_persetujuan_tmp').value=str;
        var files = this.files;
        for(var i=0; i<files.length; i++){
            uploadFile(this.files[i],'fc_persetujuan');
        }

    }, false);

	function uploadFile(file,str){
        var url = "landing/server/index.php?kode="+str;
        var xhr = new XMLHttpRequest();
        var fd = new FormData();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Every thing ok, file uploaded
                console.log(xhr.responseText); // handle response.
				alert("File telah terupload ..");
            }
        };
        fd.append('uploaded_file', file);
        xhr.send(fd);
    }
}());
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

<script>
function cari()
{
	var katakunci=document.getElementById('katakunci').value;
	var urusan=document.getElementById('urusan').value;
	if (katakunci=='')
	{
		alert('Masukkan Kata Kunci Pencarian...');
		return false;
	}
	gantihalaman(katakunci,urusan);
	$('#costumModalpencarian').modal('show');
}
</script>
<script>
function gantihalaman(katakunci,urusan)
{
	var iframe = document.getElementById('iframeku');
	iframe.src = "e-pencarian?katakunci="+katakunci+"&urusan="+urusan;
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
	function daftar()
	{
		window.location='simtaru-daftardatapermohonan';
	}
</script>

</body>
</html>
