<html>
<head>
</head>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size:11px;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 3px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
	border-color: #4CAF50;
}
</style>
<body>
<?php
ini_set("memory_limit",-1);
require_once 'library/config.php';
$no1=$_GET['no1'];
$data=explode("|",$no1);
//echo $data[0]."<br>".$data['1'];
$id=$data[0];
$tabel=$data[1];

$kode_zonasi=get_Isi_Field1('KODE_ZONASI','rdtr','ID',$id);

$query="SHOW COLUMNS FROM ".$tabel." where Field not like '%ogc_geom%' and Field <> 'ID'  and Field not like 'kode' and Field not like '%simbol%' and Field not like '%fillku%' and Field not like '%tebalfillku%' and Field not like '%garisku%' and Field not like '%tebalgarisku%' and Field not like '%tipe%' and Field not like '%labelku%' and Field not like '%teballine%' and Field not like '%deleted%' and Field not like '%ORIG_FID%' and Field not like '%IDSHP%' and Field not like '%KODE_ZONASI%' ";

//echo $query;

$hasil=mysqli_query($link,$query);
if ($hasil)
{
	?>
	<br>
	<div style="height:280px; overflow:scroll;position:fixed;top:20px;width:390px;">	
	<?php 
	echo "<table id='customers'>";
	echo "<th colspan='3'><b>Data</b></th>";
	while ($data=mysqli_fetch_array($hasil))
	{
		
		echo "<tr>";
		echo "<td valign='top'>";
		if ($data['Field']=="KODE_FOTO")
		{
			echo  "FOTO LAIN 1";
		}
		else if ($data['Field']=="KODE_FOTO1")
		{
			echo  "FOTO LAIN 2";
		}
		else
		{
			echo  "<b>".get_Isi_Field2('aliasfield','one_aliasfield','nama',$data['Field'])."</b>";
		}
		echo "</td>";
		echo "<td>";
		echo  " &nbsp; &nbsp; ";
		echo "</td>";
		echo "<td>";
		$sql="select ".$data['Field']." from ".$tabel." where ID='".$id."' ";
		$adit=$data['Field'];
		//echo $sql;
		$result=mysqli_query($link,$sql);
		if ($result)
		{
			while ($row=mysqli_fetch_array($result))
			{
				if($data['Field']=="KODE_FOTO")
				{
					$foto=htmlentities($row[$data['Field']],ENT_QUOTES);
					//echo $foto;
				}
				else if($data['Field']=="KODE_FOTO1")
				{
					$foto=htmlentities($row[$data['Field']],ENT_QUOTES);
					//echo $foto;
				}
				else if($data['Field']=="NAMA_FILE")
				{
					$foto=htmlentities($row[$data['Field']],ENT_QUOTES);
					//echo $foto;
				}
				else if($data['Field']=="NAMA_FIL_1")
				{
					$foto=htmlentities($row[$data['Field']],ENT_QUOTES);
					//echo $foto;
				}
				else if($data['Field']=="NAMA_FIL_2")
				{
					$foto=htmlentities($row[$data['Field']],ENT_QUOTES);
					//echo $foto;
				}
				else if($data['Field']=="NAMA_FIL_3")
				{
					$foto=htmlentities($row[$data['Field']],ENT_QUOTES);
					//echo $foto;
				}
				else
				{
				$data=htmlentities($row[$data['Field']],ENT_QUOTES);
				$foto="";
				}
			}
		}
		if ($foto<>"")
		{
		//echo $foto;
		//echo "uploadfiles_".$id."_".$tabel."_".$adit
		?>
			<a class="lightbox" href="#dog" onClick="cek('foto/<?php echo $tabel."/".$foto; ?>')"> <img height="100px;" src="foto/<?php echo $tabel."/".$foto; ?>" alt="<?php echo $foto; ?>" id="myImg" height="150"> </a>
			<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
<?php 
		}
		else
		{
			if($data['Field']=="KODE_FOTO")
			{
				?>
				<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
				<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
				
				<?php 
			}
			else if($data['Field']=="KODE_FOTO1")
			{
				?>
				<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
				<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
				
				<?php 
			}
			else if($data['Field']=="NAMA_FILE")
			{
				?>
				<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
				<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
				
				<?php 
			}
			else if($data['Field']=="NAMA_FIL_1")
			{
				?>
				<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
				<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
				
				<?php 
			}
			else if($data['Field']=="NAMA_FIL_2")
			{
				?>
				<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
				<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
				
				<?php 
			}
			else if($data['Field']=="NAMA_FIL_3")
			{
				?>
				<a class="lightbox" href="#dog" onClick="cek('foto/no_foto.jpg')"> <img height="100px;" src="foto/no_foto.jpg" alt="<?php echo $foto; ?>" id="myImg" height="100px"> </a>
				<input type="file" name="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" id="<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>" value="<?php echo $adit; ?>" onChange="gantifoto('<?php echo "uploadfiles_".$id."_".$tabel."_".$adit; ?>','<?php echo $id."|".$tabel."|".$adit; ?>')" accept="image/*" >
				
				<?php 
			}
			else
			{
				//echo $data;
				if($adit=="PERNAH_MEN")
				{
				?>
					<select name="<?php echo $id."|".$tabel."|".$adit; ?>" id="<?php echo $id."|".$tabel."|".$adit; ?>" style="width:100%" onChange="gantiisi(this.value,'<?php echo $id."|".$tabel."|".$adit; ?>')" >
					<option value="BELUM PERNAH" <?php if ($data=="BELUM PERNAH") { ?> selected="selected" <?php } ?> >BELUM PERNAH</option>
					<option value="PERNAH" <?php if ($data=="PERNAH") { ?> selected="selected" <?php } ?> >PERNAH</option>
					</select>
				<?php 
				}
				else
				{
				
				?>
				<input type="text" name="<?php echo $id."|".$tabel."|".$adit; ?>" id="<?php echo $id."|".$tabel."|".$adit; ?>" value="<?php echo $data; ?>" style="width:100%;" onChange="gantiisi(this.value,'<?php echo $id."|".$tabel."|".$adit; ?>')" >
				<?php 
				}
			}
		}
		echo "</td>";
		echo "</tr>";
	
	}
	
	if ($tabel=='rdtr')
	{
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

?>
	</div>
	
	
</body>
</html>
