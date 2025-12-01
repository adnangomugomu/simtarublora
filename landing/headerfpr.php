<?php
session_start();
$parts = $_SERVER['REQUEST_URI'];
?>
<?php 
$para=strpos($parts,"simtaru-blora"); 
$para1=strpos($parts,"simtaru-itr_blora"); 
$para2=strpos($parts,"simtaru-persyaratan_blora"); 
$para3=strpos($parts,"simtaru-offline_blora"); 
$para4=strpos($parts,"simtaru-permohonan_online_blora"); 
$para5=strpos($parts,"simtaru-d4shfpr"); 
$para6=strpos($parts,"simtaru-tambahdata"); 
$para7=strpos($parts,"simtaru-daftardatapermohonan"); 
$para10=strpos($parts,"simtaru-gis"); 
$para11=strpos($parts,"simtaru-daftarhasil"); 
$para12=strpos($parts,"simtaru-f1leunduh"); 
$para13=strpos($parts,"simtaru-m0h0n_kppr_admin"); 
$para14=strpos($parts,"simtaru-admin_kpprusaha"); 
$para15=strpos($parts,"simtaru-fprd4t4nnonkkpr"); 
$para16=strpos($parts,"simtaru-t4b3lkkpr"); 
$para17=strpos($parts,"simtaru-4du4nm4sy"); 
$para18=strpos($parts,"simtaru-us3rfpr"); 

