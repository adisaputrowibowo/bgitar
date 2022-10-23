<?php
include("koneksi.php");
$iduser = $_POST['iduser'];
$idservice = $_POST['idservice'];
$deskripsi = $_POST['deskripsi'];
$tanggal = date("Y-m-d H:i:s");

mysql_query("INSERT INTO pesanan_service VALUES('$idservice','$iduser','$deskripsi','$tanggal')");

header("location:services.php?pesan=input");		
?>
