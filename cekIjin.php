<?php
ini_set("memory_limit",-1);
require_once 'library/config.php';
$no1=$_GET['no1'];
$no2=$_GET['no2'];

	$sqlcek="select a.diterima from one_master_matrik a where a.zonasi='".$no1."' and a.peruntukkan='".$no2."' ";
	$resultcek=mysqli_query($link,$sqlcek);
	$rowcount=mysqli_num_rows($resultcek);
	if ($rowcount==0)
	{
	?>
	<select id="hasilajuan" class="form-control select2" required style="width:100%;">
	<option value="">Belum Ada Data</option>
	</select>
	<?php
	}
	else
	{
	if ($resultcek)
	{
		while ($rowcek=mysqli_fetch_array($resultcek))
		{
			$diterima=$rowcek['diterima'];
			//echo $diterima;
			$sqlcek1="select a.id,a.nama from one_master_diterima a where a.id='".$diterima."'  ";
			$resultcek1=mysqli_query($link,$sqlcek1);
			if ($rowcount>0)
			{
				if ($resultcek1)
				{
				while ($rowcek1=mysqli_fetch_array($resultcek1))
				{
				?>
				<select id="hasilajuan" class="form-control select2" required style="width:100%;">
				<option value="<?php echo $rowcek1['id']; ?>"><?php echo $rowcek1['nama']; ?></option>
				</select>
				<?php
				}
				}
			}
			else
			{
				?>
				<select id="hasilajuan" class="form-control select2" required style="width:100%;">
				<option value="">Belum Ada Data</option>
				</select>
				<?php
			}
		}
	}
	
	}


?>
					