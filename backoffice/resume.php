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
    <link href="css/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="css/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
	<!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
	

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
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
                <div class="modal-content" style="width:100%;height:100%;">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Rekapitulasi Data Tabel <?php echo $judulWeb; ?>
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
	<section class="content">
        <div class="container-fluid">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Statistik
                            </h2>
                            
                        </div>
                        <div class="body">
						<?php
						if (!$action)
						{
						?>
							<div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Peta</th>
                                            <th>Bidang Peta</th>
											<th>Sub Bidang Peta</th>
                                            <th>Dibuat Oleh <br> Tanggal Buat</th>
                                            <th>Status</th>
											<th>Rekap</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
										<?php
										if ($_SESSION['onelevel']=='1')
										{
										$sql="select * from one_peta where deleted='0' ";
										}
										else
										{
										$sql="select * from one_peta where deleted='0' and createby ='".$_SESSION['oneid']."' ";
										}
										$result=mysqli_query($link,$sql);
										if ($result)
										{
										$i=1;
										while ($row=mysqli_fetch_array($result))
										{
										
										$kode=encrypt($row['id']);
										$nama=$row['nama'];
										$statusku=get_Isi_Field1('nama','one_master_status','id',$row['status']);
										$bidang_peta=get_Isi_Field1('nama','one_bidang_peta','id',$row['bidang_peta']);
										$subbidang=get_Isi_Field1('nama','one_subbidang_peta','id',$row['subbidang']);
										$user=get_Isi_Field1('user_name','one_user','id',$row['createby']);
										$waktubuat=explode(" ",$row['createdate']);
										$tanggalbuat=explode("-",$waktubuat[0]);
										$tanggalbuat=$tanggalbuat[2]."-".$tanggalbuat[1]."-".$tanggalbuat[0];
										$tabel=$row['tabel'];
										$tempisitabel=explode("|",$tabel);
										$jumtempisitabel=count($tempisitabel);
										?>
                                        <tr style="font-weight:bold;">
                                            <td style="background-color:#99FF66;"><?php echo $i; ?></td>
                                            <td style="background-color:#99FF66;"><?php echo $nama; ?></td>
                                            <td style="background-color:#99FF66;"><?php echo $bidang_peta; ?></td>
											<td style="background-color:#99FF66;"><?php echo $subbidang; ?></td>
                                            <td style="background-color:#99FF66;"><?php echo $user."<br>".$tanggalbuat."<br>".$waktubuat[1]; ?></td>
                                            <td style="background-color:#99FF66;"><?php echo $statusku; ?></td>
											<td style="background-color:#99FF66;"></td>
                                            <td style="background-color:#99FF66;"></td>
											
                                        </tr>
										<?php
										for ($x = 1; $x <= $jumtempisitabel-1; $x++) {
										?>
										<tr>
                                            <td><?php echo $i.'.'.$x; ?></td>
											<td>Layer Data : </td>
											<td><?php echo $tempisitabel[$x]; ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td>
											<?php
											$qq="select count(id) as jml from one_rekap where nama='".$tempisitabel[$x]."'";
											$resultqq=mysqli_query($link,$qq);
											if ($resultqq)
											{
											while ($rowqq=mysqli_fetch_array($resultqq))
											{
												$jumqq=$rowqq['jml'];
											}
											}
											if ($jumqq==0)
											{
												echo "Setting Rekapan Data belum di setting di Manajemen Rekapan Data";
											}
											else
											{
												echo "<b>Rekapan Data Sudah Ada</b>";
											}
											?>
											</td>
                                            <td>
											<button class="btn btn-warning waves-effect" type="button" onClick="showku('<?php echo $tempisitabel[$x]; ?>')">Manajemen Rekapan Data</button>
											
											</td>
											
                                        </tr>
										<?php
										}
										?>
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
	<!-- Demo Js -->
    <script src="js/demo.js"></script>

	<script src="../js/velocity.min.js"></script>
	<script src="../js/velocity.ui.min.js"></script>
	<script  src="../js/index.js"></script>
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
	iframe.src = "rekap.php?tabel="+xx;
}
</script>

<script>
$('#costumModal4').on('hidden.bs.modal', function() {
    parent.location.reload();
})
</script>

</body>

</html>