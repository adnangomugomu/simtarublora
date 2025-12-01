<?php
//setting header to json
session_start();
date_default_timezone_set("Asia/Jakarta");
$tanggalsekarang = date('Y-m-d');
include '../library/config.php';



$sql = "INSERT INTO masukan(id, nama, ktp, nomorhp, isi, tanggal,  deleted) VALUES 
(null
,'".$_POST['namapemohonaduan']."'
,'".$_POST['noidentitaspemohonaduan']."'
,'".$_POST['notelpidentitaspemohonaduan']."'
,'".$_POST['alamatpemohonaduan']."'
,SYSDATE()
,'0'
)
";

$result=mysqli_query($link,$sql);
//echo $sql;
//$data['sql']=$sql; 
//echo json_encode($data);
exit;

?>