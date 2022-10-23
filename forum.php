<?php 
require_once("auth.php"); 
require_once("koneksi.php");
include ("menubar.php");

if (isset($_POST['pesan'])) {
    if (!isset($_SESSION['akun_id'])) {
        Helper::redirect(APP_URL . 'login.php');
    }

    $forum = Db::query('
        SELECT * FROM `forum` WHERE `iduser` = ' . $_SESSION['akun_id'] );
}
?>

<h1 align="center">Forum Konsultasi</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
				<form action="forum-proses.php" method="post">
					<img class="img img-responsive rounded-circle mb-2" width="25" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
					| <?php echo  $_SESSION["user"]["nameplg"] ?>  
					<hr>
					<input type="hidden" name="iduser" value="<?php echo $_SESSION['user']['iduser']; ?>">
					
                    <div class="form-group">
						<label for="subject">Subject :</label>
						<input class="form-control" type="text" name="subject" placeholder="Subject" />
					</div>
					<div class="form-group">
						<label for="deskripsi">Pertanyaan :</label>
						<textarea class="form-control" type="text" name="deskripsi" placeholder="Pertanyaan" /></textarea>
					</div>
					<input type="submit" class="btn btn-dark btn-block" name="simpan" value="simpan" />				
                    <p></p>
				</form>
                </div>
            </div>
        </div>
	</div>

	<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
	
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
		
		<?php
		if(isset ($_GET['id']) ){
        include ("koneksi.php");
        $id = $_GET['id'];
        $cari = "SELECT * FROM forum WHERE idforum='$id'";
        $tampil = mysql_query($cari);
        $nomor = 0;
        while($row = mysql_fetch_array($tampil)){
            $iduser = stripslashes($row['iduser']);
            $username = stripslashes($row['username']);
            $subject = stripslashes($row['subject']);
            $deskripsi = stripslashes($row['deskripsi']);
		} ?>
			<?php echo $data['idforum']; ?>
			<?php echo $data['subject']; ?>
			<?php echo $data['deskripsi']; ?>
			
		<?php } ?>	
            
</div>	
</body>
</html>