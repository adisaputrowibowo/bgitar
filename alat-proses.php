
<?php 
include 'koneksi.php';
$idalat = $_POST['idalat'];
$jenisa_name = $_POST['jenisalat'];
$merka_name = $_POST['merkalat'];
$color_name = $_POST['color'];

mysql_query("INSERT INTO alat VALUES('$idalat','$jenisalat','$merkalat','$color')");

header("location:alat.php?pesan=input");
?>
