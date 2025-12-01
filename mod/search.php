<?php
		$kecamatan=$_POST['kecamatan'];
	$jalan=$_POST['jalan'];
	$perkerasan=$_POST['perkerasan'];

	// echo $perkerasan;
	// echo $jalan;
	// echo $kecamatan;


	if ($jalan=="") {
		$sql1="";
	}
	else{
		$sql1="and nama_ruas LIKE '%".$jalan."%' ";
	}
	if ($kecamatan=="NULL") {
		$sql2="kecamatan<>''";
	}
	else{
		$sql2="kecamatan='".$kecamatan."' ";
	}
	if ($perkerasan=="NULL") {
		$sql3="";
	}
	else{
		$sql3="and perkerasan='".$perkerasan."'";
	}

	$sql="select * from jalan where ".$sql2.$sql1.$sql3;
	$sqlcount="select count(gid) as total from jalan where ".$sql2.$sql1.$sql3;
	$resultcount=mysql_query($sqlcount);
	$result=mysql_query($sql);

	if ($resultcount) {
		if ($datacount=mysql_fetch_array($resultcount)) {
			$total=$datacount['total'];
		}
	}
?>
<div class="col-md-12">
	<h2 class="centered">Search Result</h2>
	<hr>
	<div class="row">
					<div class="col-md-4">
						<div class="alert alert-info">Total Ruas Jalan Yang Ditemukan : <?php echo $total;?></div>
					</div>
				</div>
<div class="table-responsive">
   					<table class="table-bordered">
   						<tr>
   							<th>No</th>
   							<th width="200">Nama jalan</th>
   							<th width="50">Panjang</th>
   							<th width="50">Kecamatan</th>
   							<th>Sektor Dominan</th>
   							<th width="50">Perkerasan Jalan</th>
   							<th width="120">Kondisi Umum</th>
   							<th width="120">Sketsa Pangkal</th>
   							<th width="120">Sketsa Ujung</th>
   							<th width="120">Foto Pangkal</th>
   							<th width="120">Foto Ujung</th>
   						</tr>
   					
<?php
	if ($result) {
		$no=1;
   		while ($row2=mysql_fetch_array($result)) {
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
   									echo "<tr>
			   							<td>".$no++."</td>
			   							<td><a href=\"?page=detailjalan&id=".$row2['gid']."\">".$row2['nama_ruas']."</a></td>
			   							<td>".$row2['panjang']." M</td>
			   							<td>".$row2['kecamatan']."</td>
			   							<td>".$row2['akt_ruas']."</td>
			   							<td>".$row2['perkerasan']."</td>
			   							<td>".$kondisiumum."</td>
			   							<td><img class='imgresize2' src='images/foto/".$row2['sket_ujg']."'></td>
			   							<td><img class='imgresize2' src='images/foto/".$row2['sket_pgl']."'></td>
			   							<td><img class='imgresize2' src='images/foto/".$row2['ft_pkl'].".JPG'></td>
			   							<td><img class='imgresize2' src='images/foto/".$row2['ft_ujg'].".JPG'></td>
			   						</tr>";	
   								}
   							}
?>
</table>
</div>
</div>