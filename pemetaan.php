<?php
session_start();
include 'library/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="<?php echo $ikon; ?>" rel="icon">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $judulWeb; ?></title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		
		

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    <link rel="stylesheet" href="adi/ol.css" type="text/css">
	<link rel="stylesheet" href="adi/ol3gm.css" type="text/css" />
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE&libraries=places"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/place/autocomplete/xml?input=pasta&types=establishment&location=37.76999,-122.44696&radius=500&key=AIzaSyDsiwLbEcjMOzXceMQ7-vJh21icjaHmlJE"></script>

	<script src="adi/ol3gm.js"></script>
	<script src="adi/FileSaver.min.js"></script>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:11px;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 3px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
	border-color: #4CAF50;
}
</style> 		
    <style>
html, body {
    margin: 0;
    height: 100%;
}	
	
 #divLoading {
	display:none;

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

#map{
    position:absolute;
    z-index:1;
    width:100%; height:100%;
    top:-32px; bottom:0;
}
.ol-popup {
    position: absolute;
    background-color: white;
    -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
    filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
    padding: 15px;
    border-radius: 10px;
    border: 1px solid #cccccc;
    bottom: -45px;
    left: -50px;
}
.ol-popup:after, .ol-popup:before {
    top: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}
.ol-popup:after {
    border-top-color: white;
    border-width: 10px;
    left: 48px;
    margin-left: -10px;
}
.ol-popup:before {
    border-top-color: #cccccc;
    border-width: 11px;
    left: 48px;
    margin-left: -11px;
}
.ol-popup-content {
    position: relative;
    min-width: 400px;
    min-height: 300px;
    height: 100%;
    max-height: 350px;
    padding:2px;
    white-space: normal;        
    background-color: #f7f7f9;
    border: 1px solid #e1e1e8;
    overflow-y: auto;
    overflow-x: hidden;
}
.ol-popup-content p{
    font-size: 14px;
    padding: 2px 4px;
    color: #222;
    margin-bottom: 15px;
}
.ol-popup-closer {
    position: absolute;
    top: -4px;
    right: 2px;
    font-size: 100%;
    color: #0088cc;
    text-decoration: none;
}
a.ol-popup-closer:hover{
    color: #005580;
    text-decoration: underline;
}
.ol-popup-closer:after {
    content: "✖";
}
	</style>
	
<style>
.modal-full {
min-width: 100%;
margin: 0;
}

.modal-full .modal-content {
	height: 100%;
}
</style>

<style>
/*Eliminates padding, centers the thumbnail */


/* Styles the thumbnail */

a.lightbox img {
height: 250px;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);


}
/* Styles the lightbox, removes it from sight and adds the fade-in transition */

.lightbox-target {
position: absolute;
top: -100%;
width: 100%;
left:0;
background: rgba(0,0,0,.9);
z-index:1000;
width: 100%;
opacity: 0;
-webkit-transition: opacity .5s ease-in-out;
-moz-transition: opacity .5s ease-in-out;
-o-transition: opacity .5s ease-in-out;
transition: opacity .5s ease-in-out;
overflow: hidden;
}

/* Styles the lightbox image, centers it vertically and horizontally, adds the zoom-in transition and makes it responsive using a combination of margin and absolute positioning */

