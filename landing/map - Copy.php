<?php 
	  session_start();
	  include '../library/config.php'; 
	  date_default_timezone_set("Asia/Jakarta");
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

    <link rel="stylesheet" href="landing/adi/ol.css" type="text/css">
	<link rel="stylesheet" href="landing/adi/ol3gm.css" type="text/css" />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE&libraries=places"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/place/autocomplete/xml?input=pasta&types=establishment&location=37.76999,-122.44696&radius=500&key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE"></script>

	<script src="landing/adi/ol3gm.js"></script>
	<script src="landing/adi/FileSaver.min.js"></script>
		

<style type="text/css">
<!--


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
    text-transform: uppercase;
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

#map{
    z-index:1;
    width:100%; height:75vh;
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
</style>
<style>
.modal-full {
min-width: 100%;
margin: 0;
}

.modal-full .modal-content {
	height: 100%;
}

</style>


</head>
<body class="hold-transition skin-purple layout-top-nav" onLoad="AdiLoad()" oncontextmenu="return false;">
<div id="divLoading"></div>
<div class="wrapper">

<?php include 'headerumum.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <section class="content">
	  <div class="row">


        <div class="col-md-9">
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img src="<?php echo $ikon; ?>" alt="User Image" height="30">
                <span class="username">Peta Spasial</span>
              </div>

              <!-- /.user-block -->
			  <div class="box-tools">
				<button type="button" class="btn btn-box-tool" id="export-png" data-toggle="tooltip" title="Cetak Peta">
                  <i class="fa fa-print"></i> Cetak Peta</button>
				<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Kembali Ke Menu Utama" onClick="kembalikemenuutama()">
                  <i class="fa fa-mail-reply-all"></i> Ke Menu Utama</button>
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div id="divLoading"></div>
			<div class="box-body" id="map">
			  <div id="mouse-position" style="top:90px; right:20px; z-index:2;position:absolute;color:#FF0000;font-family:'Mangal',Verdana, Arial, Helvetica, sans-serif;"></div>
		  	  <div id="divMainLayer"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
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
                    <label>
                      <input type="checkbox" id="pola_ruang" name="pola_ruang">
                      Rencana Pola Ruang
                    </label>
             
			  </div>
			  <h6 class="attachment-heading"><b><a href="#">Keterangan</a></b></h6>
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
				<td valign="top" style="padding:1px;"><?php echo $row['PERUNTUKAN']; ?></td>
				</tr>
				<?php 
				$i++;
				}
			  }
			  ?>
			  </table>
			  </p>
	
			  
			  
			  
			  
            </div>
            <!-- /.box-body -->
			
			
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                
			  <p>
			  <h6 class="attachment-heading"><b><a href="#">Pencarian Koordinat Lokasi</a></b></h6>
			  <input class="form-control" id="searchTextField" placeholder="Masukkan nama lokasi yang dicari" type="text">
			  <input class="form-control" id="city" type="text" size="47" style="font-family:Verdana;display:none;">
			  <input class="form-control" id="latitude" placeholder="Latitude" type="text" size="10" onKeyPress="return isNumberKey(event)">
			  <input class="form-control" id="longitude" placeholder="Longitude" type="text" size="10" onKeyPress="return isNumberKey(event)">
			  <input class="form-control" id="location_id" type="text" size="47" style="font-family:Verdana;display:none;">
			  <br>
			  <button type="button" class="btn btn-default" id="lariku" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;"><b>Ke Lokasi!!</b></button>
			  <button type="button" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;" onClick="clearku()"><b>Clear</b></button>
			  <button type="button" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;" onClick="klikku5()"><b>Hapus Marker</b></button>
			  </p>
			  
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
			  </div>
			  <div class="radio">
				<label>
				  <input type="radio" name="optionsRadios" id="radio6" checked="checked" value="6">
				  Google Map (Hybrid)
				</label>
			  </div>
			  <div class="radio">
				<label>
				  <input type="radio" name="optionsRadios" id="radio2" value="2">
				  MapQuest OSM
				</label>
			  </div> 
			  <div class="radio">
				<label>
				  <input type="radio" name="optionsRadios" id="radio3" value="3">
				  Bing Maps (Satellite)
				</label>
			  </div>
			  <div class="radio">
				<label>
				  <input type="radio" name="optionsRadios" id="radio4" value="4">
				  Esri
				</label>
			  </div>
			  <div class="radio">
				<label>
				  <input type="radio" name="optionsRadios" id="radio5" value="5">
				  Stamen
				</label>
			  </div> 			  
			  </p>
			  </div>
			  
			  
			  <div class="box-footer box-comments">
              <p>
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
			  <button type="button" class="btn btn-default" style="background-color:#6699FF;border:none;color:#FFFFFF;font-size:12px;" onClick="klikku6()"><b>Hapus Hasil Ukur</b></button>
			  </form>
			  
			  <p>
			  <ol id="measureOutput" reversed style="color:#333333;display:block;" ></ol>
			  </p>
			  </div>
				
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
		  

        </div>
        <!-- /.col -->

		
      </div>
      <!-- /.row -->
      
      
    </section>
    <!-- /.content -->
	
	</div>
</div>
<!-- ./wrapper -->
<?php include 'footer.php'; ?>

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

<script type="text/javascript">
function focusOnEnter(evt)
{
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode == 13)
	{
    	document.getElementById("lariku1").click();
	}

}
</script>

<script>
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

</script>