?>

		<div id="costumModalSettingPeta" class="modal" data-easein="flipBounceXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
           <div class="modal-dialog modal-full" style="border-radius:10px;">
                <div class="modal-content" style="border-radius:10px;z-index:100;">
                    <div class="modal-header" style="background-color:#00a65a;">
					<center>
                        <h1 class="modal-title" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#FFFFFF;">
                            <img src="<?php echo $ikon; ?>" height="50">
							Setting Peta <?php echo $judulIkon; ?>
						</h1>
					</center>	
                    </div>
                    <div class="modal-body">
                        
						<p>
						<iframe src="" style="width:100%;height:75vh" id="iframetabelsetting"></iframe>
						</p>
						
                    </div>
                    <div class="modal-footer" style="background-color:#00a65a;">
						<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                            Tutup
                        </button>
                        
                    </div>
                </div>
				
            </div>
        </div>



		<div id="costumModal6" class="modal" data-easein="flipBounceXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
           <div class="modal-dialog modal-full" style="border-radius:10px;">
                <div class="modal-content" style="border-radius:10px;z-index:100;">
                    <div class="modal-header" style="background-color:#00a65a;">
					<center>
                        <h1 class="modal-title" style="font-family:Geneva, Arial, Helvetica, sans-serif;color:#FFFFFF;">
                            <img src="<?php echo $ikon; ?>" height="50">
							<?php echo $judulIkon; ?>
						</h1>
					</center>	
                    </div>
                    <div class="modal-body">
                        
						<p>
						<iframe src="" style="width:100%;height:75vh" id="iframetabel"></iframe>
						</p>
						
                    </div>
                    <div class="modal-footer" style="background-color:#00a65a;">
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

        <div id="costumModalprofile" class="modal" data-easein="flipBounceXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header" style="background-color:#00a65a;">
                        <h4 class="modal-title" style="color:#FFFFFF;font-weight:bold;">
							<center>
							<img src="images/login.png" height="50"><br>
							Profile User <?php echo $judul; ?>
							</center>
                        </h4>
                    </div>
                    <div class="modal-body">
						<?php
						if ($_GET['ci']=="falldown")
						{
						?>
						<p>
						<span style="color:#FF3333;"><i class="fa fa-warning"></i> User dengan nama tersebut sudah ada / dipakai user lain silahkan diganti .... </span>
						</p>
						<?php
						}
						?>
						<?php
						$sqlprofile="select * from si_userfpr where id_user='".$_COOKIE['oneid']."' and deleted='0'";
						//echo $sqlprofile;
						$resultprofile=mysqli_query($link,$sqlprofile);
						if ($resultprofile)
						{
							while ($rowprofile=mysqli_fetch_array($resultprofile))
							{
								$id_userprofile=$rowprofile['id_user'];
								$usernameprofile=$rowprofile['username'];
								$passwordprofile=decrypt($rowprofile['password']);
								$pekerjaanprofile=$rowprofile['pekerjaan'];
								$namaprofile=$rowprofile['nama'];
								$nipprofile=$rowprofile['NIP'];
								$alamatprofile=$rowprofile['alamat'];
								$teleponprofile=$rowprofile['telepon'];
								$hpprofile=$rowprofile['hp'];
								$emailprofile=$rowprofile['email'];
								$gambarprofile=$rowprofile['gambar'];
								$npwpprofile=$rowprofile['npwp'];
								$bidangprofile=$rowprofile['bidang'];
								$subbidangprofile=$rowprofile['subbidang'];
							}
						}
						?>
						<form class="form-horizontal" action="simtaru-upd4t3pr0f1l3FPR" method="POST" enctype="multipart/form-data">
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="username">Username</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="usernameprofile" class="rounded" id="usernameprofile" placeholder="Username" value="<?php echo $usernameprofile; ?>" required>
								<input type="hidden" name="id_userprofile" class="rounded" id="id_userprofile" placeholder="Username" value="<?php echo $id_userprofile; ?>" required>
								<input type="hidden" name="usernameprofiletmp" class="rounded" id="usernameprofiletmp" placeholder="Username" value="<?php echo $usernameprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="password">Password</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="password" name="passwordprofile" class="rounded" id="passwordprofile" placeholder="Password" value="<?php echo $passwordprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="nama">Nama</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="namaprofile" class="rounded" id="namaprofile" placeholder="Nama" value="<?php echo $namaprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="alamat">Posisi</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="pekerjaanprofile" class="rounded" id="pekerjaanprofile" placeholder="Posisi" value="<?php echo $pekerjaanprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="email">Jabatan</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="emailprofile" class="rounded" id="emailprofile" placeholder="Jabatan" value="<?php echo $emailprofile; ?>" required>
							</div>
							
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="alamat">Pangkat</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="npwpprofile" class="rounded" id="npwpprofile" placeholder="Pangkat" value="<?php echo $npwpprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="nip">NIP</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="nipprofile" class="rounded" id="nipprofile" placeholder="NIP" value="<?php echo $nipprofile; ?>" required>
							</div>
							
						</div>
						
                    </div>
                    <div class="modal-footer">
						<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Simpan Data" style="width:100px;background-color:#00a65a;border:#00a65a;" onClick="return confirm('Data Sudah Benar?')"><i class="fa fa-archive"></i> Simpan</button>
						<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Proses" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModallogin" class="modal" data-easein="flipBounceXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header" style="background-color:#00a65a;">
                        <h1 class="modal-title">
							<center>
							<img src="images/login.png" height="50"><br>
							<span style="color:#FFFFFF;">Login <?php echo $judulWeb; ?></span>
							</center>
                        </h1>
                    </div>
                    <div class="modal-body">
					    <div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
							  <li><a href="#register" data-toggle="tab">Register</a></li>
							</ul>
							<div class="tab-content">
								<div class="active tab-pane" id="login">
									<label class="panel-login">
									<?php
									$func=$_GET['func']; 
									if ($func == 'incorrect')
									{
										echo '<font color="red">Username/Password Salah</font>';
									}
									?>   
									</label>
									<p>
									<form action="simtaru-adminlogin" method="post" accept-charset="UTF-8" role="form" class="form-signin">
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nama User</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="username" class="rounded" id="username" placeholder="Nama User" data-toggle="tooltip" data-placement="top" title="Masukkan Nama User"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="password">Kata Kunci</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="password" name="password" class="rounded" id="password" placeholder="Kata Kunci" data-toggle="tooltip" data-placement="top" title="Masukkan Kata Kunci" required>
										</div>
										
									</div>
									</p>
			
									<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Login Ke Halaman Admin" style="width:100px;background-color:#ee102a;border:#00a65a;"><i class="fa fa-sign-in"></i> Login</button>
									<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Login" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
									</form>
								</div>
								<div class="tab-pane" id="register">
									<label class="panel-login">
									<?php
									$func=$_GET['func']; 
									if ($func == 'incorrect')
									{
										echo '<font color="red">Username/Password Salah</font>';
									}
									?>   
									</label>
									<p>
									<form action="simtaru-adminregister" method="post" accept-charset="UTF-8" role="form" class="form-signin">
									<div class="row clearfix">
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nama Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="namapemohonregister" class="rounded" id="namapemohonregister" placeholder="Nama Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Nama Pemohon"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nomor Identitas Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="noidentitaspemohonregister" class="rounded" id="noidentitaspemohonregister" placeholder="Nomor Identitas Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Nomor Identitas Pemohon"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nomor HP Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="notelpidentitaspemohonregister" class="rounded" id="notelpidentitaspemohonregister" placeholder="Nomor HP Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Nomor HP Pemohon"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Alamat Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<textarea class="rounded" rows="4" name="alamatpemohonregister" id="alamatpemohonregister" data-toggle="tooltip" data-placement="top" title="Masukkan Alamat Pemohon" required></textarea>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Nama User</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="usernameregister" class="rounded" id="usernameregister" placeholder="Nama User" data-toggle="tooltip" data-placement="top" title="Masukkan Nama User"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="password">Kata Kunci</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="password" name="passwordusernameregister" class="rounded" id="passwordusernameregister" placeholder="Kata Kunci" data-toggle="tooltip" data-placement="top" title="Masukkan Kata Kunci" required>
										</div>
										
									</div>
									</p>
			
									<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Register User" style="width:100px;background-color:#ee102a;border:#00a65a;"><i class="fa fa-user"></i> Register</button>
									<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Register" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>
									</form>

								</div>
							</div>
						</div>
						
                    </div>


                </div>
            </div>
        </div>