.lightbox-target img {
margin: auto;
position: absolute;
top: 0;
left:0;
right:0;
bottom: 0;
max-height: 0%;
max-width: 0%;
border: 3px solid white;
box-shadow: 0px 0px 8px rgba(0,0,0,.3);
box-sizing: border-box;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Styles the close link, adds the slide down transition */

a.lightbox-close {
display: block;
width:50px;
height:50px;
box-sizing: border-box;
background: white;
color: black;
text-decoration: none;
position: absolute;
top: -80px;
right: 0;
-webkit-transition: .5s ease-in-out;
-moz-transition: .5s ease-in-out;
-o-transition: .5s ease-in-out;
transition: .5s ease-in-out;
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:before {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
-o-transform:rotate(45deg);
transform:rotate(45deg);
}

/* Provides part of the "X" to eliminate an image from the close link */

a.lightbox-close:after {
content: "";
display: block;
height: 30px;
width: 1px;
background: black;
position: absolute;
left: 26px;
top:10px;
-webkit-transform:rotate(-45deg);
-moz-transform:rotate(-45deg);
-o-transform:rotate(-45deg);
transform:rotate(-45deg);
}

/* Uses the :target pseudo-class to perform the animations upon clicking the .lightbox-target anchor */

.lightbox-target:target {
opacity: 1;
top: 0;
bottom: 0;
}

.lightbox-target:target img {
max-height: 100%;
max-width: 100%;
}

.lightbox-target:target a.lightbox-close {
top: 0px;
}


</style>
    
  </head>

  <body onLoad="AdiLoad()">
  	<div class="lightbox-target" id="dog">
	   <img id="aaddii" src="../foto/<?php echo $foto; ?>"/>
	   <a class="lightbox-close" href="#"></a>
	</div>
  	<div id="divLoading"></div>
  	<div class="footr_area" id="map" tabindex="0">
	<div id="divMainLayer"></div>
	<img src="<?php echo $ikon; ?>" style="position:fixed;height:60px;top:45px;z-index:9999;left:15px;">
		<button class="btn btn-default" id="zoom1" title="Zoom In" type="button" style="height:45px;width:45px;position:fixed;top:115px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-plus"></i></button>
		<button class="btn btn-default" id="zoom2" title="Zoom Out" type="button" style="height:45px;width:45px;position:fixed;top:165px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-minus"></i></button>
		<a class="nav-link" href="#costumModal4" data-toggle="modal"><button class="btn btn-default" id="Layer" title="Layer" type="button" style="height:45px;width:45px;position:fixed;top:215px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-bars"></i></button></a>
		<a class="nav-link" href="#costumModal5" data-toggle="modal"><button class="btn btn-default" id="Basemap" title="Basemap" type="button" style="height:45px;width:45px;position:fixed;top:265px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-map"></i></button></a>
		<button class="btn btn-default" id="export-png" title="Print Peta" type="button" style="height:45px;width:45px;position:fixed;top:315px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-print"></i></button>
		<button class="btn btn-default" title="Pencarian" type="button" onClick="klikku4()" style="height:45px;width:45px;position:fixed;top:365px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-search"></i></button>
		<?php
		if ($_SESSION['oneid']<>"")
		{
		?>
		<a href="backoffice/" target="_blank"><button class="btn btn-default" title="Halaman Setting" type="button" style="height:45px;width:45px;position:fixed;top:420px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-key"></i></button></a>
		<button class="btn btn-default" title="Log Out" type="button" onClick="logout()" style="height:45px;width:45px;position:fixed;top:470px;z-index:9999;left:22px;cursor:pointer;border-radius:50px;border: solid 3px #cccccc;background-color:#FFFFFF;" ><i class="fa fa-ban"></i></button>
		<?php
		}
		?>
		
<div class="panel panel-success" id="boxku4" style="z-index:7;position:absolute;top:50%;left:50%;transform: translateX(-50%) translateY(-50%);overflow-y:auto;height:80vh;border:solid 1px;width:45vh;display:none;z-index:90;background-color:#FFFFFF;padding-left:20px;padding-top:20px;border-radius:10px;border-radius:50px;">
  <div class="panel-heading"><b>Pengukuran dan Pencarian Lokasi <?php echo $judulWeb; ?></b>
  <button type="button" class="close" onClick="klikku4()" data-toggle="tooltip" data-placement="left" title="Close" style="position:fixed;top:10px;right:20px;cursor:pointer;">
  <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
  </button>
  </div>
  <hr style="color:#000000;size:10px;">
  <div class="panel-body" id="measureku">
  			<input type="text" name="koordinatpopup" id="koordinatpopup" value="" style="width:100%">
			<input type="text" name="koordinatpopuphdms" id="koordinatpopuphdms" value="" style="width:100%">
			<form class="form-inline">
            <label style="color:#0033CC;font-size:12px;">Tipe Pengukuran &nbsp;</label>
              <select id="type" class="form-control select2">
			  	<option value="None">Pilih Model Pengukuran</option>
                <option value="length">Jarak</option>
                <option value="area">Luas</option>
              </select>
          	</form>
			

  </div>
	
  <div class="panel-body" id="empat">
  <label style="color:#0033CC;font-size:12px;"><i class="glyphicon glyphicon-pencil"></i> Pencarian Lokasi : &nbsp;</label>
	<input class="form-control" id="searchTextField" placeholder="Masukkan nama lokasi yang dicari" type="text" style="width:40vh;">
	<input class="form-control" id="city" type="text" size="47" style="font-family:Verdana;display:none;width:40vh;">
	<input class="form-control" id="longitude" placeholder="Longitude" type="text" size="10" onKeyPress="return isNumberKey(event)" style="width:40vh;">
	<input class="form-control" id="latitude" placeholder="Latitude" type="text" size="10" onKeyPress="return isNumberKey(event)" style="width:40vh;">
	<input class="form-control" id="location_id" type="text" size="47" style="font-family:Verdana;display:none;">
	<hr style="color:#000000;size:10px;">
  
	<button type="button" class="btn btn-default" id="lariku" style="background-color:#006600;border:none;color:#FFFFFF;font-size:12px;">Ke Lokasi!!</button>
	<button type="button" class="btn btn-default" style="background-color:#006600;border:none;color:#FFFFFF;font-size:12px;" onClick="clearku()">Clear</button>
	<button type="button" class="btn btn-default" style="background-color:#006600;border:none;color:#FFFFFF;font-size:12px;" onClick="klikku5()">Hapus Marker</button>
		
  </div>
  <hr style="color:#000000;size:10px;">
  <div class="panel-heading"><b>Pencarian Lokasi <?php echo $judulWeb; ?> Berdasar Layer Aktif</b></div>
  <div class="panel-body">
  	<p id="fooBar"></p>
  </div>

 
</div>


    </div>
	
  
		<div id="costumModalIjin" class="modal fade-scale" data-easein="perspectiveRightIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
           <div class="modal-dialog" style="border-radius:10px;">
                <div class="modal-content" style="border-radius:10px;z-index:100;">
                    <div class="modal-header" style="background-color:#dd4b39;">
					<center>
                        <h1 class="modal-title" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#FFFFFF;">
                            <img src="<?php echo $ikon; ?>" height="50">
							Pengajuan Ijin <?php echo $judul; ?>
						</h1>
					</center>	
                    </div>
                    <div class="modal-body">
                        
						<p>
						<input class="form-control" id="ijinkode" name="ijinkode" type="hidden">
						<input class="form-control" id="kodeijinpenggunaan" name="kodeijinpenggunaan" type="hidden" readonly="yes"> 
						<label>Rencana Penggunaan Tanah Sekarang</label>
						<input class="form-control" id="ijinpenggunaan" name="ijinpenggunaan" type="text" readonly="yes">
						<label>Koordinat (Desimal)</label>
						<input class="form-control" id="ijinkoordinat" name="ijinkoordinat" type="text" readonly="yes">
						<label>Koordinat (Desimal Degree)</label>
						<input class="form-control" id="ijinkoordinathdms" name="ijinkoordinathdms" type="text" readonly="yes"> 
						<label>Jenis Penggunaan Kegiatan / Pengajuan Ijin Kegiatan</label> 
						<select name="ijinjeniskegiatan" id="ijinjeniskegiatan" class="form-control select2" onChange="klikrinci()" required style="width:100%;">
						<option value="">Pilih Salah Satu</option>
						<?php
						$sql = "select * from one_master_peruntukkan where deleted='0' order by id";
						$result = mysqli_query($link,$sql);
						if ($result) {
						while ($row = mysqli_fetch_array ($result)) {
							$idsifat=$row['id'];
							$namasifat=$row['nama'];
							?>
							<option value="<?php echo $idsifat; ?>"  ><?php echo $namasifat; ?></option>
							<?php 
						}
						}
						?>
						</select>
						<label>Nama Pemohon</label> 
						<input class="form-control" id="ijinnamapemohon" name="ijinnamapemohon" placeholder="Nama Pemohon" type="text"> 
						<label>Alamat Pemohon</label> 
						<input class="form-control" id="ijinalamatpemohon" name="ijinalamatpemohon" placeholder="Alamat Pemohon" type="text"> 
						<label>Tempat Lahir Pemohon</label> 
						<input class="form-control" id="ijintempatlahirpemohon" name="ijintempatlahirpemohon" placeholder="Tempat Lahir Pemohon" type="text"> 
						<label>Tanggal Lahir Pemohon</label> 
						<div class="input-group date">
						  <div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						  </div>
						  <input type="date" name="ijintanggallahirpemohon" class="form-control" id="ijintanggallahirpemohon" >
						</div>
						<label>Pekerjaan</label> 
						<input class="form-control" id="ijinpekerjaan" name="ijinpekerjaan" placeholder="Pekerjaan" type="text">
						<label>No Telepon</label> 
						<input class="form-control" id="ijinnotelp" name="ijinnotelp" placeholder="No Telepon" type="text">
						<label>Nama Perusahaan</label> 
						<input class="form-control" id="ijinnamaperusahaan" name="ijinnamaperusahaan" placeholder="Nama Perusahaan" type="text">
						<label>Alamat Perusahaan</label> 
						<input class="form-control" id="ijinalamatperusahaan" name="ijinalamatperusahaan" placeholder="Alamat Perusahaan" type="text">
						<label>Alamat Penggunaan Kegiatan / Pengajuan Ijin Kegiatan</label> 
						<textarea class="form-control" rows="4" id="ijinalamatkegiatan" name="ijinalamatkegiatan" placeholder="Alamat Kegiatan"></textarea>
						<label>No Sertifikat Tanah Yang Diajukan</label> 
						<input class="form-control" id="ijinsertifikat" name="ijinsertifikat" placeholder="No Sertifikat Tanah Yang Diajukan" type="text">
						<label>Luas Tanah Yang Diajukan (m<sup>2</sup>)</label> 
						<input class="form-control" id="ijinluas" name="ijinluas" placeholder="Luas Tanah Yang Diajukan" type="text" onKeyPress="return isNumberKey(event)">
						<label>Luas Bangunan Yang Diajukan (m<sup>2</sup>)</label> 
						<input class="form-control" id="ijinluasbangunan" name="ijinluasbangunan" placeholder="Luas Bangunan Yang Diajukan" type="text" onKeyPress="return isNumberKey(event)">
						<label>Hasil Cek Perijinan</label>
						<select id="hasilajuan" class="form-control select2" required style="width:100%;">
						<option value="">Belum Ada Data</option>
						</select>
						<br>
						<br>
						<button class="btn btn-warning" onClick="klikrinci()">
                            Cek Perijinan
                        </button>
						<button class="btn btn-success" onClick="ajuanijin()">
                            Ajukan Perijinan dan Cetak
                        </button>
						</p>
						
                    </div>
                    <div class="modal-footer" style="background-color:#dd4b39;">
						<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
				
            </div>
        </div>
		
	
		
		<div id="costumModal7" class="modal" data-easein="perspectiveUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" style="width:100%;">
            <div class="modal-dialog" style="width:100%;">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header" style="width:100%;">
                        
                        <h4 class="modal-title" style="width:100%;">
                            Hasil Pengukuran Peta <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body" style="width:100%;">
                        
						<p>
						
						<ol id="measureOutput" reversed style="color:#333333;display:block;" ></ol>
						  
						</p>
						
                    </div>
                    <div class="modal-footer" style="width:100%;">
                        
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
		
		
		<div id="costumModal6" class="modal" data-easein="perspectiveRightIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full">
				<div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">
                            Data Peta<?php echo $judulWeb; ?> <span id="judulpeta"></span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        
						<p>
						<iframe style="border:none;width:100%;height:70vh;" id="iframetabel" src=""></iframe>   
                        </p>
						
                    </div>
                    <div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
				
            </div>
        </div>
        
		
		<div id="costumModalTambah" class="modal" data-easein="perspectiveRightIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
            <div class="modal-dialog">
				<div class="modal-content">
                    <div class="modal-header">
                        
                        <h4 class="modal-title">
                            Tambah Data Peta <?php echo $judulWeb; ?> <span id="judulpeta"></span>
                        </h4>
                    </div>
					<form action="backoffice/tambahdata.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body" style="height:50vh;overflow:auto;">
                        
						<p>
						<?php
						$tabel="rtlh";
						$query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field <> 'ID'  and Field not like 'kode' and Field not like '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%' and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' and Field not like '%deleted%' and Field not like '%ORIG_FID%' and Field not like '%IDSHP%' ";
						$hasil=mysqli_query($link,$query);
						if ($hasil)
						{ 
							echo "<table id='customers'>";
							echo "<tr>";
							echo "<th valign='top'> <b>Kolom</b></th>";
							echo "<th>";
							echo  " <b>Isian</b>";
							echo "</th>";
							echo "</tr>";
							while ($data=mysqli_fetch_array($hasil))
							{
								
								echo "<tr>";
								echo "<td valign='top'>";
								if ($data['Field']=="KODE_FOTO")
								{
									echo  "FOTO LAIN 1";
								}
								else if ($data['Field']=="KODE_FOTO1")
								{
									echo  "FOTO LAIN 2";
								}
								else
								{
									echo  "<b>".get_Isi_Field2('aliasfield','one_aliasfield','nama',$data['Field'])."</b>";
								}
								echo "</td>";
								echo "<td>";
								if($data['Field']=="KODE_FOTO")
								{
								?>
								<input type="file" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" accept="image/*" >
								<?php 
								}
								else if($data['Field']=="KODE_FOTO1")
								{
								?>
								<input type="file" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" accept="image/*" >
								<?php 
								}
								else if($data['Field']=="NAMA_FILE")
								{
								?>
								<input type="file" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" accept="image/*" >
								<?php 
								}
								else if($data['Field']=="NAMA_FIL_1")
								{
								?>
								<input type="file" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" accept="image/*" >
								<?php 
								}
								else if($data['Field']=="NAMA_FIL_2")
								{
								?>
								<input type="file" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" accept="image/*" >
								<?php 
								}
								else if($data['Field']=="NAMA_FIL_3")
								{
								?>
								<input type="file" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" accept="image/*" >
								<?php 
								}
								else if($data['Field']=="PERNAH_MEN")
								{
								?>
								<select name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" style="width:100%">
								<option value="BELUM PERNAH" >BELUM PERNAH</option>
								<option value="PERNAH" >PERNAH</option>
								</select>
								<?php 
								}
								else
								{
								?>
								<input type="text" name="<?php echo $data['Field']; ?>" id="<?php echo $data['Field']; ?>" placeholder="<?php echo get_Isi_Field2('aliasfield','one_aliasfield','nama',$data['Field']); ?>" style="width:100%;" required >
								<?php 
								}
								echo "</td>";
								echo "</tr>";
							}
							echo "</table>";
						}

						?>
						</p>
						
                    </div>
                    <div class="modal-footer">
						<button class="btn btn-info" type="submit">
                            Simpan
                        </button>
						<button class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
				</form>
				
            </div>
        </div>
        
		
	<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModal5" class="modal" data-easein="perspectiveUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" style="width:100%;">
            <div class="modal-dialog" style="width:100%;">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header" style="width:100%;">
                        
                        <h4 class="modal-title" style="width:100%;">
                            Basemap Peta <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body" style="width:100%;">
                        
						<p>
						  <div>
						  <img src="img/go.png" height="30" width="30" style="position:relative;left:20px;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="radio1" type="radio" name="radio" value="1"><label for="radio1" style="font-size:12px;left:25px;"><span><span></span></span>Google Map (ROADMAP)</label>
						  </div>
						  <div>
						  <img src="img/mo.png" height="30" width="30" style="position:relative;left:20px;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="radio2" type="radio" name="radio" value="2" checked="checked"><label for="radio2" style="font-size:12px;left:25px;"><span><span></span></span>MapQuest OSM</label>
						  </div>
						  <div>
						  <img src="img/bi.png" height="30" width="30" style="position:relative;left:20px;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="radio3" type="radio" name="radio" value="3"><label for="radio3" style="font-size:12px;left:25px;"><span><span></span></span>Bing Maps (Satellite)</label>
						  </div>
						  <div>
						  <img src="img/esr.png" height="30" width="30" style="position:relative;left:20px;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="radio4" type="radio" name="radio" value="4"><label for="radio4" style="font-size:12px;left:25px;"><span><span></span></span>Esri</label>
						  </div>
						  <div>
						  <img src="img/sta.png" height="30" width="30" style="position:relative;left:20px;border-radius:10px;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="radio5" type="radio" name="radio" value="5"><label for="radio5" style="font-size:12px;left:25px;"><span><span></span></span>Stamen</label>
						  </div>
						</p>
						
                    </div>
                    <div class="modal-footer" style="width:100%;">
                        
						<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>


	<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModalRinci" class="modal" data-easein="perspectiveUpIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" style="width:100%;">
            <div class="modal-dialog" style="width:100%;">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header" style="width:100%;">
                        
                        <h4 class="modal-title" style="width:100%;">
                            Pengajuan Perijinan <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body" style="width:100%;">
                        <p>
						<label>Nama Pemohon</label>
						<input class="form-control" type="text">
						<label>Tempat Lahir Pemohon</label>
						<input class="form-control" type="text">
						<label>Tanggal Lahir Pemohon</label>
						<input class="form-control" type="date">
						<label>Alamat Pemohon</label>
						<input class="form-control" type="text">
						<label>Nama Perusahaan Pemohon</label>
						<input class="form-control" type="text">
						<label>Alamat Perusahaan Pemohon</label>
						<input class="form-control" type="text">
						<label>Peruntukkan / Kegiatan</label>
						<select class="form-control">
						<option>Permukiman Penduduk</option>
						</select>
						<label>Lokasi</label>
						<input class="form-control" type="text">
						<label>Luas (m<sup>2</sup>)</label>
						<input class="form-control" type="text">
						</p>
						<p>
						<div id="hasilitbx"></div>  
						</p>
						
                    </div>
                    <div class="modal-footer" style="width:100%;">
                        
						<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                            Ajukan Ijin
                        </button>
						<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
        
    <!--****************-->
        <!--    C O P Y     -->
        <!--****************-->    
	
		<div id="costumModalSukses" class="modal" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true">
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

        <div id="costumModal4" class="modal" data-easein="whirlIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" style="width:100%;">
            <div class="modal-dialog" style="width:100%;">
                <div class="modal-content" style="width:100%;">
                    <div class="modal-header" style="width:100%;">
                        
                        <h4 class="modal-title" style="width:100%;">
                            Opsi Layer <?php echo $judulWeb; ?>
                        </h4>
                    </div>
                    <div class="modal-body" style="width:100%;">
                        
						<p>
						
						<div id="accordion" style="width:100%;">
						  <?php
						  $sql="select * from one_bidang_peta where deleted='0'";
						  $result=mysqli_query($link,$sql);
						  if ($result)
						  {
						  $i=1;
						  while ($row=mysqli_fetch_array($result))
						  {
						  ?>	
						  <div class="card">
							<a href="#" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>"><div class="card-header" style="background-color:#fd5f00;" id="headingOne">
							  <h5 class="mb-0">
								<button class="btn btn-primary" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" style="cursor:pointer;" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
								  <?php echo $i.". "; ?><?php echo $row['nama']; ?>
								</button>
							  </h5>
							</div></a>
						
							<div id="collapse<?php echo $i; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
							  <div class="card-body" style="background-color:#eaeaea;">
								
								<?php
								$sql1=" select * from one_peta where bidang_peta='".$row['id']."' and (subbidang is null or subbidang ='' ) and status='0' and deleted='0' ";
								//echo $sql1;
								$result1=mysqli_query($link,$sql1);
								if ($result1)
								{
								$x=1;
								while ($row1=mysqli_fetch_array($result1))
								{
								?>
								<p>
								<h6 style="color:#adbdf8;"><input type="checkbox" name="checkbox<?php echo $row1['id']; ?>" id="checkbox<?php echo $row1['id']; ?>"> <?php echo $row1['nama']; ?></h6>
								</p>
								<?php 
								$x++;
								}
								}
								echo "<br>";
								?>
								
								<?php
								$sql2=" select * from one_subbidang_peta where bidang='".$row['id']."' and deleted='0' ";
								//echo $sql1;
								$result2=mysqli_query($link,$sql2);
								if ($result2)
								{
								while ($row2=mysqli_fetch_array($result2))
								{
								echo "<h6>".$row2['nama']."</h6>";
								
								$sql1=" select * from one_peta where bidang_peta='".$row['id']."' and subbidang='".$row2['id']."' and status='0' and deleted='0' ";
								//echo $sql1;
								$result1=mysqli_query($link,$sql1);
								if ($result1)
								{
								$x=1;
								while ($row1=mysqli_fetch_array($result1))
								{
								?>
								<p>
								<h6 style="color:#adbdf8;"><input type="checkbox" name="checkbox<?php echo $row1['id']; ?>" id="checkbox<?php echo $row1['id']; ?>"> <?php echo $row1['nama']; ?></h6>
								</p>
								<?php 
								$x++;
								}
								}
								
								
								}
								}
								?>
								
								
							  </div>
							</div>
						  </div>
						  <?php
						  $i++;
						  }
						  }
						  ?>
						</div>						
						
						</p>
						
                    </div>
                    <div class="modal-footer" style="width:100%;">

						<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
            </div>
        </div>
        
    <!--****************-->
        <!--    C O P Y     -->
        <!--****************-->    
	
    <script src="OpenLayers.js"></script>
    <script src="adi/ol.js" type="text/javascript"></script>
    <script src="adi/ol-popup.js"></script>
<script>

var customStyleLokasi = new ol.style.Style({
        image: new ol.style.Icon({
          anchor: [0.5, 0.5],
          size: [150, 150],
          offset: [0, 0],
          opacity: 1,
          scale: 0.25,
          src: 'img/marker.png'
		  
        }),
		text: new ol.style.Text({
          text: '',
          fill: new ol.style.Fill({color: 'black'}),
          stroke: new ol.style.Stroke({color: 'yellow', width: 1}),
          offsetX: -20,
          offsetY: 20
		 })
      });
	  

function addMainLayerPoint(mytable,mystyle,mycheck,myvec){
				//alert("ccc");
				$.ajax({
                    type: "GET",
                    url:"getLayerPoint.php",
                    data: { table: mytable, styleku: mystyle, checkku: mycheck, vecku: myvec},
                    beforeSend:function() {
						
                        
                    },
                    success:function(result){
                        $("#divMainLayer").html(result);
                        processLayer();
						
                       
                  }});
}

function removeFeatures(id) {
	var features = id.getFeatures();
	for(var i=0; i< features.length && i<10000; i++) {
		id.removeFeature(features[i]);

	}
}


function addMainLayerMap(mytable,mytampil,mysource){
popup.hide();
$.ajax({
	type: "GET",
	url:"getLayerMap.php",
	data: { table: mytable, tampil: mytampil, source: mysource},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLayer();
		document.getElementById("divLoading").style.display = "none"; 
	   
  }});
  
}

function addMainLayerMap_Label(mytable,mytampil,mysource){
popup.hide();
$.ajax({
	type: "GET",
	url:"getLayerMap_Label.php",
	data: { table: mytable, tampil: mytampil, source: mysource},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLayer();
		document.getElementById("divLoading").style.display = "none"; 
	   
  }});
  
}


function addLogin(myuser,mypass){
//popup.hide();
var myuser=document.getElementById("username").value;
var mypass=document.getElementById("password").value;

if (myuser==="")
{
	alert("Harap Isikan username..");
	return false;
}
if (mypass==="")
{
	alert("Harap Isikan password..");
	return false;
}

$.ajax({
	type: "GET",
	url:"getLoginMap.php",
	data: { userku: myuser, passku: mypass},
	beforeSend:function() {
		document.getElementById("divLoading").style.display = "block"; 
		
	},
	success:function(result){
		$("#divMainLayer").html(result);
		processLogin();
		document.getElementById("divLoading").style.display = "none"; 
		document.location.reload();
	   
  }});
  
}

var bingku = new ol.layer.Tile({
              preload: 0, // default value
              source: new ol.source.BingMaps({
              key: 'YcHsPRIl55DObJxVZHeO~Uv5_7jLMz9SXEQRXcK6hmQ~Aqax40e1y3NgVz7T3txCRt7TAsWpwON5ZTnVosELPPSbFo4i8KqtoBls159gL7xz',
              imagerySet: 'AerialWithLabels'
             })
            });
var attribution = new ol.Attribution({
  				html: 'Tiles &copy; <a href="http://services.arcgisonline.com/ArcGIS/' +
      					'rest/services/World_Topo_Map/MapServer">ArcGIS</a>'
			});
			
var esriku = new ol.layer.Tile({
      			source: new ol.source.XYZ({
        		attributions: [attribution],
        		url: 'http://server.arcgisonline.com/ArcGIS/rest/services/' +
            	'World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
      			})
    		});
var osmku = new ol.layer.Tile({
            	source: new ol.source.OSM()
          	});
			
var stamenku = new ol.layer.Tile({
            	source: new ol.source.Stamen({
       	 		layer: 'watercolor'
      			})
          	});
			
var stamenkulabel = new ol.layer.Tile({
            	source: new ol.source.Stamen({
       	 		layer: 'terrain-labels'
      			})
          	});

var googleku = new ol.layer.Tile({
                        //source: new ol.source.OSM()
						
						source: new ol.source.OSM({
                			url: 'http://mt{0-3}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
                			attributions: [
                    			new ol.Attribution({ html: '© Google' }),
                    			new ol.Attribution({ html: '<a href="https://developers.google.com/maps/terms"><?php echo $judul; ?></a>' })
                			]
            			})
             });

var olview = new ol.View({
    center: ol.proj.transform([111.397035, -7.089267], 'EPSG:4326', 'EPSG:3857'),
    minZoom: 2,
    maxZoom: 19,
	zoom: 11
});

var scaleLineControl = new ol.control.ScaleLine();

			
var mousePositionControl = new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.createStringXY(4),
  projection: 'EPSG:4326',
  // comment the following two lines to have the mouse position
  // be placed within the map.
  className: 'custom-mouse-position',
  target: document.getElementById('mouse-position'),
  undefinedHTML: '&nbsp;'
});

var vectorSourceLokasi = new ol.source.Vector({
	projection: 'EPSG:4326'
}); 

var vectorLayerLokasi = new ol.layer.Vector({
	source: vectorSourceLokasi
});

<?php
$sql2=" select * from one_peta where status='0' and deleted='0' ";
//echo $sql1;
$result2=mysqli_query($link,$sql2);
if ($result2)
{
while ($row2=mysqli_fetch_array($result2))
{
?>

var sourceFeatures<?php echo $row2['id']; ?> = new ol.source.Vector(),
    layerFeatures<?php echo $row2['id']; ?> = new ol.layer.Vector({source: sourceFeatures<?php echo $row2['id']; ?>});
<?php
}
}
?>

var sourceFeatures = new ol.source.Vector(),
    layerFeatures = new ol.layer.Vector({source: sourceFeatures});
	
	
var source = new ol.source.Vector();

var vector = new ol.layer.Vector({
  source: source,
  style: new ol.style.Style({
    fill: new ol.style.Fill({
      color: 'rgba(255, 255, 255, 0.2)'
    }),
    stroke: new ol.style.Stroke({
      color: '#ffcc33',
      width: 2
    }),
    image: new ol.style.Circle({
      radius: 7,
      fill: new ol.style.Fill({
        color: '#ffcc33'
      })
    })
  })
});


/**
 * Currently drawed feature
 * @type {ol.Feature}
 */
var sketch;
sketch=null;


/**
 * Element for currently drawed feature
 * @type {Element}
 */
var sketchElement;
sketchElement=null;

var sketchadi;
sketchadi = "selesai" ;


/**
 * handle pointer move
 * @param {Event} evt
 */



var map = new ol.Map({
	controls: [scaleLineControl,mousePositionControl,new ol.control.OverviewMap()],

    target: document.getElementById('map'),
    loadTilesWhileAnimating: true,
    loadTilesWhileInteracting: true,
    view: olview,
    renderer: 'canvas',
    layers: [
      googleku,bingku,esriku,osmku,stamenku,stamenkulabel,

	  <?php
	  $sql3=" select * from one_peta where status='0' and deleted='0' ";
	  //echo $sql1;
	  $result3=mysqli_query($link,$sql3);
	  if ($result3)
	  {
	  while ($row3=mysqli_fetch_array($result3))
	  {
	  ?>
	   layerFeatures<?php echo $row3['id']; ?>,
	  <?php
	  }
	  } 
	  ?>
      
	  layerFeatures,vectorLayerLokasi,vector
    ]
});

osmku.setVisible(true);
stamenku.setVisible(false);
stamenkulabel.setVisible(false);
esriku.setVisible(false);
bingku.setVisible(false);
googleku.setVisible(false);


var popup = new ol.Overlay.Popup;
popup.setOffset([0, -55]);
map.addOverlay(popup);

map.on('click', function(evt) {
	
	var content = '<div id="Adi"></div>';
	popup.hide();
	document.getElementById("boxku4").style.display  = "none";
	var f = map.forEachFeatureAtPixel(
        evt.pixel,
        function(ft, layer)
		{
		
			//alert(sketch);
			//var geometry = f.getGeometry();
			popup.hide();
			
			if ((sketch == null) && (sketchadi == "selesai") && (sketchElement== null))
			{
			sketchadi = "selesai";
			var coord = evt.coordinate;
			var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
            coord, 'EPSG:3857', 'EPSG:4326'));
			var xy = ol.coordinate.toStringXY(ol.proj.transform(
            coord, 'EPSG:3857', 'EPSG:4326'),5);
			//alert("aaa");
			
			//alert(ft.getId());
			//document.getElementById("measureOutput").innerHTML='<div id="Adi"></div>';
			var content = '<div id="Adi">'+getKonten(ft.getId())+'</div>';
			
			popup.show(coord, content);	
			document.getElementById('koordinatpopup').value=xy;
			document.getElementById('koordinatpopuphdms').value=hdms;
			return ft;
			}
			else
			{
				if ((sketch != null) && (sketchadi == "mulai") && (sketchElement== null))
				{
					//alert(sketchadi);
					popup.hide();
					$('#costumModal7').modal('show');
					sketchadi = "selesai";
					sketch = null;
					//console.info(evt.pixel);
					//console.info(map.getPixelFromCoordinate(evt.coordinate)); 
					//var content = '<div id="Adi">'+document.getElementById("measureOutput").innerHTML+'</div>';
					//popup.show(evt.coordinate, content);	
					return;
				}
				else
				{
					popup.hide();
				}
				
			}
		}
    );
	
    
    
});

document.getElementById('export-png').addEventListener('click', function() {
  map.once('postcompose', function(event) {
    var canvas = event.context.canvas;
    event.context.textAlign = 'right';
    event.context.fillText('© '+'<?php echo date("Y"); ?> <?php echo $judul; ?>', canvas.width - 5, canvas.height - 5);
    canvas.toBlob(function(blob) {
      saveAs(blob, 'map.png');
    });
  });
  map.renderSync();
});


</script>

<script>

function AdiLoad() {

$("#costumModal7").on("hidden.bs.modal", function (evt) {
    document.getElementById("measureOutput").innerHTML="";
	popup.hide();
});

$('#costumModal7').on('shown.bs.modal', function (evt) {
  // do something...
  popup.hide();
})

var mouseMoveHandler = function(evt) {
  if (sketch) {
    var output;
    var geom = (sketch.getGeometry());
    if (geom instanceof ol.geom.Polygon) {
      output = formatArea(/** @type {ol.geom.Polygon} */ (geom));

    } else if (geom instanceof ol.geom.LineString) {
      output = formatLength( /** @type {ol.geom.LineString} */ (geom));
    }
    sketchElement.innerHTML = output;
  }
};

$('#zoom2').click(function(){
	var view = map.getView();
    var zoom = view.getZoom();
    view.setZoom(zoom - 1);
});
$('#zoom1').click(function(){
	var view = map.getView();
    var zoom = view.getZoom();
    view.setZoom(zoom + 1);
	//alert(map.getView().getZoom());
});

$('#radio1').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(true);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(false);
		googleLayerSATELLITE.setVisible(false);
		googleLayerHYBRID.setVisible(false);
		googleLayerTERRAIN.setVisible(false);
		googleLayerROADMAP.setVisible(false);
		hapusbase();
	}
	
});

$('#radio2').click(function(){
	if (this.checked) {
		osmku.setVisible(true);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(false);
		googleLayerSATELLITE.setVisible(false);
		googleLayerHYBRID.setVisible(false);
		googleLayerTERRAIN.setVisible(false);
		googleLayerROADMAP.setVisible(false);
		hapusbase();
	}
	
});

$('#radio3').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(true);
		esriku.setVisible(false);
		googleLayerSATELLITE.setVisible(false);
		googleLayerHYBRID.setVisible(false);
		googleLayerTERRAIN.setVisible(false);
		googleLayerROADMAP.setVisible(false);
		hapusbase();
	}
	
});

