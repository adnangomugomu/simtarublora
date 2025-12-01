<?php
session_start();
if ($_REQUEST['maukeluar'] == "iya")
{
if(ISSET($_SESSION['oneid']))
{
include "../library/config.php";
        UNSET($_SESSION['oneid']);
        UNSET($_SESSION['oneusername']);
        UNSET($_SESSION['onepassword']);
        UNSET($_SESSION['onenama']);
        UNSET($_SESSION['onedinas']);
        UNSET($_SESSION['onelevel']);
		UNSET($_SESSION['onefoto']);
		

		//*unset session dari master data ehrm tentang jabatan, departemen dll*//
		
		
		
	    //*unset session dari master data ehrm tentang jabatan, departemen dll*//


}
}
session_destroy();
header("location:../");

?>