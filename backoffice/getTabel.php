<?php
session_start();
include '../library/config.php';
$fieldku=$_GET['no1'];
$tabel=$_GET['no2'];
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
    
        <div class="container-fluid">
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
										  $query="SHOW COLUMNS FROM ".$tabel." where Field ='".$fieldku."' ";
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
										  <th>Ikon</th>
										  <?php
										  }
										  ?>
										  <?php
										  if ($cektipe=='5')
										  {
										  ?>
										  <th>Fill</th>
										  <th>Stroke</th>
										  <?php
										  }
										  ?>
										  <?php
										  if ($cektipe=='3')
										  {
										  ?>
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
                                            <th><?php echo $data['Field']; ?></th>
                                          <?php
										  }
										  }
										  ?>  
                                        </tr>
                                    </thead>

                                    <tbody>
										<?php
										$sql="select * from ".$tabel." group by ".$fieldku." ";
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
											<td>
											<select title="Select your surfboard" class="selectpicker" name="<?php echo $fieldku."|".$tabel."|simbol|".$row[$fieldku]; ?>" id="<?php echo $fieldku."|".$tabel."|simbol|".$row[$fieldku]; ?>" onChange="gantiisi(this.value,'<?php echo $fieldku."|".$tabel."|simbol|".$row[$fieldku]; ?>')">
											  <?php
											  $sql1="select * from one_ikon where deleted='0' ";
											  $result1=mysqli_query($link,$sql1);
										      if ($result1)
											  {
											  while ($row1=mysqli_fetch_array($result1))
											  {
											  	$nama1=$row1['nama'];
												$ikon1=$row1['ikon'];
											  ?>
											  <option data-thumbnail="../img/<?php echo $ikon1; ?>" value="<?php echo $ikon1; ?>"
											  <?php if ($ikon1==$row['simbol']) { ?> selected="selected" <?php } ?>
											  ><?php echo $nama1; ?></option>
											  <?php
											  }
											  }
											  ?>	
											</select>
											
											</td>
											<?php
											}
											?>
											<?php
											if ($row['tipe']=='5')
											{
											?>
											<td>
											<input type="color" name="<?php echo $fieldku."|".$tabel."|fillku|".$row[$fieldku]; ?>" id="<?php echo $fieldku."|".$tabel."|fillku|".$row[$fieldku]; ?>" class="form-control" value="<?php echo $row['fillku']; ?>" style="width:40px;" onChange="gantiisi(this.value,'<?php echo $fieldku."|".$tabel."|fillku|".$row[$fieldku]; ?>')" >
											</td>
											<td>
											<input type="color" name="<?php echo $fieldku."|".$tabel."|tebalfillku|".$row[$fieldku]; ?>" id="<?php echo $fieldku."|".$tabel."|tebalfillku|".$row[$fieldku]; ?>" class="form-control" value="<?php echo $row['tebalfillku']; ?>" style="width:40px;" onChange="gantiisi(this.value,'<?php echo $fieldku."|".$tabel."|tebalfillku|".$row[$fieldku]; ?>')" >
											</td>
											<?php
											}
											?>
											<?php
											if ($row['tipe']=='3')
											{
											?>
											<td>
											<input type="color" name="<?php echo $fieldku."|".$tabel."|garisku|".$row[$fieldku]; ?>" id="<?php echo $fieldku."|".$tabel."|garisku|".$row[$fieldku]; ?>" class="form-control" value="<?php echo $row['garisku']; ?>" style="width:40px;" onChange="gantiisi(this.value,'<?php echo $fieldku."|".$tabel."|garisku|".$row[$fieldku]; ?>')" >
											</td>
											<td>
											<input type="color" name="<?php echo $fieldku."|".$tabel."|tebalgarisku|".$row[$fieldku]; ?>" id="<?php echo $fieldku."|".$tabel."|tebalgarisku|".$row[$fieldku]; ?>" class="form-control" value="<?php echo $row['tebalgarisku']; ?>" style="width:40px;" onChange="gantiisi(this.value,'<?php echo $fieldku."|".$tabel."|tebalgarisku|".$row[$fieldku]; ?>')" >
											</td>
											<td>
											<input type="number" name="<?php echo $fieldku."|".$tabel."|teballine|".$row[$fieldku]; ?>" id="<?php echo $fieldku."|".$tabel."|teballine|".$row[$fieldku]; ?>" class="form-control" value="<?php echo $row['teballine']; ?>" style="width:100px;" onChange="gantiisi(this.value,'<?php echo $fieldku."|".$tabel."|teballine|".$row[$fieldku]; ?>')" >
											</td>
											<?php
											}
											?>
                                            <td><?php echo $row[$fieldku]; ?></td>
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
  
var url="getFieldTematik.php";
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


</body>

</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">