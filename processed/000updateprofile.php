<?php
error_reporting(0);
session_start();
include '../library/config.php';
check_injection();
check_login();

$id_userprofile=$_POST['id_userprofile'];
$usernameprofile=$_POST['usernameprofile'];
$usernameprofiletmp=$_POST['usernameprofiletmp'];
$passwordprofile=encrypt($_POST['passwordprofile']);
$id_instansiprofile=$_POST['id_instansiprofile'];
$namaprofile=$_POST['namaprofile'];
$nipprofile=$_POST['nipprofile'];
$alamatprofile=$_POST['alamatprofile'];
$teleponprofile=$_POST['teleponprofile'];
$hpprofile=$_POST['hpprofile'];
$emailprofile=$_POST['emailprofile'];
$id_user_levelprofile=$_POST['id_user_levelprofile'];

if ($usernameprofile<>$usernameprofiletmp)
{
	$sqlcek="select username from si_user where username='".mysqli_real_escape_string($link,$usernameprofile)."' and deleted='0'";
	$resultsqlcek=mysqli_query($link,$sqlcek);
	$rowcountcek=mysqli_num_rows($resultsqlcek);
	if ($rowcountcek<>0)
	{
		//header ('Location: ../?ci=falldown');
		?>
		<script>
		//alert("");
		window.location='../?ci=falldown';
		</script>
		<?php
		exit;
	}
}

if ($_FILES['gambarprofile']['name'])
{
	mt_srand (time ());
    $rand = mt_rand (100000, 999999);
    $newfilename = $rand . '_' . $_FILES['gambarprofile']['name'];
    $attachdir = '../../images/';  

    copy ($_FILES['gambarprofile']['tmp_name'], $attachdir . $newfilename);
    $gambar = $newfilename;
	$sqlprofile="UPDATE si_user SET
	username='".mysqli_real_escape_string($link,$usernameprofile)."',password='".mysqli_real_escape_string($link,$passwordprofile)."'
	,nama='".mysqli_real_escape_string($link,$namaprofile)."'
	,NIP='".mysqli_real_escape_string($link,$nipprofile)."',alamat='".mysqli_real_escape_string($link,$alamatprofile)."'
	,telepon='".mysqli_real_escape_string($link,$teleponprofile)."',hp='".mysqli_real_escape_string($link,$hpprofile)."'
	,email='".mysqli_real_escape_string($link,$emailprofile)."',gambar='".mysqli_real_escape_string($link,$gambar)."'
	, id_instansi='".mysqli_real_escape_string($link,$id_instansiprofile)."'
	WHERE id_user='".mysqli_real_escape_string($link,$id_userprofile)."'";
	
	$resultprofile=mysqli_query($link,$sqlprofile);
	//header ('Location: logoutprofile.php?maukeluar=iyes');
	?>
	<script>
	//alert("");
	window.location='simtaru-logoutblora?maukeluar=iya';
	</script>
	<?php
	exit;
}
else
{
	$sqlprofile="UPDATE si_user SET
	username='".mysqli_real_escape_string($link,$usernameprofile)."',password='".mysqli_real_escape_string($link,$passwordprofile)."'
	,nama='".mysqli_real_escape_string($link,$namaprofile)."'
	,NIP='".mysqli_real_escape_string($link,$nipprofile)."',alamat='".mysqli_real_escape_string($link,$alamatprofile)."'
	,telepon='".mysqli_real_escape_string($link,$teleponprofile)."',hp='".mysqli_real_escape_string($link,$hpprofile)."'
	,email='".mysqli_real_escape_string($link,$emailprofile)."'
	, id_instansi='".mysqli_real_escape_string($link,$id_instansiprofile)."'
	 WHERE id_user='".mysqli_real_escape_string($link,$id_userprofile)."'";
	
	
	$resultprofile=mysqli_query($link,$sqlprofile);
	//header ('Location: logoutprofile.php?maukeluar=iyes');
	?>
	<script>
	//alert("");
	window.location='simtaru-logoutblora?maukeluar=iya';
	</script>
	<?php
	exit;
}

//echo $sqlprofile;
  
?>