$('#radio4').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(false);
		stamenkulabel.setVisible(false);
		bingku.setVisible(false);
		esriku.setVisible(true);
		googleLayerSATELLITE.setVisible(false);
		googleLayerHYBRID.setVisible(false);
		googleLayerTERRAIN.setVisible(false);
		googleLayerROADMAP.setVisible(false);
		hapusbase();
	}
	
});

$('#radio5').click(function(){
	if (this.checked) {
		osmku.setVisible(false);
		googleku.setVisible(false);	
		stamenku.setVisible(true);
		stamenkulabel.setVisible(true);
		bingku.setVisible(false);
		esriku.setVisible(false);
		googleLayerSATELLITE.setVisible(false);
		googleLayerHYBRID.setVisible(false);
		googleLayerTERRAIN.setVisible(false);
		googleLayerROADMAP.setVisible(false);
		hapusbase();
	}
	
});

	  var input = document.getElementById('searchTextField');
	  var autocomplete = new google.maps.places.Autocomplete(input);
	  google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById("city").value = val;
        }
      }
      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;
      document.getElementById("location_id").value = placeId;
	  				var satu=parseFloat(document.getElementById("longitude").value);
					var dua=parseFloat(document.getElementById("latitude").value);
					//alert (satu);
					//alert (dua);
					addMainLayerPoint('','customStyleLokasi',satu,dua);
					map.getView().setCenter(ol.proj.transform([satu, dua], 'EPSG:4326', 'EPSG:3857'));
					map.getView().setZoom(16);
    });

