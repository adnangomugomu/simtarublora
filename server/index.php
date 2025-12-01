<?php
include '../library/config.php';
/**
 * Created by IntelliJ IDEA.
 * User: remi
 * Date: 17/01/15
 * Time: 11:41
 */
$str=$_GET['kode']; 
$tempstr=explode("|",$str);
$kode=$tempstr[0];
$tabel=$tempstr[1];
$fieldku=$tempstr[2];
 
if (isset($_FILES['uploaded_file'])) {
    // Example:
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], "../foto/".$tabel."/". $_FILES['uploaded_file']['name'])){
        echo $_FILES['uploaded_file']['name']. " uploaded ...";
		$sql="update ".$tabel." set ".$fieldku."='".$_FILES['uploaded_file']['name']."' where ID='".$kode."' ";
		$result=mysqli_query($link,$sql);
    } else {
        echo $_FILES['uploaded_file']['name']. " NOT uploaded ...";
    }

    exit;
} else {
    echo "no";
}