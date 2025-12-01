<?php
$parts = $_SERVER['REQUEST_URI'];
$para=strpos($parts,"bantudesa-1");
$para1=strpos($parts,"bantudesa-2");
$para2=strpos($parts,"bantudesa-3");
$para3=strpos($parts,"bantudesa-4");
$para4=strpos($parts,"bantudesa-5");
$para5=strpos($parts,"bantudesa-6");
?>
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
		  
		  <img src="<?php echo $ikon; ?>" height="40" style="margin-top:5px;">
          <a href="./" class="navbar-brand"><b><?php echo $judul; ?></b><?php echo $judultambah; ?></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav" style="text-align:right;float:right;">
            <li <?php if ($para) { ?> class="active" <?php } ?> ><a href="bantudesa-1">Beranda <span class="sr-only">(current)</span></a></li>
            <li <?php if ($para1) { ?> class="active" <?php } ?> ><a href="bantudesa-2">Data</a></li>
			<li <?php if ($para2) { ?> class="active" <?php } ?> ><a href="bantudesa-3">Statistik</a></li>
			<li <?php if ($para3) { ?> class="active" <?php } ?> ><a href="bantudesa-4">Publikasi</a></li>
			<li <?php if ($para4) { ?> class="active" <?php } ?> ><a href="bantudesa-5">Pemetaan / Sebaran</a></li>
			<li <?php if ($para5) { ?> class="active" <?php } ?> ><a href="bantudesa-6">Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
