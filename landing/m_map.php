<?php 
session_start();
include '../library/config.php'; 
if ((!urlencode($_COOKIE['oneid'])) || (urlencode($_COOKIE['oneid'])==""))
{
header("location:./");
?>
<script>
//alert("");
window.location='./';
</script>
<?php
}


$sqlhalaman = "select * from initial";
$resulthal = mysqli_query($link,$sqlhalaman);
if ($resulthal) {
$rowhal = mysqli_fetch_array($resulthal);
$hal_maksimum = $rowhal['ROW_PERPAGE'];
$lock_lokasi = $rowhal['lock_lokasi'];
}
  $hal = $_GET['hal'];
  // jika page default nya 1
  if(($_GET['hal']=="")){
  $halaman = 1;
  $hal =1;
  } else {
  $halaman = $_GET['hal'];
  $hal =$_GET['hal'];
  }
  //tentukan jumlah data setiap halaman

  $mulai = (($halaman * $hal_maksimum) - $hal_maksimum); 

	  $action=$_GET['action'];
	  $ket="";
	  $ket=$_GET['ket'];
	  $proses=$_POST['proses'];
	  if (($action=="edit") || ($action=="peta") || ($action=="manajemen")) {
	  	$query="select * from one_peta where id='".decrypt(urlencode($_GET['id']))."'";
		$result = mysqli_query ($link,$query);
		while ($row = mysqli_fetch_array ($result))
		{
			$nama=$row['nama'];
			$bidang_peta=$row['bidang_peta'];
			$status=$row['status'];
			$tabel=$row['tabel'];
			$kodeid=$row['id'];
			
		}
	  }
	  if ($action=="delete") {
	  	$query="update one_peta set deleted='1' where id='".$_GET['id']."'";
		//echo $query;
		$result = mysqli_query ($link,$query);
		header ('Location: ' . $_SERVER['PHP_SELF'] . '?ket=delete');
		exit;
	  }

	  if ($proses=="1")
	  {
	  	
		$nama=$_POST['nama'];
		$bidang_peta=$_POST['bidang_peta'];
		$status=$_POST['status'];
		$kodeid=$_POST['kodeid'];
		$tanggalsekarang=date("Y-m-d h:i:s");
		
		$query="insert into one_peta (id, nama, bidang_peta, status, createdate, createby, deleted) values (";
		$query=$query." null, '".mysqli_real_escape_string($link,$nama)."', '".mysqli_real_escape_string($link,$bidang_peta)."', '".mysqli_real_escape_string($link,$status)."', SYSDATE(), '".$_COOKIE['oneid']."','0')";
		$result = mysqli_query ($link,$query);
		header ('Location:m_map.php');
		?>
		<script>
		alert("Data Tersimpan..");
		window.location='m_map.php';
		</script>
		<?php
		//header ('Location: ' . $_SERVER['PHP_SELF'] . '?ket=add');
		exit;
	  }
	  
	  if ($proses=="0")
	  {
	  	
		
		$nama=$_POST['nama'];
		$bidang_peta=$_POST['bidang_peta'];
		$status=$_POST['status'];
		$kodeid=$_POST['kodeid'];
		$tanggalsekarang=date("Y-m-d h:i:s");
		
		
		$query="update one_peta set nama='".mysqli_real_escape_string($link,$nama)."'
		,bidang_peta='".mysqli_real_escape_string($link,$bidang_peta)."'
		,status='".mysqli_real_escape_string($link,$status)."'
		,modifdate=SYSDATE()
		,modifby='".$_COOKIE['oneid']."'
		  where id='".$kodeid."'";
		$result = mysqli_query ($link,$query);
		header ('Location: ' . $_SERVER['PHP_SELF'] . '?ket=edit');
		?>
		<script>
		alert("Data Tersimpan..");
		window.location='m_map.php?ket=edit';
		</script>
		<?php
		exit;
	  }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $judul; ?></title>
	<link rel="shortcut icon" href="images/logo.png" >
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/login.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
		<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

		<link href="css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/snippet/snippet.css" rel="stylesheet" type="text/css" />
		
        <link href="plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/select2/select2-bootstrap.css" rel="stylesheet" type="text/css" />

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

       

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->

        <!--[if lt IE 9]>

          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

        <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap');
