<div class="row">
	<div class="col-md-12">
   				<br>
   				<h3 class="centered">Daftar Jembatan</h3>
   				<div class="row padleft">
   					<div class="col-md-2">
   						<a data-toggle="modal" href="#myModal" class="btn btn-primary">Pencarian Jembatan</a>
   					</div>
   				</div>
   				<div class="col-md-3">
   					<p><?php
   				$sqlcount="select count(gid) as total from jembatan2 where deleted=false";
				  $resultcount=mysql_query($sqlcount);
				  if ($resultcount) {
				  	if ($datacount=mysql_fetch_array($resultcount)) {
				  		$total=$datacount['total'];
				  	}
				  }
   				 echo "<div class='alert alert-info'>Total Jembatan : ".$total;?></div></p>
   				</div>
   				<div class="table-responsive">
				<table class="table">
					<!-- Per bagan jembatan -->
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

				  $sql2="select * from jembatan2 ORDER BY nm_ruas asc limit $posisi,$batas";
				  $sql3="select * from jembatan2";
				  
				  
				  $result3=mysql_query($sql3);

				  $jmldata=mysql_num_rows($result3);
				  $jmlhalaman=ceil($jmldata/$batas);


				  $result2=mysql_query($sql2);
				  $no=$posisi+1;

				  if ($result2) {
				  	while ($data=mysql_fetch_array($result2)) {
				  		$sql4="select x(the_geom) as x, y(the_geom) as y from jembatan2 where gid=$data[gid]";
				  		$result4=mysql_query($sql4);
				  		if ($result4) {
				  			if ($data4=mysql_fetch_array($result4)) {
				  				$x=$data4['x'];
				  				$y=$data4['y'];
				  			}
				  		}
				  			echo "<tr>
						<td rowspan='5' align='left' width='450'>
							<a href='images/foto/".$data['ft_dpn']."' target='_blank'><img class='img-thumbnail imgresize1' src='images/foto/".$data['ft_dpn']."'>
							<a href='images/foto/".$data['ft_smpng']."' target='_blank'><img class='img-thumbnail imgresize1' src='images/foto/".$data['ft_smpng']."'>
						</td>
						</tr>
						<tr>
							<th align='left' width='120'>Nama Jalan</th><td>:</td><td align='left'>".$data['nm_ruas']."</td>
						</tr>
						<tr>
							<th align='left'>Koordinat X</th><td>:</td><td align='left'>".$x."</td>
						</tr>
						<tr>
							<th align='left'>Koordinat Y</th><td>:</td><td align='left'>".$y."</td>
						</tr>
						<tr>
							<td colspan='3' align='left'><a href='$webRoot/peta.php?table=jembatan&jembatan=1&gid=".$data['gid']."&$query=1' target='_blank'><img class='imgresize4' src='img/maps.png'>Lihat Peta</a></td>
						</tr>";
				  		}	
				  }
				?>
					<!-- <tr>
						<td rowspan="4" align="left" width="450">
							<img class="img-thumbnail imgresize1" src="http://placehold.it/500x200&text=Foto1">
							<img class="img-thumbnail imgresize1" src="http://placehold.it/500x200&text=Foto2">
						</td>
					</tr>
					<tr>
						<th align="left" width="120">Nama Jalan</th><td>:</td><td align="left">asdfgh</td>
					</tr>
					<tr>
						<th align="left">Kode Jalan</th><td>:</td><td align="left">asdfgh</td>
					</tr>
					<tr>
						<td colspan="3" align="right"><a href="#">Lihat Peta</a></td>
					</tr> -->
				</table>
				</div>
				 <ul class="pagination">
      <?php
        echo "<li><a href='?page=jembatan&id=".$data['gid']."&halaman=1'>&laquo;</a></li>";
        for ($i=1; $i<=$jmlhalaman ; $i++) { 
          if ($i != $halaman) {
            echo "<li><a href=?page=jembatan&id=".$data['gid']."&halaman=$i>$i</a></li>";
          }
          else {
            echo "<li class='active'><a href=?page=jembatan&id=".$data['gid']."&halaman=$i>$i</a></li>";
          }
        }
        echo "<li><a href='?page=jembatan&id=".$data['gid']."&halaman=$jmlhalaman'>&raquo;</a></li>";
      ?>
    </ul>
   			</div>
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
          <form role="form" action="?page=searchjembatan" method="post">
			  <div class="form-group">
			    <label>Nama Jalan</label>
			    <input type="input" class="form-control" name="jalan" placeholder="Nama Jalan">
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