<?php
  session_start();
  include '../library/config.php';
  check_injection();
  
  $query = "SELECT *,count(id_user) as nomor FROM si_user WHERE username='".mysqli_real_escape_string($link,$_POST['username'])."' and password='".encrypt(mysqli_real_escape_string($link,$_POST['password']))."' and deleted='0' group by id_user";
  //echo $query;
  $result = mysqli_query ($link,$query);
  while ($data = mysqli_fetch_array ($result))
  {
    
    $user_id = $data['id_user'];
    $user_name = $data['username'];
    $user_password = $data['password'];
	$user_fullname = $data['nama'];
	$user_nip = $data['NIP'];
	$user_dinas = $data['id_instansi'];
    $user_level = $data['id_user_level'];
	$user_foto = $data['gambar'];
	$user_bidang = $data['bidang'];
    $user_subbidang = $data['subbidang'];
    $nomor = $data['nomor'];
  }
	
	if ($nomor=="1")
	{
		

		
		setcookie('oneid', $user_id, time() + (86400 * 30), "/");
		setcookie('oneusername', $user_name, time() + (86400 * 30), "/");
		setcookie('onepassword', $user_password, time() + (86400 * 30), "/");
		setcookie('onenama', $user_fullname, time() + (86400 * 30), "/");
		setcookie('onenip', $user_nip, time() + (86400 * 30), "/");
		setcookie('onedinas', $user_dinas, time() + (86400 * 30), "/");
		setcookie('onekabkot', get_Isi_Field2('kabkot','si_kabkot','kode_kabkot',get_Isi_Field2('id_kota','si_instansi','id_instansi',$user_dinas)), time() + (86400 * 30), "/");
		setcookie('onelevel', $user_level, time() + (86400 * 30), "/");
		setcookie('onefoto', $user_foto, time() + (86400 * 30), "/");
		setcookie('onebidang', $user_bidang, time() + (86400 * 30), "/");
		setcookie('onesubbidang', $user_subbidang, time() + (86400 * 30), "/");
		setcookie('onepekerjaan', $user_pekerjaan, time() + (86400 * 30), "/");
		setcookie('oneemail', $user_email, time() + (86400 * 30), "/");
		setcookie('onenpwp', $user_npwp, time() + (86400 * 30), "/");
		//*session dari master data ehrm tentang jabatan, departemen dll*//	
		
		
	    //*session dari master data ehrm tentang jabatan, departemen dll*//

		header ('Location: simtaru-dashboard');
	} 
  	else 
	{


		  $query = "SELECT *,count(id_user) as nomor FROM si_register WHERE username='".mysqli_real_escape_string($link,$_POST['username'])."' 
		  and password='".encrypt(mysqli_real_escape_string($link,$_POST['password']))."' and deleted='0' group by id_user";
		  //echo $query;
		  $result = mysqli_query ($link,$query);
		  while ($data = mysqli_fetch_array ($result))
		  {
			
			$user_id = $data['id_user'];
			$user_name = $data['username'];
			$user_password = $data['password'];
			$user_fullname = $data['nama'];
			$user_nip = $data['NIP'];
			$user_dinas = $data['id_instansi'];
			$user_level = '0';
			$user_foto = $data['gambar'];
			$user_bidang = $data['hp'];
			$user_subbidang = $data['alamat'];
			$user_pekerjaan = $data['pekerjaan'];
			$user_email = $data['email'];
			$user_npwp = $data['npwp'];
			$nomor = $data['nomor'];
		  }
			
			if ($nomor=="1")
			{
				
				
				setcookie('oneid', $user_id, time() + (86400 * 30), "/");
				setcookie('oneusername', $user_name, time() + (86400 * 30), "/");
				setcookie('onepassword', $user_password, time() + (86400 * 30), "/");
				setcookie('onenama', $user_fullname, time() + (86400 * 30), "/");
				setcookie('onenip', $user_nip, time() + (86400 * 30), "/");
				setcookie('onedinas', $user_dinas, time() + (86400 * 30), "/");
				setcookie('onekabkot', get_Isi_Field2('kabkot','si_kabkot','kode_kabkot',get_Isi_Field2('id_kota','si_instansi','id_instansi',$user_dinas)), time() + (86400 * 30), "/");
				setcookie('onelevel', $user_level, time() + (86400 * 30), "/");
				setcookie('onefoto', $user_foto, time() + (86400 * 30), "/");
				setcookie('onebidang', $user_bidang, time() + (86400 * 30), "/");
				setcookie('onesubbidang', $user_subbidang, time() + (86400 * 30), "/");
				setcookie('onepekerjaan', $user_pekerjaan, time() + (86400 * 30), "/");
				setcookie('oneemail', $user_email, time() + (86400 * 30), "/");
				setcookie('onenpwp', $user_npwp, time() + (86400 * 30), "/");
				
				//*session dari master data ehrm tentang jabatan, departemen dll*//	
				
				
				//*session dari master data ehrm tentang jabatan, departemen dll*//
		
				header ('Location: simtaru-d4shumum');
			} 
			else 
			{
				
				  $query = "SELECT *,count(id_user) as nomor FROM si_userfpr WHERE username='".mysqli_real_escape_string($link,$_POST['username'])."' 
				  and password='".encrypt(mysqli_real_escape_string($link,$_POST['password']))."' and deleted='0' group by id_user";
				  //echo $query;
				  $result = mysqli_query ($link,$query);
				  while ($data = mysqli_fetch_array ($result))
				  {
					
					$user_id = $data['id_user'];
					$user_name = $data['username'];
					$user_password = $data['password'];
					$user_fullname = $data['nama'];
					$user_nip = $data['NIP'];
					$user_dinas = $data['id_instansi'];
					$user_level = '0';
					$user_foto = $data['gambar'];
					$user_bidang = $data['hp'];
					$user_subbidang = $data['alamat'];
					$user_pekerjaan = $data['pekerjaan'];
					$user_email = $data['email'];
					$user_npwp = $data['npwp'];
					$nomor = $data['nomor'];
				  }
				  
				    if ($nomor=="1")
					{
						
						
						setcookie('oneid', $user_id, time() + (86400 * 30), "/");
						setcookie('oneusername', $user_name, time() + (86400 * 30), "/");
						setcookie('onepassword', $user_password, time() + (86400 * 30), "/");
						setcookie('onenama', $user_fullname, time() + (86400 * 30), "/");
						setcookie('onenip', $user_nip, time() + (86400 * 30), "/");
						setcookie('onedinas', $user_dinas, time() + (86400 * 30), "/");
						setcookie('onekabkot', get_Isi_Field2('kabkot','si_kabkot','kode_kabkot',get_Isi_Field2('id_kota','si_instansi','id_instansi',$user_dinas)), time() + (86400 * 30), "/");
						setcookie('onelevel', $user_level, time() + (86400 * 30), "/");
						setcookie('onefoto', $user_foto, time() + (86400 * 30), "/");
						setcookie('onebidang', $user_bidang, time() + (86400 * 30), "/");
						setcookie('onesubbidang', $user_subbidang, time() + (86400 * 30), "/");
						setcookie('onepekerjaan', $user_pekerjaan, time() + (86400 * 30), "/");
						setcookie('oneemail', $user_email, time() + (86400 * 30), "/");
						setcookie('onenpwp', $user_npwp, time() + (86400 * 30), "/");
						
						//*session dari master data ehrm tentang jabatan, departemen dll*//	
						
						
						//*session dari master data ehrm tentang jabatan, departemen dll*//
				
						header ('Location: simtaru-d4shfpr');
					}
					else
					{
						header ('Location: simtaru-blora?func=incorrect');
					}
				  
				
				
			}



    }
  
  
?>