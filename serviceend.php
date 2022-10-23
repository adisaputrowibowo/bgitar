<?php
require_once("auth.php"); 
require_once("koneksi.php");
include ("menubar.php");
?>
<script type="text/javascript">
$(document).ready(function(){
    $('#jenisalat').on('change',function(){
        var jenisalatID = $(this).val();
        if(jenisalatID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'jenisa_id='+jenisalatID,
                success:function(html){
                    $('#merkalat').html(html);
                    $('#color').html('<option value="">Select Merk </option>'); 
                }
            }); 
        }else{
            $('#merkalat').html('<option value="">Select Merk </option>');
            $('#color').html('<option value="">Select Color </option>'); 
        }
    });
    
    $('#merkalat').on('change',function(){
        var merkalatID = $(this).val();
        if(merkalatID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'merka_id='+merkalatID,
                success:function(html){
                    $('#color').html(html);
                }
            }); 
        }else{
            $('#color').html('<option value="">Select Merk first</option>'); 
        }
    });
});
</script>
<?php
if (isset($_POST['pesan'])) {
if (!isset($_SESSION['akun_id'])) {
        Helper::redirect(APP_URL . 'login.php');
    }

    $forum = Db::query('
        SELECT * FROM `forum` WHERE `iduser`= ' . $_SESSION['akun_id'] );
}
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="home.php">Home</a>

        <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
        <p>Sudah punya akun? <a href="forum.php">Login di sini</a></p>

        <form action="service-proses.php" method="POST">
					<input type="hidden" name="iduser" value="<?php echo $_SESSION['user']['iduser']; ?>">
					<input class="form-control" type="hidden" name="idservice"/>
					<div class="form-group">
						<label for="name">Nama Lengkap</label>
						<input class="form-control" type="text" name="name" placeholder="Nama kamu" />
					</div>
					
					<?php
					//Include database configuration file
					include('dbconfig.php');
					
					//Get all jenis data
					$query = $db->query("SELECT * FROM jenisalat WHERE status = 1 ORDER BY jenisa_name ASC");
					
					//Count total number of rows
					$rowCount = $query->num_rows;
					?>
					<label for="jenisalatmusik">Jenis Alat Musik</label>
					<select class="form-control" name="jenisalat" id="jenisalat" >
						<option value="">Select Jenis</option>
						<?php
						if($rowCount > 0){
							while($row = $query->fetch_assoc()){ 
								echo '<option value="'.$row['jenisa_id'].'">'.$row['jenisa_name'].'</option>';
							}
						}else{
							echo '<option value="">Jenis not available</option>';
						}
						?>
					</select><br>
					<label for="jenisalatmusik">Merek Alat Musik</label>
					<select class="form-control" name="merkalat" id="merkalat">
						<option value="">Select Merk</option>
					</select><br>
					<label for="jenisalatmusik">Warna Alat Musik</label>
					<select class="form-control" name="color" id="color">
						<option value="">Select Warna</option>
					</select><br>
					<div class="form-group">
						<input type="file" class="form-group" name="image" id="image"/>
					</div>
					
					<label for="jenisservice">Jenis Service</label><br>
					<label class="radio-inline">
						<input type="radio" name="jenis_service" id="inlineRadio1" value="Service"> Service
					</label>
					<label class="radio-inline">
						<input type="radio" name="jenis_service" id="inlineRadio2" value="Costum"> Costum
					</label>
					
					<div class="form-group">
							<label for="deskripsi">Deskripsi Masalah</label><br>
							<textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi masalah alat musik"></textarea>
					</div>
					
					<br><br>
					<input type="submit" class="btn btn-dark btn-block" name="kirim" value="Proses" /><br><br>
					<a href="status_service.php">kirim</a>
		</font>
		</div>
		<?php 
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}
	}
	?>
		
		<div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>
	<table border="1" class="table">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Jenis Alat</th>
			<th>Merk Alat</th>
			<th>Warna</th>
			<th>Jenis Service</th>
			<th>Gambar</th>
			<th>Deskripsi</th>		
		</tr>
		<?php 
		include "koneksi.php";
		$query_mysql = mysql_query("SELECT * FROM pesanan_service")or die(mysql_error());
		$nomor = 1;
		while($data = mysql_fetch_assoc($query_mysql)){
		?>
		<tr>
			<td><?php echo $nomor++; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['jenisa_name']; ?></td>
			<td><?php echo $data['merka_name']; ?></td>
			<td><?php echo $data['color_name']; ?></td>
			<td><?php echo $data['jenis_service']; ?></td>
			<td><img src="img/<?php echo $data['image']; ?>" width="50"></td>
			<td><?php echo $data['deskripsi']; ?></td>
		</tr>
		<?php } ?>
		</table>
        </form>
            
        </div>

        

    </div>
</div>
	

</body>
</html>