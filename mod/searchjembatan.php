<?php
	$jalan=$_POST['jalan'];
	if ($jalan=="") {
		$sql1="";
		$sqlcount1="";
	}
	else{
		$sql1=" where nama_jalan LIKE '%".$jalan."%'";
		$sqlcount1=" where nama_jalan LIKE '%".$jalan."%'";
	}

	$sql="select * from jembatan_shp".$sql1;
	$sqlcount="select count(gid) as total from jembatan_shp".$sqlcount1;
	$resultcount=mysql_query($sqlcount);
	if ($resultcount) {
		if ($datacount=mysql_fetch_array($resultcount)) {
			$total=$datacount['total'];
		}
	}
	//echo $sql;
	$result=mysql_query($sql);
?>
<div class="col-md-12">
	<h2 class="centered">Search Result</h2>
	<hr>
	<div class="col-md-4">
		<div class="alert alert-info">Total Jembatan Yang Ditemukan : <?php echo $total;?></div>
	</div>
<div class="table-responsive">
   					<table class="table">
   					
<?php

	if ($result) {
   		while ($data=mysql_fetch_array($result)) {
   									echo '<tr>
						<td rowspan="4" align="left" width="450">
							<img class="img-thumbnail imgresize1" src="images/foto/'.$data['img_0'].'.JPG">
							<img class="img-thumbnail imgresize1" src="images/foto/'.$data['no_foto2'].'.JPG">
						</td>
						</tr>
						<tr>
							<th align="left" width="120">Nama Jalan</th><td>:</td><td align="left">'.$data['nama_jalan'].'</td>
						</tr>
						<tr>
							<th align="left">Kode Jalan</th><td>:</td><td align="left">'.$data['kode_jalan'].'</td>
						</tr>
						<tr>
							<td colspan="3" align="left"><a href="$webRoot/peta.php?table=jembatan&jembatan=1&gid='.$data['gid'].'&$query=1" target="_blank"><img class="imgresize4" src="img/maps.png">Lihat Peta</a></td>
						</tr>';
   								}
   							}
?>
</table>
</div>
</div>