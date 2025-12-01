<?php
  session_start();
  include 'library/config.php';
  $userku=$_POST['username'];
  $passku=$_POST['password'];
  $query = "SELECT *,count(id) as nomor FROM one_user WHERE user_name='".$userku."' and user_password='".encrypt($passku)."' and deleted='0' group by id";
  //echo $query;
  $result = mysqli_query ($link,$query);
  while ($data = mysqli_fetch_array ($result))
  {
    
    $user_id = $data['id'];
    $user_name = $data['user_name'];
    $user_password = $data['user_password'];
	$user_fullname = $data['user_fullname'];
	$user_dinas = $data['user_dinas'];
    $user_level = $data['user_level'];
	$user_foto = $data['user_foto'];
    $nomor = $data['nomor'];
  }
	
	if ($nomor=="1")
	{
		
        $_SESSION['oneid'] = $user_id;
        $_SESSION['oneusername'] = $user_name;
        $_SESSION['onepassword'] = $user_password;
        $_SESSION['onenama'] = $user_fullname;
        $_SESSION['onedinas'] = $user_dinas;
        $_SESSION['onelevel'] = $user_level;
		$_SESSION['onefoto'] = $user_foto;
		//*session dari master data ehrm tentang jabatan, departemen dll*//	
		
		
	    //*session dari master data ehrm tentang jabatan, departemen dll*//

		header ('Location: backoffice/');
	} 
  	else 
	{
  		header ('Location: ./?func=incorrect');
    }
  
  
?>