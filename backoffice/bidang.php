<?php
session_start();
include '../library/config.php';
$action=$_GET['action'];
$kode=decrypt($_GET['id']);

if (($action=='e')|| $action=='s')
{
	$sql="select * from one_bidang_peta where deleted='0' and id='".$kode."' ";
	$result=mysqli_query($link,$sql);
	if ($result)
	{
	while ($row=mysqli_fetch_array($result))
	{
	$nama=$row['nama'];
	}
	}
}

if ($action=='h')
{
$sql="update one_bidang_peta set deleted='1' where id='".$kode."'";
//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='bidang.php?suc=2';
</script>
<?php 
exit;
}

$proses=$_POST['proses'];
if ($proses=='0')
{

$nama=$_POST['nama'];

$sql="insert into one_bidang_peta (id,nama,deleted) values (null,'".$nama."','0')";

//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='bidang.php?suc=1';
</script>
<?php 
exit;
}

if ($proses=='1')
{

$kodeku=$_POST['kodeku'];
$nama=$_POST['nama'];
$tanggal=date("Y-m-d H:i:s");
$sql="update one_bidang_peta set nama='".$nama."' where id='".$kodeku."'";


//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='bidang.php?suc=1';
</script>
<?php 
exit;
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
	
	
<style>
body { margin:2em; }
pre { margin:1em 0; }
select.selectpicker { display:none; /* Prevent FOUC */}
</style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <?php include 'sidetop.php'; ?>
		<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModal4" class="modal" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Penyimpanan <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Penyimpanan Data Sukses...
                        </p>
						
                    </div>
                    <div class="modal-footer">
                        
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            OK
                        </button>
                        
                    </div>
					
                </div>
            </div>
        </div>
        
		<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModal5" class="modal" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Hapus Data <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Hapus Data Sukses...
                        </p>
						
                    </div>
                    <div class="modal-footer">
                        
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            OK
                        </button>
                        
                    </div>
					
                </div>
            </div>
        </div>
        
        
    <section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Master Bidang Peta
                            </h2>
                            
                        </div>
                        <div class="body">
						<?php
						if (!$action)
						{
						?>
							<div class="row clearfix">
							<a href="?action=a&id="><button class="btn btn-primary waves-effect" type="button">Tambah Data</button></a>
							<p></p>
							</div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php
										$sql="select * from one_bidang_peta where deleted='0' ";
										$result=mysqli_query($link,$sql);
										if ($result)
										{
										$i=1;
										while ($row=mysqli_fetch_array($result))
										{
										
										$kode=encrypt($row['id']);
										$nama=$row['nama'];
										
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td>
											
											<a href="?action=e&id=<?php echo $kode; ?>"><button class="btn btn-success waves-effect" type="button">Edit Data&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </button></a><br>
											<a href="#" onClick="hapus('<?php echo $kode; ?>')"><button class="btn btn-danger waves-effect" type="button">Hapus Data </button></a>
											</td>
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
						if ($action=='a')
						{
						?>
						<form action="" method="post" accept-charset="UTF-8" role="form" class="form-signin"  enctype="multipart/form-data">
						
						<h5>Nama</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Field" required>
							</div>
						</div>
						
						
						
						<input type="hidden" name="proses" id="proses" class="form-control" value="0" >
						<button class="btn btn-primary waves-effect" type="submit">Simpan</button> 
						<button class="btn btn-danger waves-effect" type="button" onClick="batal()">Batal</button> 
						</form>
						<?php
						}
						if ($action=='e')
						{
						?>
						<form action="" method="post" accept-charset="UTF-8" role="form" class="form-signin"  enctype="multipart/form-data">
						<h5>Nama </h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $nama; ?>" placeholder="Nama Field" required>
							</div>
						</div>
						<input type="hidden" name="kodeku" id="kodeku" class="form-control" value="<?php echo $kode; ?>" >
						<input type="hidden" name="proses" id="proses" class="form-control" value="1" >
						<button class="btn btn-primary waves-effect" type="submit">Simpan</button> 
						<button class="btn btn-danger waves-effect" type="button" onClick="batal()">Batal</button> 
						</form>
						<?php 
						}
						?>
						</div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

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
	
	<script>
	function batal()
	{
		//alert(id1);
		//alert(id2);
		if (confirm("Kembali ke Tabel?")) {
			//alert("Hapus");
			window.location='bidang.php';
		}
	}
	</script>
	<script>
	function hapus(id)
	{
		//alert(id1);
		//alert(id2);
		if (confirm("Hapus Data ini?")) {
			//alert("Hapus");
			window.location='?action=h&id='+id;
		}
	}
	</script>
	<?php
	if ($_GET['suc']=='1')
	{
	?>
	<script>
		$('#costumModal4').modal('show');
	</script>
	<?php
	}
	?>
	<?php
	if ($_GET['suc']=='2')
	{
	?>
	<script>
		$('#costumModal5').modal('show');
	</script>
	<?php
	}
	?>


</body>

</html>