<?php
session_start();
$parts = $_SERVER['REQUEST_URI'];
if(!$_SESSION['oneid'])
{
header("location:../");
}
?>
<!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Administrator <?php echo $judulWeb; ?></a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/<?php echo $_SESSION['onefoto']; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['onenama']; ?></div>
                    <div class="email"><?php echo $_SESSION['onedinas']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php?action=e&id=<?php echo encrypt($_SESSION['oneid']); ?>"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="logout.php?maukeluar=iya"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="../" target="_blank">
                            <i class="material-icons">build</i>
                            <span>Halaman Depan</span>
                        </a>
                    </li>
					<?php 
					$para=strpos($parts,"php"); 
					?>
                    <li <?php if (!$para) { ?> class="active" <?php } ?> >
                        <a href="./">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					<?php
					if (1==1)
					{
					?>
					<?php
					$para=strpos($parts,"peta.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="peta.php">
                            <i class="material-icons">map</i>
                            <span>Peta</span>
                        </a>
                    </li>
					
					
					<?php
					if ($_SESSION['onelevel']=='1')
					{
					?>
					
					<?php
					$para=strpos($parts,"zonasi.php");
					$para1=strpos($parts,"peruntukkan.php");
					$para2=strpos($parts,"matrik.php");
					
					?>
                    <li <?php if (($para) || ($para1) || ($para2)  ) { ?> class="active" <?php } ?> >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">add_location</i>
                            <span>Zonasi Pola Ruang</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if ($para) { ?> class="active" <?php } ?> >
                                <a href="zonasi.php">Master Zonasi</a>
                            </li>
							<li <?php if ($para1) { ?> class="active" <?php } ?> >
                                <a href="peruntukkan.php">Master Peruntukkan</a>
                            </li>
							<li <?php if ($para2) { ?> class="active" <?php } ?> >
                                <a href="matrik.php">Matrik Zonasi</a>
                            </li>
                        </ul>
                    </li>
					
					<?php
					}
					?>
					
					<?php
					if ($_SESSION['onelevel']=='1')
					{
					?>
					
					<?php
					$para=strpos($parts,"pengajuan.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="pengajuan.php">
                            <i class="material-icons">card_giftcard</i>
                            <span>Daftar Permohonan Tata Ruang</span>
                        </a>
                    </li>
					
					<?php
					$para=strpos($parts,"resume.php");
					?>
					<li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="resume.php">
                            <i class="material-icons">more</i>
                            <span>Rekapan Data Tabulasi</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"statistik.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="statistik.php">
                            <i class="material-icons">donut_small</i>
                            <span>Grafik Data Statistik</span>
                        </a>
                    </li>
					
					<?php
					$para=strpos($parts,"slider.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="slider.php">
                            <i class="material-icons">more</i>
                            <span>Slider Halaman Depan</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"sambutan.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="sambutan.php">
                            <i class="material-icons">assignment_ind</i>
                            <span>Sambutan Kepala</span>
                        </a>
                    </li>
					<?php
					}
					?>
					<?php
					$para=strpos($parts,"pesan.php");
					?>
					<li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="pesan.php">
                            <i class="material-icons">widgets</i>
                            <span>Data Kontak / Pesan dari Publik</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"berita.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="berita.php">
                            <i class="material-icons">assignment</i>
                            <span>Informasi Terbaru</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"layanan.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="layanan.php">
                            <i class="material-icons">compare</i>
                            <span>Layanan</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"pengumuman.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="pengumuman.php">
                            <i class="material-icons">description</i>
                            <span>Pengumuman</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"galeri.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="galeri.php">
                            <i class="material-icons">photo_library</i>
                            <span>Produk Hukum</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"album.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="album.php">
                            <i class="material-icons">photo_album</i>
                            <span>Album Peta</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"gambar.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="gambar.php">
                            <i class="material-icons">filter</i>
                            <span>Album Galeri</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"regulasi.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="regulasi.php">
                            <i class="material-icons">confirmation_number</i>
                            <span>Regulasi</span>
                        </a>
                    </li>
					<?php
					}
					?>
					<?php
					$para=strpos($parts,"ikon.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="ikon.php">
                            <i class="material-icons">camera</i>
                            <span>Ikon</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"tautan.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="tautan.php">
                            <i class="material-icons">cloud_queue</i>
                            <span>Tautan</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"aliasfield.php");
					?>
                    <li <?php if ($para) { ?> class="active" <?php } ?> >
                        <a href="aliasfield.php">
                            <i class="material-icons">archive</i>
                            <span>Alias Field</span>
                        </a>
                    </li>
					<?php
					$para=strpos($parts,"usermanager.php");
					$para1=strpos($parts,"profile.php");
					?>
                    <li <?php if (($para) || ($para1)) { ?> class="active" <?php } ?> >
                        <a href="usermanager.php">
                            <i class="material-icons">account_circle</i>
                            <span>User Manager</span>
                        </a>
                    </li>
					<?php
					if ($_SESSION['onelevel']=='1')
					{
					?>
					
					<?php
					$para=strpos($parts,"bidang.php");
					$para1=strpos($parts,"subb1dang.php");
					
					?>
                    <li <?php if (($para) || ($para1)  ) { ?> class="active" <?php } ?> >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if ($para) { ?> class="active" <?php } ?> >
                                <a href="bidang.php">Bidang Peta</a>
                            </li>
							<li <?php if ($para1) { ?> class="active" <?php } ?> >
                                <a href="subb1dang.php">Sub Bidang Peta</a>
                            </li>
							
                        </ul>
                    </li>
					
					<?php
					}
					?>
					
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Parastapa
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>