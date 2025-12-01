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
 #divLoading {
	display:block;

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
    
        <div class="container-fluid">
		<div id="divLoading"></div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
						<?php
						if (!$action)
						{
						?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
										  <?php
										  $tabel=$_GET['tabel'];
										  $query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field not like '%ID%'  and Field not like 'kode' and Field not like
										 '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%'
										  and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' ";
										  //echo $query;
										  $hasil=mysqli_query($link,$query);
										  if ($hasil)
										  {
										  ?>
										  <th>No</th>
										  <?php
										  $sqlcek="select * from ".$tabel." limit 1 ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektipe=$rowcek['tipe'];	
										  }
										  }								
										  ?>
										  <?php
										  if ($cektipe=='1')
										  {
										  ?>
										  <th>Cari Lokasi</th>
										  <th>Ikon</th>
										  <?php
										  }
										  ?>
										  <?php
										  if ($cektipe=='5')
										  {
										  ?>
										  <th>Cari Lokasi</th>
										  <th>Fill</th>
										  <th>Stroke</th>
										  <?php
										  }
										  ?>
										  <?php
										  if ($cektipe=='3')
										  {
										  ?>
										  <th>Cari Lokasi</th>
										  <th>Line Color</th>
										  <th>Line Stroke Color</th>
										  <th>Line Width</th>
										  <?php
										  }
										  ?>
										  <?php 
										  while ($data=mysqli_fetch_array($hasil))
										  {
										  ?>
                                            <th><?php echo get_Isi_Field2('aliasfield','one_aliasfield','nama',$data['Field']); ?></th>
                                          <?php
										  }
										  }
										  ?>  
                                        </tr>
                                    </thead>

                                    <tbody>
										<?php
										if ($cektipe=='1')
										{
										$sql="select *,SUBSTRING_INDEX(replace(replace(astext(ogc_geom),'POINT(',''),')',''),' ',1) as l0ng1
,SUBSTRING_INDEX(replace(replace(astext(ogc_geom),'POINT(',''),')',''),' ',-1) as l4t1 from ".$tabel." ";
										}
										else if ($cektipe=='3')
										{
										$sql="SELECT *,SUBSTRING_INDEX(SUBSTRING_INDEX(replace(replace(replace(replace(replace(AsText(ogc_geom),'MULTILINESTRING(((','LINE(('),')))','))'),'LINESTRING(',''),')',''),'MULTI(',''),',',1),' ',1) as l0ng1
,SUBSTRING_INDEX(SUBSTRING_INDEX(replace(replace(replace(replace(replace(AsText(ogc_geom),'MULTILINESTRING(((','LINE(('),')))','))'),'LINESTRING(',''),')',''),'MULTI(',''),',',1),' ',-1) as l4t1 from ".$tabel." ";
										}
										else
										{
										$sql="select *,SUBSTRING_INDEX(replace(replace(astext(centroid(ogc_geom)),'POINT(',''),')',''),' ',1) as l0ng1,
SUBSTRING_INDEX(replace(replace(astext(centroid(ogc_geom)),'POINT(',''),')',''),' ',-1) as l4t1 from ".$tabel." ";
										}
										
										//echo "TIPE :".$cektipe,"<br>".$sql;
										
										$result=mysqli_query($link,$sql);
										if ($result)
										{
										$i=1;
										while ($row=mysqli_fetch_array($result))
										{	
										  								
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <?php
											if ($row['tipe']=='1')
											{
											?>
											<td><button class="btn btn-primary waves-effect" type="button" onClick="kelokasi('<?php echo $row['l0ng1']; ?>','<?php echo $row['l4t1']; ?>')">Ke Lokasi</button></td>
											<td>
											<img src="../img/<?php echo $row['simbol']; ?>" height="30">
											</td>
											<?php
											}
											?>
											<?php
											if ($row['tipe']=='5')
											{
											?>
											<td><button class="btn btn-primary waves-effect" type="button" onClick="kelokasi('<?php echo $row['l0ng1']; ?>','<?php echo $row['l4t1']; ?>')">Ke Lokasi</button></td>
											<td>
											<input type="color" name="<?php echo $row['ID']."|".$tabel."|fillku"; ?>" id="<?php echo $row['ID']."|".$tabel."|fillku"; ?>" class="form-control" value="<?php echo $row['fillku']; ?>" style="width:40px;" disabled="disabled" >
											</td>
											<td>
											<input type="color" name="<?php echo $row['ID']."|".$tabel."|tebalfillku"; ?>" id="<?php echo $row['ID']."|".$tabel."|tebalfillku"; ?>" class="form-control" value="<?php echo $row['tebalfillku']; ?>" style="width:40px;" disabled="disabled" >
											</td>
											<?php
											}
											?>
											<?php
											if ($row['tipe']=='3')
											{
											?>
											<td><button class="btn btn-primary waves-effect" type="button" onClick="kelokasi('<?php echo $row['l0ng1']; ?>','<?php echo $row['l4t1']; ?>')">Ke Lokasi</button></td>
											<td>
											<input type="color" name="<?php echo $row['ID']."|".$tabel."|garisku"; ?>" id="<?php echo $row['ID']."|".$tabel."|garisku"; ?>" class="form-control" value="<?php echo $row['garisku']; ?>" style="width:40px;" disabled="disabled" >
											</td>
											<td>
											<input type="color" name="<?php echo $row['ID']."|".$tabel."|tebalgarisku"; ?>" id="<?php echo $row['ID']."|".$tabel."|tebalgarisku"; ?>" class="form-control" value="<?php echo $row['tebalgarisku']; ?>" style="width:40px;" disabled="disabled"  >
											</td>
											<td>
											<input type="number" name="<?php echo $row['ID']."|".$tabel."|teballine"; ?>" id="<?php echo $row['ID']."|".$tabel."|teballine"; ?>" class="form-control" value="<?php echo $row['teballine']; ?>" style="width:100px;" disabled="disabled" >
											</td>
											<?php
											}
											?>
                                            <?php
											$tabel=$_GET['tabel'];
										  	$query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field not like '%ID%'  and Field not like 'kode' 
											and Field not like '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' 
											and Field not like '%tebalgarisku%'	and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' ";
										  //echo $query;
										  	$hasil=mysqli_query($link,$query);
										  	if ($hasil)
										  	{
											while ($data=mysqli_fetch_array($hasil))
										  	{
										  
											?>
											<td>
												<?php
												if ($data['Field']=='KODE_FOTO')
												{
												?>
												<img src="../foto/<?php echo $tabel."/".$row[$data['Field']]; ?>" height="100px;">
												<?php 
												}
												else if ($data['Field']=='KODE_FOTO1')
												{
												?>
												<img src="../foto/<?php echo $tabel."/".$row[$data['Field']]; ?>" height="100px;">
												<?php 
												}
												else
												{
												?>
												<?php echo $row[$data['Field']]; ?>
												
												<?php
												if (1==2)
												{
												?>
												<input type="text" name="<?php echo $row['ID']."|".$tabel."|".$data['Field']; ?>" id="<?php echo $row['ID']."|".$tabel."|".$row[$data['Field']]; ?>" class="form-control" value="<?php echo $row[$data['Field']]; ?>" style="width:150px;" disabled="disabled"  >
												<?php
												}
												?>
												
												<?php
												}
												?>
											</td>
                                            <?php
											}
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
                            </div>
						
                        <?php
						}
						?>
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
 
  $(function() {
    document.getElementById("divLoading").style.display = "none";
  });
 
  </script>
	
<script>
$(document).ready(function() {
  // Initiate with custom caret icon
  document.getElementById("divLoading").style.display = "none";
  //$('select.selectpicker').selectpicker({
  //  caretIcon: 'glyphicon glyphicon-menu-down'
  //});
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
function kelokasi(str3,str4)
{
//alert(str3);
//alert(str4);
parent.addMainLayerPoint('','customStyleLokasi',str3,str4);
parent.$('#costumModal6').modal('hide');
}
</script>

</body>

</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">