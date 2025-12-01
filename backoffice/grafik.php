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
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">filter_none</i> Grafik Batang
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">donut_small</i> Grafik Pie
                                    </a>
                                </li>
								
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
                                    <b>Judul Grafik Batang</b>
									<p>
									<?php
										  $sqlcek="select * from one_grafik where nama ='".$tabel."' ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektema=$rowcek['judulbatang'];	
										  }
										  }									
										?>
									<input type="text" name="judulbatang" id="judulbatang" class="form-control" value="<?php echo $cektema; ?>" onChange="TambahGraph('<?php echo $tabel; ?>','judulbatang',this.value)" >	
									</p>
									<b>Pilih Field untuk Grafik Batang Kolom X</b>
                                    <p>
                                        <?php
										  $sqlcek="select * from one_grafik where nama ='".$tabel."' ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektema=$rowcek['fil1'];	
										  }
										  }									
										?>
										<select name="fieldkux" id="fieldkux" onChange="TambahGraph('<?php echo $tabel; ?>','fil1',this.value)" >
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
                                          <option value="<?php echo $data['Field']; ?>" <?php if ($cektema==$data['Field']) { ?> selected="selected" <?php } ?> ><?php echo $data['Field']; ?></option>
										  
                                          <?php
										  }
										  }
										  ?> 
										 </select> 
										 
                                    </p>
									<b>Pilih Field untuk Grafik Batang Kolom Y</b>
                                    <p>
                                        <?php
										  $sqlcek="select * from one_grafik where nama ='".$tabel."' ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektema=$rowcek['fil2'];	
										  }
										  }									
										?>
										<select name="fieldkuy" id="fieldkuy" onChange="TambahGraph('<?php echo $tabel; ?>','fil2',this.value)" >
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
                                          <option value="<?php echo $data['Field']; ?>" <?php if ($cektema==$data['Field']) { ?> selected="selected" <?php } ?> ><?php echo $data['Field']; ?></option>
										  
                                          <?php
										  }
										  }
										  ?> 
										 </select> 
                                    </p>
									<?php
									$sql2="select * from one_grafik where nama='".$tabel."' and (fil1 <>'' or fil2 <> '' or fil1 is not null or fil2 is not null ) ";
									$result2=mysqli_query($link,$sql2);
									$num2=mysqli_num_rows($result2);
									if ($num2<>'0')
									{
									?>
									<p>
									<b>Preview Grafik Batang</b>
									<div class="container-fluid">
										<div class="row clearfix">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<canvas id="bar_chart" height="150"></canvas>
										</div>
									    </div>
									</div>
									</p>				
									<?php
									}
									?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
									<b>Judul Grafik Pie</b>
									<p>
									<?php
										  $sqlcek="select * from one_grafik where nama ='".$tabel."' ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektemak=$rowcek['judulpie'];	
										  }
										  }									
										?>
									<input type="text" name="judulpie" id="judulpie" class="form-control" value="<?php echo $cektemak; ?>" onChange="TambahGraph('<?php echo $tabel; ?>','judulpie',this.value)" >	
									</p>
                                    <b>Pilih Field untuk Grafik Pie</b>
                                    <p>
                                        <?php
										  $tabel=$_GET['tabel'];	
										  $sqlcek="select * from one_grafik where nama ='".$tabel."' ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektema=$rowcek['fil3'];	
										  }
										  }								
										?>
										<select name="fieldkupie" id="fieldkupie" onChange="TambahGraph('<?php echo $tabel; ?>','fil3',this.value)" >
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
                                          <option value="<?php echo $data['Field']; ?>" <?php if ($cektema==$data['Field']) { ?> selected="selected" <?php } ?> ><?php echo $data['Field']; ?></option>
										  
                                          <?php
										  }
										  }
										  ?> 
										 </select> 
                                    </p>
									<?php
									$sql2="select * from one_grafik where nama='".$tabel."' and (fil3 or fil3 is not null ) ";
									$result2=mysqli_query($link,$sql2);
									$num2=mysqli_num_rows($result2);
									if ($num2<>'0')
									{
									?>
									<p>
									<b>Preview Grafik Pie</b>
									<div class="container-fluid">
										<div class="row clearfix">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<canvas id="pie_chart" height="150"></canvas>
										</div>
									    </div>
									</div>
									</p>
									<?php
									}
									?>
									
                                </div>
								
                        </div>
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
$(function () {
	try
	{
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
	}
	catch(err) {
	}
});

