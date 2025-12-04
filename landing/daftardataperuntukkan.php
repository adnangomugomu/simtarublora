<?php
session_start();
include '../library/config.php';
date_default_timezone_set("Asia/Jakarta");
include_once 'user_agent.php';
$ua = new UserAgent();
$action = urlencode($_POST['action']);
$ket = urlencode($_GET['ket']);
$tempkodeid = $_POST['tempkodeid'];
if (($_POST['action'] == 'edit') || ($tempkodeid) || ($tempkodeid <> '')) {
	$sql = "select * from si_permohonan where deleted='0' and id='" . $tempkodeid . "'";
	$result = mysqli_query($link, $sql);
	if ($result) {
		while ($row = mysqli_fetch_array($result)) {
			$kodeid = $row['id'];
			$nama = $row['nama'];
			$formattanggal = date_format(date_create($row['createddate']), 'Ymd');
			$tanggalmohon = $row['createddate'];
			$registrasi = $formattanggal . str_pad($row['registrasi'], 3, '0', STR_PAD_LEFT);
			$nomorktp = $row['nomorktp'];
			$nomortelp = $row['nomortelp'];
			$alamat = $row['alamat'];
			$fc_ktp = $row['fc_ktp'];
			$fc_siup = $row['fc_siup'];
			$fc_kuasa = $row['fc_kuasa'];
			$gb_denah = $row['gb_denah'];
			$gb_lokasi = $row['gb_lokasi'];
			$fc_sertifikat = $row['fc_sertifikat'];
			$fc_rekomendasi = $row['fc_rekomendasi'];
			$fc_persetujuan = $row['fc_persetujuan'];
			$hasil = $row['hasil'];
			$keterangan = $row['keterangan'];
			$peruntukkanpermohonantataruang = $row['peruntukkanpermohonantataruang'];
			$tanggalsurvei = frommysqldate($row['tanggalsurvei']);
			$petugassurvei = $row['petugassurvei'];
			$luastanah = $row['luastanah'];
			$hasilsurvei = $row['hasilsurvei'];
			$sketsa = $row['sketsa'];
			$latitudesurvei = $row['latitudesurvei'];
			$templatitudesurvei = explode('|', $latitudesurvei);
			$jumlahkoordinat = 1;
			$countlatitudesurvei = count($templatitudesurvei);
			if ($countlatitudesurvei > 1) {
				$jumlahkoordinat = $countlatitudesurvei;
			}
			$longitudesurvei = $row['longitudesurvei'];
			$templongitudesurvei = explode('|', $longitudesurvei);
			$countlongitudesurvei = count($templongitudesurvei);

			$fotosurvei = $row['fotosurvei'];
			$tempfotosurvei = explode('|', $fotosurvei);
			$jumlahfotosurvei = 1;
			$countfotosurvei = count($tempfotosurvei);
			if ($countfotosurvei > 1) {
				$jumlahfotosurvei = $countfotosurvei;
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
	<link rel="shortcut icon" href="<?php echo $ikon; ?>">
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
	<script src="landing/bootstrap.bundle.min.js"></script>
	<script src="landing/jquery.min.js"></script>
	<link rel="stylesheet" href="landing/adi/ol.css" type="text/css">
	<link rel="stylesheet" href="landing/adi/ol3gm.css" type="text/css" />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE&libraries=places"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/place/autocomplete/xml?input=pasta&types=establishment&location=37.76999,-122.44696&radius=500&key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE"></script>
	<script src="landing/adi/ol3gm.js"></script>
	<script src="landing/adi/FileSaver.min.js"></script>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

		body {
			font-family: 'Poppins', sans-serif !important;
			color: #000 !important;
		}

		#grad1 {
			background-color: #9C27B0;
			background-image: linear-gradient(120deg, #FF4081, #81D4FA)
		}

		#msform {
			text-align: center;
			position: relative;
			margin-top: 20px;
			font-weight: 700;
			font-size: 13px;
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
			font-weight: 700;
			font-size: 13px;
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
			font-weight: 700;
			font-size: 13px;
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
			font-weight: 700;
			font-size: 13px;
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
			font-weight: 700;
			font-size: 13px;
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

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-weight: 700;
		}

		/* Input field */
		.select2-selection__rendered {
			font-weight: 300;
			font-size: 12px;
		}

		/* Around the search field */
		.select2-search {
			font-weight: 300;
			font-size: 12px;
		}

		/* Search field */
		.select2-search input {
			font-weight: 300;
			font-size: 12px;
		}

		/* Each result */
		.select2-results {
			font-weight: 300;
			font-size: 12px;
		}

		/* Higlighted (hover) result */
		.select2-results__option--highlighted {
			font-weight: 300;
			font-size: 12px;
		}

		/* Selected option */
		.select2-results__option[aria-selected=true] {
			font-weight: 300;
			font-size: 12px;
		}


		#divLoading {
			display: none;
			position: absolute;
			top: 0;
			left: 0;
			background: white url(loading.gif) no-repeat;
			width: 100%;
			height: 100%;
			z-index: 999;
			opacity: 0.9;
			filter: progid:DXImageTransform.Microsoft.Alpha(opacity=50);
			background-position: center center;
		}

		.navbar .navbar-nav>.active {
			color: #000;
			background: black;
		}

		.navbar .navbar-nav>.active>a,
		.navbar .navbar-nav>.active>a:hover,
		.navbar .navbar-nav>.active>a:focus {
			color: #000;
			background: black;
		}

		#costumModallogin {
			height: 400px;
			top: calc(50% - 200px) !important;
		}

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
			font-weight: 300;
			font-size: 12px;
		}

		#map {
			z-index: 1;
			width: 100%;
			height: 80vh;
			top: 0px;
			bottom: 0;
			padding: 6px;
		}

		#sampingkanan {
			min-height:
				82vh;
		}

		.ol-popup {
			position: absolute;
			background-color: white;
			-webkit-filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
			filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
			padding: 15px;
			border-radius: 10px;
			border: 1px solid #cccccc;
			bottom: -45px;
			left: -50px;
		}

		.ol-popup:after,
		.ol-popup:before {
			top: 100%;
			border: solid transparent;
			content: "";
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
			padding: 2px;
			white-space: normal;
			background-color: #f7f7f9;
			border: 1px solid #e1e1e8;
			overflow-y: auto;
			overflow-x: hidden;
		}

		.ol-popup-content p {
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

		a.ol-popup-closer:hover {
			color: #005580;
			text-decoration: underline;
		}

		.ol-popup-closer:after {
			content:
				"✖";
		}

		.wellcome-heading {
			font-size: 50spx;
			color: #ffffff;
			font-weight: 700;
			position: relative;
			z-index: 3;
		}

		.wellcome-heading img {
			transition: all .2s ease-in-out;
			margin-top: 30px;
		}

		.wellcome-heading img:hover {
			transform: scale(1.1);
		}

		.wellcome-heading h2 {
			font-weight: 900 !important;
			font-size: 45px;
		}

		.wellcome-heading h4 {
			color: white;
			font-weight: 300 !important;
			text-align: justify;
		}

		.wellcome-heading h8 {
			color: white;
			font-weight: 300 !important;
			text-align: justify;
			font-size: 12px;
		}

		.wellcome-heading input {
			max-width: 500px;
			margin-top: 10px;
			opacity: 0.8;
			border-radius: 30px;
		}

		.wellcome-heading button {
			margin-top: 20px;
			background-color: transparent;
			border: 1px solid #fff;
			color: #fff;
			width: 100%;
			max-width: 200px;
			border-radius: 30px 5px 30px 5px;
		}

		.wellcome-heading button:hover {
			background-color: #fff;
			color: #0c0c6e;
		}

		.wellcome-heading>h2 {
			font-size: 50spx;
			color: #ffffff;
			font-weight: 700;
			position: relative;
			z-index: 3;
		}

		.get-start-area .email {
			background: #9572e8;
			height: 50px;
			max-width: 260px;
			border: none;
			border-radius: 24px;
			padding: 0px 15px;
		}

		.form-control::-webkit-input-placeholder {
			color: #cec1f4;
			opacity: 1;
		}

		.form-control:-ms-input-placeholder {
			color: #cec1f4;
			opacity: 1;
		}

		.form-control::-ms-input-placeholder {
			color: #cec1f4;
			opacity: 1;
		}

		.form-control::placeholder {
			color: #cec1f4;
			opacity: 1;
		}

		.get-start-area .email:focus {
			border: none;
			outline-offset: transparent !important;
			border-radius: 30px;
		}

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

		.get-start-area .submit:hover {
			background: #6f52e5;
			color: #fff;
			-webkit-transition-duration: 500ms;
			-o-transition-duration: 500ms;
			transition-duration: 500ms;
		}

		.wellcome-heading>p {
			color: #fff;
		}

		.wellcome-heading>h3 {
			font-size: 332px;
			position: absolute;
			top: -134px;
			font-weight: 900;
			left: -12px;
			z-index: -1;
			color: #fff;
			opacity: .1;
		}

		a {
			color: #008000;
			font-weight: bold;
		}

		.box {
			border-radius: 20px;
		}

		.box.box-success {
			border-top-color: #ecf0f5;
		}

		.box-body {
			padding: 30px;
		}

		.bg_new {
			background-image: url('backoffice/bg-2.png');
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}

		.content-wrapper,
		.skin-green .wrapper {
			background-color: transparent !important;
		}

		.custom_header {
			display: flex;
			align-items: center;
			gap: 20px;
		}

		.custom_logo {
			width: 100px;
			height: 100px;
		}

		.judul {
			font-size: 25px;
			font-weight: bold;
		}

		.btn-primary {
			background-color: #000000;
			border: none;
			transition: all 0.3s ease-in-out;
		}

		.btn-primary:hover,
		.btn-primary:active,
		.btn-primary.hover {
			background-color: #21b06f;
		}
	</style>
</head>

<body class="hold-transition skin-green layout-top-nav bg_new">
	<div class="wrapper">
		<div class="content-wrapper">
			<section class="content">

				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="custom_header">
							<img src="images/logo.png" alt="logo" class="custom_logo">
							<div>
								<div class="judul">DAFTAR PERUNTUKKAN TATA RUANG</div>
								<div class="sub-judul">Sistem Informasi Tata Ruang Kabupaten Blora</div>
							</div>
						</div>
						<div class="text-right" style="margin-bottom: 10px;">
							<button class="btn btn-primary" onclick="history.back();">Halaman Beranda</button>
						</div>
						<div class="box box-success">
							<div class="box-body table-responsive">
								<table id="table_data" class="table table-bordered table-hover">
									<thead class="cf">
										<tr style="background-color:#00a65a;color:#FFFFFF;">
											<th>No</th>
											<th>Kawasan</th>
											<th>Peruntukkan</th>
											<th>Keterangan</th>
											<th>Diperbolehkan</th>
											<th>Diperbolehkan Bersyarat</th>
											<th>Tidak Diperbolehkan</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = "SELECT KELAS_I,KELAS_III,KETERANGAN,DIPERBOLEHKAN,DIPERBOLEHKAN_BERSYARAT,TIDAK_DIPERBOLEHKAN from rencana_pola_ruang group by KELAS_I,KELAS_III,KETERANGAN,DIPERBOLEHKAN,DIPERBOLEHKAN_BERSYARAT,TIDAK_DIPERBOLEHKAN";
										$result = mysqli_query($link, $sql);
										if ($result) {
											$i = 1;
											while ($row = mysqli_fetch_array($result)) {
										?>
												<tr>
													<td data-title="No">
														<?php echo $i; ?>
													</td>
													<td data-title="Kawasan">
														<?php echo $row['KELAS_I']; ?>
													</td>
													<td data-title="Peruntukkan">
														<?php echo $row['KELAS_III']; ?>
													</td>
													<td data-title="Keterangan">
														<?php echo $row['KETERANGAN']; ?>
													</td>
													<td data-title="Diperbolehkan">
														<?php echo $row['DIPERBOLEHKAN']; ?>
													</td>
													<td data-title="Boleh Bersyarat">
														<?php echo $row['DIPERBOLEHKAN_BERSYARAT']; ?>
													</td>
													<td data-title="Tidak Diperbolehkan">
														<?php echo $row['TIDAK_DIPERBOLEHKAN']; ?>
													</td>
												</tr>
										<?php
												$i++;
											}
										}
										?>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include 'footer.php'; ?>
	</div>

	<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/select2/select2.full.min.js"></script>
	<script src="plugins/input-mask/jquery.inputmask.js"></script>
	<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
	<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
	<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
	<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="plugins/iCheck/icheck.min.js"></script>
	<script src="plugins/fastclick/fastclick.js"></script>
	<script src="dist/js/app.min.js"></script>
	<script src="dist/js/demo.js"></script>
	<script src="plugins/chartjs1/Chart.bundle.js"></script>

	<link rel="stylesheet" href="https://cdn.datatables.net/2.3.5/css/dataTables.dataTables.css" />
	<script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
	<script>
		let table = new DataTable('#table_data');

		$(function() {
			$(".select2").select2();

			$("#datemask").inputmask("dd/mm/yyyy", {
				"placeholder": "dd/mm/yyyy"
			});

			$("#datemask2").inputmask("mm/dd/yyyy", {
				"placeholder": "mm/dd/yyyy"
			});

			$('#tanggalsurvei').datepicker({
				format: "dd/mm/yyyy",
				language: "id",
				autoclose: true,
				todayHighlight: true
			});

			$("[data-mask]").inputmask();

			$('#reservation').daterangepicker();

			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				format: 'MM/DD/YYYY h:mm A'
			});

			$('#daterange-btn').daterangepicker({
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
				function(start, end) {
					$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
			);

			$('#datepicker').datepicker({
				autoclose: true
			});

			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});

			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass: 'iradio_minimal-red'
			});

			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass: 'iradio_flat-green'
			});

			$(".my-colorpicker1").colorpicker();

			$(".my-colorpicker2").colorpicker();

			$(".timepicker").timepicker({
				showInputs: false
			});

			$('[data-toggle="tooltip"]').tooltip();
		});

		let mybutton = document.getElementById("btn-back-to-top");

		window.onscroll = function() {
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

		mybutton.addEventListener("click", backToTop);

		function backToTop() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>

	<script src="js/velocity.min.js"></script>
	<script src="js/velocity.ui.min.js"></script>
	<script src="js/index.js"></script>

	<script src="js/anime.min.js"></script>

	<script>
		// Wrap every letter in a span
		var textWrapper = document.querySelector('.ml2');
		textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

		anime.timeline({
				loop: true
			})
			.add({
				targets: '.ml2 .letter',
				scale: [4, 1],
				opacity: [0, 1],
				translateZ: 0,
				easing: "easeOutExpo",
				duration: 950,
				delay: (el, i) => 70 * i
			}).add({
				targets: '.ml2',
				opacity: 0,
				duration: 1000,
				easing: "easeOutExpo",
				delay: 1000
			});

		anime.timeline({
				loop: true
			})
			.add({
				targets: '.ml15 .word',
				scale: [14, 1],
				opacity: [0, 1],
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
		function superback() {
			<?php
			if ($_COOKIE['onelevel'] == '') {
			?>
				window.location = 'simtaru-blora';
			<?php
			} else {
			?>
				window.location = 'simtaru-d4shumum';
			<?php
			}
			?>
		}
	</script>
</body>

</html>