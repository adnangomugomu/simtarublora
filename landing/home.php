<?php
session_start();
include '../library/config.php';
include_once 'user_agent.php';
$ua = new UserAgent();
date_default_timezone_set("Asia/Jakarta");
check_injection();

function getIPAddress()
{
	//whether ip is from the share internet  
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from the proxy  
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from the remote address  
	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

$sql = "insert into si_visitor (id, nama, tanggal) values (null,'" . getIPAddress() . "',SYSDATE())";
$result = mysqli_query($link, $sql);
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
	<link href="plugins/select2/select2.css" rel="stylesheet" type="text/css" />
	<link href="plugins/select2/select2-bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
	<link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
	<link href="plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media="print" />
	<link href="css/login.css" rel="stylesheet" type="text/css" />
	<link href="css/css.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/introjs-rtl.css" rel="stylesheet">
	<link href="css/introjs.css" rel="stylesheet">

	<style>
		@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap');

		body {
			font-family: 'Roboto', sans-serif;
			font-weight: 400;
			font-size: 12px;
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
			background: white url(loader.gif) no-repeat;
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
			height: 800px;
			top: calc(50% - 400px) !important;
		}

		.ml2 {
			font-weight: 900;
			font-size: 3.5em;
		}

		.ml2 .letter {
			display: inline-block;
			line-height: 1em;
		}

		.ml15 {
			font-weight: 600;
			font-size: 1.2em;
			text-transform: uppercase;
		}

		.ml15 .word {
			display: inline-block;
			line-height: 1em;
		}

		.wellcome-heading {
			font-size: 50px;
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
			border: 1px solid #008000;
			color: #87CEFA;
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

		textarea {
			width: 100%;
			box-sizing: border-box;
			border: 1px solid #ccc;
			border-radius: 10px;
			font-family: 'Roboto', sans-serif;
			font-weight: 300;
			font-size: 12px;
		}

		a {
			color: #008000;
			font-weight: bold;
		}

		.body_container {
			min-height: 100vh;
			background-color: #ecf0f5;
			display: flex;
			flex-direction: column;
		}

		.icon_list {
			flex: 1;
			display: flex;
			justify-content: center;
			gap: 15px;
		}

		.icon_container {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		.gambar_ikon {
			width: 150px;
			filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
			cursor: pointer;
			transition: all 0.3s ease;
		}

		.gambar_ikon:hover {
			scale: 1.1;
		}

		.main-footer {
			margin-left: 0;
		}

		.header_custom {
			font-size: 35px;
			color: #000000;
			font-weight: 700;
		}

		.sub_header_custom {
			font-size: 20px;
			color: #000000;
		}

		.header_logo {
			width: 200px;
			margin-bottom: 15px;
		}

		.header_container {
			margin-top: 70px;
		}

		.btn_custom {
			margin-top: -8px;
			text-transform: capitalize;
			padding: 5px 20px;
			transition: all 0.3s ease;
			border-radius: 100px;
		}

		.btn_custom:hover {
			background-color: #008000;
			color: #ffffff;
		}
	</style>
</head>

<body>

	<div id="costumModalpilihan" class="modal" data-easein="flipBounceXIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#00a65a;">
					<h1 class="modal-title">
						<center>
							<div class="wellcome-heading wow bounceIn">
								<img src="images/logo.png" height="50"><br><br>
							</div>
							<span style="color:#FFFFFF;">Penjelasan Dan Ketentuan <?php echo $judulWeb; ?></span>
						</center>
					</h1>
				</div>
				<div class="modal-body">
					<div class="row" style="padding:15px;">
						<p align="justify">
						<div align="justify" style="font-size:12px;color:#7b7877;">
							<strong>TEMATA </strong>Blora (Sistem Informasi Tata Ruang Kabupaten Blora) merupakan layanan dan sistem informasi manajemen (alat kerja) yang mempunyai utilitas layanan permohonan dokumen kajian PKKPR Nonberusaha secara online beserta lokasi - lokasi spasial yang ada di Kabupaten Blora dibawah kewenangan DPUPR Kabupaten Blora.
						</div>
						<br>
						<div align="justify" style="font-size:12px;color:#7b7877;">
							Data yang ada di <strong>TEMATA </strong>Blora (Sistem Informasi Tata Ruang Kabupaten Blora) merupakan data yang sudah menjadi produk hukum (PP, Perpres, Perda Provinsi, Perda Kabupaten Kota).
						</div>
						<br>
						<div align="justify" style="font-size:12px;color:#7b7877;">
							DPUPR Kabupaten Blora tidak bertanggungjawab atas segala kesalahan atau kerugian yang timbul karena tindakan yang berkaitan dengan penggunaan data/informasi yang disajikan pada <strong>TEMATA </strong>Blora (Sistem Informasi Tata Ruang Kabupaten Blora).
						</div>
						<br>
						<div align="justify" style="font-size:12px;color:#7b7877;">
							DPUPR Kabupaten Blora tidak bertanggungjawab atas data/informasi yang disampaikan oleh pihak ketiga yang menggunakan utilitas pada <strong>TEMATA </strong>Blora (Sistem Informasi Tata Ruang Kabupaten Blora) dan berlaku sebaliknya.
						</div>
						<br>
						<div align="justify" style="font-size:12px;color:#7b7877;">
							Bagi pengguna yang ingin mengajukan permohonan dokumen kajian PKKPR Nonberusaha secara online mohon login atau registrasi dahulu.
						</div>
						<br>
						<center>
							<input type="checkbox" id="setuju" name="setuju" value="setuju" style="color:#990000;" onClick="setuju(this.checked)">
							<label for="setuju" style="color:#7b7877;font-size:12px;"> Saya mengerti dan menyetujui penjelasan dan ketentuan diatas.</label>
						</center>
						</p>
					</div>
					<center>

						<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Masuk Ke Sistem" style="width:220px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true" disabled="disabled" id="lanjut"><i class="fa fa-check-circle"></i> Setuju & Lanjutkan </button>
					</center>

				</div>
			</div>
		</div>
	</div>

	<div id="divLoading"></div>

	<section class="body_container">

		<div class="text-center header_container">
			<img class="header_logo" src="images/logo.png" alt="logo">
			<div class="header_custom">SELAMAT DATANG DI TEMATA BLORA</div>
			<div class="sub_header_custom">Sistem Informasi Tata Ruang Kabupaten Blora</div>
		</div>

		<div class="icon_list">
			<div class="icon_container">
				<div>
					<img class="gambar_ikon" src="images/peta.png" title="Memuat Peta SIG Tata Ruang Kabupaten Blora" onclick="peta();" />
				</div>
				<button type="button" class="btn btn_custom" title="Memuat Peta SIG Tata Ruang Kabupaten Blora" onclick="peta();">peta tata ruang online</button>
			</div>
			<div class="icon_container">
				<div>
					<img class="gambar_ikon" src="images/caridata.png" onclick="daftardataperuntukkan();" title="Data Peruntukkan Tata Ruang" />
				</div>
				<button type="button" class="btn btn_custom" title="Data Peruntukkan Tata Ruang" onclick="daftardataperuntukkan();">peruntukkan tata ruang blora</button>
			</div>
			<div class="icon_container">
				<div>
					<img class="gambar_ikon" src="images/dasarhukum.png" alt="Responsive image" onclick="unduh();" title="Daftar Dasar Hukum & Publikasi Tata Ruang" />
				</div>
				<button type="button" class="btn btn_custom" title="Daftar Dasar Hukum & Publikasi Tata Ruang" onclick="unduh();">publikasi tata ruang blora</button>
			</div>
			<div class="icon_container">
				<div>
					<img class="gambar_ikon" src="images/pengaduanmasy.png" alt="Responsive image" onclick="aduan();" title="Layanan Aduan Masyarakat" />
				</div>
				<button type="button" class="btn btn_custom" title="Layanan Aduan Masyarakat" onclick="aduan();">layanan aduan masyarakat</button>
			</div>
			<div class="icon_container">
				<div>
					<img class="gambar_ikon" src="images/kontak.png" alt="Responsive image" onclick="offline();" title="Kontak Kami" />
				</div>
				<button type="button" class="btn btn_custom" title="Kontak Kami" onclick="offline();">layanan kontak kami</button>
			</div>
			<div class="icon_container">
				<div>
					<img class="gambar_ikon" src="images/loginlogo.png" alt="Responsive image" onclick="loginsintar();" title="Masuk Halaman Admin / User Sistem" />
				</div>
				<button type="button" class="btn btn_custom" title="Masuk Halaman Admin / User Sistem" onclick="loginsintar();">login temata blora</button>
			</div>
		</div>

		<?php include 'footer.php'; ?>
	</section>

	<div id="costumModalprofile" class="modal" data-easein="flipBounceXIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#00a65a;">
					<h4 class="modal-title" style="color:#FFFFFF;font-weight:bold;">
						<center>
							<img src="images/login.png" height="50"><br>
							Profile User TEMATA BLORA
						</center>
					</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="simtaru-updateprofile" method="POST" enctype="multipart/form-data">
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="nama">Instansi</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="id_instansiprofile" class="rounded" id="id_instansiprofile" placeholder="Instansi" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="username">Username</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="usernameprofile" class="rounded" id="usernameprofile" placeholder="Username" value="" required>
								<input type="hidden" name="id_userprofile" class="rounded" id="id_userprofile" placeholder="Username" value="" required>
								<input type="hidden" name="usernameprofiletmp" class="rounded" id="usernameprofiletmp" placeholder="Username" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="password">Password</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="password" name="passwordprofile" class="rounded" id="passwordprofile" placeholder="Password" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="nama">Nama</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="namaprofile" class="rounded" id="namaprofile" placeholder="Nama" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="nip">NIP</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="nipprofile" class="rounded" id="nipprofile" placeholder="NIP" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="alamat">Alamat</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="alamatprofile" class="rounded" id="alamatprofile" placeholder="Alamat" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="telepon">Telepon</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="teleponprofile" class="rounded" id="teleponprofile" placeholder="Telepon" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="hp">No Hp</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="hpprofile" class="rounded" id="hpprofile" placeholder="No Hp" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="email">Email</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="emailprofile" class="rounded" id="emailprofile" placeholder="Email" value="" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="level">Level</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<select name="id_user_levelprofile" class="form-control select2" id="id_user_levelprofile" required disabled="disabled" style="width:100%;">
									<option value="1">Administrator</option>
									<option value="2">Kepala Bidang</option>
									<option value="3">Staf</option>
									<option value="4">Monitoring</option>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="Foto">Foto</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="file" name="gambarprofile" class="rounded" id="gambarprofile" placeholder="Foto" value="" accept="image/x-png,image/jpeg">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="Foto"><img src="images/" height="50" /></label>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Simpan Data" style="width:100px;background-color:#00a65a;border:#00a65a;" onClick="return confirm('Data Sudah Benar?')"><i class="fa fa-archive"></i> Simpan</button>
					<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Proses" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="costumModallogin" class="modal" data-easein="flipBounceXIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#00a65a;">
					<h1 class="modal-title">
						<center>
							<img src="images/login.png" height="50"><br>
							<span style="color:#FFFFFF;">Login Sistem Informasi Tata Ruang Kabupaten Blora</span>
						</center>
					</h1>
				</div>
				<div class="modal-body">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#login" data-toggle="tab">Login</a></li>
							<li><a href="#register" data-toggle="tab">Register</a></li>
						</ul>
						<div class="tab-content">
							<div class="active tab-pane" id="login">
								<label class="panel-login"></label>
								<p>
								<form action="simtaru-adminlogin" method="post" accept-charset="UTF-8" role="form" class="form-signin">
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nama User</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="username" class="rounded" id="username" placeholder="Nama User" data-toggle="tooltip" data-placement="top" title="Masukkan Nama User" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="password">Kata Kunci</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="password" name="password" class="rounded" id="password" placeholder="Kata Kunci" data-toggle="tooltip" data-placement="top" title="Masukkan Kata Kunci" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="password">Didukung Oleh:</label><br /><img src="images/bse.png" height="80" />
										</div>
									</div>
									</p>
									<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Login Ke Halaman Admin" style="width:100px;background-color:#ee102a;border:#00a65a;"><i class="fa fa-sign-in"></i> Login</button>
									<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Login" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
								</form>
							</div>
							<div class="tab-pane" id="register">
								<label class="panel-login"></label>
								<p>
								<form action="simtaru-adminregister" method="post" accept-charset="UTF-8" role="form" class="form-signin">
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nama Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="namapemohonregister" class="rounded" id="namapemohonregister" placeholder="Nama Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Nama Pemohon" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nomor Identitas Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="noidentitaspemohonregister" class="rounded" id="noidentitaspemohonregister" placeholder="Nomor Identitas Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Nomor Identitas Pemohon" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nomor HP Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="notelpidentitaspemohonregister" class="rounded" id="notelpidentitaspemohonregister" placeholder="Nomor HP Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Nomor HP Pemohon" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Alamat Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<textarea class="rounded" rows="4" name="alamatpemohonregister" id="alamatpemohonregister" data-toggle="tooltip" data-placement="top" title="Masukkan Alamat Pemohon" required></textarea>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Pekerjaan Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="pekerjaanpemohonregister" class="rounded" id="pekerjaanpemohonregister" placeholder="Pekerjaan Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Pekerjaan Pemohon" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Alamat Email Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="emailpemohonregister" class="rounded" id="emailpemohonregister" placeholder="Alamat Email Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Alamat Email Pemohon" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">NPWP Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="npwppemohonregister" class="rounded" id="npwppemohonregister" placeholder="NPWP Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan NPWP Pemohon" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nama User</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="usernameregister" class="rounded" id="usernameregister" placeholder="Nama User" data-toggle="tooltip" data-placement="top" title="Masukkan Nama User" required>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="password">Kata Kunci</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="password" name="passwordusernameregister" class="rounded" id="passwordusernameregister" placeholder="Kata Kunci" data-toggle="tooltip" data-placement="top" title="Masukkan Kata Kunci" required>
										</div>
									</div>
									</p>

									<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Register User" style="width:100px;background-color:#ee102a;border:#00a65a;"><i class="fa fa-user"></i> Register</button>
									<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Register" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="costumModaladuan" class="modal" data-easein="flipBounceXIn" tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:#00a65a;">
					<h1 class="modal-title">
						<center>
							<img src="images/pengaduanmasy.png" height="50"><br>
							<span style="color:#FFFFFF;">Layanan Aduan Sistem Informasi Tata Ruang Kabupaten Blora</span>
						</center>
					</h1>
				</div>
				<div class="modal-body">
					<p>
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Nama</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="namapemohonaduan" class="rounded" id="namapemohonaduan" placeholder="Nama " data-toggle="tooltip" data-placement="top" title="Masukkan Nama " required>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Nomor Identitas</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="noidentitaspemohonaduan" class="rounded" id="noidentitaspemohonaduan" placeholder="Nomor Identitas " data-toggle="tooltip" data-placement="top" title="Masukkan Nomor Identitas " required>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Nomor HP </label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="notelpidentitaspemohonaduan" class="rounded" id="notelpidentitaspemohonaduan" placeholder="Nomor HP " data-toggle="tooltip" data-placement="top" title="Masukkan Nomor HP " required>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Aduan</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<textarea class="rounded" rows="4" name="alamatpemohonaduan" id="alamatpemohonaduan" data-toggle="tooltip" data-placement="top" title="Masukkan Isi Aduan " placeholder="Masukkan Isi Aduan" required></textarea>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">CAPTCHA</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="capsam" class="rounded" id="capsam" placeholder="CAPTCHA" data-toggle="tooltip" data-placement="top" title="CAPTCHA" disabled="disabled" value="ERD1C" style="background-color:#CCCCCC;" required>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Masukkan CAPTCHA</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="isicapcha" class="rounded" id="isicapcha" placeholder="CAPTCHA " data-toggle="tooltip" data-placement="top" title="Masukkan CAPTCHA" onchange="cekcapca(this.value)" onkeypress="cekcapca(this.value)" onkeyup="cekcapca(this.value)" required>
						</div>
					</div>
					</p>
					<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Register User" style="width:100px;background-color:#ee102a;border:#00a65a;" id="kirimmohon" disabled="disabled" onclick="simpanmasukan()"><i class="fa fa-save"></i> Kirim</button>
					<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Register" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
				</div>
			</div>
		</div>
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

	<script>
		$(function() {

			$(".select2").select2();

			$("#datemask").inputmask("dd/mm/yyyy", {
				"placeholder": "dd/mm/yyyy"
			});

			$("#datemask2").inputmask("mm/dd/yyyy", {
				"placeholder": "mm/dd/yyyy"
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

			$('[data-toggle="tooltip"]').tooltip()

		});
	</script>

	<script type="text/javascript">
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
				duration: 1000,
				delay: (el, i) => 1000 * i
			}).add({
				targets: '.ml15',
				opacity: 0,
				duration: 1000,
				easing: "easeOutExpo",
				delay: 1000
			});
	</script>

	<script>
		<?php
		$func = $_GET['func'];
		if ($func == 'incorrect') {
		?>
			$("#costumModallogin").modal();
		<?php
		}
		?>
	</script>
	<script>
		function peta() {
			window.location = 'simtaru-itr_blora';
		}

		function offline() {
			window.location = 'simtaru-offline_blora';
		}

		function daftardataperuntukkan() {
			window.location = 'simtaru-daftardataperuntukkan';
		}

		function unduh() {
			window.location = 'simtaru-f1leunduh';
		}

		function loginsintar() {
			$("#costumModallogin").modal();
		}

		function aduan() {
			$("#costumModaladuan").modal();
		}

		function simpanmasukan() {
			var namapemohonaduan = document.getElementById("namapemohonaduan").value;

			if (namapemohonaduan == '') {
				alert('Harap Mengisi Nama..');
				return false;
			}

			var noidentitaspemohonaduan = document.getElementById("noidentitaspemohonaduan").value;

			if (noidentitaspemohonaduan == '') {
				alert('Harap Mengisi Nomor Identitas..');
				return false;
			}

			var notelpidentitaspemohonaduan = document.getElementById("notelpidentitaspemohonaduan").value;

			if (notelpidentitaspemohonaduan == '') {
				alert('Harap Mengisi Nomor HP..');
				return false;
			}

			var alamatpemohonaduan = document.getElementById("alamatpemohonaduan").value;

			if (alamatpemohonaduan == '') {
				alert('Harap Mengisi Aduan..');
				return false;
			}

			$.ajax({
				type: "POST",
				url: "landing/getsimpandatamasy.php",
				data: {
					namapemohonaduan: namapemohonaduan,
					noidentitaspemohonaduan: noidentitaspemohonaduan,
					notelpidentitaspemohonaduan: notelpidentitaspemohonaduan,
					alamatpemohonaduan: alamatpemohonaduan
				},
				cache: false,
				success: function(data) {
					alert("Data Telah Tersimpan..");
					document.location.reload();
				},
				error: function(xhr, status, error) {
					console.error(xhr);
				}
			});


		}

		<?php
		if (!$_COOKIE["disclaimer"]) {
		?>

			$("#costumModalpilihan").modal();

		<?php
		}
		?>
	</script>

	<script>
		$("#costumModalpilihan").on('hide.bs.modal', function() {
			document.cookie = 'disclaimer=hilang';
		});

		function setuju(str) {
			if (str == true) {
				document.getElementById("lanjut").disabled = false;
			} else {
				document.getElementById("lanjut").disabled = true;
			}
		}
	</script>

</body>

</html>