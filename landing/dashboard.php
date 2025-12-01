<?php 
	  include '../library/config.php'; 
	  date_default_timezone_set("Asia/Jakarta");
	  include_once 'user_agent.php';
	  $ua = new UserAgent();
	  check_injection();
	  check_login();
	  $jumlahpermohonantotal=get_COUNT_Field2('id','si_permohonan','deleted','0','deleted','0');
	  $jumlahpermohonandiproses=get_COUNT_Field2('id','si_permohonan','deleted','0','hasil','0');
	  $jumlahpermohonandisetujui=get_COUNT_Field2('id','si_permohonan','deleted','0','hasil','1');
	  $jumlahpermohonandisetujuisebagian=get_COUNT_Field2('id','si_permohonan','deleted','0','hasil','2');
	  $jumlahpermohonanditolak=get_COUNT_Field2('id','si_permohonan','deleted','0','hasil','3');
	  
	  
	  $jumlahpermohonantotalnon=get_COUNT_Field2('id','si_permohonan_non','deleted','0','deleted','0');
	  $jumlahpermohonandiprosesnon=get_COUNT_Field2('id','si_permohonan_non','deleted','0','hasil','0');
	  $jumlahpermohonandisetujuinon=get_COUNT_Field2('id','si_permohonan_non','deleted','0','hasil','1');
	  $jumlahpermohonandisetujuisebagiannon=get_COUNT_Field2('id','si_permohonan_non','deleted','0','hasil','2');
	  $jumlahpermohonanditolaknon=get_COUNT_Field2('id','si_permohonan_non','deleted','0','hasil','3');
	  
	  $jumlahpermohonantotalusaha=get_COUNT_Field2('id','si_permohonan_usaha','deleted','0','deleted','0');
	  $jumlahpermohonandiprosesusaha=get_COUNT_Field2('id','si_permohonan_usaha','deleted','0','hasil','0');
	  $jumlahpermohonandisetujuiusaha=get_COUNT_Field2('id','si_permohonan_usaha','deleted','0','hasil','1');
	  $jumlahpermohonandisetujuisebagianusaha=get_COUNT_Field2('id','si_permohonan_usaha','deleted','0','hasil','2');
	  $jumlahpermohonanditolakusaha=get_COUNT_Field2('id','si_permohonan_usaha','deleted','0','hasil','3');
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
  font-size: 1.5em;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
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

#grad1 {
    background-color: : #9C27B0;
    background-image: linear-gradient(120deg, #f43151, #3331f4)
}

#grad2 {
    background-color: : #9C27B0;
    background-image: linear-gradient(120deg, #2ccc28, #3331f4)
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

<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url(<?php echo $background ; ?>)">


    <!-- Main content -->
    <section class="content">
				<center>
				<img src="<?php echo $logoatas; ?>" alt="Logo Kab Pemalang" height="50">
				</center>
				
				<?php
				if($ua->is_mobile()){
            	?>
				
				<div class="row vertical-offset-100" >
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
					<center>
					<h1 style="color:#000000;">Dashboard <?php echo $judulWeb ; ?></h1>
					</center>
					</div>
					<div class="col-md-3">
					</div>
					
				</div>
				<?php
				}
				else
				{
				?>
				<div class="row vertical-offset-100" >
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
					<center>
					<h1 class="ml2" style="color:#000000;">Dashboard <?php echo $judulWeb ; ?></h1>
					</center>
					</div>
					<div class="col-md-3">
					</div>
					
				</div>
				<?php 
				}
				?>
				<div class="row vertical-offset-100" >
					<div class="col-md-4">
					</div>
					<div class="col-md-4">
					  <div class="info-box bg-green" id="grad1" style="border-radius:10px;">
						<span class="info-box-icon" style="border-radius:10px;"><i class="fa fa-envelope"></i></span>
			
						<div class="info-box-content">
						  <span>Jumlah Total Permohonan </span><br>
						  <i class="fa fa-jumlah fa-3x"> <?php echo $jumlahpermohonantotalnon; ?></i><br>
						  <a href="simtaru-d4t4nnonkkpr" style="color:#FFFFFF;"><span>Lihat Permohonan</span></a>
						</div>
						<!-- /.info-box-content -->
					  </div>
					</div>
					
					<div class="col-md-4">
					</div>
                </div>
				<div class="row vertical-offset-100" >
					
					<div class="col-md-3">
					  <div class="info-box bg-green" id="grad2" style="border-radius:10px;">
						<span class="info-box-icon" style="border-radius:10px;"><i class="fa fa-envelope"></i></span>
			
						<div class="info-box-content">
						  <span>Permohonan  Diproses</span><br>
						  <i class="fa fa-jumlah fa-3x"> <?php echo $jumlahpermohonandiprosesnon; ?></i><br>
						  <a href="simtaru-d4t4nnonkkpr" style="color:#FFFFFF;"><span>Lihat Permohonan</span></a>
						</div>
						<!-- /.info-box-content -->
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="info-box bg-green" id="grad1" style="border-radius:10px;">
						<span class="info-box-icon" style="border-radius:10px;"><i class="fa fa-envelope"></i></span>
			
						<div class="info-box-content">
						  <span>Permohonan  Disetujui</span><br>
						  <i class="fa fa-jumlah fa-3x"> <?php echo $jumlahpermohonandisetujuinon; ?></i><br>
						  <a href="simtaru-d4t4nnonkkpr" style="color:#FFFFFF;"><span>Lihat Permohonan</span></a>
						</div>
						<!-- /.info-box-content -->
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="info-box bg-green" id="grad2" style="border-radius:10px;">
						<span class="info-box-icon" style="border-radius:10px;"><i class="fa fa-envelope"></i></span>
			
						<div class="info-box-content">
						  <span>Permohonan  Disetujui Sebagian</span><br>
						  <i class="fa fa-jumlah fa-3x"> <?php echo $jumlahpermohonandisetujuisebagiannon; ?></i><br>
						  <a href="simtaru-d4t4nnonkkpr" style="color:#FFFFFF;"><span>Lihat Permohonan</span></a>
						</div>
						<!-- /.info-box-content -->
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="info-box bg-green" id="grad2" style="border-radius:10px;">
						<span class="info-box-icon" style="border-radius:10px;"><i class="fa fa-envelope"></i></span>
			
						<div class="info-box-content">
						  <span>Permohonan  Ditolak</span><br>
						  <i class="fa fa-jumlah fa-3x"> <?php echo $jumlahpermohonanditolaknon; ?></i><br>
						  <a href="simtaru-d4t4nnonkkpr" style="color:#FFFFFF;"><span>Lihat Permohonan</span></a>
						</div>
						<!-- /.info-box-content -->
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
<?php
$func=$_GET['func']; 
if ($func == 'incorrect')
{
?>
$("#costumModallogin").modal();
<?php
}
?>
</script>

</body>
</html>
