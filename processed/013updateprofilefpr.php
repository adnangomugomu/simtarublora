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
$namaprofile=$_POST['namaprofile'];
$pekerjaanprofile=$_POST['pekerjaanprofile'];
$emailprofile=$_POST['emailprofile'];
$npwpprofile=$_POST['npwpprofile'];
$nipprofile=$_POST['nipprofile'];



if ($usernameprofile<>$usernameprofiletmp)
{
	$sqlcek="select username from si_userfpr where username='".mysqli_real_escape_string($link,$usernameprofile)."' and deleted='0'";
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

	$sqlprofile="UPDATE si_userfpr SET
	username='".mysqli_real_escape_string($link,$usernameprofile)."',password='".mysqli_real_escape_string($link,$passwordprofile)."'
	,nama='".mysqli_real_escape_string($link,$namaprofile)."'
	, pekerjaan='".mysqli_real_escape_string($link,$pekerjaanprofile)."'
	,email='".mysqli_real_escape_string($link,$emailprofile)."'
	,npwp='".mysqli_real_escape_string($link,$npwpprofile)."'
	,NIP='".mysqli_real_escape_string($link,$nipprofile)."'
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

//echo $sqlprofile;
  
?>