</style>

<style type="text/css">
<!--
body {
	background-image: url(images/back.png);
}
-->

h1, h2, h3, h4, h5, h6 {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
	letter-spacing: 2px;
	font-size: 12px;
}

.button {
    font-family: 'Roboto', sans-serif;
    font-weight: 700;
    font-size: 13px;
    
    letter-spacing: 3px;
}


input {
    font-family: 'Roboto', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}


nav.navbar li a {
  	font-family: 'Roboto', sans-serif;
    letter-spacing: 2px;
	font-size: 12px;
}

p {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

div {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}

button {
    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;
}


/* Input field */
.select2-selection__rendered { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Around the search field */
.select2-search { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Search field */
.select2-search input { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Each result */
.select2-results { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Higlighted (hover) result */
.select2-results__option--highlighted { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
    
/* Selected option */
.select2-results__option[aria-selected=true] { 

    font-family: 'Roboto', sans-serif;
    font-weight: 300;
	letter-spacing: 2px;
	font-size: 12px;

 }
 
a {
  color: #008000;
  font-weight:bold;
}

</style></head>
<body class="hold-transition skin-blue sidebar-mini">


  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">
	
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">

            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
				<?php if (!$action) { ?>
				<div class="box-body">
				<a href="m_map.php?action=add" class="btn btn-primary" data-toggle="tooltip" title="Tambah"><i class="fa fa-plus-circle"></i> </i>Tambah</a>
				<p>
				<h3>DAFTAR PETA SIG <?php echo $judul; ?></h3>
				<form name="form" action="<?php echo "$PHP_SELF"; ?>" method="get">
				<input type="text" name="caritabel" class="form-control" id="caritabel" placeholder="Masukkan Kata Kunci Pencarian" data-toggle="tooltip" title="Pencarian dengan memasukkan kata kunci dan tekan Tombol Enter" value="<?php echo $_GET['caritabel']; ?>" onChange="this.form.submit()">
				</form>
				</p>
				</div>
				<div class="box-body">
				<div id="no-more-tables" class="box-body table-responsive no-padding">
					<table class="table table-striped table-bordered table-hover">
					<thead class="cf">
										
										<tr>
										<th>No</th>
										<th>Nama Peta</th>
										<th>Jumlah Layer</th>
										<th>Opsi</th>
										
										</tr>
					</thead>
					
					<tbody>
					</tbody>
					
					<?php 
					$tambahsql=get_Pencarian_Tabel("nama",$_GET['caritabel']);
					$sqljum = "select count(id) as jumlah from one_peta where deleted='0'  ";
					$sqljum=$sqljum.$tambahsql;
					//echo $sqljum;
													$resultjum = mysqli_query($link,$sqljum);
													if ($resultjum) {
													$rowjum = mysqli_fetch_array($resultjum);
													$jumlahrecord=$rowjum['jumlah'];
													$jumlah_halaman = ceil($jumlahrecord / $hal_maksimum);
													
													
													}
					
					$sql="select *  from one_peta where deleted='0'"; 
					$sql=$sql.$tambahsql;
					$sql=$sql." order by id asc LIMIT $mulai, $hal_maksimum";
					
					//echo $sql;
						  $data=mysqli_query($link,$sql);
						  $i=0;
						  while ($baris = mysqli_fetch_array ($data))	
						  {
						  
						  $i++;
						  $id=$baris['id'];
						  $nama=$baris['nama'];
						  $bidang_peta=get_Isi_Field1("nama","one_bidang_peta","id",$baris['bidang_peta']);
						  $status=get_Isi_Field1("nama","one_master_status","id",$baris['status']);
						  $tabel=$baris['tabel'];
						  $jumlahlayer=explode("|",$tabel);
						  $countjumlahlayer=count($jumlahlayer)-1;
						  
					?>
					<tr>
						<td data-title="No">
						<?php echo $i; ?>
						</td>
						<td data-title="Nama Peta">
						<?php echo $nama; ?>
						</td>
						<td data-title="Jumlah Layer">
						<?php echo $countjumlahlayer; ?>
						</td>
						<td>
						<a href="m_map.php?action=edit&id=<?php echo encrypt($id); ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
						<a href="#" onClick="doDelete(<?php echo $id; ?>)" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus"><span class="glyphicon glyphicon-trash"></span></a>
						<a href="m_map.php?action=peta&id=<?php echo encrypt($id); ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Upload Layer Peta"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
						<?php
						if ($countjumlahlayer>0)
						{
						?>
						<a href="m_map.php?action=manajemen&id=<?php echo encrypt($id); ?>" class="btn btn-info btn-sm" data-toggle="tooltip" title="Setting Label Layer"><span class="glyphicon glyphicon-wrench"></span></a>
						
						<?php
						}
						?>
						</td>
					</tr>
					<?php 
					
					} 
					
					?>
					</table>
					<?php 
					$awal=5;
					$akhir=$jumlah_halaman-2;
					//echo $jumlah_halaman;
					$x=1;  while ($x<=$jumlah_halaman) {
					
					if ($hal==$x) {
												
					echo '<a href="' . $_SERVER['PHP_SELF'] . '?caritabel='.$_GET['caritabel'].'&hal='.$x.'" class="btn btn-primary btn-sm">'.$x.'</a>';
					}
					else
					{
					 	if ( ($x<=$awal) or ($akhir <=$x) or (($hal-4<$x) and ($hal+4>$x))) {
							echo '<a href="' . $_SERVER['PHP_SELF'] . '?caritabel='.$_GET['caritabel'].'&hal='.$x.'" class="btn btn-default btn-sm">'.$x.'</a>'; 
						$titik=1;  
						}
						else { if ($titik==1) {echo "...."; $titik=0;} }
					}
					$x++;
					}
					
					?>
				</div>
			</div>
			
				
			  </div>
			</div>
			<?php } ?>

			<?php if ($action=="add") {?>
            <form name="form" action="<?php echo "$PHP_SELF?sub=addnow"; ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
			
			    <div class="form-group">
                  <label for="Nama Peta">Nama Peta</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Peta" value="<?php echo $nama; ?>" required>
				  
                </div>
			  
			
				
			  </div>
			  
			  
			  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-default" onClick="batal()">Cancel</button>
              </div>
                <input type="hidden" name="proses" class="form-control" id="proses" placeholder="Proses" value="1">
				<input type="hidden" name="kodeid" class="form-control" id="kodeid" placeholder="Kode ID" value="<?php echo $kodeid; ?>">
			
			</div>
            <!-- /.box-body -->
              
            </form>
			<?php } ?>
			<?php if ($action=="edit") {?>
			
			<form name="form" action="<?php echo "$PHP_SELF?sub=addnow"; ?>" method="post" enctype="multipart/form-data">
			<div class="box-body">
              
			  <!-- Date -->
              <div class="form-group">
                  <label for="Nama Peta">Nama Peta</label>
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Peta" value="<?php echo $nama; ?>" required>
				  
              </div>
			 
			  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-default" onClick="batal()">Cancel</button>
              </div>
			    <input type="hidden" name="proses" class="form-control" id="proses" placeholder="Proses" value="0">
				<input type="hidden" name="kodeid" class="form-control" id="kodeid" placeholder="Kode ID" value="<?php echo $kodeid; ?>">
			
			</div>
            <!-- /.box-body -->
            </form>
			  
            
			<?php } ?>
			
			
			
			<?php if ($action=="peta") {?>
			
			<form action="example_wkt.php" method="POST" enctype="multipart/form-data">
			<div class="box-body">
              
			  <!-- Date -->
              <div class="form-group">
                 
				<label class="control-label">Pilih File SHP (Proyeksi Geometry)</label>
				<input type="file" class="form-control" accept=".shp" id="InputUpload" placeholder="Upload File" name="attachment" value="
				<?php echo $attachment;?> " required> 
				<label class="control-label">Pilih File SHX (Proyeksi Geometry)</label>
				<input type="file" class="form-control" accept=".shx" id="InputUpload" placeholder="Upload File" name="attachment1" value="
				<?php echo $attachment1;?> " required> 
				<label class="control-label">Pilih File DBF (Proyeksi Geometry)</label>
				<input type="file" class="form-control" accept=".dbf" id="InputUpload" placeholder="Upload File" name="attachment2" value="
				<?php echo $attachment2;?> " required>
				<br>
              </div>
			 
			  <div class="box-footer">
                <button type="submit" class="btn btn-primary">Upload SHP</button>
				<button type="button" class="btn btn-default" onClick="batal()">Batal</button>
              </div>
			    <input type="hidden" name="proses" class="form-control" id="proses" placeholder="Proses" value="2">
				<input type="hidden" name="kodeid" class="form-control" id="kodeid" placeholder="Kode ID" value="<?php echo $kodeid; ?>">
			
			</div>
            <!-- /.box-body -->
            </form>
			  
            
			<?php } ?>
			
			
			<?php if ($action=="manajemen") {?>
			
			<div class="box-body">
              <div class="form-group">
              
			    <div id="no-more-tables" class="box-body table-responsive no-padding">
				<table class="table table-striped table-bordered table-hover">
				<thead class="cf">
									
				<tr>
				<th>No</th>
				<th>Layer Peta</th>
				<th>Label Peta</th>
				
				</tr>
				</thead>
				
				<tbody>
				</tbody>
				
				<?php 
				$sqljum = "select tabel from one_peta where deleted='0' and id='".decrypt(urlencode($_GET['id']))."' ";
				$resultjum = mysqli_query($link,$sqljum);
				if ($resultjum) {
				$rowjum = mysqli_fetch_array($resultjum);
				$jumlahtabel=explode("|",$rowjum['tabel']);
				$countjumlahtabel=count($jumlahtabel)-1;
				$jumlahrecord=$countjumlahtabel;
				$jumlah_halaman = ceil($jumlahrecord / $hal_maksimum);
				}
				//echo $sqljum;
				
						for ($i = 1; $i <= $countjumlahtabel; $i++) {
						$isilabel=get_Isi_Field7("labelku",$jumlahtabel[$i],"ID_AUTO","1");
						?>
						<tr>
							<td data-title="No">
							<?php echo $i; ?>
							</td>
							<td data-title="Layer Peta">
							<?php echo $jumlahtabel[$i]; ?>
							</td>
							<td data-title="Label Peta">
							<select id="labelpeta" name="labelpeta" class="form-control select2" data-placeholder="Pilih Label Peta" style="width: 100%;" onChange="settingtabelpeta('<?php echo $jumlahtabel[$i]; ?>','labelku',this.value)">
							<option value="" <?php if ($isilabel=="") { ?> selected="selected" <?php } ?> >Pilih Label Peta</option>
							<?php 
							$sql = "
							SHOW COLUMNS FROM ".$jumlahtabel[$i]." where Field not like '%ogc_geom%' and Field <> 'ID'  and Field not like 'kodetabel' and Field not like '%simbol%' 
							and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%' 
							and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' and Field not like '%deleted%' 
							and Field not like '%ORIG_FID%' and Field not like '%IDSHP%' and Field not like '%tematikku%'
							";
							
							//echo $sql;
							$result = mysqli_query($link,$sql);
							if ($result) {
								while ($row = mysqli_fetch_array ($result)) {
									$idsifat=$row['Field'];
									$namasifat=$row['Field'];
									
									?>
							<option value="<?php echo $idsifat; ?>" <?php if ($idsifat==$isilabel) { ?> selected="selected" <?php } ?> ><?php echo $namasifat; ?></option>
							
							<?php
								}
							}
							?>
						  	</select>
							</td>
							
						</tr>
						</table>
						<?php 
						$awal=5;
						$akhir=$jumlah_halaman-2;
						//echo $jumlah_halaman;
						$x=1;  while ($x<=$jumlah_halaman) {
						
						if ($hal==$x) {
													
						echo '<a href="' . $_SERVER['PHP_SELF'] . '?action='.$_GET['action'].'&id='.$_GET['id'].'&hal='.$x.'" class="btn btn-primary btn-sm">'.$x.'</a>'; 
						}
						else
						{
							if ( ($x<=$awal) or ($akhir <=$x) or (($hal-4<$x) and ($hal+4>$x))) {
								echo '<a href="' . $_SERVER['PHP_SELF'] . '?action='.$_GET['action'].'&id='.$_GET['id'].'&hal='.$x.'" class="btn btn-default btn-sm">'.$x.'</a>'; 
							$titik=1;  
							}
							else { if ($titik==1) {echo "...."; $titik=0;} }
						}
						$x++;
						}
					
						?>
				
				</div>   
				<?php 		
				}
				?>
              </div>
			 
			  <div class="box-footer">
                <button type="button" class="btn btn-default" onClick="batal()">Kembali</button>
              </div>
			    
			</div>
            <!-- /.box-body -->
              
            
			<?php } ?>
			
			
			

		  </div>
          <!-- /.box -->

          </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->


			  </div>
			</div>
		  </div>
		</div>
	  </div>  
	
	</section>

</body>
	<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<?php 
if ($_GET['nomor'])
{
?>
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
</script>	
<?php
}
?>


<!-- jQuery 2.2.0 -->
<script type="text/javascript" src="js/Get_Adi.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
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
<!-- Page script -->
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
    $('#stanggal').datepicker({
      format: "dd/mm/yyyy",

				language: "id",

				autoclose: true,

				todayHighlight: true

    });

	//Date picker
    $('#TANGGAL_PENCAIRAN').datepicker({
      format: "dd/mm/yyyy",

				language: "id",

				autoclose: true,

				todayHighlight: true

    });

    
	
    //Date picker
    $('#datepicker').datepicker({
      format: "dd/mm/yyyy",

				language: "id",

				autoclose: true,

				todayHighlight: true

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
  });
</script>
<script>
function batal()
{
	document.location='m_map.php';
	//alert("tes");
}
</script>

<script>
function tes(id)
{
	//document.location='m_map.php';
	//alert(id);
	var str=id;
	var res=str.substring(0,2);
	var res1=str.substring(3,5);
	var res2=str.substring(6,10);
	var adi=res2+"-"+res1+"-"+res;
	if (adi=="--"){
		adi="";
	}
	document.getElementById("tanggalan").value=adi;
	//alert(adi);
}
</script>

<?php
echo '<script language="JavaScript">

			function doDelete(id) {

			if (confirm("Yakin ingin menghapus Data ini?")) {

			window.location=\'';

    		echo $PHP_SELF;

    		echo '?action=delete&id=\'+id;

			}}

			</script>';
  
?>


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


<SCRIPT>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
		  //alert(charCode);
          if (charCode != 46 && charCode > 31 
            && (charCode < 45 || charCode > 57))
             return false;

          return true;
       }
       //-->
</SCRIPT>

<script type="text/javascript">
	
	var rupiah3 = document.getElementById('ANGGARAN');
	rupiah3.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah3.value = formatRupiah3(this.value, '');
	});

	/* Fungsi formatRupiah */
	function formatRupiah3(angka3, prefix3){
		var number_string3 = angka3.replace(/[^,\d]/g, '').toString(),
		split   		= number_string3.split(','),
		sisa3     		= split[0].length % 3,
		rupiah3     		= split[0].substr(0, sisa3),
		ribuan3     		= split[0].substr(sisa3).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan3){
			separator3 = sisa3 ? '.' : '';
			rupiah3 += separator3 + ribuan3.join('.');
		}

		rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
		return prefix3 == undefined ? rupiah3 : (rupiah3 ? '' + rupiah3 : '');
	}
</script>

<script>
function myLogOut() {
  var txt;
  var r = confirm("Keluar Aplikasi?");
  if (r == true) {
    window.location='logout.php?maukeluar=iya';
  }

}
</script>

<script>
function Kembali() {

    window.location='m_map.php';

}
</script>


<script>
function settingtabelpeta(id,str,isi)
{
		xmlHttp=GetXmlHttpObject()
		  if (xmlHttp==null) {
			alert ("Your browser does not support AJAX!");
			return;
		  }
		  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
		  
		var url="GantiLabelPeta.php";
		  url=url+"?no1="+id+"&no2="+str+"&no3="+isi;
		  xmlHttp.onreadystatechange=function () {
			document.getElementById("loadingstat").innerHTML=xmlHttp.responseText;
			document.getElementById("loadingstat").innerHTML="";
		  }
		  xmlHttp.open("GET",url,true); 
		  //alert("hahahahaha");
		  xmlHttp.send(null);
  
  }
</script>




</body>
</html>
<div id="loadingstat" style="position: absolute; top: 10; left: 10px; width: 10px; height: 10px; z-index: 3">