<!--****************-->
        <!--    C O P Y     -->
        <!--****************-->

        <div id="costumModaladuan" class="modal" data-easein="flipBounceXIn"  tabindex="-1" role="dialog" aria-labelledby="costumModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
					<div class="modal-header" style="background-color:#00a65a;">
                        <h1 class="modal-title">
							<center>
							<img src="images/pengaduanmasy.png" height="50"><br>
							<span style="color:#FFFFFF;">Layanan Aduan <?php echo $judulWeb; ?></span>
							</center>
                        </h1>
                    </div>
                    <div class="modal-body">
					    
						
                    </div>


                </div>
            </div>
        </div>



  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
		<?php
		if ($_COOKIE['oneid']=='')
		{
		?>
		  <a href="simtaru-blora" class="navbar-brand"><img src="<?php echo $gambar; ?>" height="30"></a>
		<?php
		}
		else
		{
		?>
		  <a href="simtaru-d4shfpr" class="navbar-brand"><img src="<?php echo $gambar; ?>" height="30"></a>
		<?php
		}
		?>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav"> 
		<?php
		if ($_COOKIE['oneid']=='')
		{
		?>
            <li class="<?php if ($para) { ?> active <?php } ?>"><a href="simtaru-blora">BERANDA</a></li>
			<li class="dropdown<?php if (($para1) || ($para2) || ($para3) || ($para4) || ($para11)) { ?> active <?php } ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">LAYANAN <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="simtaru-persyaratan_blora">Persyaratan Pengajuan Tata Ruang</a></li>
                <li><a href="simtaru-itr_blora">Peta Tata Ruang Kabupaten Pemalang</a></li>
				<li><a href="simtaru-permohonan_online_blora">Permohonan Informasi Tata Ruang Online</a></li>
				<li><a href="simtaru-offline_blora">Permohonan Informasi Tata Ruang Offline</a></li>
				<li><a href="simtaru-daftarhasil">Hasil Permohonan Informasi Tata Ruang</a></li>
              </ul>
            </li>
			<li class="<?php if ($para9) { ?> active <?php } ?>"><a href="#">PETUNJUK PENGGUNAAN</a></li>
			<li><a href="#costumModallogin" data-toggle="modal">LOGIN</a></li>
		<?php
		}
		?>
		<?php
		if ($_COOKIE['onenama']<>'')
		{
		?>
            <li class="<?php if ($para5) { ?> active <?php } ?>"><a href="simtaru-d4shfpr">DASHBOARD</a></li>
			<li class="<?php if ($para15) { ?> active <?php } ?>"><a href="simtaru-fprd4t4nnonkkpr">Daftar Data Permohonan</a></li>
			<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo "images/".$_COOKIE['onefoto']; ?>" class="user-image" alt="User Image">
              <span><?php echo strtoupper($_COOKIE['onenama']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo "images/".$_COOKIE['onefoto']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_COOKIE['onenama']; ?>
                  <small><?php  echo $_COOKIE['onedinas']; ?></small>
                </p>
              </li>
                            <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
				 <a href="#costumModalprofile" data-toggle="modal" class="menu-toggle btn btn-default btn-flat">Profile</a>
				</div>
                <div class="pull-right">
                  <a href="simtaru-logoutblora?maukeluar=iya" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          
        <?php
		}
		?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
		
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
    <!-- Logo -->

  </header>
 
<script>
function showku(str)
{
$('#costumModal6').modal('show');
ubahhalaman(str);
}
</script>

<script>
function ubahhalaman(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabel');
	iframe.src = xx;
}
</script>


<script>
function showkusetting(str)
{
$('#costumModalSettingPeta').modal('show');
ubahhalamansetting(str);
}
</script>
<script>
function ubahhalamansetting(id)
{
	var xx=id;
	//alert(xx);
	var iframe = document.getElementById('iframetabelsetting');
	iframe.src = xx;
}
</script