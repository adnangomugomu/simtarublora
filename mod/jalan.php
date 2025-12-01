<div class="row">
	<div class="page-header">
   					<h2 class="centered">List Jalan</h2>
   				</div>
   			<div class="row padleft">
   					<div class="col-md-2">
   						<a data-toggle="modal" href="#myModal" class="btn btn-primary">Pencarian Jalan</a>
   					</div>
   				</div>
   			<div class="col-md-12">
   				<br>
   				<?php
				  //paging
				  $batas=10;
				  $halaman=$_GET['halaman'];
				  if (empty($halaman)) {
				    $posisi = 0;
				    $halaman = 1;
				  }
				  else {
				    $posisi = ($halaman - 1) * $batas;
				  }

				  $sql2="select * from jalan where deleted='0' ORDER BY inserted desc limit $posisi,$batas";
				  $sql3="select * from jalan where deleted='0'";
				  $sqlcount="select count(gid) as total from jalan where deleted='0'";
				  
				  $resultcount=mysql_query($sqlcount);
				  if ($sqlcount) {
				  	if ($datacount=mysql_fetch_array($resultcount)) {
				  		$total=$datacount['total'];
				  	}
				  }

				  $result3=mysql_query($sql3);

				  $jmldata=mysql_num_rows($result3);
				  $jmlhalaman=ceil($jmldata/$batas);


				  $result2=mysql_query($sql2);
				  $no=$posisi+1;
				  
				?>
				<div class="row">
					<div class="col-md-3">
						<div class="alert alert-info">Total Ruas Jalan : <?php echo $total;?></div>
					</div>
				</div>	
   				<div class="table-responsive">
   					<table class="table-bordered">
   						<tr>
   							<th>No</th>
   							<th width="200">Nama jalan</th>
   							<th width="50">Kode Jalan</th>
   							<th width="30">Panjang</th>
   							<th width="80">Kecamatan</th>
   							<th>Sektor Dominan</th>
   							<th>Perkerasan Jalan</th>
   							<th width="120">Kondisi Umum</th>
   							<th width="120">Sketsa Pangkal</th>
   							<th width="120">Sketsa Ujung</th>
   							<th width="120">Foto Pangkal</th>
   							<th width="120">Foto Ujung</th>
   						</tr>
   						<?php
   							if ($result2) {
   								while ($row2=mysql_fetch_array($result2)) {
   									$kb=$row2['ku_baik'];
   									$ks=$row2['ku_sd'];
   									$kr=$row2['ku_rusak'];

   									if ($kb>($ks+$kr)) {
   										$kondisiumum="<font color='green'>Kondisi Baik</font>";
   									}
   									if ($ks>($kb+$kr)) {
   										$kondisiumum="<font color='orange'>Kondisi Rusak Sedang</font>";
   									}
   									if ($kr>($kb+$ks)) {
   										$kondisiumum="<font color='red'>Kondisi Rusak Parah</font>";
   									}

   									$ftujg=$row2['ft_ujg'];
   									$ftpkl=$row2['ft_pkl'];
   									echo "<tr>
			   							<td>".$no++."</td>
			   							<td><a href=\"?page=detailjalan&id=".$row2['gid']."\">".$row2['nama_ruas']."</a></td>
			   							<td>".$row2['kode_ruas']."</td>
			   							<td>".$row2['panjang']."</td>
			   							<td>".$row2['kecamatan']."</td>
			   							<td>".$row2['akt_ruas']."</td>
			   							<td>".$row2['perkerasan']."</td>
			   							<td>".$kondisiumum."</td>
			   							<td><a href='images/foto/".$row2['sket_ujg']."' target='_blank'><img class='imgresize2' src='images/foto/".$row2['sket_ujg']."'></a></td>
			   							<td><a href='images/foto/".$row2['sket_pgl']."' target='_blank'><img class='imgresize2' src='images/foto/".$row2['sket_pgl']."'></td>
			   							<td><a href='images/foto/".$ftujg."' target='_blank'><img class='imgresize2' src='images/foto/".$ftujg."'></td>
			   							<td><a href='images/foto/".$ftpkl."' target='_blank'><img class='imgresize2' src='images/foto/".$ftpkl."'></td>
			   						</tr>";	
   								}
   							}
   						?>
   						<!-- <tr>
   							<td>1</td>
   							<td><a href="?page=detailjalan">Bibendum Parturient Etiam Sem</a></td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   							<td>Bibendum Parturient Etiam Sem</td>
   						</tr> -->
   					</table>
   				</div>
   			</div>
   			<ul class="pagination">
      <?php
        echo "<li><a href='?page=jalan&id=".$row2['gid']."&halaman=1'>&laquo;</a></li>";
        for ($i=1; $i<=$jmlhalaman ; $i++) { 
          if ($i != $halaman) {
            echo "<li><a href=?page=jalan&id=".$row2['gid']."&halaman=$i>$i</a></li>";
          }
          else {
            echo "<li class='active'><a href=?page=jalan&id=".$row2['gid']."&halaman=$i>$i</a></li>";
          }
        }
        echo "<li><a href='?page=jalan&id=".$row2['gid']."&halaman=$jmlhalaman'>&raquo;</a></li>";
      ?>
    </ul>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Pencarian Jalan</h4>
        </div>
        <div class="modal-body">
          <form role="form" action="?page=search" method="post">
			  <div class="form-group">
			    <label>Nama Jalan</label>
			    <input type="input" class="form-control" name="jalan" placeholder="Nama Jalan">
			  </div>
			  <div class="form-group">
			  	<label>Kecamatan</label>
			  	<select class="form-control" name="kecamatan">
				  <option value="NULL">Semua Kecamatan</option>
				  <?php
				  	$sql="select distinct(kecamatan)as kecamatan from jalan where deleted='0'";
				  	$result=mysql_query($sql);
				  	if ($result) {
				  		while ($data=mysql_fetch_array($result)) {
				  			echo "<option value='".$data['kecamatan']."'>".$data['kecamatan']."</option>";
				  		}
				  	}
				  ?>
				</select>
			  </div>
			  <!-- <div class="form-group">
			  	<label>Kondisi</label>
			  	<select class="form-control" name="kondisi">
				  <option value="1">- Pilih kondisi -</option>
				  <?php
				  	$sql="select distinct(kecamatan)as kecamatan from jalan_shp where deleted=false";
				  	$result=mysql_query($sql);
				  	if ($result) {
				  		while ($data=mysql_fetch_array($result)) {
				  			echo "<option value='".$data['kecamatan']."'>".$data['kecamatan']."</option>";
				  		}
				  	}
				  ?>
				</select>
			  </div> -->
			  <div class="form-group">
			  	<label>Perkerasan</label>
			  	<select class="form-control" name="perkerasan">
				  <option value="NULL">- Tipe Perkerasan -</option>
				  <?php
				  	$sql="select distinct(perkerasan)as perkerasan from jalan where deleted='0'";
				  	$result=mysql_query($sql);
				  	if ($result) {
				  		while ($data=mysql_fetch_array($result)) {
				  			echo "<option value='".$data['perkerasan']."'>".$data['perkerasan']."</option>";
				  		}
				  	}
				  ?>
				</select>
			  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->