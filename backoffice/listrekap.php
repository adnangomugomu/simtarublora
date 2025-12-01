<?php
session_start();
include '../library/config.php';
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

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	
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
    	<div id="costumModal4" class="modal" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width:100%;height:100%;">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Grafik <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body" style="width:100%;height:100%;">
                        <p>
                        <iframe id="iframegrafik" src="" style="position:relative;width:100%;height:60vh;border:none;top:0;"></iframe>    
                        </p>
						
                    </div>
                    <div class="modal-footer">
                        
						<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
					
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
						<button class="btn btn-info waves-effect" type="button" onClick="kembali()"> Kembali</button>
                        <div class="body">
							<div class="table-responsive">
								<?php
								$judul=$_GET['judul'];
								$tabel=$_GET['tabel'];
								$fil1=$_GET['fil1'];
								$fil2=$_GET['fil2'];
								$fil3=$_GET['fil3'];
								$fil4=$_GET['fil4'];
								if ($fil2=="SUM")
								{
									$tampil="TOTAL ";
									$tampil2="TOTAL";
								}
								if ($fil2=="COUNT")
								{
									$tampil="JUMLAH ";
									$tampil2="JUMLAH";
								}
								?>
								<h5><?php echo $judul."<br>"; ?></h5>
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
											<?php
											$tempfil1=explode(",",$fil1);
											$counttempfil1=count($tempfil1);
											for ($x = 0; $x <= $counttempfil1-1; $x++) {
											?>
											<th><?php echo get_Isi_Field2('aliasfield','one_aliasfield','nama',$tempfil1[$x]); ?></th>
											<?php 
											}
											?>
											<?php
											$tempfil3=explode(",",$fil3);
											$counttempfil3=count($tempfil3);
											for ($x = 0; $x <= $counttempfil3-1; $x++) {
											?>
											<th><?php echo $tampil.get_Isi_Field2('aliasfield','one_aliasfield','nama',$tempfil3[$x]); ?></th>
											<?php 
											}
											?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
										<?php
										
										$sql="select ".$fil1." ";
										$tempfil3=explode(",",$fil3);
										$counttempfil3=count($tempfil3);
										for ($x = 0; $x <= $counttempfil3-1; $x++) {
										$sql=$sql.", ".$fil2."(".$tempfil3[$x].") as ".$tampil2.$tempfil3[$x];
										}
										$sql=$sql." from ".$tabel." ";
										$sql=$sql." where ".$fil4 ."<>''";
										$sql=$sql." group by ".$fil4;
										//echo $sql."<br>";
										$result=mysqli_query($link,$sql);
										//echo mysqli_num_fields($result);
										if ($result)
										{
										$i=1;
										while ($row = mysqli_fetch_row($result)) 
										//while ($row=mysqli_fetch_array($result))
										{
										$count = count($row);
										$y = 0;
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <?php
											while ($y < $count)
											{
												$c_row = current($row);
												?>
												<td>
												<?php 
												echo $c_row;
												?>
												</td>
												<?php 
												next($row);
												$y = $y + 1;
											}
											?>
                                        </tr>
										<?php
										$i++;
										}
										}
										?>
                                        
                                    </tbody>
                                </table>
								<iframe id="youriframe2" src="downloaddbf.php?file=" style="display:none;"></iframe>
                            </div>
						</div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    
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

    <!-- noUISlider Plugin Js -->
    <script src="plugins/nouislider/nouislider.js"></script>

    

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
	
	<script src="../js/velocity.min.js"></script>
	<script src="../js/velocity.ui.min.js"></script>
	<script  src="../js/index.js"></script>
	
	
<script src="bootstrap-select.js"></script>	
	
<script>
$(document).ready(function() {
  // Initiate with custom caret icon
  $('select.selectpicker').selectpicker({
    caretIcon: 'glyphicon glyphicon-menu-down'
  });
});
</script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-2843793-6', 'auto');
ga('send', 'pageview');
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
function gantiisi(str,str1)
{
//alert(str);
//alert(str1);

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
function shp(str)
{
//alert(str);
	$.ajax({
    url:'../shp/'+str+'.dbf',
    type:'HEAD',
    error: function()
    {
        alert("File .dbf tidak diketemukan..");
    },
    success: function()
    {
        var iframe2 = document.getElementById('youriframe2');
		iframe2.src = "../shp/downloaddbf.php?file="+str;
		//alert(str);
    }
	});
}
</script>

<script>
function tabel(str)
{
      	var iframe2 = parent.document.getElementById('iframetabel');
		iframe2.src = "backoffice/tabelnonedit.php?tabel="+str;
		//alert(str);
}
</script>

<script>
		function showku(str)
		{
		$('#costumModal4').modal('show');
		ubahhalaman(str);
		}
</script>

<script>
function ubahhalaman(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframegrafik');
	iframe.src = "grafikview.php?tabel="+xx;
}
</script>

<script>
function kembali()
{
document.location="tabelstatistikrekap.php";
}
</script>

</body>

</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">