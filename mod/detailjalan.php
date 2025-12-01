<?php
	$id=$_GET['id'];
	$sql="select * from jalan where gid=$id";
	$result=mysql_query($sql);
	if ($result) {
		if ($data=mysql_fetch_array($result)) {
			$gid=$data['gid'];
			$id_jalan=$data['id_jalan'];
			$namaruas=$data['nama_ruas'];
			$koderuas=$data['kode_ruas'];
			$kecamatan=$data['kecamatan'];
			$panjang=$data['panjang'];
			$lebar=$data['lebar'];
			$perkerasan=$data['perkerasan'];
			$ruaspangkal=$data['ruas_pkl'];
			$ruasujung=$data['ruas_ujg'];
			$rumaja=$data['rumaja'];
			$rumija=$data['rumija'];
			$ruwaja=$data['ruwaja'];
			$bahukiri=$data['bh_lb_ki'];
			$bahukanan=$data['bh_lb_ka'];
			$bahujenis=$data['bh_jenis'];
			$bahukondisi=$data['bh_kondisi'];
			$kondisibaik=$data['ku_baik'];
			$kondisisdg=$data['ku_sd'];
			$kondisirusak=$data['ku_rusak'];
			$gangguan=$data['gang_samp'];
			$lantas=$data[''];
			$fotopangkal=$data['ft_pkl'];
			$fotoujung=$data['ft_ujg'];
			$sketsaujung=$data['sket_ujg'];
			$sketsapangkal=$data['sket_pgl'];

			//kondisi umum
			if ($kondisibaik>($kondisisdg+$kondisirusak)) {
   				$kondisiumum="<font color='green'>Kondisi Baik</font>";
   			}
   			if ($kondisisdg>($kondisibaik+$kondisirusak)) {
   				$kondisiumum="<font color='orange'>Kondisi Rusak Sedang</font>";
   			}
   			if ($kondisirusak>($kondisibaik+$kondisisdg)) {
   				$kondisiumum="<font color='red'>Kondisi Rusak Parah</font>";
   			}


		}
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2 class="centered">Detail Jalan <?php echo $namaruas;?></h2>
		</div>
		
		<div class="col-md-4">
		<div class="boxdetail"><img class="img-thumbnail " src="images/foto/<?php echo $fotopangkal;?>"><div class="captionDetail">Foto Pangkal Jalan</div></div>
		<div class="boxdetail"><img class="img-thumbnail " src="images/foto/<?php echo $fotoujung;?>"><div class="captionDetail">Foto Ujung Jalan</div></div>
		<div class="boxdetail"><img class="img-thumbnail " src="images/foto/<?php echo $sketsapangkal;?>"><div class="captionDetail">Foto Sketsa Pangkal</div></div>
		<div class="boxdetail"><img class="img-thumbnail " src="images/foto/<?php echo $sketsaujung;?>"><div class="captionDetail">Foto Sketsa Ujung</div></div>
		
		</div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table">
					<?php
						echo "<tr>
						<tr>
							<th width='200'>Nama Ruas</th><td width='30'>:</td><td>$namaruas</td>
						</tr>
						<tr>
							<th>Kode Ruas</th><td>:</td><td>$koderuas</td>
						</tr>
						<tr>
							<th>Kecamatan</th><td>:</td><td>$kecamatan</td>
						</tr>
						<tr>
							<th>Panjang</th><td>:</td><td>$panjang Meter</td>
						</tr>
						<tr>
							<th>Lebar</th><td>:</td><td>$lebar Meter</td>
						</tr>
						<tr>
							<th>Perkerasan</th><td>:</td><td>$perkerasan</td>
						</tr>
						<tr>
							<th>Ruas Pangkal</th><td>:</td><td>$ruaspangkal</td>
						</tr>
						<tr>
							<th>Ruas Ujung</th><td>:</td><td>$ruasujung</td>
						</tr>
						<tr>
							<th>Rumaja</th><td>:</td><td>$rumaja Meter</td>
						</tr>
						<tr>
							<th>Rumija</th><td>:</td><td>$rumija Meter</td>
						</tr>
						<tr>
							<th>Ruwaja</th><td>:</td><td>$ruwaja Meter</td>
						</tr>
						<tr>
							<th>Bahu Kiri</th><td>:</td><td>$bahukiri Meter</td>
						</tr>
						<tr>
							<th>Bahu Kanan</th><td>:</td><td>$bahukanan Meter</td>
						</tr>
						<tr>
							<th>Bahu Jenis</th><td>:</td><td>$bahujenis</td>
						</tr>
						<tr>
							<th>Bahu Kondisi</th><td>:</td><td>$bahukondisi</td>
						</tr>
						<tr>
							<th>Kondisi Baik</th><td>:</td><td>$kondisibaik Meter</td>
						</tr>
						<tr>
							<th>Kondisi Sedang</th><td>:</td><td>$kondisisdg Meter</td>
						</tr>
						<tr>
							<th>Kondisi Rusak</th><td>:</td><td>$kondisirusak Meter</td>
						</tr>
						<tr>
							<th>Kondisi Keseluruhan</th><td>:</td><td>$kondisiumum</td>
						</tr>
						<tr>
							<th>Gangguan Samping</th><td>:</td><td>$gangguan</td>
						</tr>
						<tr>
							<th>Pengaturan Lalu Lintas</th><td>:</td><td>$lantas</td>
						</tr>
						<tr>
							<td rowspan='2'><a href=\"$webRoot/peta.php?table=jalan&jalan=1&gid=".$gid."&$query=1\" target='_blank'><img class='imgresize4' src='img/maps.png'>Lihat Peta</a></td><td></td><td></td>
						</tr>
					</tr>";
					?>
				</table>
			</div>
			<div class="row">
				<div class="col-md-12">
					
						<?php
						$sql1="select kondisi_shp.gid,kondisi_shp.no_foto, x(kondisi_shp.the_geom) as x, y(kondisi_shp.the_geom) as y from kondisi_shp, jalan where kondisi_shp.id_jalan = jalan.id_jalan and kondisi_shp.id_jalan='".$id_jalan."'";
						$result1=mysql_query($sql1);
						if ($result1) {
							echo "<h3 class='centered'>Titik Kondisi Jalan</h3>
					<div class='table-responsive'>
						<table class='table'>";
							while ($data1=mysql_fetch_array($result1)) {
								//echo $data1['x'];
								if ($data1['no_foto']==null) {
									$foto="http://placehold.it/300x300/34495e/000000&text=Tidak Ada Foto";
								}
								else{
									$foto="images/foto/".$data1['no_foto'].".JPG";
								}
								echo "
								
							<tr>
							<td rowspan='4' align='left' width='330'>
								<a href='".$foto."' target='_blank'><img class='img-thumbnail imgresize3' src='".$foto."'>
							</td>
						</tr>
						<tr>
							<th align='left'>Koordinat X</th><td>:</td><td align='left'>".$data1['x']."</td>
						</tr>
						<tr>
							<th align='left'>Koordinat Y</th><td>:</td><td align='left'>".$data1['y']."</td>
						</tr>
						<tr>
							<td colspan='3' align='left'><a href=\"$webRoot/peta.php?table=kondisi&kondisi=1&gid=".$data1['gid']."&$query=1\" target='_blank'><img class='imgresize4' src='img/marker.png'>Cek Lokasi</a></td>
						</tr>";
						 	}
						}
						?>
						
						</table>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

