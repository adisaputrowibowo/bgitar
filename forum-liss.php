<?php
include ('koneksi.php');

if (isset($_POST['pesan'])) {
    if (!isset($_SESSION['akun_id'], $_SESSION['akun_name'])) {
        Helper::redirect(APP_URL . 'login.php');
    }

    $forum = Db::query('
        SELECT * FROM `forum` WHERE `iduser` = ' . $_SESSION['akun_id'],$_SESSION['akun_name'] );
}
?>
<h3>Data user</h3>
	<div class="col-md-12">
        <div class="card">
			<div class="card-body">
			<?php 
			include "koneksi.php";
			$query_mysql = mysql_query("SELECT users.username , forum.subject , forum.deskripsi FROM users INNER JOIN forum ON users.iduser = forum.iduser  ")or die(mysql_error());
			
			while($data = mysql_fetch_array($query_mysql)){
			?>
				
					<div class="form-group">
					<a class="text-danger"><?php echo $data['username']; ?></a> <br>
					<h5>Subject &raquo;: <a class="text-danger"><?php echo $data['subject']; ?></a> <br>
					Deskripsi : <a class="text-danger"><?php echo $data['deskripsi']; ?></a> <br>
					</h5><br>
					<p><a href="hapus.php?id=<?php echo $data['idforum']; ?>" ><span class="glyphicon glyphicon-shopping-cart"></span><strong> hapus </strong></a></p>
					</div>
				
			<?php } ?>

		</div>
		</div>
		</div>