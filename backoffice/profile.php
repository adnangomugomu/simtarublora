<?php
session_start();
include '../library/config.php';
$action=$_GET['action'];
$kode=decrypt($_GET['id']);

if (($action=='e')|| $action=='s')
{
	$sql="select * from one_user where deleted='0' and id='".$kode."' ";
	$result=mysqli_query($link,$sql);
	if ($result)
	{
	while ($row=mysqli_fetch_array($result))
	{
	$user_name=$row['user_name'];
	$user_password=decrypt($row['user_password']);
	$user_fullname=$row['user_fullname'];
	$user_dinas=$row['user_dinas'];
	$user_jabatan=$row['user_jabatan'];
	$user_pangkat=$row['user_pangkat'];
	$user_nip=$row['user_nip'];
	$user_level=$row['user_level'];
	$user_foto=$row['user_foto'];
	}
	}
}

if ($action=='h')
{
$sql="update one_user set deleted='1' where id='".$kode."'";
//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='profile.php?suc=2';
</script>
<?php 
exit;
}

$proses=$_POST['proses'];
if ($proses=='0')
{
$user_name=$_POST['user_name'];
$user_password=encrypt($_POST['user_password']);
$user_fullname=$_POST['user_fullname'];
$user_jabatan=$_POST['user_jabatan'];
$user_pangkat=$_POST['user_pangkat'];
$user_dinas=$_POST['user_dinas'];
$user_nip=$_POST['user_nip'];
$user_level=$_POST['user_level'];


if ($_FILES['user_foto']['name'])
        {
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['user_foto']['name'];
          $attachdir = 'images/';  

          copy ($_FILES['user_foto']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  $sql="insert into one_user (id,user_name,user_password,user_fullname,user_dinas,user_jabatan,user_pangkat,user_nip,user_foto,user_level,deleted) values (null,'".$user_name."','".$user_password."','".$user_fullname."','".$user_dinas."','".$user_jabatan."','".$user_pangkat."','".$user_nip."','".$gambar."','".$user_level."','0')";
        }
		else
		{
			$sql="insert into one_user (id,user_name,user_password,user_fullname,user_dinas,user_jabatan,user_pangkat,user_nip,user_level,deleted) values (null,'".$user_name."','".$user_password."','".$user_fullname."','".$user_dinas."','".$user_jabatan."','".$user_pangkat."','".$user_nip."','".$user_level."','0')";
		}

//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='profile.php?suc=1';
</script>
<?php 
exit;
}

if ($proses=='1')
{
$kodeku=$_POST['kodeku'];
$user_name=$_POST['user_name'];
$user_password=encrypt($_POST['user_password']);
$user_fullname=$_POST['user_fullname'];
$user_jabatan=$_POST['user_jabatan'];
$user_pangkat=$_POST['user_pangkat'];
$user_nip=$_POST['user_nip'];
$user_dinas=$_POST['user_dinas'];
$user_level=$_POST['user_level'];
$tanggal=date("Y-m-d H:i:s");
if ($_FILES['user_foto']['name'])
        {
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['user_foto']['name'];
          $attachdir = 'images/';  
          copy ($_FILES['user_foto']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  $sql="update one_user set user_name='".$user_name."'
		  ,user_password='".$user_password."'
		  ,user_fullname='".$user_fullname."'
		  ,user_jabatan='".$user_jabatan."'
		  ,user_pangkat='".$user_pangkat."'
		  ,user_dinas='".$user_dinas."'
		  ,user_nip='".$user_nip."'
		  ,user_level='".$user_level."'
		  ,user_foto='".$gambar."' where id='".$kodeku."'";
        }
		else
		{
		   $sql="update one_user set user_name='".$user_name."'
		  ,user_password='".$user_password."'
		  ,user_fullname='".$user_fullname."'
		  ,user_jabatan='".$user_jabatan."'
		  ,user_pangkat='".$user_pangkat."'
		  ,user_dinas='".$user_dinas."'
		  ,user_nip='".$user_nip."'
		  ,user_level='".$user_level."'
		   where id='".$kodeku."'";
		}

//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='profile.php?suc=1';
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
                                Profile User
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
											<th>User Name</th>
											<th>Password</th>
                                            <th>Nama</th>
											<th>Dinas / SKPD / OPD</th>
                                            <th>Foto Profile</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>User Name</th>
											<th>Password</th>
											<th>Nama</th>
											<th>Dinas / SKPD / OPD</th>
                                            <th>Foto Profile</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
										<?php
										if ($_SESSION['onelevel']=='1')
										{
										$sql="select * from one_user where deleted='0' ";
										}
										else
										{
										$sql="select * from one_user where deleted='0' and id='".$_SESSION['oneid']."' ";	
										}
										$result=mysqli_query($link,$sql);
										if ($result)
										{
										$i=1;
										while ($row=mysqli_fetch_array($result))
										{
										
										$kode=encrypt($row['id']);
										$nama=$row['user_fullname'];
										$user_name=$row['user_name'];
										$user_password=decrypt($row['user_password']);
										$user_dinas=$row['user_dinas'];
										$ikon=$row['user_foto'];
										
										?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $user_name; ?></td>
											<td><?php echo $user_password; ?></td>
											<td><?php echo $nama; ?></td>
											<td><?php echo $user_dinas; ?></td>
                                            <td><img src="images/<?php echo $ikon; ?>" height="50"></td>
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
						
						<h5>User Name</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="<?php echo $user_name; ?>" required>
							</div>
						</div>
						<h5>Password User</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_password" id="user_password" class="form-control" placeholder="Password User" value="<?php echo $user_password; ?>" required>
							</div>
						</div>
						<h5>Nama User</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_fullname" id="user_fullname" class="form-control" placeholder="Nama User" value="<?php echo $user_fullname; ?>" required>
							</div>
						</div>
						<h5>Dinas / SKPD / OPD</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_dinas" id="user_dinas" class="form-control" placeholder="Dinas / SKPD / OPD" value="<?php echo $user_dinas; ?>" required>
							</div>
						</div>
						<h5>Jabatan</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_jabatan" id="user_jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $user_jabatan; ?>" required>
							</div>
						</div>
						<h5>Pangkat</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_pangkat" id="user_pangkat" class="form-control" placeholder="Pangkat" value="<?php echo $user_pangkat; ?>" required>
							</div>
						</div>
						<h5>NIP</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_nip" id="user_nip" class="form-control" placeholder="NIP" value="<?php echo $user_nip; ?>" required>
							</div>
						</div>
						<h5>Foto Profile</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="file" class="form-control" placeholder="Foto Profile" name="user_foto" id="user_foto" value="<?php echo $user_foto; ?>" accept="image/*">
							</div>
						</div>
						<h5>Level</h5>
						<select name="user_level" id="user_level" class="form-control show-tick" required>
							<option value="">Pilih Salah Satu</option>
							<?php 
							if ($_SESSION['onelevel']=='1')
							{
							$sqlopsi="select * from one_master_level where deleted='0'";
							}
							else
							{
							$sqlopsi="select * from one_master_level where deleted='0' and id ='2'";
							}
							$resultopsi=mysqli_query($link,$sqlopsi);
							if ($resultopsi)
							{
							while ($rowopsi=mysqli_fetch_array($resultopsi))
							{
								$kodeopsi=$rowopsi['id'];
								$namaopsi=$rowopsi['nama'];
							?>
							<option value="<?php echo $kodeopsi; ?>" <?php if ($kodeopsi==$user_level) { ?> selected="selected" <?php } ?>><?php echo $namaopsi; ?></option>
							<?php
							}
							}
							?>
                        </select>
						
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
						<h5>User Name</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_name" id="user_name" class="form-control" placeholder="User Name" value="<?php echo $user_name; ?>" required>
							</div>
						</div>
						<h5>Password User</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_password" id="user_password" class="form-control" placeholder="Password User" value="<?php echo $user_password; ?>" required>
							</div>
						</div>
						<h5>Nama User</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_fullname" id="user_fullname" class="form-control" placeholder="Nama User" value="<?php echo $user_fullname; ?>" required>
							</div>
						</div>
						<h5>Dinas / SKPD / OPD</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_dinas" id="user_dinas" class="form-control" placeholder="Dinas / SKPD / OPD" value="<?php echo $user_dinas; ?>" required>
							</div>
						</div>
						<h5>Jabatan</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_jabatan" id="user_jabatan" class="form-control" placeholder="Jabatan" value="<?php echo $user_jabatan; ?>" required>
							</div>
						</div>
						<h5>Pangkat</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_pangkat" id="user_pangkat" class="form-control" placeholder="Pangkat" value="<?php echo $user_pangkat; ?>" required>
							</div>
						</div>
						<h5>NIP</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="text" name="user_nip" id="user_nip" class="form-control" placeholder="NIP" value="<?php echo $user_nip; ?>" required>
							</div>
						</div>
						<h5>Foto Profile</h5>
						<div class="input-group">
							<div class="form-line">
								<input type="file" class="form-control" placeholder="Foto Profile" name="user_foto" id="user_foto" value="<?php echo $user_foto; ?>" accept="image/*">
							</div>
						<?php 
						if ($user_foto<>"")
						{
						?>
						 <img src="images/<?php echo $user_foto; ?>" height="30">
						<?php 
						}
						?>
						
						</div>
						<h5>Level</h5>
						<select name="user_level" id="user_level" class="form-control show-tick" required>
							<option value="">Pilih Salah Satu</option>
							<?php 
							if ($_SESSION['onelevel']=='1')
							{
							$sqlopsi="select * from one_master_level where deleted='0'";
							}
							else
							{
							$sqlopsi="select * from one_master_level where deleted='0' and id ='2'";
							}
							$resultopsi=mysqli_query($link,$sqlopsi);
							if ($resultopsi)
							{
							while ($rowopsi=mysqli_fetch_array($resultopsi))
							{
								$kodeopsi=$rowopsi['id'];
								$namaopsi=$rowopsi['nama'];
							?>
							<option value="<?php echo $kodeopsi; ?>" <?php if ($kodeopsi==$user_level) { ?> selected="selected" <?php } ?>><?php echo $namaopsi; ?></option>
							<?php
							}
							}
							?>
                        </select>
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
			window.location='profile.php';
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
		window.location='./';
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