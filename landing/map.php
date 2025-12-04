<?php
session_start();
include '../library/config.php';
date_default_timezone_set("Asia/Jakarta");
check_injection();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $judulWeb; ?></title>
	<link rel="shortcut icon" href="<?php echo $ikon; ?>">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link href="css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/snippet/snippet.css" rel="stylesheet" type="text/css" />
	<link href="plugins/select2/select2.css" rel="stylesheet" type="text/css" />
	<link href="plugins/select2/select2-bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
	<link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media="print" />
	<link rel="stylesheet" href="landing/adi/ol.css" type="text/css">
	<link rel="stylesheet" href="landing/adi/ol3gm.css" type="text/css" />

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE&libraries=places"></script>
	<script src="landing/adi/ol3gm.js"></script>
	<script src="landing/adi/FileSaver.min.js"></script>

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap');

		body {
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			font-size: 12px;
			background-color: #ecf0f5;

		}

		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: 'Roboto', sans-serif;
			font-weight: 700;
			font-size: 12px;
		}

		.button {
			font-family: 'Roboto', sans-serif;
			font-weight: 700;
			font-size: 13px;
			text-transform: uppercase;
		}


		input {
			font-family: 'Roboto', sans-serif;
			font-size: 12px;
		}


		nav.navbar li a {
			font-family: 'Roboto', sans-serif;
			font-size: 12px;
		}

		p {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		div {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		button {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}


		.select2-selection__rendered {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		.select2-search {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		.select2-search input {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		.select2-results {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		.select2-results__option--highlighted {
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;

		}

		.select2-results__option[aria-selected=true] {
			font-family: 'Roboto', sans-serif;
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

		#map {
			z-index: 1;
			width: 100%;
			height: 100vh !important;
			top: 0px;
			bottom: 0;
			padding: 0;
		}

		.ol-popup {
			position: absolute;
			background-color: white;
			-webkit-filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
			filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
			padding: 20px;
			border-radius: 10px;
			border: 1px solid #cccccc;
			bottom: -45px;
			left: -50px;
			width: 700px;
		}

		.ol-popup:after,
		.ol-popup:before {
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
			top: 3px;
			right: 7px;
			font-size: 100%;
			color: #0088cc;
			text-decoration: none;
		}

		a.ol-popup-closer:hover {
			color: #005580;
			text-decoration: underline;
		}

		.ol-popup-closer:after {
			content: "✖";
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

		.fade-scale {
			transform: scale(0);
			opacity: 0;
			-webkit-transition: all .25s linear;
			-o-transition: all .25s linear;
			transition: all .25s linear;
		}

		.fade-scale.in {
			opacity: 1;
			transform: scale(1);
		}

		.modal-full {
			min-width: 100%;
			margin: 0;
		}

		.modal-full .modal-content {
			height: 100%;
		}

		a {
			color: #008000;
			font-weight: bold;
		}

		.nav-tabs-custom>.nav-tabs>li.active {
			border-top-color: #00a661;
		}

		a:hover,
		a:active,
		a:focus {
			outline: none;
			text-decoration: none;
			color: #00a661;
		}

		.icon-center {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.nav>li>a {
			position: relative;
			display: block;
			padding: 3px 5px;
		}

		#sidebar_layer {
			position: absolute;
			top: 100px;
			right: 20px;
			width: 350px;
			height: 500px;
			padding-top: 30px;
			padding-bottom: 30px;
			padding-left: 15px;
			padding-right: 15px;
			border-radius: 13px;
			background-color: white;
			z-index: 9999;
			box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.2), 0 0 5px 0 rgba(0, 0, 0, 0.19);
			transition: all 0.5s ease-in-out;
		}

		.tarik_kanan {
			-webkit-transform: translateX(500px);
			-moz-transform: translateX(500px);
			transform: translateX(500px);
		}
	</style>

</head>

<body class="hold-transition skin-green layout-top-nav" onload="AdiLoad();">
	<div id="divLoading"></div>

	<div id="sidebar_layer" class="tarik_kanan">
		<div style="height: 95%;overflow: auto;margin-bottom: 10px;">
			<div class="nav-tabs-custom" style="margin-bottom: 0 !important;">
				<ul class="nav nav-tabs">
					<li class="active"><a id="target_layer" href="#activity" data-toggle="tab">Layer</a></li>
					<li><a href="#layerlain" data-toggle="tab">Layer Terkait</a></li>
					<li style="display: none;"><a href="#timeline" data-toggle="tab">Pencarian</a></li>
					<li><a href="#settings" data-toggle="tab">Setting</a></li>
					<li><a href="#base_map" id="target_base_map" data-toggle="tab">Base Map</a></li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="activity">
						<h6 class="attachment-heading"><b><a href="#">Indikator Sebaran</a></b></h6>
						<div class="checkbox">
							<label style="display: flex;align-items: center;">
								<input type="checkbox" id="pola_ruang" name="pola_ruang" style="margin-bottom: 5px;">
								<div>Rencana Pola Ruang</div>
							</label>
						</div>
						<h6 class="attachment-heading"><b><a href="#">Keterangan</a></b></h6>
						<table>
							<?php
							$sql = "select KELAS_III,fillku from rencana_pola_ruang group by KELAS_III,fillku; ";
							$result = mysqli_query($link, $sql);
							if ($result) {
								$i = 1;
								while ($row = mysqli_fetch_array($result)) {
							?>
									<tr>
										<td style="background-color:<?php echo $row['fillku']; ?>;padding:1px;" width="24px;">&nbsp;&nbsp;</td>
										<td valign="top" style="padding:1px;"><?php echo $row['KELAS_III']; ?></td>
									</tr>
							<?php
									$i++;
								}
							}
							?>
						</table>
					</div>

					<div class="tab-pane" id="layerlain">
						<?php
						$sql1 = " select * from one_peta where deleted='0' ";
						if ((!urlencode($_COOKIE['oneid'])) || (urlencode($_COOKIE['oneid']) == "")) {
							$sql1 = $sql1 . " and status='0' ";
						}
						$sql1 = $sql1 . " order by id asc";
						//echo $sql1;
						$result1 = mysqli_query($link, $sql1);
						if ($result1) {
							$x = 1;
							while ($row1 = mysqli_fetch_array($result1)) {
						?>
								<div style="display: flex;align-items: center;">
									<label style="color:#49494a;margin-bottom: 0;cursor: pointer;"><input type="checkbox" style="margin-right: 3px;" name="checkbox<?php echo $row1['id']; ?>" id="checkbox<?php echo $row1['id']; ?>"> <?php echo $row1['nama']; ?></label>
								</div>
						<?php
								$x++;
							}
						}
						?>

						</p>
					</div>
					<div class="tab-pane" id="timeline">
						<p>
						<h6 class="attachment-heading"><b><a href="#">Pencarian Area Polygon (Aktifkan Layer Terlebih Dahulu)</a></b></h6>
						<input type="text" name="koordinatku" id="koordinatku" value="" style="width:100%;display:none;">
						<form class="form-inline">
							<select id="type1" class="form-control " style="width:100%">
								<option value="None">Pilih Mode Pencarian</option>
								<option value="area">Polygon Area</option>
							</select>
							</p>
							<button type="button" id="areaku" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;" onClick="klikku6()"><b>Hapus Hasil Pencarian Polygon</b></button>
						</form>
					</div>

					<div class="tab-pane" id="settings">
						<h6 class="attachment-heading"><b><a href="#">Pengukuran</a></b></h6>
						<input type="hidden" name="koordinatpopup" id="koordinatpopup" value="" style="width:100%">
						<input type="hidden" name="koordinatpopuphdms" id="koordinatpopuphdms" value="" style="width:100%">
						<form class="form-inline">
							<select id="type" class="form-control " style="width:100%">
								<option value="None">Pilih Model Pengukuran</option>
								<option value="length">Jarak</option>
								<option value="area">Luas</option>
							</select>
							</p>
							<button type="button" class="btn btn-danger" style="border:none;color:#FFFFFF;font-size:12px;" onClick="klikku6()"><b>Hapus Hasil Ukur</b></button>
						</form>

						<p>
						<ol id="measureOutput" reversed style="color:#333333;display:block;"></ol>
						</p>
					</div>
					<div class="tab-pane" id="base_map">
						<div class="radio">
							<label style="display: flex;align-items: center;">
								<input type="radio" name="optionsRadios" id="radio1" value="1" style="margin-right: 5px;margin-bottom: 4px;">
								<div style="line-height: 0;">Google Map (ROADMAP)</div>
							</label>
						</div>
						<div class="radio">
							<label style="display: flex;align-items: center;">
								<input type="radio" name="optionsRadios" id="radio6" value="6" style="margin-right: 5px;margin-bottom: 4px;">
								<div style="line-height: 0;">Google Map (Hybrid)</div>
							</label>
						</div>
						<div class="radio">
							<label style="display: flex;align-items: center;">
								<input type="radio" name="optionsRadios" id="radio2" checked="checked" value="2" style="margin-right: 5px;margin-bottom: 4px;">
								<div style="line-height: 0;">MapQuest OSM</div>
							</label>
						</div>
						<div class="radio">
							<label style="display: flex;align-items: center;">
								<input type="radio" name="optionsRadios" id="radio4" value="4" style="margin-right: 5px;margin-bottom: 4px;">
								<div style="line-height: 0;">Esri</div>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button type="button" onclick="hide_layer();" class="btn btn-block btn-success btn-sm">Tutup</button>
	</div>

	<div class="wrapper">
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" style="min-height: 0px !important;">

			<!-- Modal -->
			<!-- <div class="modal fade" id="myModalBaseMap" role="modal" style="background: rgba(0, 0, 0, 0);" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#006600;color:#FFFFFF;">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Base Map</h4>
						</div>
						<div class="modal-body">
							<p>
							<div class="radio">
								<label style="display: flex;align-items: center;">
									<input type="radio" name="optionsRadios" id="radio1" value="1" style="margin-right: 5px;margin-bottom: 4px;">
									<div style="line-height: 0;">Google Map (ROADMAP)</div>
								</label>
							</div>
							<div class="radio">
								<label style="display: flex;align-items: center;">
									<input type="radio" name="optionsRadios" id="radio6" value="6" style="margin-right: 5px;margin-bottom: 4px;">
									<div style="line-height: 0;">Google Map (Hybrid)</div>
								</label>
							</div>
							<div class="radio">
								<label style="display: flex;align-items: center;">
									<input type="radio" name="optionsRadios" id="radio2" checked="checked" value="2" style="margin-right: 5px;margin-bottom: 4px;">
									<div style="line-height: 0;">MapQuest OSM</div>
								</label>
							</div>
							<div class="radio">
								<label style="display: flex;align-items: center;">
									<input type="radio" name="optionsRadios" id="radio4" value="4" style="margin-right: 5px;margin-bottom: 4px;">
									<div style="line-height: 0;">Esri</div>
								</label>
							</div>
							</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
						</div>
					</div>
				</div>
			</div> -->


			<!-- Modal -->
			<div class="modal fade" id="myModalLayer" role="modal" style="background: rgba(0, 0, 0, 0);">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header" style="background-color:#006600;color:#FFFFFF;">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Layer Peta</h4>
						</div>
						<div class="modal-body">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
						</div>
					</div>

				</div>
			</div>

			<section>
				<div class="row">
					<div class="panel panel-primary" id="boxkugam" style="z-index:11;position:absolute;top:20px;left:20px;overflow:hidden;height:70px;border:solid 2px #FFFFFF;width:300px;border-bottom-right-radius:40px;border-top-right-radius:40px;background-color:#000000;">
						<label style="position:absolute;left:60px;top:5px;color:#FFFFFF;font-size:26px;">PETA SPASIAL</label>
						<label style="position:absolute;left:60px;top:38px;color:#FFFFFF;"><?php echo $judul; ?></label>
						<img src="images/logo.png" height="40px;" style="position:absolute;top:13px;left:10px;">
					</div>
					<div class="col-md-12">
						<!-- Box Comment -->
						<div class="box box-widget" style="margin-bottom: 0;border: none !important;">
							<div id="divLoading"></div>
							<div id="map">
								<div id="mouse-position" style="bottom:10px; right:20px; z-index:2;position:absolute;color:#FF0000;"></div>
								<div id="divMainLayer"></div>
								<button type="button" title="Halaman Utama" class="btn btn-success icon-center btn-circle btn-lg" style="z-index:40;position:absolute;right:290px;top:20px;border-radius:50%;height:50px;width:50px;" onclick="kembalikemenuutama();"><i class="glyphicon glyphicon-home"></i></button>
								<button type="button" title="Layer" class="btn btn-success icon-center btn-circle btn-lg" style="z-index:40;position:absolute;right:235px;top:20px;border-radius:50%;height:50px;width:50px;" onclick="show_layer();"><i class="glyphicon glyphicon-list-alt"></i></button>
								<button type="button" title="Base Map" class="btn btn-success icon-center btn-circle btn-lg" style="z-index:40;position:absolute;right:180px;top:20px;border-radius:50%;height:50px;width:50px;" onclick="basemap();"><i class="glyphicon glyphicon-th-large"></i></button>
								<button type="button" title="Zoom In" class="btn btn-success icon-center btn-circle btn-lg" style="z-index:40;position:absolute;right:125px;top:20px;border-radius:50%;height:50px;width:50px;" id="zoom1"><i class="glyphicon glyphicon-zoom-in"></i></button>
								<button type="button" title="Zoom Out" class="btn btn-success icon-center btn-circle btn-lg" style="z-index:40;position:absolute;right:70px;top:20px;border-radius:50%;height:50px;width:50px;" id="zoom2"><i class="glyphicon glyphicon-zoom-out"></i></button>
								<button type="button" title="Cetak Peta" class="btn btn-success icon-center btn-circle btn-lg" style="z-index:40;position:absolute;right:15px;top:20px;border-radius:50%;height:50px;width:50px;" id="export-png"><i class="glyphicon glyphicon-print"></i></button>
							</div>
							<div id="loadingstat" style="position: absolute; top: 10; left: 10px; width: 10px; height: 10px; z-index: 100">
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
					</div>
					<!-- /.row -->
			</section>
			<!-- /.content -->
		</div>
	</div>

	<div style="position: absolute;bottom: 5px;left: 50%;transform: translateX(-50%);background-color: white;padding-left: 10px;padding-right: 10px;padding-top: 5px;padding-bottom: 5px;border-radius: 3px;">
		<div class="text-center" style="margin: 0 !important;">Copyright &copy;
			<script>
				document.write(new Date().getFullYear());
			</script>
			<a href="https://dpupr.blorakab.go.id/" target="_blank">Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Blora</a></strong> All rights
			reserved.
		</div>
	</div>

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

	<script src="landing/adi/ol.js" type="text/javascript"></script>
	<script src="landing/adi/ol-popup.js"></script>

	<!-- page script -->
	<script>
		$(function() {

			//Initialize Select2 Elements
			$(".select2").select2();

			//Datemask dd/mm/yyyy
			$("#datemask").inputmask("dd/mm/yyyy", {
				"placeholder": "dd/mm/yyyy"
			});
			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", {
				"placeholder": "mm/dd/yyyy"
			});
			//Money Euro
			$("[data-mask]").inputmask();

			//Date range picker
			$('#reservation').daterangepicker();
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				format: 'MM/DD/YYYY h:mm A'
			});
			//Date range as a button
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
		function focusOnEnter(evt) {
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode == 13) {
				document.getElementById("lariku1").click();
			}

		}

		function addLogin(myuser, mypass) {
			//popup.hide();
			var myuser = document.getElementById("username").value;
			var mypass = document.getElementById("password").value;

			if (myuser === "") {
				alert("Harap Isikan username..");
				return false;
			}
			if (mypass === "") {
				alert("Harap Isikan password..");
				return false;
			}

			$.ajax({
				type: "GET",
				url: "getLoginMap.php",
				data: {
					userku: myuser,
					passku: mypass
				},
				beforeSend: function() {
					document.getElementById("divLoading").style.display = "block";

				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLogin();
					document.getElementById("divLoading").style.display = "none";
					document.location.reload();

				}
			});

		}

		function runScript(e) {
			//See notes about 'which' and 'key'
			if (e.keyCode == 13) {
				addLogin('', '');
				return false;
			}
		}

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
				fill: new ol.style.Fill({
					color: 'black'
				}),
				stroke: new ol.style.Stroke({
					color: 'yellow',
					width: 1
				}),
				offsetX: -20,
				offsetY: 20
			})
		});

		function addMainLayerPoint(mytable, mystyle, mycheck, myvec) {
			//alert("ccc");
			$.ajax({
				type: "GET",
				url: "landing/getLayerPoint.php",
				data: {
					table: mytable,
					styleku: mystyle,
					checkku: mycheck,
					vecku: myvec
				},
				beforeSend: function() {


				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLayer();


				}
			});
		}

		function removeFeatures(id) {
			var features = id.getFeatures();
			for (var i = 0; i < features.length && i < 80000; i++) {
				id.removeFeature(features[i]);

			}
		}

		function addMainLayerMap_Label_Umum(mytable, mytampil, mysource) {
			popup.hide();
			$.ajax({
				type: "GET",
				url: "landing/getLayerMap_Label_Umum.php",
				data: {
					table: mytable,
					tampil: mytampil,
					source: mysource
				},
				beforeSend: function() {
					document.getElementById("divLoading").style.display = "block";

				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLayer();
					document.getElementById("divLoading").style.display = "none";

				}
			});

		}

		function addMainLayerMap_Label(mytable, mytampil, mysource) {
			popup.hide();
			$.ajax({
				type: "GET",
				url: "landing/getLayerMap_Label.php",
				data: {
					table: mytable,
					tampil: mytampil,
					source: mysource
				},
				beforeSend: function() {
					document.getElementById("divLoading").style.display = "block";

				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLayer();
					document.getElementById("divLoading").style.display = "none";

				}
			});

		}

		function addMainLayerMap_Label_Filter(mytable, mytampil, mysource, myfilter, myfieldku) {
			popup.hide();
			$.ajax({
				type: "GET",
				url: "landing/getLayerMap_Label_Filter.php",
				data: {
					table: mytable,
					tampil: mytampil,
					source: mysource,
					filter: myfilter,
					fieldku: myfieldku
				},
				beforeSend: function() {
					document.getElementById("divLoading").style.display = "block";

				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLayer();
					document.getElementById("divLoading").style.display = "none";

				}
			});

		}

		function addMainLayerMap(mytable, mytampil, mysource) {
			popup.hide();
			$.ajax({
				type: "GET",
				url: "landing/getLayerMap.php",
				data: {
					table: mytable,
					tampil: mytampil,
					source: mysource
				},
				beforeSend: function() {
					document.getElementById("divLoading").style.display = "block";

				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLayer();
					document.getElementById("divLoading").style.display = "none";

				}
			});

		}

		function addLogin(myuser, mypass) {
			//popup.hide();
			var myuser = document.getElementById("username").value;
			var mypass = document.getElementById("password").value;

			if (myuser === "") {
				alert("Harap Isikan username..");
				return false;
			}
			if (mypass === "") {
				alert("Harap Isikan password..");
				return false;
			}

			$.ajax({
				type: "GET",
				url: "getLoginMap.php",
				data: {
					userku: myuser,
					passku: mypass
				},
				beforeSend: function() {
					document.getElementById("divLoading").style.display = "block";

				},
				success: function(result) {
					$("#divMainLayer").html(result);
					processLogin();
					document.getElementById("divLoading").style.display = "none";
					document.location.reload();

				}
			});

		}

		var hybridku = new ol.layer.Tile({
			'title': 'Google Maps Uydu',
			'type': 'base',
			visible: true,
			'opacity': 1.000000,
			source: new ol.source.XYZ({
				attributions: [new ol.Attribution({
					html: '<a href=""></a>'
				})],
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
					new ol.Attribution({
						html: '© Google'
					}),
					new ol.Attribution({
						html: '<a href="https://developers.google.com/maps/terms"><?php echo $judul; ?></a>'
					})
				]
			})
		});

		var olview = new ol.View({
			center: ol.proj.transform([111.398379, -7.066859], 'EPSG:4326', 'EPSG:3857'),
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
			layerFeatures = new ol.layer.Vector({
				source: sourceFeatures
			});

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

		var sketch;
		sketch = null;

		var sketchElement;
		sketchElement = null;

		var sketch1;
		sketch1 = null;

		var sketchElement1;
		sketchElement1 = null;

		var sketchadi;
		sketchadi = "selesai";

		<?php
		$sql2 = " select * from one_peta where deleted='0' ";
		if ((!urlencode($_COOKIE['oneid'])) || (urlencode($_COOKIE['oneid']) == "")) {
			$sql2 = $sql2 . " and status='0' ";
		}
		//echo $sql1;
		$result2 = mysqli_query($link, $sql2);
		if ($result2) {
			while ($row2 = mysqli_fetch_array($result2)) {
		?>

				var sourceFeatures<?php echo $row2['id']; ?> = new ol.source.Vector(),
					layerFeatures<?php echo $row2['id']; ?> = new ol.layer.Vector({
						source: sourceFeatures<?php echo $row2['id']; ?>
					});
		<?php
			}
		}
		?>

		var map = new ol.Map({
			controls: [scaleLineControl, mousePositionControl, new ol.control.OverviewMap()],

			target: document.getElementById('map'),
			loadTilesWhileAnimating: true,
			loadTilesWhileInteracting: true,
			view: olview,
			renderer: 'canvas',
			layers: [
				googleku, bingku, esriku, osmku, stamenku, stamenkulabel, hybridku,

				<?php
				$sql3 = " select * from one_peta where deleted='0' ";
				if ((!urlencode($_COOKIE['oneid'])) || (urlencode($_COOKIE['oneid']) == "")) {
					$sql3 = $sql3 . " and status='0' ";
				}
				//echo $sql1;
				$result3 = mysqli_query($link, $sql3);
				if ($result3) {
					while ($row3 = mysqli_fetch_array($result3)) {
				?>
						layerFeatures<?php echo $row3['id']; ?>,
				<?php
					}
				}
				?>


				layerFeatures, vectorLayerLokasi, vector
			]
		});

		osmku.setVisible(true);
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		esriku.setVisible(false);
		bingku.setVisible(false);
		googleku.setVisible(false);
		hybridku.setVisible(false);

		var popup = new ol.Overlay.Popup;
		popup.setOffset([0, -55]);
		map.addOverlay(popup);

		map.on('dblclick', function(evt) {
			sketchadi = 'selesai';
		});

		map.on('click', function(evt) {
			if (sketchadi == 'mulai') {
				var lonlat = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
				var lon = lonlat[0];
				var lat = lonlat[1];
				//alert(lon+" "+lat);
				document.getElementById('koordinatku').value = document.getElementById('koordinatku').value + " , " + lon + " " + lat;
			}
			var content = '<div id="Adi"></div>';
			popup.hide();
			//document.getElementById("boxku4").style.display  = "none";
			var f = map.forEachFeatureAtPixel(
				evt.pixel,
				function(ft, layer) {

					//alert(sketchadi);
					//var geometry = f.getGeometry();
					popup.hide();

					//alert(sketchadi);
					//sketchadi = "selesai";
					var coord = evt.coordinate;
					var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
						coord, 'EPSG:3857', 'EPSG:4326'));
					var xy = ol.coordinate.toStringXY(ol.proj.transform(
						coord, 'EPSG:3857', 'EPSG:4326'), 5);


					if (ft.getId() === undefined) {
						//alert('tes');
						var content = '<div id="Adi">' + getKonten('', xy, document.getElementById("measureOutput").innerHTML, document.getElementById('koordinatku').value) + '</div>';
					} else {
						var content = '<div id="Adi">' + getKonten(ft.getId(), xy, hdms, document.getElementById('koordinatku').value) + '</div>';

					}

					if (sketchadi == 'selesai') {
						popup.show(coord, content);
						document.getElementById('koordinatpopup').value = xy;
						document.getElementById('koordinatpopuphdms').value = hdms;
						return ft;
					}
				}
			);
		});

		document.getElementById('export-png').addEventListener('click', function() {
			map.once('postcompose', function(event) {
				var canvas = event.context.canvas;
				event.context.textAlign = 'right';
				event.context.fillText('© ' + '<?php echo date("Y"); ?> <?php echo $judul; ?>', canvas.width - 5, canvas.height - 5);
				canvas.toBlob(function(blob) {
					saveAs(blob, 'map.png');
				});
			});
			map.renderSync();
		});

		function AdiLoad() {
			document.getElementById("measureOutput").innerHTML = "";
			document.getElementById("type1").disabled = true;
			document.getElementById("areaku").disabled = true;
			document.getElementById("koordinatku").value = "";

			var mouseMoveHandler = function(evt) {
				if (sketch) {
					var output;
					var geom = (sketch.getGeometry());
					if (geom instanceof ol.geom.Polygon) {
						output = formatArea( /** @type {ol.geom.Polygon} */ (geom));

					} else if (geom instanceof ol.geom.LineString) {
						output = formatLength( /** @type {ol.geom.LineString} */ (geom));
					}
					sketchElement.innerHTML = output;
				}


			};

			$('#zoom2').click(function() {
				var view = map.getView();
				var zoom = view.getZoom();
				view.setZoom(zoom - 1);
			});

			$('#zoom1').click(function() {
				var view = map.getView();
				var zoom = view.getZoom();
				view.setZoom(zoom + 1);
			});

			$('#radio1').click(function() {
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

			$('#radio2').click(function() {
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

			$('#radio3').click(function() {
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

			$('#radio4').click(function() {
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

			$('#radio5').click(function() {
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

			$('#radio6').click(function() {
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
				var satu = parseFloat(document.getElementById("longitude").value);
				var dua = parseFloat(document.getElementById("latitude").value);
				addMainLayerPoint('', 'customStyleLokasi', satu, dua);
				map.getView().setCenter(ol.proj.transform([satu, dua], 'EPSG:4326', 'EPSG:3857'));
				map.getView().setZoom(16);
			});

			$('#lariku').click(function() {
				var satu = parseFloat(document.getElementById("longitude").value);
				var dua = parseFloat(document.getElementById("latitude").value);
				var aa = document.getElementById("longitude").value;
				var bb = document.getElementById("latitude").value;
				if (aa == null || aa == "", bb == null || bb == "") {
					alert("Isikan Longitude dan Latitude");
					return false;
				}

				addMainLayerPoint('', 'customStyleLokasi', satu, dua);

				map.getView().setCenter(ol.proj.transform([satu, dua], 'EPSG:4326', 'EPSG:3857'));
				map.getView().setZoom(16);
				klikku4();

			});

			$('#pola_ruang').click(function() {
				if (document.getElementById("pola_ruang").checked == true) {
					//alert('klik');
					addMainLayerMap_Label('one_peta', 'rencana_pola_ruang', 'sourceFeatures');
					document.getElementById("type1").disabled = false;
					document.getElementById("areaku").disabled = false;
					document.getElementById("koordinatku").value = "";
				} else {
					//alert('unklik');
					removeFeatures(sourceFeatures);
					document.getElementById("type1").disabled = true;
					document.getElementById("areaku").disabled = true;
					document.getElementById("koordinatku").value = "";
				}

			});

			<?php
			$sql4 = " select * from one_peta where deleted='0' ";
			if ((!urlencode($_COOKIE['oneid'])) || (urlencode($_COOKIE['oneid']) == "")) {
				$sql4 = $sql4 . " and status='0' ";
			}
			//echo $sql1;
			$result4 = mysqli_query($link, $sql4);
			if ($result4) {
				while ($row4 = mysqli_fetch_array($result4)) {
			?>
					$('#checkbox<?php echo $row4['id']; ?>').click(function() {
						if (this.checked) {
							//alert("checked");
							removeFeatures(sourceFeatures<?php echo $row4['id']; ?>);
							addMainLayerMap_Label_Umum('one_peta', '<?php echo $row4['tabel']; ?>', 'sourceFeatures<?php echo $row4['id']; ?>');

						} else {
							removeFeatures(sourceFeatures<?php echo $row4['id']; ?>);
						}
					});

			<?php
				}
			}
			?>

			map.on('pointermove', function(e) {
				if (e.dragging) {
					popup.hide();
					return;
				}

				var pixel = map.getEventPixel(e.originalEvent);
				var hit = map.hasFeatureAtPixel(pixel);

				map.getTarget().style.cursor = hit ? 'pointer' : '';
			});

			$(map.getViewport()).on('mousemove', mouseMoveHandler);

			var typeSelect = document.getElementById('type');
			var typeSelect1 = document.getElementById('type1');
			var draw; // global so we can remove it later

			function addInteraction() {
				//var type = (typeSelect.value == 'area' ? 'Polygon' : 'LineString');
				if (typeSelect.value === 'Square') {
					type = 'Circle';
				} else if (typeSelect.value === 'area') {
					type = 'Polygon';
				} else if (typeSelect.value === 'length') {
					type = 'LineString';
				}


				if (typeSelect1.value === 'Square') {
					type = 'Circle';
				} else if (typeSelect1.value === 'area') {
					type = 'Polygon';
				} else if (typeSelect1.value === 'length') {
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
						document.getElementById("measureOutput").innerHTML = "";
						sketch = evt.feature;
						sketchElement = document.createElement('li');
						sketchadi = "mulai";
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
						sketchadi = "mulai";
						map.removeInteraction(draw);
						//document.getElementById("type").value="None";

						document.getElementById('type').innerText = null;

						$('#type')
							.find('option')
							.remove()
							.end()
							.append('<option value="None">Pilih Model Pengukuran</option>')
							.append('<option value="length">Jarak</option>')
							.append('<option value="area">Luas</option>')
							.val('None');

						$("#type").val($("#type option:first").val());
						$("#type option:first").attr('selected', 'selected');
						$('#type option:first').prop('selected', true);


						document.getElementById('type1').innerText = null;

						$('#type1')
							.find('option')
							.remove()
							.end()
							.append('<option value="None">Pilih Mode Pencarian</option>')
							.append('<option value="area">Polygon Area</option>')
							.val('None');

						$("#type1").val($("#type1 option:first").val());
						$("#type1 option:first").attr('selected', 'selected');
						$('#type1 option:first').prop('selected', true);
					}, this);
			}

			/**
			 * Let user change the geometry type.
			 * @param {Event} e Change event.
			 */
			typeSelect.onchange = function(e) {
				map.removeInteraction(draw);
				klikku4();
				var isi = document.getElementById('type').value;
				if (isi == "None") {
					document.getElementById("koordinatku").value = "";
					document.getElementById("measureOutput").innerHTML = "";
					removeFeatures(vectorSourceLokasi);
					source.clear();
					map.removeInteraction(draw);
				} else {
					document.getElementById("koordinatku").value = "";
					document.getElementById("measureOutput").innerHTML = "";
					removeFeatures(vectorSourceLokasi);
					source.clear();
					addInteraction();
				}
			};

			/**
			 * Let user change the geometry type.
			 * @param {Event} e Change event.
			 */
			typeSelect1.onchange = function(e) {
				map.removeInteraction(draw);
				klikku4();
				var isi = document.getElementById('type1').value;
				if (isi == "None") {
					document.getElementById("koordinatku").value = "";
					document.getElementById("measureOutput").innerHTML = "";
					removeFeatures(vectorSourceLokasi);
					source.clear();
					map.removeInteraction(draw);
				} else {
					document.getElementById("koordinatku").value = "";
					document.getElementById("measureOutput").innerHTML = "";
					removeFeatures(vectorSourceLokasi);
					source.clear();
					addInteraction();
				}
			};

			/**
			 * format length output
			 * @param {ol.geom.LineString} line
			 * @return {string}
			 */
			var formatLength = function(line) {
				var length = Math.round(line.getLength() * 100) / 100;
				var output;
				if (length > 100) {
					output = 'Panjang = ' + (Math.round(length / 1000 * 100) / 100) +
						' ' + 'km';
				} else {
					output = 'Panjang = ' + (Math.round(length * 100) / 100) +
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
					output = 'Luas = ' + (Math.round(area / 1000000 * 100) / 100) +
						' ' + 'km<sup>2</sup>';
				} else {
					output = 'Luas = ' + (Math.round(area * 100) / 100) +
						' ' + 'm<sup>2</sup>';
				}
				return output;
			};

			addInteraction();
			map.removeInteraction(draw);




		}

		function GetXmlHttpObject() {
			var xmlHttp = null;
			try {
				// Firefox, Opera 8.0+, Safari
				xmlHttp = new XMLHttpRequest();
			} catch (e) {
				// Internet Explorer
				try {
					xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			}
			return xmlHttp;
		}

		function getKonten(str, str1, str2, str3) {
			//alert("");	
			xmlHttp = GetXmlHttpObject()
			if (xmlHttp == null) {
				alert("Your browser does not support AJAX!");
				return;
			}
			document.getElementById("loadingstat").innerHTML = "<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
			var url = "landing/getKonten2.php";
			url = url + "?no1=" + str + "&no2=" + str1 + "&no3=" + str2 + "&no4=" + str3;
			xmlHttp.onreadystatechange = kontenChanged;
			xmlHttp.open("GET", url, true);
			//alert("hahahahaha");
			xmlHttp.send(null);
			//document.cookie = 'CookieTahunwilayah='+selValue;

		}

		function kontenChanged() {

			document.getElementById("loadingstat").innerHTML = "";
			document.getElementById("Adi").innerHTML = xmlHttp.responseText;
		}

		function isNumberKey(evt) {
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode != 46 && charCode > 31 &&
				(charCode < 44 || charCode > 57))
				return false;

			return true;
		}

		function klikku4() {
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

		function clearku() {
			document.getElementById("latitude").value = "";
			document.getElementById("longitude").value = "";
		}

		function klikku5() {

			document.getElementById("koordinatku").value = "";
			removeFeatures(vectorSourceLokasi);
			source.clear();

		}

		function klikku6() {

			document.getElementById("koordinatku").value = "";
			document.getElementById("measureOutput").innerHTML = "";
			removeFeatures(vectorSourceLokasi);
			source.clear();

		}

		function addbutton(str) {
			//Create an input type dynamically.   
			var btn = document.createElement("BUTTON");
			btn.id = str;
			var t = document.createTextNode(str);
			btn.appendChild(t);
			btn.onclick = function() { // Note this is a function
				showku(btn.id);
			};

			var foo = document.getElementById("fooBar");
			//Append the element in page (in span).  
			foo.appendChild(btn);
		}

		function removeElement(elementId) {
			// Removes an element from the document
			var element = document.getElementById(elementId);
			element.parentNode.removeChild(element);
		}

		function showku(str) {
			$('#costumModal6').modal('show');
			ubahhalaman(str);
		}

		function ubahhalamansetting(id) {
			var xx = id;
			//alert(xx);
			var iframe = document.getElementById('iframetabelsetting');
			iframe.src = xx;
		}

		function showkusetting(str) {
			$('#costumModalSettingPeta').modal('show');
			ubahhalamansetting(str);
		}

		function ubahhalaman(id) {
			var xx = id;
			//alert(xx);
			var iframe = document.getElementById('iframetabel');
			iframe.src = xx;
		}

		function showdataku(str) {
			$('#costumModal6').modal('show');
			ubahhalamandata(str);
		}

		function ubahhalamandata(id) {
			var xx = id;
			//alert(xx);
			var iframe = document.getElementById('iframetabel');
			iframe.src = "backoffice/tabel.php?tabel=" + xx;
		}

		function cek(id) {
			//alert("aaa");
			document.getElementById("aaddii").src = id;
		}

		function gantiisi(str, str1) {
			alert(str);
			alert(str1);

			var strku = str;
			var res = strku.replace("#", "");

			xmlHttp = GetXmlHttpObject()
			if (xmlHttp == null) {
				alert("Your browser does not support AJAX!");
				return;
			}
			document.getElementById("loadingstat").innerHTML = "<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";

			var url = "getField.php";
			url = url + "?no1=" + res + "&no2=" + str1;
			xmlHttp.onreadystatechange = function() {
				document.getElementById("loadingstat").innerHTML = "";
				document.getElementById("loadingstat").innerHTML = xmlHttp.responseText;
			}
			xmlHttp.open("GET", url, true);
			//alert("hahahahaha");
			xmlHttp.send(null);


			//$('#costumModal5').modal('hide');
			//$('#costumModal5').modal('show');

		}

		$("#checkboxPilihSemua").click(function() {
			if ($("#checkboxPilihSemua").is(':checked')) {
				$("#kabkotku > option").prop("selected", "selected");
				$("#kabkotku").trigger("change");
			} else {
				$("#kabkotku > option").removeAttr("selected");
				$("#kabkotku").trigger("change");
			}
		});

		function logout() {
			//alert(id1);
			//alert(id2);
			if (confirm("Logout Aplikasi?")) {
				//alert("Hapus");
				window.location = 'logout.php?maukeluar=iya';
			}
		}

		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}

		function showket() {
			if (document.getElementById("copyright-wrap").style.display == "none") {
				document.getElementById("copyright-wrap").style.display = "block";
				document.getElementById("pengukuran").style.display = "none";
			} else {
				document.getElementById("copyright-wrap").style.display = "none";
				document.getElementById("pengukuran").style.display = "none";
			}
		}

		function showketpengukuran() {
			if (document.getElementById("pengukuran").style.display == "none") {
				document.getElementById("pengukuran").style.display = "block";
				document.getElementById("copyright-wrap").style.display = "none";
			} else {
				document.getElementById("pengukuran").style.display = "none";
				document.getElementById("copyright-wrap").style.display = "none";
			}
		}

		function gantifoto(str, str1) {
			var uploadfiles = document.querySelector('#' + str);
			var files = uploadfiles.files;
			for (var i = 0; i < files.length; i++) {
				uploadFile(uploadfiles.files[i], str1);
			}

			function uploadFile(file, str) {
				var url = "server/index.php?kode=" + str;
				var xhr = new XMLHttpRequest();
				var fd = new FormData();
				xhr.open("POST", url, true);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4 && xhr.status == 200) {
						// Every thing ok, file uploaded
						console.log(xhr.responseText); // handle response.
						alert("foto telah terupload ada data telah diupdate silahkan reload halaman untuk melihat perubahan..");
					}
				};
				fd.append('uploaded_file', file);
				xhr.send(fd);
			}

		}

		function kembalikemenuutama() {
			<?php
			if ($_COOKIE['onelevel'] == '') {
			?>
				window.location = 'simtaru-blora';
			<?php
			} else if ($_COOKIE['onelevel'] == '1') {
			?>
				window.location = 'simtaru-dashboard';
			<?php
			} else {
			?>
				window.location = 'simtaru-d4shumum';
			<?php
			}
			?>
		}

		function basemap() {
			// $('#myModalBaseMap').modal('show');
			const sidebar = document.getElementById("sidebar_layer");
			if (sidebar.classList.contains("tarik_kanan")) {
				sidebar.classList.remove("tarik_kanan");
			}
			$('#target_base_map').trigger('click');
		}

		function layerku() {
			$('#myModalLayer').modal('show');
		}

		function show_layer() {
			const sidebar = document.getElementById("sidebar_layer");
			if (sidebar.classList.contains("tarik_kanan")) {
				sidebar.classList.remove("tarik_kanan");
			}
			$('#target_layer').trigger('click');
		}

		function hide_layer() {
			const sidebar = document.getElementById("sidebar_layer");
			sidebar.classList.add("tarik_kanan");
		}
	</script>

</body>

</html>