$('#lariku').click(function(){
					var satu=parseFloat(document.getElementById("longitude").value);
					var dua=parseFloat(document.getElementById("latitude").value);
					var aa=document.getElementById("longitude").value;
					var bb=document.getElementById("latitude").value;
					if (aa==null || aa=="",bb==null || bb=="")
      				{
      					alert("Isikan Longitude dan Latitude");
      					return false;
      				}
					//alert (aa);
					//alert (bb);
					
					addMainLayerPoint('','customStyleLokasi',satu,dua);
					
					map.getView().setCenter(ol.proj.transform([satu, dua], 'EPSG:4326', 'EPSG:3857'));
					map.getView().setZoom(16);
					klikku4();
					
				});	

<?php
$sql4=" select * from one_peta where status='0' and deleted='0' ";
//echo $sql1;
$result4=mysqli_query($link,$sql4);
if ($result4)
{
while ($row4=mysqli_fetch_array($result4))
{
?>
	$('#checkbox<?php echo $row4['id']; ?>').click(function(){
		if (this.checked) {
			//alert("checked");
			removeFeatures(sourceFeatures<?php echo $row4['id']; ?>);
			<?php
			if ($row4['tabel']<>'|rdtr')
			{
			?>
			addMainLayerMap_Label('one_peta','<?php echo $row4['tabel']; ?>','sourceFeatures<?php echo $row4['id']; ?>');
			<?php
			}
			else
			{
			?>
			addMainLayerMap('one_peta','<?php echo $row4['tabel']; ?>','sourceFeatures<?php echo $row4['id']; ?>');
			<?php
			}
			?>
			<?php
			$tempbut=explode("|",$row4['tabel']);
			$counttempbut=count($tempbut);
			for ($n = 1; $n <= $counttempbut-1; $n++) {
				?>
				addbutton('<?php echo $tempbut[$n]; ?>');
				<?php 
			}
			?>
			
		}
		else
		{
			//alert("unchecked");
			removeFeatures(sourceFeatures<?php echo $row4['id']; ?>);
			<?php
			$caritempbut=get_Isi_Field1('tabel','one_peta','id',$row4['id']);
			$tempbut=explode("|",$caritempbut);
			$counttempbut=count($tempbut);
			for ($n = 1; $n <= $counttempbut-1; $n++) {
				?>
				removeElement('<?php echo $tempbut[$n]; ?>');
				<?php 
			}
			?>
			
		}
	});

<?php
}
} 
?>

