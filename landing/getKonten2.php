<html>

<head>
</head>
<style>
	#customers {
		font-family: Geneva, Arial, Helvetica, sans-serif;
		color: #000000;
		font-size: 12px;
		border-collapse: collapse;
		width: 100%;
	}

	#customers td,
	#customers th {
		border: 1px solid #ddd;
		padding: 3px;
	}

	#customers tr:nth-child(even) {
		background-color: #ffffff;
	}

	#customers tr:hover {
		background-color: #ddd;
	}

	#customers th {
		padding-top: 10px;
		padding-bottom: 10px;
		text-align: left;
		background-color: #00a661;
		color: white;
		border-color: #00a661;
	}
</style>

<body>
	<?php
	ini_set("memory_limit", -1);
	require_once '../library/config.php';

	function onereplace($str, $replaced_character)
	{
		$spt = str_split($str, 1);
		for ($i = 0; $i <= (count($spt) - 1); $i++) {
			if ($spt[$i] == $replaced_character) {
				unset($spt[$i]);
				break;
			}
		}

		return implode('', $spt);
	}

	$no1 = $_GET['no1'];
	$no2 = $_GET['no2'];
	$data2 = explode(",", $no2);
	$lat = $data2[1];
	$longitude = $data2[0];
	$no3 = $_GET['no3'];
	$no4 = $_GET['no4'];
	$koordinatku = $no4;
	$newkoordinatku = implode(',', array_unique(explode(',', onereplace($koordinatku, ","))));
	$temptambahkoordinat = explode(",", $newkoordinatku);
	$tambahkoordinat = $temptambahkoordinat[0];
	$fixkoordinat = "
