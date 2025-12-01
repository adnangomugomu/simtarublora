<?php
session_start();
if ($_REQUEST['maukeluar'] == "iya")
{
if(ISSET($_COOKIE['oneid']))
{
include "../library/config.php";
        unset($_COOKIE['oneid']);
		setcookie('oneid', null, -1, '/'); 
        unset($_COOKIE['oneusername']);
		setcookie('oneusername', null, -1, '/'); 
        unset($_COOKIE['onepassword']);
		setcookie('onepassword', null, -1, '/'); 
        unset($_COOKIE['onenama']);
		setcookie('onenama', null, -1, '/'); 
		unset($_COOKIE['onenip']);
		setcookie('onenip', null, -1, '/'); 
        unset($_COOKIE['onedinas']);
		setcookie('onedinas', null, -1, '/'); 
		unset($_COOKIE['onekabkot']);
		setcookie('onekabkot', null, -1, '/'); 
        unset($_COOKIE['onelevel']);
		setcookie('onelevel', null, -1, '/'); 
		unset($_COOKIE['onefoto']);
		setcookie('onefoto', null, -1, '/'); 
		unset($_COOKIE['onebidang']);
		setcookie('onebidang', null, -1, '/'); 
		unset($_COOKIE['onesubbidang']);
		setcookie('onesubbidang', null, -1, '/'); 
		unset($_COOKIE['onepekerjaan']);
		setcookie('onepekerjaan', null, -1, '/'); 
		unset($_COOKIE['oneemail']);
		setcookie('oneemail', null, -1, '/'); 
		unset($_COOKIE['onenpwp']);
		setcookie('onenpwp', null, -1, '/'); 
		


		//*unset session dari master data ehrm tentang jabatan, departemen dll*//
		
		
		
	    //*unset session dari master data ehrm tentang jabatan, departemen dll*//


}
}


unset($_COOKIE['oneid']);
		setcookie('oneid', null, -1, '/'); 
        unset($_COOKIE['oneusername']);
		setcookie('oneusername', null, -1, '/'); 
        unset($_COOKIE['onepassword']);
		setcookie('onepassword', null, -1, '/'); 
        unset($_COOKIE['onenama']);
		setcookie('onenama', null, -1, '/'); 
		unset($_COOKIE['onenip']);
		setcookie('onenip', null, -1, '/'); 
        unset($_COOKIE['onedinas']);
		setcookie('onedinas', null, -1, '/'); 
		unset($_COOKIE['onekabkot']);
		setcookie('onekabkot', null, -1, '/'); 
        unset($_COOKIE['onelevel']);
		setcookie('onelevel', null, -1, '/'); 
		unset($_COOKIE['onefoto']);
		setcookie('onefoto', null, -1, '/'); 
		unset($_COOKIE['onebidang']);
		setcookie('onebidang', null, -1, '/'); 
		unset($_COOKIE['onesubbidang']);
		setcookie('onesubbidang', null, -1, '/'); 
		unset($_COOKIE['onepekerjaan']);
		setcookie('onepekerjaan', null, -1, '/'); 
		unset($_COOKIE['oneemail']);
		setcookie('oneemail', null, -1, '/'); 
		unset($_COOKIE['onenpwp']);
		setcookie('onenpwp', null, -1, '/'); 

session_destroy();

foreach ($_COOKIE as $k=>$v)
{
	if (is_array($_COOKIE[$k]))
	{
		foreach ($_COOKIE[$k] as $key=>$val)
		{
			setcookie($k.'['.$key.']',"", time()+3600*24*(-100));
		}
	}
	setcookie($k,"", time()+3600*24*(-100));
}


header("location:simtaru-blora");

?>