map.on('pointermove', function(e) {
    if (e.dragging) { popup.hide(); return; }
    
    var pixel = map.getEventPixel(e.originalEvent);
    var hit = map.hasFeatureAtPixel(pixel);
    
    map.getTarget().style.cursor = hit ? 'pointer' : '';
});

$(map.getViewport()).on('mousemove', mouseMoveHandler);

var typeSelect = document.getElementById('type');

var draw; // global so we can remove it later
function addInteraction() {
  //var type = (typeSelect.value == 'area' ? 'Polygon' : 'LineString');
  if (typeSelect.value === 'Square') {
      type = 'Circle';
  }
  else if (typeSelect.value === 'area')
  {
  	type = 'Polygon';
  }
  else if (typeSelect.value === 'length')
  {
  	type = 'LineString';
  }
  draw = new ol.interaction.Draw({
    source: source,
    type: /** @type {ol.geom.GeometryType} */ (type)
  });
  map.addInteraction(draw);

  draw.on('drawstart',
      function(evt) {
        // set sketch
		document.getElementById("measureOutput").innerHTML="";
        sketch = evt.feature;
        sketchElement = document.createElement('li');
		sketchadi = "selesai" ;
        var outputList = document.getElementById('measureOutput');

        if (outputList.childNodes) {
          outputList.insertBefore(sketchElement, outputList.firstChild);
        } else {
          outputList.appendChild(sketchElement);
        }
      }, this);

  draw.on('drawend',
      function(evt) {
        // unset sketch
        sketch = evt.feature;
        sketchElement = null;
		sketchadi = "mulai" ;
		map.removeInteraction(draw);
		document.getElementById("type").value="None";
      }, this);
}