function getChartJs(type) {

<?php
$sqlcek="select * from one_grafik where nama ='".$tabel."' ";
$resultcek=mysqli_query($link,$sqlcek);
if ($resultcek)
{
while ($rowcek=mysqli_fetch_array($resultcek))
{
$fil1=$rowcek['fil1'];
$fil2=$rowcek['fil2'];	
$fil3=$rowcek['fil3'];
}
}	
?>   
    var config = null;

    if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: 
				[
				<?php
				$sql3="select ".$fil1." from ".$tabel." group by ".$fil1." ";
				$result3=mysqli_query($link,$sql3);
				if ($result3)
				{
				while ($row3=mysqli_fetch_array($result3))
				{
				?>
				"<?php echo $row3[$fil1]; ?>",
				<?php
				}
				}
				?>
				],
                datasets: [{
                    label: "<?php echo $fil1; ?>",
                    data: [
					
					<?php
					$sql3="select count(".$fil2.") as ".$fil2." from ".$tabel." group by ".$fil1." ";
					$result3=mysqli_query($link,$sql3);
					if ($result3)
					{
					while ($row3=mysqli_fetch_array($result3))
					{
					?>
					<?php echo $row3[$fil2]; ?>,
					<?php
					}
					}
					?>
					
					],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                    }]
            },
            options: {
                responsive: true,
                legend: true
            }
        }
    }
    
    return config;
}
	</script>	


	<script>
$(function () {
	try
	{
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs1('pie'));
	}
	catch(err) {
	}
});

function getChartJs1(type) {
<?php
$sqlcek="select * from one_grafik where nama ='".$tabel."' ";
$resultcek=mysqli_query($link,$sqlcek);
if ($resultcek)
{
while ($rowcek=mysqli_fetch_array($resultcek))
{
$fil1=$rowcek['fil1'];
$fil2=$rowcek['fil2'];	
$fil3=$rowcek['fil3'];
}
}	
?>   
    var config = null;

    if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
					<?php
					$sql3="select count(".$fil3.") as ".$fil3." from ".$tabel." group by ".$fil3." ";
					$result3=mysqli_query($link,$sql3);
					if ($result3)
					{
					$c=1;
					while ($row3=mysqli_fetch_array($result3))
					{
					?>
					<?php echo $row3[$fil3]; ?>,
					<?php
					$c++;
					}
					}
					?>
					],
                    backgroundColor: [
						<?php
						for ($n = 1; $n <= $c; $n++) {
						?>
						"rgb(<?php echo rand(0,255); ?>,<?php echo rand(0,255); ?>,<?php echo rand(0,255); ?>)",
                        <?php
						}
						?>
                    ],
                }],
                labels: [
					<?php
					$sql3="select ".$fil3." from ".$tabel." group by ".$fil3." ";
					$result3=mysqli_query($link,$sql3);
					if ($result3)
					{
					while ($row3=mysqli_fetch_array($result3))
					{
					?>
					"<?php echo $row3[$fil3]; ?>",
					<?php
					}
					}
					?>
                    
                ]
            },
            options: {
                responsive: true,
                legend: true
            }
        }
    }
    return config;
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
function TambahGraph(str,str1,str2)
{
//alert(str);
//alert(str1);
//alert(str2);
if (str2=='')
{
	alert ("Field Tidak Boleh Kosong!");
    return;	
}



xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null) {
    alert ("Your browser does not support AJAX!");
    return;
  }
  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
  
var url="getGraphNew.php";
  url=url+"?no1="+str+"&no2="+str1+"&no3="+str2;
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