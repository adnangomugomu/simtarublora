<?php
session_start();
$parts = $_SERVER['REQUEST_URI'];
?>


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
						$sqlprofile="select * from si_user where id_user='".$_COOKIE['oneid']."' and deleted='0'";
						//echo $sqlprofile;
						$resultprofile=mysqli_query($link,$sqlprofile);
						if ($resultprofile)
						{
							while ($rowprofile=mysqli_fetch_array($resultprofile))
							{
								$id_userprofile=$rowprofile['id_user'];
								$usernameprofile=$rowprofile['username'];
								$passwordprofile=decrypt($rowprofile['password']);
								$id_instansiprofile=$rowprofile['id_instansi'];
								$namaprofile=$rowprofile['nama'];
								$nipprofile=$rowprofile['NIP'];
								$alamatprofile=$rowprofile['alamat'];
								$teleponprofile=$rowprofile['telepon'];
								$hpprofile=$rowprofile['hp'];
								$emailprofile=$rowprofile['email'];
								$gambarprofile=$rowprofile['gambar'];
								$id_user_levelprofile=$rowprofile['id_user_level'];
								$bidangprofile=$rowprofile['bidang'];
								$subbidangprofile=$rowprofile['subbidang'];
							}
						}
						?>
						<form class="form-horizontal" action="simtaru-updateprofile" method="POST" enctype="multipart/form-data">
						<div class="row clearfix">
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="nama">Instansi</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="id_instansiprofile" class="rounded" id="id_instansiprofile" placeholder="Instansi" value="<?php echo $id_instansiprofile; ?>" required>
							</div>
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
								<label for="nip">NIP</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="nipprofile" class="rounded" id="nipprofile" placeholder="NIP" value="<?php echo $nipprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="alamat">Alamat</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="alamatprofile" class="rounded" id="alamatprofile" placeholder="Alamat" value="<?php echo $alamatprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="telepon">Telepon</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="teleponprofile" class="rounded" id="teleponprofile" placeholder="Telepon" value="<?php echo $teleponprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="hp">No Hp</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="hpprofile" class="rounded" id="hpprofile" placeholder="No Hp" value="<?php echo $hpprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="email">Email</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="text" name="emailprofile" class="rounded" id="emailprofile" placeholder="Email" value="<?php echo $emailprofile; ?>" required>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="level">Level</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<select name="id_user_levelprofile" class="form-control select2" id="id_user_levelprofile" required disabled="disabled" style="width:100%;">
								<?php
								$sqllevel="select a.* from si_m_user_level a
								where a.deleted='0' and a.id_user_level >= '".$_COOKIE['onelevel']."'";
								$resultlevel=mysqli_query($link,$sqllevel);
								if ($resultlevel)
								{
								while ($rowlevel=mysqli_fetch_array($resultlevel))
								{
								?>
								<option value="<?php echo $rowlevel['id_user_level']; ?>" <?php if ($rowlevel['id_user_level']==$id_user_levelprofile) { ?> selected="selected" <?php } ?> ><?php echo $rowlevel['user_level']; ?></option>
								<?php
								}
								}
								?>
								</select>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="Foto">Foto</label>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
								<input type="file" name="gambarprofile" class="rounded" id="gambarprofile" placeholder="Foto" value="<?php echo $gambarprofile; ?>" accept="image/x-png,image/jpeg">
							</div>
							<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
								<label for="Foto"><img src="images/<?php echo $gambarprofile; ?>" height="50" /></label>
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
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="password">Didukung Oleh:</label><br /><img src="images/bse.png" height="80" />
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
											<label for="username">Pekerjaan Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="pekerjaanpemohonregister" class="rounded" id="pekerjaanpemohonregister" placeholder="Pekerjaan Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Pekerjaan Pemohon"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">Alamat Email Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="emailpemohonregister" class="rounded" id="emailpemohonregister" placeholder="Alamat Email Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan Alamat Email Pemohon"  required>
											
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
											<label for="username">NPWP Pemohon</label>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
											<input type="text" name="npwppemohonregister" class="rounded" id="npwppemohonregister" placeholder="NPWP Pemohon" data-toggle="tooltip" data-placement="top" title="Masukkan NPWP Pemohon"  required>
											
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
					<p>
					<div class="row clearfix">
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Nama</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="namapemohonaduan" class="rounded" id="namapemohonaduan" placeholder="Nama " data-toggle="tooltip" data-placement="top" title="Masukkan Nama "  required>
							
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Nomor Identitas</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="noidentitaspemohonaduan" class="rounded" id="noidentitaspemohonaduan" placeholder="Nomor Identitas " data-toggle="tooltip" data-placement="top" title="Masukkan Nomor Identitas "  required>
							
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Nomor HP </label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="notelpidentitaspemohonaduan" class="rounded" id="notelpidentitaspemohonaduan" placeholder="Nomor HP " data-toggle="tooltip" data-placement="top" title="Masukkan Nomor HP "  required>
							
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Aduan</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<textarea class="rounded" rows="4" name="alamatpemohonaduan" id="alamatpemohonaduan" data-toggle="tooltip" data-placement="top" title="Masukkan Isi Aduan " placeholder="Masukkan Isi Aduan" required></textarea>
							
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">CAPTCHA</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="capsam" class="rounded" id="capsam" placeholder="CAPTCHA" data-toggle="tooltip" data-placement="top" title="CAPTCHA" disabled="disabled" value="<?php echo randomkata(5); ?>" style="background-color:#CCCCCC;" required>
							
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 form-control-label">
							<label for="username">Masukkan CAPTCHA</label>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-6 col-xs-6">
							<input type="text" name="isicapcha" class="rounded" id="isicapcha" placeholder="CAPTCHA " data-toggle="tooltip" data-placement="top" title="Masukkan CAPTCHA" onchange="cekcapca(this.value)" onkeypress="cekcapca(this.value)" onkeyup="cekcapca(this.value)" required>
							
						</div>
						
						
					</div>    
					</p>
					<button type="submit" class="btn btn-sm btn btn-primary" data-toggle="tooltip" data-placement="top" title="Register User" style="width:100px;background-color:#ee102a;border:#00a65a;" id="kirimmohon" disabled="disabled" onclick="simpanmasukan()"><i class="fa fa-save"></i> Kirim</button>
									<button type="button" class="btn btn-sm btn btn-warning" data-toggle="tooltip" data-placement="top" title="Batalkan Register" style="width:100px;background-color:#f3c951;border:#f3c951;" data-dismiss="modal" aria-hidden="true"><i class="fa fa-reply"></i> Batal</button>	
                    </div>


                </div>
            </div>
        </div>





  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header" align="center">
		<center>
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
		  <a href="simtaru-d4shumum" class="navbar-brand"><img src="<?php echo $gambar; ?>" height="30"></a>
		<?php
		}
		?>
		</center>
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
function cekcapca(str)
{
	var cap = document.getElementById("capsam").value;
	if (str !== cap)
	{
		document.getElementById("isicapcha").focus();
		$("#kirimmohon").prop("disabled", true);
		return false;
	}
	else
	{
		 $("#kirimmohon").removeAttr('disabled');
	}
	
}
</script>