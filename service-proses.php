
<?php 
include 'koneksi.php';
$idservice = $_POST['idservice'];
$iduser = $_POST['iduser'];
$name = $_POST['name'];
$jenisa_name = $_POST['jenisalat'];
$merka_name = $_POST['merkalat'];
$color_name = $_POST['color'];
$image = $_POST['image'];
$jenis_service = $_POST['jenis_service'];
$deskripsi = $_POST['deskripsi'];


mysql_query("INSERT INTO pesanan_service VALUES('$idservice','$iduser','$name','$jenisalat','$merkalat','$color','$image','$jenis_service','$deskripsi')");

header("location:service.php?pesan=input");
?>
