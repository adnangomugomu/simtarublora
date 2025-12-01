<?php 
	  session_start();
	  include '../library/config.php'; 
	  date_default_timezone_set("Asia/Jakarta");
	  $tahunmulaidata=date('Y')-5;
	  $tahunsekarang=date('Y')-1;


$action=$_GET['action'];
$kode=$_GET['id'];

if (($action=='e')|| $action=='s')
{
	$sql="select * from one_album where deleted='0' and id='".$kode."' ";
	$result=mysqli_query($link,$sql);
	if ($result)
	{
	while ($row=mysqli_fetch_array($result))
	{
	$nama=$row['nama'];
	$ikonku=$row['ikon'];
	}
	}
}

if ($action=='h')
{
$sql="update one_album set deleted='1' where id='".$kode."'";
//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='simtaru-f1leunduh?suc=2';
</script>
<?php 
exit;
}

$proses=$_POST['proses'];
if ($proses=='0')
{

$nama=$_POST['nama'];

if ($_FILES['ikon']['name'])
        {
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['ikon']['name'];
          $attachdir = '../upload/';  

          copy ($_FILES['ikon']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  $sql="insert into one_album (id,nama,ikon,deleted) values (null,'".$nama."','".$gambar."','0')";
        }
		else
		{
			$sql="insert into one_album (id,nama,deleted) values (null,'".$nama."','0')";
		}

//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='simtaru-f1leunduh?suc=1';
</script>
<?php 
exit;
}

if ($proses=='1')
{

$kodeku=$_POST['kodeku'];
$nama=$_POST['nama'];
$tanggal=date("Y-m-d H:i:s");
if ($_FILES['ikon']['name'])
        {
          mt_srand (time ());
          $rand = mt_rand (100000, 999999);
          $newfilename = $rand . '_' . $_FILES['ikon']['name'];
          $attachdir = '../upload/';  
          copy ($_FILES['ikon']['tmp_name'], $attachdir . $newfilename);
          $gambar = $newfilename;
		  $sql="update one_album set nama='".$nama."',ikon='".$gambar."' where id='".$kodeku."'";
        }
		else
		{
			$sql="update one_album set nama='".$nama."' where id='".$kodeku."'";
		}

//echo $sql;
//exit;
$result=mysqli_query($link,$sql);
?>
<script>
window.location='simtaru-f1leunduh?suc=1';
</script>
<?php 
exit;
}


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $judulWeb; ?></title>
  <link rel="shortcut icon" href="<?php echo $ikon ; ?>" >
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="gaya.css" type="text/css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
		<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

		<link href="css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

        <link href="plugins/snippet/snippet.css" rel="stylesheet" type="text/css" />

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

		<link href="css/login.css" rel="stylesheet" type="text/css" />
		<link href="css/css.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/introjs-rtl.css" rel="stylesheet">
		<link href="css/introjs.css" rel="stylesheet">
		
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500;700&display=swap');
</style>

<style type="text/css">
<!--


body {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
	font-size: 12px;
}

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
    text-transform: uppercase;
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
 
 
 #divLoading {
	display:none;

    /*set the div in the top-left corner of the screen*/
    position:absolute;
    top:0;
    left:0;
    background: white url(landing/loader.gif) no-repeat;
    /*set the width and height to 100% of the screen*/
    width:100%;
    height:100%;
    z-index:999;
    opacity: 0.9; 
	filter: progid:DXImageTransform.Microsoft.Alpha(opacity=50);
	background-position: center center;
 }


.navbar .navbar-nav > .active{
  color: #000; background: red;
}
.navbar .navbar-nav > .active > a, 
.navbar .navbar-nav > .active > a:hover, 
.navbar .navbar-nav > .active > a:focus {
  color: #000;
  background: black;
}