/**
 * Let user change the geometry type.
 * @param {Event} e Change event.
 */
typeSelect.onchange = function(e) {
  map.removeInteraction(draw);
  klikku4();
  var isi=document.getElementById('type').value;
  if (isi=="None")
  {
  map.removeInteraction(draw);
  }
  else
  {
  addInteraction();
  }
};


/**
 * format length output
 * @param {ol.geom.LineString} line
 * @return {string}
 */
var formatLength = function(line) {
  var length = Math.round(line.getLength() * 100) / 100;
  var output;
  if (length > 100) {
    output = 'Panjang = ' +(Math.round(length / 1000 * 100) / 100) +
        ' ' + 'km';
  } else {
    output = 'Panjang = ' +(Math.round(length * 100) / 100) +
        ' ' + 'm';
  }
  return output;
};


/**
 * format length output
 * @param {ol.geom.Polygon} polygon
 * @return {string}
 */
var formatArea = function(polygon) {
  var area = polygon.getArea();
  var output;
  if (area > 10000) {
    output = 'Luas = ' +(Math.round(area / 1000000 * 100) / 100) +
        ' ' + 'km<sup>2</sup>';
  } else {
    output = 'Luas = ' +(Math.round(area * 100) / 100) +
        ' ' + 'm<sup>2</sup>';
  }
  return output;
};

