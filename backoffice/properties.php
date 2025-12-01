<?php
session_start();
include '../library/config.php';

function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);
    
    for($i=0;$i<$file_count;$i++)
    {
        foreach($file_key as $val)
        {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}


if ($_POST['pros']=='1')
{
$tabpros=$_POST['tabpros'];
$filesToUpload=$_FILES['filesToUpload'];

$img_desc = reArrayFiles($filesToUpload);

  echo "
  <div class='alert alert-warning alert-dismissible' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>

  ";

foreach($img_desc as $val)
{
  $newfilename = $val['name'];
  $attachdir = '../foto/'.$tabpros.'/';  

  copy ($val['tmp_name'], $attachdir . $newfilename);
  echo "File Foto ".$val['name']." Telah terupload<br>";
}

  echo "

  </div>
  ";

}

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
                                        <i class="material-icons">face</i> Tematik Peta
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#settings_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">settings</i> Tabel Properties
                                    </a>
                                </li>
								<li role="presentation">
                                    <a href="#upload_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">sd_card</i> Upload File Foto
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="profile_with_icon_title">
                                    <b>Pilih Field untuk peta tematik</b>
                                    <p>
                                        <?php
										  $tabel=$_GET['tabel'];	
										  $sqlcek="select * from ".$tabel." limit 1 ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektipe=$rowcek['tipe'];
											$cektema=$rowcek['labelku'];	
										  }
										  }								
										?>
										<select name="fieldku" id="fieldku" onChange="gantiisi1(this.value,'<?php echo $tabel; ?>')" >
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
									<p>
									
									<iframe id="iframeproper" src="" style="border:none;width:100%;height:100vh;"></iframe>
									</p>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title">
                                    <b>Summary : </b>
                                    <p>
                                        <?php
										  $tabel=$_GET['tabel'];	
										  $sqlcek="select count(ID) as jumlah,tipe from ".$tabel." ";
										  $resultcek=mysqli_query($link,$sqlcek);
										  if ($resultcek)
										  {
										  while ($rowcek=mysqli_fetch_array($resultcek))
										  {
											$cektipe=$rowcek['tipe'];
											if ($cektipe=='1')
											{
												$namatipe="Point";
											}
											if ($cektipe=='3')
											{
												$namatipe="Lines";
											}
											if ($cektipe=='5')
											{
												$namatipe="Polygon";
											}
											$jumlah=$rowcek['jumlah'];	
										  }
										  }
										  $query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field not like '%ID%'  and Field not like 'kode' and Field not like
										 '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%'
										  and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' ";
										  //echo $query;
										  $hasil=mysqli_query($link,$query);
										  if ($hasil)
										  {
										  $i=0;
										  while ($data=mysqli_fetch_array($hasil))
										  {
										  $i++;
										  }
										  }
										 echo "Nama SHP : ".$tabel."<br>"; 
										 echo "Jumlah Record : ".$jumlah."<br>"; 
										 echo "Tipe Geomery : ".$namatipe."<br>";
										 echo "Jumlah Kolom DBF : ".$i."<br>";  								
										?>							
                                    </p>
									<p>
									<div class="row clearfix">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="card">
									<div class="header">
									</div>
									<div class="body">
									<label>Nama Field Baru (Hindari Karakter sbb : ! @ # $ % ^ & * ( ) - \ / ? < > . , + = )</label>
									<input name="fieldkubaru" id="fieldkubaru" type="text" placeholder="Masukkan Nama Field Tambahan (Hindari Karakter sbb : ! @ # $ % ^ & * ( ) - \ / ? < > . , + = )" class="form-control"/>
									<br>
									<button class="btn btn-danger waves-effect" type="button" onClick="TambahField('<?php echo $tabel; ?>','_j2a098002_')">Tambah Field Baru&nbsp;&nbsp;</button>
									</p>
									
									<?php
									$query="SHOW COLUMNS FROM ".$tabel." where Field ='KODE_FOTO' ";
										  //echo $query;
									$hasil=mysqli_query($link,$query);
									$jumlah=mysqli_num_rows($hasil);
									if ($jumlah==0)
									{
									?>
									<br>
									<label>* Field Foto 1 Belum Ada</label><br>
									<button class="btn btn-danger waves-effect" type="button" onClick="TambahField('<?php echo $tabel; ?>','KODE_FOTO')" >Tambah Field Foto 1</button>
									<br>
									<?php 
									}
									?>
									
									<?php
									$query="SHOW COLUMNS FROM ".$tabel." where Field ='KODE_FOTO1' ";
										  //echo $query;
									$hasil=mysqli_query($link,$query);
									$jumlah=mysqli_num_rows($hasil);
									if ($jumlah==0)
									{
									?>
									<br>
									<label>* Field Foto 2 Belum Ada</label><br>
									<button class="btn btn-danger waves-effect" type="button" onClick="TambahField('<?php echo $tabel; ?>','KODE_FOTO1')" >Tambah Field Foto 2</button>
									<?php 
									}
									?>
									</div>
									</div>
									</div>
									</div>
                                </div>
								<div role="tabpanel" class="tab-pane fade" id="upload_with_icon_title">
                                    <p>
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="card">
												<div class="header">
													<h2>
														File Upload lebih dari 1 File dengan <i>Drag Blok Mouse</i> ATAU <i>Ctrl</i> ATAU <i>Shift</i> <i>Ctrl + A (untuk semua file)</i>
													</h2>
												</div>
												<div class="body">
													<?php
													$query="SHOW COLUMNS FROM ".$tabel." where Field ='KODE_FOTO' or Field ='KODE_FOTO1' ";
														  //echo $query;
													$hasil=mysqli_query($link,$query);
													$jumlah=mysqli_num_rows($hasil);
													if ($jumlah==0)
													{
													echo "Field Foto ke - 1 atau Foto ke - 2 Belum Tersedia";
													}
													else
													{
													?>
													<form action="" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
														<input class="form-control" type="hidden" name="pros" id="pros" value="1"/>
														<input class="form-control" type="hidden" name="tabpros" id="tabpros" value="<?php echo $tabel; ?>"/>
														<input class="form-control" type="file" name="filesToUpload[]" id="filesToUpload" accept="image/*" multiple onChange="makeFileList();" required/>
														<br>
														<p>
															<strong>Filesyang dipilih :</strong>
														</p>
														<ul id="fileList"><li>Tidak Ada File Terpilih</li></ul>	
														<button class="btn btn-primary waves-effect" type="submit">Upload</button> 
													</form>
													<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
									</p>
                                </p>
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
	
	<script src="js/pages/forms/advanced-form-elements.js"></script>

    <script src="js/admin.js"></script>

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
function gantiisi1(str,str1)
{

	//alert(str);
	//alert(str1);
	
	var xx=str;
	var yy=str1;
	
	var iframe = document.getElementById('iframeproper');
	iframe.src = "getTabel.php?no1="+str+"&no2="+str1;
}
</script>

<script>
 <?php
  $tabel=$_GET['tabel'];	
  $sqlcek="select * from ".$tabel." limit 1 ";
  $resultcek=mysqli_query($link,$sqlcek);
  if ($resultcek)
  {
  while ($rowcek=mysqli_fetch_array($resultcek))
  {
	$cektema=$rowcek['labelku'];
	if ($cektema<>'')
	{
	?>
		gantiisi1('<?php echo $cektema ; ?>','<?php echo $tabel ; ?>')
	<?php 
	}	
  }
  }								
?>

</script>

<script>
function TambahField(str,str1)
{
//alert(str);
//alert(str1);
if (str1=='')
{
	alert ("Field Tidak Boleh Kosong!");
    return;	
}

if (str1=="_j2a098002_")
{
	var yy=document.getElementById("fieldkubaru").value;    
}
else
{
	var yy=str1;
}



xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null) {
    alert ("Your browser does not support AJAX!");
    return;
  }
  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
  
var url="getFieldNew.php";
  url=url+"?no1="+str+"&no2="+yy;
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

<script type="text/javascript">
function makeFileList() {
	var input = document.getElementById("filesToUpload");
	var ul = document.getElementById("fileList");
	while (ul.hasChildNodes()) {
		ul.removeChild(ul.firstChild);
	}
	for (var i = 0; i < input.files.length; i++) {
		var li = document.createElement("li");
		li.innerHTML = input.files[i].name;
		ul.appendChild(li);
	}
	if(!ul.hasChildNodes()) {
		var li = document.createElement("li");
		li.innerHTML = 'No Files Selected';
		ul.appendChild(li);
	}
}
</script>

</body>

</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">