<?php 
require_once("auth.php"); 
require_once("koneksi.php");
include ("menubar.php");

if (isset($_POST['pesan'])) {
if (!isset($_SESSION['akun_id'], $_SESSION['akun_username'])) {
        Helper::redirect(APP_URL . 'login.php');
    }

    $forum = Db::query('
        SELECT * FROM `forum` WHERE `iduser`, `username` = ' . $_SESSION['akun_id'], $_SESSION['akun_username'] );
}
?>

<h1 align="center">Forum Konsultasi</h1>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
				<form action="services1.php" method="post">
					
					<input type="hidden" name="iduser" value="<?php echo $_SESSION['user']['iduser']; ?>">
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

			
</div>	


</body>
</html>