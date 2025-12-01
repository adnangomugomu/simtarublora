<?php 
include '../library/config.php'; 
date_default_timezone_set("Asia/Jakarta");
check_injection();
check_login();
$action=urlencode($_POST['action']);
$ket=urlencode($_GET['ket']);
$tempkodeid=decrypt(urlencode($_GET['str']));
if (($_POST['action']=='edit') || ($tempkodeid) || ($tempkodeid<>''))
{
	$sql="select * from si_permohonan_usaha where deleted='0' and id='".$tempkodeid."'";
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
	<script src="landing/jspdf.min.js"></script>
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
	font-family: 'Karla', sans-serif;
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
	font-family: 'Karla', sans-serif;
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
	font-family: 'Karla', sans-serif;
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
	font-family: 'Karla', sans-serif;
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
	font-family: 'Karla', sans-serif;
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
    font-family: 'Karla', sans-serif;
    font-weight: 400;
	font-size: 12px;
}

h1, h2, h3, h4, h5, h6 {
    font-family: 'Karla', sans-serif;
    font-weight: 700;
	letter-spacing: 2px;
	font-size: 12px;
}

.button {
    font-family: 'Karla', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}


input {
    font-family: 'Karla', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}


nav.navbar li a {
  	font-family: 'Karla', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}

p {
    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

div {
    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

button {
    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}


/* Input field */
.select2-selection__rendered { 

    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Around the search field */
.select2-search { 

    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Search field */
.select2-search input { 

    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Each result */
.select2-results { 

    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Higlighted (hover) result */
.select2-results__option--highlighted { 

    font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Selected option */
.select2-results__option[aria-selected=true] { 

    font-family: 'Karla', sans-serif;
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
  font-family: 'Karla', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

#map{
    z-index:1;
    width:100%; height:100vh;
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
<body class="hold-transition skin-purple layout-top-nav" onLoad="AdiLoad()" oncontextmenu="return false;">
<button id="export-pdf" class="btn bg-red waves-effect" type="button">Cetak Peta PDF</button>
<div class="card" id="eksportku" style="height:800px;">
						<table class="table table-striped table-bordered table-hover" align="left">
						<tr>
							<td data-title="Peta" colspan="4">
							<div class="col-md-9">
							<div id="divLoading"></div>
							<div class="box-body" id="map">
							  <div id="mouse-position" style="top:90px; right:20px; z-index:2;position:absolute;color:#FF0000;font-family:'Mangal',Verdana, Arial, Helvetica, sans-serif;"></div>
							  <div id="divMainLayer"></div>
							</div>
							</div>
							<div class="col-md-3"> 
							  <h6 class="attachment-heading"><b><a href="#">Keterangan</a></b></h6>
								  <table align="left">
								  <?php
								  $sql="select KELAS_III,fillku from rencana_pola_ruang group by KELAS_III,fillku; ";
								  $result=mysqli_query($link,$sql);
								  if ($result)
								  {
									$i=1;
									while ($row=mysqli_fetch_array($result))
									{
									?>
									<tr align="left">
									<td style="background-color:<?php echo $row['fillku']; ?>;padding:1px;" width="24px;" align="left">&nbsp;&nbsp;</td>
									<td valign="top" style="padding:1px;color:#000000;font-size:9px;" align="left"><?php echo $row['KELAS_III']; ?></td>
									</tr>
									<?php 
									$i++;
									}
									?>
									<tr align="left">
									<td style="background-color:#CCCCCC;padding:1px;border:#FF9900 solid 2px;" width="24px;" align="left">&nbsp;&nbsp;</td>
									<td valign="top" style="padding:1px;color:#000000;font-size:9px;" align="left">Lokasi Survei</td>
									</tr>
									<tr align="left">
									<td valign="top" colspan="2" align="left">Luas Lokasi : <?php echo replace_dot_koma($luastanah); ?> m<sup>2</sup></td>
									</tr>
									<tr align="left">
									<td valign="top" colspan="2" align="left">Permohonan Penggunaan Lahan : <?php echo $peruntukkanpermohonantataruang; ?></td>
									</tr>
									<?php 
								  }
								  ?>
								  </table>
							</div>	
							<!-- /.col -->
							</td>
						</tr>
						</table> 
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
bingku.setVisible(true);
googleku.setVisible(false);
hybridku.setVisible(false);

document.getElementById('export-pdf').addEventListener('click', function() {

var doc = new jsPDF('l', 'mm', [330, 210]);
    doc.addHTML($('#eksportku')[0], 5, 5, {
 	  'background': '#fff',
    }, function() {
      doc.save('Lampiran 6 Peta Lokasi.pdf');
    });



});

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
            && (charCode < 46 || charCode > 57))
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
	addMainLayerMap_Label('one_peta','rencana_pola_ruang','sourceFeatures');
	addMainLayerMap_LabelPermohonan('si_permohonan_usaha','<?php echo $tempkodeid; ?>','sourceFeaturesSurvei');
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