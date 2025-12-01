
  <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">INDIKATOR STATISTIK SEKTORAL UTAMA</li>
		<li class="treeview">
          <a href="#" style="font-size:12px;" onclick="bukalevelbawahkor('INDIKATOR STATISTIK SEKTORAL UTAMA','DATA KOR','1','0','33')">
            <i class="fa fa-building"></i> <span>Data KOR</span> 
          </a>
          
        </li>
		<li class="header">URUSAN PEMERINTAHAN</li>
		<?php
		$sqlcari="select a.* from sipdjateng_urusan_kategori a 
		where a.deleted='0' and kategori='2'";
		$sqlcari=$sqlcari."	order by a.id asc";
		//echo $sqlcari;
		$resultcari = mysqli_query ($link,$sqlcari);
		if ($resultcari)
		{
		while ($rowcari=mysqli_fetch_array($resultcari))
		{
		?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i> <span><?php echo $rowcari['nama']; ?></span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		  	<?php
			$sql="select a.* from sipdjateng_sub_kategori a 
			where a.deleted='0' and kategori='2' and urusan='".$rowcari['id']."' and parent='1'";
			$sql=$sql."	order by a.urusan, a.Uraian";
			//echo $sql;
			$result = mysqli_query ($link,$sql);
			if ($result)
			{
			while ($row=mysqli_fetch_array($result))
			{
			?>
            <li><a href="#" style="font-size:12px;" onclick="bukalevelbawah('<?php echo $rowcari['nama']; ?>','<?php echo $row['Uraian']; ?>','<?php echo $rowcari['kategori']; ?>','<?php echo $rowcari['id']; ?>','<?php echo $row['id']; ?>','33')"><i class="fa fa-circle-o"></i> <?php echo $row['Uraian']; ?></a></li>
			<?php
			}
			}
			?>
          </ul>
        </li>
		<?php
		}
		}
		?>
		
		</ul>

    <!-- /.sidebar -->

