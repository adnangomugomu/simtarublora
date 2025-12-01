<?php 
	  session_start();
	  include '../library/config.php'; 
	  check_injection();
	  date_default_timezone_set("Asia/Jakarta");
	  include_once 'user_agent.php';
	  $ua = new UserAgent();
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
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/introjs-rtl.css" rel="stylesheet">
		<link href="css/introjs.css" rel="stylesheet">
		
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap');
</style>

<style type="text/css">
<!--


body {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
	font-size: 12px;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
	letter-spacing: 2px;
	font-size: 12px;
}

.button {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 3px;
}


input {
    font-family: 'Roboto', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}


nav.navbar li a {
  	font-family: 'Roboto', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}

p {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

div {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

button {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}


/* Input field */
.select2-selection__rendered { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Around the search field */
.select2-search { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Search field */
.select2-search input { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Each result */
.select2-results { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Higlighted (hover) result */
.select2-results__option--highlighted { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Selected option */
.select2-results__option[aria-selected=true] { 

    font-family: 'Roboto', sans-serif;
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
  text-transform: uppercase;
  letter-spacing: 0.5em;
}

.ml15 .word {
  display: inline-block;
  line-height: 1em;
}

/* line 573, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading {
  font-size: 50spx;
  color: #ffffff;
  font-weight: 700;
  position: relative;
  z-index: 3;
}

/* line 574, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading img {
  transition: all .2s ease-in-out;
  margin-top: 30px;
}

/* line 575, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading img:hover {
  transform: scale(1.1);
}

/* line 581, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading h2 {
  font-weight: 900 !important;
  font-size: 45px;
}

/* line 585, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading h4 {
  color: white;
  font-weight: 300 !important;
  text-align: justify;
}

/* line 590, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading h8 {
  color: white;
  font-weight: 300 !important;
  text-align: justify;
  font-size: 12px;
}

/* line 596, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading input {
  max-width: 500px;
  margin-top: 10px;
  opacity: 0.8;
  border-radius: 30px;
}

/* line 602, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading button {
  margin-top: 20px;
  background-color: transparent;
  border: 1px solid #fff;
  color: #fff;
  width: 100%;
  max-width: 200px;
  border-radius: 30px 5px 30px 5px;
}

/* line 603, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading button:hover {
  background-color: #fff;
  color: #0c0c6e;
}

/* line 622, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading > h2 {
  font-size: 50spx;
  color: #ffffff;
  font-weight: 700;
  position: relative;
  z-index: 3;
}

/* line 630, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .email {
  background: #9572e8;
  height: 50px;
  max-width: 260px;
  border: none;
  border-radius: 24px;
  padding: 0px 15px;
}

/* line 639, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control::-webkit-input-placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 644, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control:-ms-input-placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 649, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control::-ms-input-placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 654, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control::placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 659, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .email:focus {
  border: none;
  outline-offset: transparent !important;
  border-radius: 30px;
}

/* line 665, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .submit {
  background-color: #fb397d;
  color: #fff;
  font-weight: 500;
  display: inline-block;
  border: none;
  height: 50px;
  min-width: 167px;
  line-height: 46px;
  text-align: center;
  border-radius: 24px 24px 24px 0px;
  margin-left: 10px;
}

/* line 679, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .submit:hover {
  background: #6f52e5;
  color: #fff;
  -webkit-transition-duration: 500ms;
  -o-transition-duration: 500ms;
  transition-duration: 500ms;
}

/* line 687, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading > p {
  color: #fff;
}

/* line 691, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading > h3 {
  font-size: 332px;
  position: absolute;
  top: -134px;
  font-weight: 900;
  left: -12px;
  z-index: -1;
  color: #fff;
  opacity: .1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=10)";
}

a {
  color: #008000;
  font-weight:bold;
}

</style>


</head>
<body class="hold-transition skin-green layout-top-nav">
<div id="divLoading"></div>
<div class="wrapper">

<?php include 'headerumum.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url(<?php echo $background ; ?>)">


    <!-- Main content -->
    <section class="content">
				<?php
				if($ua->is_mobile()){
				?>
				<div class="row">
					<div class="col-md-12">
					<center>
					<h1 style="color:#000000;">KONTAK LAYANAN TATA RUANG KABUPATEN BLORA</h1>
					</center>
					</div>
				</div>
				<?php
				}
				else
				{
				?>
				<div class="row">
					<div class="col-md-12">
					<center>
					<h1 class="ml2" style="color:#000000;">KONTAK LAYANAN TATA RUANG KABUPATEN BLORA</h1>
					</center>
					</div>
				</div>
				<?php
				}
				?>

<div class="row">
	<div class="col-md-5 text-center">
	</div>
	<div class="col-md-2 text-center">
		<div class="wellcome-heading wow bounceIn">
		<button type="button" class="btn" style="font-size:12px;font-weight:bold;color:#000000;font-size:12px;font-family:'Roboto',Verdana, Arial, Helvetica, sans-serif" data-toggle="tooltip" data-placement="top" title="Kembali ke halaman awal" onClick="superback()"><i class="fa fa-mail-reply"></i> <span>Halaman Awal<br>&nbsp;</span></button>
		</div>
	</div>
	<div class="col-md-5 text-center">
	</div>
</div>
<div class="row vertical-offset-100" >
<p>&nbsp;

</p>
</div>				
				<div class="row" style="opacity:0.85;">
					<div class="col-md-6">	
						<div class="box box-success">
							<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
							  <h3 class="box-title" id="namaurusan">LOKASI <small style="color:#ffffff;">KAMI</small></h3>
					
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							  </div>
							</div>
							<div class="box-body">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126705.51481232476!2d111.43159826008231!3d-7.0623509609653725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77411bc797c1ed%3A0x5ddba5997190e35c!2sDPUPR%20Kabupaten%20Blora!5e0!3m2!1sid!2sid!4v1638226158454!5m2!1sid!2sid" width="600" height="450" style="border:0;width:100%;height:300px;" allowfullscreen="" loading="lazy"></iframe>
								
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="box box-success">
							<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
							  <h3 class="box-title" id="namaurusan">ALAMAT <small style="color:#ffffff;">KAMI</small></h3>
					
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							  </div>
							</div>
							<div class="box-body" style="height:325px;">
								<ol class="list mb-0">
									<li>Alamat : <?php echo $alamatWeb; ?></li>
									<li><?php echo $telpWeb; ?></li>
									<li>Peta : <a href="https://goo.gl/maps/vS4cVAXcXTDfbHFd7" target="_blank">https://goo.gl/maps/ANVmAJzEcgN2</a></li>
								</ol>
								<br/>
								
							</div>
						</div>
					</div>
					
                </div>

				<div class="row" style="opacity:0.85;">
					<div class="col-md-6">	
						<div class="box box-success">
							<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
							  <h3 class="box-title" id="namaurusan">PERSYARATAN PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG UMUM</small></h3>
					
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							  </div>
							</div>
							<div class="box-body">
								<ul class="list list-square mb-0">
									<li>Fotokopi Akte Perusahaan/ Akte Notaris / Nomor Induk Berusaha(NIB) (Bagi perusahaan)</li>
									<li>Fotokopi NPWP (Bagi perusahaan)</li>
									<li>Fotokopi KTP</li>
									<li>Surat Kuasa bermaterai (jika dikuasakan)</li>
									<li>Gambar denah lokasi/peta rencana</li>
									<li>Foto lokasi</li>
									<li>Fotocopy sertifikat/petuk/bukti kepemilikan tanah/surat perjanjian sewa/ surat perjanjian jual-beli</li>
									<br>
									<br>
								</ul>
								
							</div>
						</div>
					</div>
					<div class="col-md-6">	
						<div class="box box-success">
							<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
							  <h3 class="box-title" id="namaurusan">PERSYARATAN PERMOHONAN <small style="color:#ffffff;">INFORMASI TATA RUANG TAMBANG</small></h3>
					
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							  </div>
							</div>
							<div class="box-body">
								<ul class="list list-square mb-0">
									<li>Fotokopi Akte Perusahaan/ Akte Notaris / Nomor Induk Berusaha(NIB) (Bagi perusahaan)</li>
									<li>Fotokopi NPWP (Bagi perusahaan)</li>
									<li>Fotokopi KTP </li>
									<li>Surat Kuasa bermaterai (jika dikuasakan)</li>
									<li>Surat Rekomendasi/Persetujuan dari Kepala Desa yang diketahui Camat</li>
									<li>Berita Acara Persetujuan Pemilik Lahan</li>
									<li>Peta Rencana Tambang</li>
									<li>Foto lokasi</li>
									<li>Fotocopy sertifikat/petuk/bukti kepemilikan tanah/surat perjanjian sewa/ surat perjanjian jual-beli</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-12">	
						<div class="box box-success">
							<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
							  <h3 class="box-title" id="namaurusan">PANDUAN <small style="color:#ffffff;">PENGISIAN</small></h3>
					
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							  </div>
							</div>
							<div class="box-body">
								<ol class="list mb-0">
									<li>Isikan Data Pemohon
										<ul class="list">
											<li>Nama Permohon / Perusahaan</li>
											<li>Alamat Pemohon / Perusahaan</li>
											<li>Nomor KTP / NPWP</li>
											<li>Nomor Telepon Yang Bisa Dihubungi</li>
										</ul>
									</li>
									<li>Upload Berkas
										<ul class="list">
											<li>Fotokopi KTP </li>
											<li>Surat Kuasa bermaterai (jika dikuasakan)</li>
											<li>Surat Rekomendasi/Persetujuan dari Kepala Desa yang diketahui Camat</li>
											<li>Berita Acara Persetujuan Pemilik Lahan</li>
											<li>Gambar denah lokasi/peta rencana</li>
											<li>Foto lokasi</li>
											<li>Fotocopy sertifikat/petuk/bukti kepemilikan tanah/surat perjanjian sewa/ surat perjanjian jual-beli</li>
										</ul>
									</li>
								</ol>
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

<script>
function superback()
{
	<?php
	if ($_COOKIE['onelevel']=='')
	{
	?>
	window.location='simtaru-blora';
	<?php
	}
	else
	{
	?>
	window.location='simtaru-d4shumum';
	<?php
	}
	?>
}
</script>

</body>
</html>