SELECT  KELAS_III, sum(ST_Area(ST_INTERSECTION(ST_GeomFromText('POLYGON((" . $newkoordinatku . " ," . $tambahkoordinat . "))', 0),ogc_geom))) as area FROM rencana_pola_ruang
WHERE ST_Intersects(ST_GeomFromText('POLYGON((" . $newkoordinatku . " ," . $tambahkoordinat . "))', 0), ogc_geom
)=1
group by KELAS_III
";


	$data = explode("|", $no1);
	//echo $data[0]."<br>".$data['1'];
	$id = $data[0];
	$tabel = $data[1];
	?>
	<div id="no-more-tables" class="box-body table-responsive no-padding">
		<?php
		if ($tabel == 'rencana_pola_ruang') {

			echo "<table id='customers'>";
			echo "<th colspan='3'><b>INFORMASI TATA RUANG</b></th>";
			//echo $data[0]."<br>".$data['1'];
			if ($no1 <> "") {

				if ($tabel == 'si_permohonan') {
					echo " <tr>
			<td valign='top'>
			<b>Titik Klik Koordinat</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $lat . " , " . $longitude . "
			</td>
			</tr>";
					$sqlsurvei = "
			SELECT SUM(ST_Area(ogc_geom)) as area FROM si_permohonan where id='" . $id . "'
			";
					//echo $sqlsurvei;
					$result = mysqli_query($link, $sqlsurvei);
					if ($result) {
						while ($row = mysqli_fetch_array($result)) {
							echo " <tr>
			<td valign='top'>
			<b>Luas Area</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['area'] . "
			</td>
			</tr>";
						}
					}
				} else {
					$sql = "select KETERANGAN, KELAS_I, KELAS_II, KELAS_III,DIPERBOLEHKAN, DIPERBOLEHKAN_BERSYARAT, TIDAK_DIPERBOLEHKAN from " . $tabel . " where ID_AUTO='" . $id . "'";
					//echo $sql;
					$result = mysqli_query($link, $sql);
					if ($result) {
						while ($row = mysqli_fetch_array($result)) {
							echo "
			<tr>
			<td valign='top'>
			<b>Koordinat</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $lat . " , " . $longitude . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>Koordinat</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $no3 . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>KELAS I</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['KELAS_I'] . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>KELAS II</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['KELAS_II'] . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>KELAS III</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['KELAS_III'] . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>Keterangan</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['KETERANGAN'] . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>Diperbolehkan</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['DIPERBOLEHKAN'] . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>Diperbolehkan Bersyarat</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['DIPERBOLEHKAN_BERSYARAT'] . "
			</td>
			</tr>
			<tr>
			<td valign='top'>
			<b>Tidak Diperbolehkan</b>
			</td>
			<td valign='top' align='center'>
			:
			</td>
			<td valign='top'>
			" . $row['TIDAK_DIPERBOLEHKAN'] . "
			</td>
			</tr>
			";
						}
					}
				}
				// bukan permohonan
			} else {
				$sql = $fixkoordinat;
				//echo $sql;
				$result = mysqli_query($link, $sql);
				if ($result) {

					echo "
		<tr>
		<td valign='top' colspan='3'>
		Hasil Digitasi Total " . $no3 . "
		</td>
		</tr>
		<tr>
		<td valign='top'>
		<b>No</b>
		</td>
		<td valign='top'>
		<b>Jenis Peruntukan Pola Ruang</b>
		</td>
		<td valign='top'>
		<b>Ukuran</b>
		</td>
		</tr>
		";
					$i = 1;
					while ($row = mysqli_fetch_array($result)) {
						if ($row['area'] <> '') {
							echo "
			
			<tr>
			<td valign='top'>
			" . $i . "
			</td>
			<td valign='top'>
			" . $row['KELAS_III'] . "
			</td>
			<td valign='top'>
			" . $row['area'] . "
			</td>
			</tr>
			";
						}
						$i++;
					}
				}
			}

			echo "<table>";
		} else if ($tabel == '') {
			//echo $fixkoordinat;

			$sql = $fixkoordinat;
			//echo $sql;
			$result = mysqli_query($link, $sql);
			if ($result) {
				echo "<table id='customers'>";
				echo "
		<tr>
		<td valign='top' colspan='3'>
		Hasil Digitasi Total " . $no3 . "
		</td>
		</tr>
		<tr>
		<td valign='top'>
		<b>No</b>
		</td>
		<td valign='top'>
		<b>Jenis Peruntukan Pola Ruang</b>
		</td>
		<td valign='top'>
		<b>Ukuran</b>
		</td>
		</tr>
		";
				$i = 1;
				while ($row = mysqli_fetch_array($result)) {
					if ($row['area'] <> '') {
						echo "
			
			<tr>
			<td valign='top'>
			" . $i . "
			</td>
			<td valign='top'>
			" . $row['KELAS_III'] . "
			</td>
			<td valign='top'>
			" . $row['area'] . "
			</td>
			</tr>
			";
					}
					$i++;
				}
			}



			echo "<table>";
		} else {

			$query = "SHOW COLUMNS FROM " . $tabel . " where Field not like '%ogc_geom%' and Field <> 'ID'  and Field not like 'kodetabel' and Field not like 'tematikku' and Field not like '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%' and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' and Field not like '%deleted%' and Field not like '%ORIG_FID%' and Field not like '%IDSHP%' and Field not like '%ID_AUTO%' ";

			//echo $query;

			$hasil = mysqli_query($link, $query);
			if ($hasil) {
		?>
				<br>
				<?php
				echo "<table id='customers'>";
				echo "<th colspan='3'><b>Data </b></th>";

				while ($data = mysqli_fetch_array($hasil)) {

					echo "<tr>";
					echo "<td valign='top'>";
					if ($data['Field'] == "KODE_FOTO") {
						echo  "FOTO 1";
					} else if ($data['Field'] == "KODE_FOTO1") {
						echo  "FOTO 2";
					} else {
						echo  "<b>" . get_Isi_Field2('aliasfield', 'one_aliasfield', 'nama', $data['Field']) . "</b>";
					}
					echo "</td>";
					echo "<td>";
					echo  " &nbsp; &nbsp; ";
					echo "</td>";
					echo "<td>";
					$sql = "select " . $data['Field'] . " from " . $tabel . " where ID_AUTO='" . $id . "' ";
					$adit = $data['Field'];
					//echo $sql;
					$result = mysqli_query($link, $sql);
					if ($result) {
						while ($row = mysqli_fetch_array($result)) {
							if ($data['Field'] == "KODE_FOTO") {
								$foto = htmlentities($row[$data['Field']], ENT_QUOTES);
								//echo $foto;
							} else if ($data['Field'] == "KODE_FOTO1") {
								$foto = htmlentities($row[$data['Field']], ENT_QUOTES);
								//echo $foto;
							} else if ($data['Field'] == "NAMA_FILE") {
								$foto = htmlentities($row[$data['Field']], ENT_QUOTES);
								//echo $foto;
							} else if ($data['Field'] == "NAMA_FIL_1") {
								$foto = htmlentities($row[$data['Field']], ENT_QUOTES);
								//echo $foto;
							} else if ($data['Field'] == "NAMA_FIL_2") {
								$foto = htmlentities($row[$data['Field']], ENT_QUOTES);
								//echo $foto;
							} else if ($data['Field'] == "NAMA_FIL_3") {
								$foto = htmlentities($row[$data['Field']], ENT_QUOTES);
								//echo $foto;
							} else {
								$data = htmlentities($row[$data['Field']], ENT_QUOTES);
								$foto = "";
							}
						}
					}
					if ($foto <> "") {
						//echo $foto;
						//echo "uploadfiles_".$id."_".$tabel."_".$adit
				?>
						<a class="lightbox" href="#dog" onClick="cek('foto/<?php echo $tabel . "/" . $foto; ?>')"> <img height="100px;" src="foto/<?php echo $tabel . "/" . $foto; ?>" alt="<?php echo $foto; ?>" id="myImg" height="150"> </a>
						<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>
						<?php
					} else {
						if ($data['Field'] == "KODE_FOTO") {
						?>
							<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
							<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>

						<?php
						} else if ($data['Field'] == "KODE_FOTO1") {
						?>
							<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
							<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>

						<?php
						} else if ($data['Field'] == "NAMA_FILE") {
						?>
							<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
							<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>

						<?php
						} else if ($data['Field'] == "NAMA_FIL_1") {
						?>
							<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
							<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>

						<?php
						} else if ($data['Field'] == "NAMA_FIL_2") {
						?>
							<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
							<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>

						<?php
						} else if ($data['Field'] == "NAMA_FIL_3") {
						?>
							<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
							<input type="file" name="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" id="<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_" . $id . "_" . $tabel . "_" . $adit; ?>','<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" accept="image/*" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>

						<?php
						} else {
							//echo $data;

						?>
							<?php
							if (1 == 2) {
							?>
								<input type="text" name="<?php echo $id . "|" . $tabel . "|" . $adit; ?>" id="<?php echo $id . "|" . $tabel . "|" . $adit; ?>" value="<?php echo $data; ?>" style="width:100%;" onChange="gantiisi(this.value,'<?php echo $id . "|" . $tabel . "|" . $adit; ?>')" <?php if ((!urlencode($_SESSION['oneid'])) || (urlencode($_SESSION['oneid']) == "")) { ?> disabled="disabled" <?php } ?>>
							<?php
							}
							?>
							<?php echo $data; ?>
					<?php

						}
					}
					echo "</td>";
					echo "</tr>";
				}
				if ($tabel == 'rencana_pola_ruang') {
					echo "<tr>";
					echo "<td>";
					echo "<b>PENGAJUAN IJIN</b>";
					echo "</td>";
					echo "<td>";
					echo "</td>";
					echo "<td>";
					?>
					<button type="button" class="btn btn-default" style="background-color:#dd4b39;border:none;color:#FFFFFF;font-size:12px;" onClick="klikkuIjin('<?php echo $id; ?>')"><b>Ajukan Ijin</b></button>
		<?php
					echo "</td>";
					echo "</tr>";
				}
				echo "<table>";
			}
		}

		?>
	</div>


</body>

</html>