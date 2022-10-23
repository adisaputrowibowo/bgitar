<?php
include("koneksi.php");
$iduser = $_POST['iduser'];
$idforum = $_POST['idforum'];
$subject = $_POST['subject'];
$deskripsi = $_POST['deskripsi'];
$tanggal = date("Y-m-d H:i:s");

mysql_query("INSERT INTO forum VALUES('$idforum','$iduser','$subject','$deskripsi','$tanggal')");

header("location:forum.php?pesan=input");		
?>