#costumModallogin{
    height: 400px;
    top: calc(50% - 200px) !important;
}
/* line 573, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading {
  font-size: 50spx;
  color: #ffffff;
  font-weight: 700;
  position: relative;
  z-index: 3;
}

/* line 574, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading img {
  transition: all .2s ease-in-out;
  margin-top: 30px;
}

/* line 575, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading img:hover {
  transform: scale(1.1);
}

/* line 581, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading h2 {
  font-weight: 900 !important;
  font-size: 45px;
}

/* line 585, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading h4 {
  color: white;
  font-weight: 300 !important;
  text-align: justify;
}

/* line 590, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading h8 {
  color: white;
  font-weight: 300 !important;
  text-align: justify;
  font-size: 12px;
}

/* line 596, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading input {
  max-width: 500px;
  margin-top: 10px;
  opacity: 0.8;
  border-radius: 30px;
}

/* line 602, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading button {
  margin-top: 20px;
  background-color: transparent;
  border: 1px solid #fff;
  color: #fff;
  width: 100%;
  max-width: 200px;
  border-radius: 30px 5px 30px 5px;
}

/* line 603, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading button:hover {
  background-color: #fff;
  color: #0c0c6e;
}

/* line 622, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading > h2 {
  font-size: 50spx;
  color: #ffffff;
  font-weight: 700;
  position: relative;
  z-index: 3;
}

/* line 630, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .email {
  background: #9572e8;
  height: 50px;
  max-width: 260px;
  border: none;
  border-radius: 24px;
  padding: 0px 15px;
}

/* line 639, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control::-webkit-input-placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 644, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control:-ms-input-placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 649, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control::-ms-input-placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 654, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.form-control::placeholder {
  color: #cec1f4;
  opacity: 1;
}

/* line 659, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .email:focus {
  border: none;
  outline-offset: transparent !important;
  border-radius: 30px;
}

/* line 665, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .submit {
  background-color: #fb397d;
  color: #fff;
  font-weight: 500;
  display: inline-block;
  border: none;
  height: 50px;
  min-width: 167px;
  line-height: 46px;
  text-align: center;
  border-radius: 24px 24px 24px 0px;
  margin-left: 10px;
}

/* line 679, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.get-start-area .submit:hover {
  background: #6f52e5;
  color: #fff;
  -webkit-transition-duration: 500ms;
  -o-transition-duration: 500ms;
  transition-duration: 500ms;
}

/* line 687, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading > p {
  color: #fff;
}

/* line 691, C:/xampp/htdocs/RDTR_web/RDTR_web/Assets/scss/rdtr-interaktif.scss */
.wellcome-heading > h3 {
  font-size: 332px;
  position: absolute;
  top: -134px;
  font-weight: 900;
  left: -12px;
  z-index: -1;
  color: #fff;
  opacity: .1;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=10)";
}

a {
  color: #008000;
  font-weight:bold;
}

-->
</style>


</head>
<body class="hold-transition skin-green layout-top-nav">
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

<div id="divLoading"></div>
<div class="wrapper">

<?php 
if ($_COOKIE['onelevel']=='1')
{
include 'header.php'; 
}
else
{
include 'headerumum.php'; 
}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-image:url(<?php echo $background ; ?>)">


    <!-- Main content -->
     
    <!-- Main content -->
    <section class="content">
