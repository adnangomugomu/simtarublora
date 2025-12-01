<?php
session_start();
include '../library/config.php';
$tabel=$_GET['tabel'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="../img/logo.png" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $judul; ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	
	<!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />


	
	<link rel="stylesheet" href="bootstrap-select.css">
	
<style>
body { margin:2em; }
pre { margin:1em 0; }
select.selectpicker { display:none; /* Prevent FOUC */}
</style>
</head>

<body class="theme-red">
    <div style="display:none;">
	<section>
        <aside id="leftsidebar" class="sidebar">
            <div class="menu" style="display:none;">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php 
					$para=strpos($parts,"php"); 
					?>
                    <li <?php if (!$para) { ?> class="active" <?php } ?> >
                        <a href="./">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					
                </ul>
            </div>
        </aside>
    </section>
	</div>	
    
            <!-- Tabs With Icon Title -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            		<?php
									  $sqlcek="select * from one_rekap where nama ='".$tabel."' ";
									  $resultcek=mysqli_query($link,$sqlcek);
									  if ($resultcek)
									  {
									  while ($rowcek=mysqli_fetch_array($resultcek))
									  {
										$cektema=$rowcek['judul'];
										$cektema1=$rowcek['fil1'];
										$tempcektema1=explode(",",$cektema1);
										$countcektema1=count($tempcektema1);
										$cektema2=$rowcek['fil2'];
										$cektema3=$rowcek['fil3'];	
										$tempcektema3=explode(",",$cektema3);
										$countcektema3=count($tempcektema3);
										$cektema4=$rowcek['fil4'];
										$cektema5=$rowcek['fil5'];
									  }
									  }									
									?>
                                    <b>Judul Rekap</b>
									<p>
									<input type="text" name="judul" id="judul" class="form-control" value="<?php echo $cektema; ?>" onChange="TambahRekap('<?php echo $tabel; ?>',this.value,'','','','')" >
									</p>
									<b>Pilih Field untuk ditampilan selain yang direkap</b>
                                    <p>
										<select name="fieldkux" id="fieldkux" multiple="multiple" class="form-control" onChange="TambahRekap('<?php echo $tabel; ?>',this.value,'','','')" >
											<option value="">Pilih Field</option>
										<?php
										  
										  $query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field not like '%ID%'  and Field not like 'kode' and Field not like
										 '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%'
										  and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' ";
										  //echo $query;
										  $hasil=mysqli_query($link,$query);
										  if ($hasil)
										  {
										 ?>
										  <?php 
										  while ($data=mysqli_fetch_array($hasil))
										  {
										  
										  ?>
                                          <option value="<?php echo $data['Field']; ?>" <?php 
										  for ($x = 0; $x <= $countcektema1-1; $x++) {
										  if ($tempcektema1[$x]==$data['Field']) { ?> selected="selected" <?php } 
										  }
										  // for do
										  ?> ><?php echo $data['Field']; ?></option>
										  
                                          <?php
										  
										  
										  }
										  }
										  ?> 
										 </select> 
										 
                                    </p>
									
									<b>Pilih Operasi Field untuk direkap</b>
									<p>
									<select name="fieldkur" id="fieldkur" class="form-control" onChange="TambahRekap('<?php echo $tabel; ?>','','',this.value,'','')" >
											<option value="">Pilih Field</option>
											<option value="SUM" <?php if ($cektema2=="SUM") { ?> selected="selected" <?php } ?> >Summary</option>
											<option value="COUNT" <?php if ($cektema2=="COUNT") { ?> selected="selected" <?php } ?> >Count</option>
									</select>		
									</p>
									
									<b>Pilih Field untuk direkapitulasi</b>
                                    <p>
										<select name="fieldkuy" id="fieldkuy" multiple="multiple" onChange="TambahRekap('<?php echo $tabel; ?>','','','',this.value,'')" class="form-control" >
											<option value="">Pilih Field</option>
										<?php
										  
										  $query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field not like '%ID%'  and Field not like 'kode' and Field not like
										 '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%'
										  and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' ";
										  //echo $query;
										  $hasil=mysqli_query($link,$query);
										  if ($hasil)
										  {
										 ?>
										 <?php 
										  while ($data=mysqli_fetch_array($hasil))
										  {
										  ?>
                                          <option value="<?php echo $data['Field']; ?>" 
										  <?php 
										  for ($x = 0; $x <= $countcektema3-1; $x++) {
										  if ($tempcektema3[$x]==$data['Field']) { ?> selected="selected" <?php } 
										  }
										  ?>
										  >
										  <?php echo $data['Field']; ?></option>
										  
                                          <?php
										  }
										  }
										  ?> 
										 </select> 
                                    </p>
									
									<b>Pilih Field untuk dikelompokkan</b>
                                    <p>
										<select name="fieldkug" id="fieldkug" onChange="TambahRekap('<?php echo $tabel; ?>','','','','',this.value)" class="form-control" >
											<option value="">Pilih Field</option>
										<?php
										  
										  $query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field not like '%ID%'  and Field not like 'kode' and Field not like
										 '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%'
										  and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' ";
										  //echo $query;
										  $hasil=mysqli_query($link,$query);
										  if ($hasil)
										  {
										 ?>
										 <?php 
										  while ($data=mysqli_fetch_array($hasil))
										  {
										  ?>
                                          <option value="<?php echo $data['Field']; ?>" <?php if ($cektema4==$data['Field']) { ?> selected="selected" <?php } ?> ><?php echo $data['Field']; ?></option>
										  
                                          <?php
										  }
										  }
										  ?> 
										 </select> 
                                    </p>
                    </div>
                </div>
            </div>
            <!-- #END# Tabs With Icon Title -->
			
		
        
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
	
	<!-- Chart Plugins Js -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>
	
	<!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
	
	<script src="../js/velocity.min.js"></script>
	<script src="../js/velocity.ui.min.js"></script>
	<script  src="../js/index.js"></script>
	

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
function TambahRekap(str,judul,str1,str2,str3,str4)
{
//alert(str);
//alert(document.getElementById("fieldkux").value);
//alert(str2);

var values = $('#fieldkux').val();
var valuesy = $('#fieldkuy').val();
//alert(values);

var judul=document.getElementById("judul").value;

if (judul=='')
{
	alert ("Judul Tidak Boleh Kosong!");
	document.getElementById("judul").focus();
    return;	
}

var str2=document.getElementById("fieldkur").value;

if (str2=='')
{
	alert ("Operasi Field Tidak Boleh Kosong!");
	document.getElementById("fieldkur").focus();
    return;	
}



xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null) {
    alert ("Your browser does not support AJAX!");
    return;
  }
  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
  
var url="getRekapNew.php";
  url=url+"?no1="+str+"&no2="+values+"&no3="+str2+"&no4="+valuesy+"&no5="+str4+"&judul="+judul;
  xmlHttp.onreadystatechange=function () {
    document.getElementById("loadingstat").innerHTML="";
    document.getElementById("loadingstat").innerHTML=xmlHttp.responseText;
  }
  xmlHttp.open("GET",url,true); 
  //alert("hahahahaha");
  xmlHttp.send(null);
  location.reload();

//$('#costumModal5').modal('hide');
//$('#costumModal5').modal('show');

}
</script>


</body>

</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">