addInteraction();
map.removeInteraction(draw);



}
</script>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script> 
        <script src="vendors/counterup/apear.js"></script>
        <script src="vendors/counterup/countto.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        
        <script src="js/theme.js"></script>
		
		
		<script src="js/velocity.min.js"></script>
		<script src="js/velocity.ui.min.js"></script>
		<script  src="js/index.js"></script>

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
function getKonten(str)
  {
  //alert("");	
  xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null) {
    alert ("Your browser does not support AJAX!");
    return;
  } 
  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
  var url="getKonten2.php";
  url=url+"?no1="+str;
  xmlHttp.onreadystatechange=kontenChanged;
  xmlHttp.open("GET",url,true); 
  //alert("hahahahaha");
  xmlHttp.send(null);
	//document.cookie = 'CookieTahunwilayah='+selValue;
  
  }
</script>

<script>
function kontenChanged() { 

	document.getElementById("loadingstat").innerHTML="";
    document.getElementById("Adi").innerHTML=xmlHttp.responseText;
}
</script>

<SCRIPT>
       <!--
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 44 || charCode > 57))
             return false;

          return true;
       }
       //-->
</SCRIPT>

<script>
function klikku4()
{
	popup.hide();
	if (document.getElementById("boxku4").style.display  == "none" )
	{
		document.getElementById("boxku4").style.display  = "block";
		//document.getElementById("divLoading1").style.display = "block";
	}
	else
	{
		document.getElementById("boxku4").style.display  = "none";
		//document.getElementById("divLoading1").style.display = "none";
	}
	

}
</script>
<script>
function clearku()
{
	document.getElementById("latitude").value = "";
    document.getElementById("longitude").value = "";
}
</script>
<script>
function klikku5()
{
	
	removeFeatures(vectorSourceLokasi);
	source.clear(); 

}
</script>

<script>
function addbutton(str) {
  //Create an input type dynamically.   
  var btn = document.createElement("BUTTON");
  btn.id=str;
  var t = document.createTextNode(str);
  btn.appendChild(t);
  btn.onclick = function() { // Note this is a function
    showku(btn.id);
  };

  var foo = document.getElementById("fooBar");
  //Append the element in page (in span).  
  foo.appendChild(btn);
}
</script>
<script>
function removeElement(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}
</script>
<script>
function showku(str)
{
klikku4();
document.getElementById("judulpeta").innerHTML="";
document.getElementById("judulpeta").innerHTML="Layer "+str;
$('#costumModal6').modal('show');
ubahhalaman(str);
}
</script>

<script>
function klikrinci()
{
	
	var ijinjeniskegiatan=document.getElementById("ijinjeniskegiatan").value;
	if (ijinjeniskegiatan === "")
	{
		alert("Pilih Ijin Peruntukkan");
		return false;
	}
	//alert(document.getElementById("kodeijinpenggunaan").value);
	//alert(document.getElementById("ijinjeniskegiatan").value);
	str1=document.getElementById("kodeijinpenggunaan").value;
	str2=document.getElementById("ijinjeniskegiatan").value;

		xmlHttp=GetXmlHttpObject()
		  if (xmlHttp==null) {
			alert ("Your browser does not support AJAX!");
			return;
		  }
		  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
		  
		var url="cekIjin.php";
		  url=url+"?no1="+str1+"&no2="+str2;
		  xmlHttp.onreadystatechange=function () {
			document.getElementById("hasilajuan").innerHTML="";
			document.getElementById("hasilajuan").innerHTML=xmlHttp.responseText;
			document.getElementById("loadingstat").innerHTML="";
		  }
		  xmlHttp.open("GET",url,true); 
		  //alert("hahahahaha");
		  xmlHttp.send(null);
  
  }
</script>

<script>
function kontenChanged2() { 

	document.getElementById("loadingstat").innerHTML="";
    document.getElementById("hasilitbx").innerHTML=xmlHttp.responseText;
}
</script>

  
  

<script>
function ubahhalaman(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabel');
	iframe.src = "backoffice/tabelnoneditlokasi.php?tabel="+xx;
}
</script>

<script>
function showdataku(str)
{
$('#costumModal4').modal('hide');
document.getElementById("judulpeta").innerHTML="";
document.getElementById("judulpeta").innerHTML="Layer "+str;
$('#costumModal6').modal('show');
ubahhalamandata(str);
}
</script>

<script>
function ubahhalamandata(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabel');
	iframe.src = "backoffice/tabel.php?tabel="+xx;
}
</script>


<script>
function cek(id)
{
	//alert("aaa");
	document.getElementById("aaddii").src = id;
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




<?php
if ($_GET['xx']=="XyZ")
{
?>
<script>
$('#costumModalSukses').modal('show');
</script>
<?php 
}
?>

<script>
	$("#costumModalSukses").on('hide.bs.modal', function(){
    	window.location='pemetaan.php';
  	});
	</script>

<script>
function modaltambah()
{
$('#costumModalTambah').modal('show');
$('#costumModal4').modal('hide');
}
</script>

<script>
	function logout()
	{
		//alert(id1);
		//alert(id2);
		if (confirm("Logout Aplikasi?")) {
			//alert("Hapus");
			window.location='backoffice/logout.php?maukeluar=iya';
		}
	}
	</script>
	
<script>
function gantifoto(str,str1)
{
var uploadfiles = document.querySelector('#'+str);
var files = uploadfiles.files;
for(var i=0; i<files.length; i++){
	//alert(files.length);
	uploadFile(uploadfiles.files[i],str1);
}

function uploadFile(file,str){
	//alert("");
        var url = "server/index.php?kode="+str;
        var xhr = new XMLHttpRequest();
        var fd = new FormData();
        xhr.open("POST", url, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Every thing ok, file uploaded
                console.log(xhr.responseText); // handle response.
				alert("foto telah terupload ada data telah diupdate silahkan reload halaman untuk melihat perubahan..");
            }
        };
        fd.append('uploaded_file', file);
        xhr.send(fd);
    }

}
</script>

<script>
function runScript(e) {
    //See notes about 'which' and 'key'
    if (e.keyCode == 13) {
        addLogin('','');
        return false;
    }
}
</script>

<script>
	function klikkuIjin(str)
	{
		//alert(str);
		var koordinatpopup=document.getElementById("koordinatpopup").value;
		var koordinatpopuphdms=document.getElementById("koordinatpopuphdms").value;
		//alert(koordinatpopup);
		document.getElementById("ijinkode").value=str;
		document.getElementById("ijinkoordinat").value=koordinatpopup;
		document.getElementById("ijinkoordinathdms").value=koordinatpopuphdms;
		xmlHttp=GetXmlHttpObject()
		  if (xmlHttp==null) {
			alert ("Your browser does not support AJAX!");
			return;
		  }
		  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
		  
		var url="getRuang.php";
		  url=url+"?no1="+str;
		  xmlHttp.onreadystatechange=function () {
			document.getElementById("ijinpenggunaan").value="";
			document.getElementById("ijinpenggunaan").value=xmlHttp.responseText;
			document.getElementById("loadingstat").innerHTML="";
		  }
		  xmlHttp.open("GET",url,true); 
		  //alert("hahahahaha");
		  xmlHttp.send(null);
		  
		xmlHttp1=GetXmlHttpObject()
		  if (xmlHttp1==null) {
			alert ("Your browser does not support AJAX!");
			return;
		  }
		  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
		  
		var url="getKodeRuang.php";
		  url=url+"?no1="+str;
		  xmlHttp1.onreadystatechange=function () {
			document.getElementById("kodeijinpenggunaan").value="";
			document.getElementById("kodeijinpenggunaan").value=xmlHttp1.responseText;
			document.getElementById("loadingstat").innerHTML="";
		  }
		  xmlHttp1.open("GET",url,true); 
		  //alert("hahahahaha");
		  xmlHttp1.send(null);
		  
		$('#costumModalIjin').modal('show');
	}