<script>
function runScript(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        addLogin('','');
        return false;
    }
}
</script>


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
	  layerFeatures,vectorLayerLokasi,vector
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
document.getElementById("type1").disabled = true;
document.getElementById("areaku").disabled = true;
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
		document.getElementById("type1").disabled = false;
		document.getElementById("areaku").disabled = false;
		document.getElementById("koordinatku").value = "";
	}
	else
	{
		//alert('unklik');
		removeFeatures(sourceFeatures);
		document.getElementById("type1").disabled = true;
		document.getElementById("areaku").disabled = true;
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

var typeSelect1 = document.getElementById('type1');

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
  
  
  if (typeSelect1.value === 'Square') {
      type = 'Circle';
  }
  else if (typeSelect1.value === 'area')
  {
  	type = 'Polygon';
  }
  else if (typeSelect1.value === 'length')
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
		.append('<option value="None">Pilih Model Pengukuran</option>')
		.append('<option value="length">Jarak</option>')
		.append('<option value="area">Luas</option>')
		.val('None')
		;
		
		$("#type").val($("#type option:first").val());
		$("#type option:first").attr('selected','selected');
		$('#type option:first').prop('selected', true);
		
		
		document.getElementById('type1').innerText = null;
		
		$('#type1')
		.find('option')
		.remove()
		.end()
		.append('<option value="None">Pilih Mode Pencarian</option>')
		.append('<option value="area">Polygon Area</option>')
		.val('None')
		;
		
		$("#type1").val($("#type1 option:first").val());
		$("#type1 option:first").attr('selected','selected');
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
typeSelect1.onchange = function(e) {
  map.removeInteraction(draw);
  klikku4();
  var isi=document.getElementById('type1').value;
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
            && (charCode < 44 || charCode > 57))
             return false;

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
function showku(str)
{
$('#costumModal6').modal('show');
ubahhalaman(str);
}
</script>


<script>
function ubahhalamansetting(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabelsetting');
	iframe.src = xx;
}
</script>

<script>
function showkusetting(str)
{
$('#costumModalSettingPeta').modal('show');
ubahhalamansetting(str);
}
</script>


<script>
function ubahhalaman(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabel');
	iframe.src = xx;
}
</script>

<script>
function showdataku(str)
{
$('#costumModal6').modal('show');
ubahhalamandata(str);
}
</script>

<script>
function ubahhalamandata(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabel');
	iframe.src = "backoffice/tabel.php?tabel="+xx;
}
</script>


<script>
function cek(id)
{
	//alert("aaa");
	document.getElementById("aaddii").src = id;
}
</script>

<script>
function gantiisi(str,str1)
{
alert(str);
alert(str1);

var strku = str;
var res = strku.replace("#", "");

xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null) {
    alert ("Your browser does not support AJAX!");
    return;
  }
  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
  
var url="getField.php";
  url=url+"?no1="+res+"&no2="+str1;
  xmlHttp.onreadystatechange=function () {
    document.getElementById("loadingstat").innerHTML="";
    document.getElementById("loadingstat").innerHTML=xmlHttp.responseText;
  }
  xmlHttp.open("GET",url,true); 
  //alert("hahahahaha");
  xmlHttp.send(null);


//$('#costumModal5').modal('hide');
//$('#costumModal5').modal('show');

}
</script>

<script>
$("#checkboxPilihSemua").click(function(){
    if($("#checkboxPilihSemua").is(':checked') ){
        $("#kabkotku > option").prop("selected","selected");
        $("#kabkotku").trigger("change");
    }else{
        $("#kabkotku > option").removeAttr("selected");
         $("#kabkotku").trigger("change");
     }
});
</script>
<script>
	function logout()
	{
		//alert(id1);
		//alert(id2);
		if (confirm("Logout Aplikasi?")) {
			//alert("Hapus");
			window.location='logout.php?maukeluar=iya';
		}
	}
</script>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function showket()
{
	if (document.getElementById("copyright-wrap").style.display=="none")
	{
		document.getElementById("copyright-wrap").style.display="block";
		document.getElementById("pengukuran").style.display="none";
	}
	else
	{
		document.getElementById("copyright-wrap").style.display="none";
		document.getElementById("pengukuran").style.display="none";
	}
}
</script>

<script>
function showketpengukuran()
{
	if (document.getElementById("pengukuran").style.display=="none")
	{
		document.getElementById("pengukuran").style.display="block";
		document.getElementById("copyright-wrap").style.display="none";
	}
	else
	{
		document.getElementById("pengukuran").style.display="none";
		document.getElementById("copyright-wrap").style.display="none";
	}
}
</script>



<script>
function gantifoto(str,str1)
{
var uploadfiles = document.querySelector('#'+str);
var files = uploadfiles.files;
for(var i=0; i<files.length; i++){
	//alert(files.length);
	uploadFile(uploadfiles.files[i],str1);
}

function uploadFile(file,str){
	//alert("");
        var url = "server/index.php?kode="+str;
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
</script>

<script>
function kembalikemenuutama()
{
	<?php
	if ($_SESSION['onelevel']=='')
	{
	?>
	window.location='simtaru-pemalang';
	<?php
	}
	else
	{
	?>
	window.location='simtaru-dashumum';
	<?php
	}
	?>
}
</script>

<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    alert("Geolocation is not supported by this browser..");
  }
}

function showPosition(position) {
  alert(position.coords.latitude);
  alert(position.coords.longitude);	
  //x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + ;
}
</script>

</body>
</html>
<div id="loadingstat" style="position: absolute; top: 10; left: 10px; width: 10px; height: 10px; z-index: 3">