<?php
if (($_COOKIE['onelevel']=='') || ($_COOKIE['onelevel']=='0'))
{
?>	
<div class="row">
	<div class="col-md-5 text-center">
	</div>
	<div class="col-md-2 text-center">
		<div class="wellcome-heading wow bounceIn">
		<button type="button" class="btn" style="font-size:12px;font-weight:bold;color:#000000;font-size:12px;font-family:'Roboto',Verdana, Arial, Helvetica, sans-serif" data-toggle="tooltip" data-placement="bottom" title="Kembali ke halaman awal" onClick="superback()"><i class="fa fa-mail-reply"></i> <span>Halaman Awal<br>&nbsp;</span></button>
		</div>
	</div>
	<div class="col-md-5 text-center">
	</div>
</div>
<div class="row vertical-offset-100" >
<p>&nbsp;

</p>
</div>
<?php
}
?>	
    <div class="row vertical-offset-100" >
	  <div class="col-md-8 col-md-offset-2" style="opacity:0.85;">
	    <div class="box box-success">
			<div class="box-header with-border" style="background-color:#00a65a;color:#ffffff;">
			  <h3 class="box-title" id="namaurusan">Unduh <small style="color:#ffffff;">Data</small></h3>
	
			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			  </div>
			</div>
			
			<?php
			if (!$action)
			{
			?>	
	    	<div class="box-body">
				<div id="no-more-tables" class="box-body table-responsive no-padding">
					<?php
					if (($_COOKIE['onelevel']<>'0') && ($_COOKIE['onelevel']))
					{
					?>
					<center>	
					  <ol class="breadcrumb">
						<li>
						<a href="?action=a&id="><button class="btn btn-sm btn-primary btn-block" data-toggle="tooltip" data-placement="top" title="Tambah Data" style="width:100px;"><i class="fa fa-plus"></i> Tambah</button></a>
						</li>
					  </ol>
					</center>
					<?php
					}
					?>	
					<div id="sampeltabel">
					<table class="table table-striped table-bordered table-hover">
					<thead class="cf">
					<tr style="background-color:#000000;color:#FFFFFF;">
					<th><div align="center">No</div></th>
					<th><div align="center">Data</div></th>
					<?php
					if (($_COOKIE['onelevel']<>'0') && ($_COOKIE['onelevel']))
					{
					?>
					<th><div align="center">Opsi</div></th>
					<?php
					}
					?>	
					</tr>
					</thead>
					<?php
					$sqlpengumuman="select * from one_album where deleted='0' order by id desc";
					$resultpengumuman=mysqli_query($link,$sqlpengumuman);
					if ($resultpengumuman)
					{
					$z=1;
					while ($rowpengumuman=mysqli_fetch_array($resultpengumuman))
					{
					$idpengumuman=$rowpengumuman['id'];
					$namapengumuman=$rowpengumuman['nama'];
					$ikonpengumuman=$rowpengumuman['ikon'];
					
					?>
					<tr>
					<td data-title="No">
					<?php echo $z; ?>
					</td>
					<td data-title="Data">
					<?php
					if ($ikonpengumuman<>"")
					{
					echo "<a href='upload/$ikonpengumuman' target='_blank'>".$namapengumuman."</a>"."";
					}
					else
					{
					echo "<a href='#'>".$namapengumuman."</a>"."";
					}
					?>
					</td>
					<?php
					if (($_COOKIE['onelevel']<>'0') && ($_COOKIE['onelevel']))
					{
					?>
					<td data-title="Opsi" align="center">
						
						<a href="?action=e&id=<?php echo $idpengumuman; ?>"><button class="btn btn-sm btn btn-success" type="button" style="width:150px;">Edit Data</button></a>
						<a href="#" onClick="hapus('<?php echo $idpengumuman; ?>')"><button class="btn btn-sm btn btn-danger" type="button" style="width:150px;">Hapus Data </button></a>
					</td>
					<?php
					}
					?>
					</tr>
					<?php 
					$z++;
					}
					}
					?>
					<tbody>
					</tbody>
					</table>
					</div>
					
					
				</div>		
			</div>
			<?php
			}
			?>

			<?php
			if ($action)
			{
			?>
			<div class="box-body">
			<form action="" method="post" accept-charset="UTF-8" role="form" class="form-signin"  enctype="multipart/form-data">
			<div class="form-group">
				<label for="nama">Nama</label>
				  <input type="text" name="nama" id="nama" class="rounded" value="<?php echo $nama; ?>" placeholder="Pengumuman" required>
			</div>
			<div class="form-group">
				<label for="nama">File</label>
				  <input type="file" class="rounded" placeholder="File Pdf" name="ikon" id="ikon" value="<?php echo $ikon; ?>">
				    <?php
					if ($ikonku<>"")
					{
					?>
					 <a href="images/<?php echo $ikonku; ?>" target="_blank"><?php echo $ikonku; ?></a>
					<?php 
					}
					?>
			</div>
			
			<div class="box-footer">
				<?php
				if (($_GET['action']=='a'))
				{
				?>
				<input type="hidden" name="proses" class="rounded" id="proses" value="0">
				<?php
				}
				else if (($_GET['action']=='e') || ($kode) || ($kode<>''))
				{
				?>
				<input type="hidden" name="proses" class="rounded" id="proses" value="1">
				<?php
				}
				?>
				<input type="hidden" name="kodeku" id="kodeku" class="form-control" value="<?php echo $kode; ?>" >
                <button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Simpan Data" style="width:100px;background-color:#00a65a;border:#00a65a;"><i class="fa fa-archive"></i> Simpan</button>
				<button type="button" class="btn btn-sm btn btn-warning" onClick="batal()" data-toggle="tooltip" data-placement="top" title="Batalkan Proses" style="width:100px;background-color:#f3c951;border:#f3c951;"><i class="fa fa-reply"></i> Batal</button>
            </div>
			</form>
			</div>
			<?php
			}
			?>


		</div>
	  </div>
	  
	</div> 

    </section>
    <!-- /.content -->
  </div>   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include 'footer.php'; ?>

<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModalgrafik" class="modal" data-easein="flipBounceXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header" style="background-color:#ee102a;">
                        <h1 class="modal-title">
							<center>
							<img src="<?php echo $ikon; ?>" height="50"><br>
							<span style="color:#FFFFFF;">Grafik <?php echo $judulWeb; ?></span>
							</center>
                        </h1>
                    </div>
                    <div class="modal-body">
						<p>
						<iframe src="" frameborder="0" style="height:66vh;width:100%;" id="iframeku"></iframe>
                        </p>
						
                    </div>
                    <div class="modal-footer">
						<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Tutup Grafik" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Tutup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</div>
<!-- ./wrapper -->

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

<script src="plugins/chartjs1/Chart.bundle.js"></script>
<!-- page script -->
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
    $('#datepicker').datepicker({
      autoclose: true
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
	
	$('[data-toggle="tooltip"]').tooltip()



	
  });
  
</script>

<script type="text/javascript">
//Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<script src="js/velocity.min.js"></script>
<script src="js/velocity.ui.min.js"></script>
<script src="js/index.js"></script>

<script>
function batal()
{
	window.location='simtaru-f1leunduh';
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

<script>
function superback()
{
	<?php
	if ($_COOKIE['onelevel']=='')
	{
	?>
	window.location='simtaru-blora';
	<?php
	}
	else
	{
	?>
	window.location='simtaru-d4shumum';
	<?php
	}
	?>
}
</script>
</body>
</html>