</script>


<script>
function ajuanijin()
{
	var ijinnamapemohon=document.getElementById("ijinnamapemohon").value;
	var ijinalamatpemohon=document.getElementById("ijinalamatpemohon").value;
	var ijintempatlahirpemohon=document.getElementById("ijintempatlahirpemohon").value;
	var ijintanggallahirpemohon=document.getElementById("ijintanggallahirpemohon").value;
	var ijinpekerjaan=document.getElementById("ijinpekerjaan").value;
	var ijinnotelp=document.getElementById("ijinnotelp").value;
	var ijinnamaperusahaan=document.getElementById("ijinnamaperusahaan").value;
	var ijinalamatperusahaan=document.getElementById("ijinalamatperusahaan").value;
	var ijinalamatkegiatan=document.getElementById("ijinalamatkegiatan").value;
	var ijinluas=document.getElementById("ijinluas").value;
	var ijinluasbangunan=document.getElementById("ijinluasbangunan").value;
	var ijinsertifikat=document.getElementById("ijinsertifikat").value;
	var ijinkoordinat=document.getElementById("ijinkoordinat").value;
	var ijinkoordinathdms=document.getElementById("ijinkoordinat").value;
	
	if (ijinnamapemohon === "")
	{
		alert("Isikan Nama Pemohon");
		return false;
	}
	
	if (ijinalamatpemohon === "")
	{
		alert("Isikan Alamat Pemohon");
		return false;
	}
	
	if (ijintempatlahirpemohon === "")
	{
		alert("Isikan Tempat Lahir Pemohon");
		return false;
	}
	
	if (ijintanggallahirpemohon === "")
	{
		alert("Isikan Tanggal Lahir Pemohon");
		return false;
	}
	
	if (ijinpekerjaan === "")
	{
		alert("Isikan Pekerjaan Pemohon");
		return false;
	}
	
	if (ijinnotelp === "")
	{
		alert("Isikan Nomor Telepon Pemohon");
		return false;
	}
	
	if (ijinnamaperusahaan === "")
	{
		alert("Isikan Nama Perusahaan Pemohon");
		return false;
	}
	
	if (ijinalamatperusahaan === "")
	{
		alert("Isikan Alamat Perusahaan Pemohon");
		return false;
	}
	
	if (ijinalamatkegiatan === "")
	{
		alert("Isikan Alamat Lokasi Kegiatan");
		return false;
	}
	
	if (ijinjeniskegiatan === "")
	{
		alert("Pilih Ijin Peruntukkan");
		return false;
	}
	
	if (ijinluas === "")
	{
		alert("Pilih Luas Tanah Peruntukkan");
		return false;
	}
	
	
	
	var hasilajuan=document.getElementById("hasilajuan").value;
	if (hasilajuan === "")
	{
		alert("Matrik Hasil Ajuan Tidak Ada");
		return false;
	}
	
	if (hasilajuan == "3")
	{
		alert("Pengajuan Tidak Diijinkan");
		return false;
	}
	
	ijinkode=document.getElementById("ijinkode").value;
	kodeijinpenggunaan=document.getElementById("kodeijinpenggunaan").value;
	ijinjeniskegiatan=document.getElementById("ijinjeniskegiatan").value
	hasilajuan=document.getElementById("hasilajuan").value
	
	
	  xmlHttp=GetXmlHttpObject()
	  if (xmlHttp==null) {
		alert ("Your browser does not support AJAX!");
		return;
	  }
	  document.getElementById("loadingstat").innerHTML="<span style=\"font-family: Tahoma; font-size:12; background-color: #FF0000; color: #FFFFFF; align: right\"><blink>&nbsp;Loading...&nbsp;</blink></span>";
	  
	var url="savePengajuan.php";
	  url=url+"?ijinkode="+btoa(ijinkode)+"&kodeijinpenggunaan="+btoa(kodeijinpenggunaan)+"&ijinjeniskegiatan="+btoa(ijinjeniskegiatan)+"&hasilajuan="+btoa(hasilajuan)+"&ijinnamapemohon="+btoa(ijinnamapemohon)+"&ijinalamatpemohon="+btoa(ijinalamatpemohon)+"&ijintempatlahirpemohon="+btoa(ijintempatlahirpemohon)+"&ijintanggallahirpemohon="+btoa(ijintanggallahirpemohon)+"&ijinpekerjaan="+btoa(ijinpekerjaan)+"&ijinnotelp="+btoa(ijinnotelp)+"&ijinnamaperusahaan="+btoa(ijinnamaperusahaan)+"&ijinalamatperusahaan="+btoa(ijinalamatperusahaan)+"&ijinalamatkegiatan="+btoa(ijinalamatkegiatan)+"&ijinluas="+btoa(ijinluas)+"&ijinkoordinat="+btoa(ijinkoordinat)+"&ijinkoordinathdms="+btoa(ijinkoordinathdms)+"&ijinluasbangunan="+btoa(ijinluasbangunan)+"&ijinsertifikat="+btoa(ijinsertifikat);
	  xmlHttp.onreadystatechange=function () {
		document.getElementById("loadingstat").innerHTML="";
	  }
	  xmlHttp.open("GET",url,true); 
	  //alert("hahahahaha");
	  xmlHttp.send(null);
	  alert("Pengajuan Telah Disimpan dan Akan Diproses Oleh Administrator");
	  $('#costumModalIjin').modal('hide');
	
	//alert(str);
	//alert(str1);
	//alert(str2);
	//alert(str3);
	window.open("examples/cetview.php?ijinkode="+btoa(ijinkode)+"&kodeijinpenggunaan="+btoa(kodeijinpenggunaan)+"&ijinjeniskegiatan="+btoa(ijinjeniskegiatan)+"&hasilajuan="+btoa(hasilajuan)+"&ijinnamapemohon="+btoa(ijinnamapemohon)+"&ijinalamatpemohon="+btoa(ijinalamatpemohon)+"&ijintempatlahirpemohon="+btoa(ijintempatlahirpemohon)+"&ijintanggallahirpemohon="+btoa(ijintanggallahirpemohon)+"&ijinpekerjaan="+btoa(ijinpekerjaan)+"&ijinnotelp="+btoa(ijinnotelp)+"&ijinnamaperusahaan="+btoa(ijinnamaperusahaan)+"&ijinalamatperusahaan="+btoa(ijinalamatperusahaan)+"&ijinalamatkegiatan="+btoa(ijinalamatkegiatan)+"&ijinluas="+btoa(ijinluas)+"&ijinkoordinat="+btoa(ijinkoordinat)+"&ijinkoordinathdms="+btoa(ijinkoordinathdms)+"&ijinluasbangunan="+btoa(ijinluasbangunan)+"&ijinsertifikat="+btoa(ijinsertifikat))
}
</script>


<!-- Scripts -->
  </body>

</html>
<div id="loadingstat" style="position: absolute; top: 200px; left: 940px; width: 64px; height: 16px; z-index: 3">