<?php 
include("koneksi.php");
$idservice = $_POST['idservice'];
$iduser = $_POST['iduser'];
$name = $_POST['name'];
$jenisa_name = $_POST['jenisalat'];
$merka_name = $_POST['merkalat'];
$color_name = $_POST['color'];
$jenis_service = $_POST['jenis_service'];
$image = $_POST['image'];
$deskripsi = $_POST['deskripsi'];
$tanggal = date("Y-m-d H:i:s");

mysql_query("INSERT INTO pesanan_service VALUES('$idservice','$iduser','$name','$jenisa_name','$merka_name','$color_name','$jenis_service','$image','$deskripsi')");

header("location:status_service.php?pesan=input");

?>