<?php 
require_once("auth.php"); 
require_once("koneksi.php");
include ("menubar_status.php");

if(isset($_POST['kirim'])){

$idservice = $_POST['idservice'];
$nama = $_POST['nama'];
$jenisa_name = $_POST['jenisalat'];
$merka_name = $_POST['merkalat'];
$color_name = $_POST['color'];
$jenis_service = $_POST['jenis_service'];
$image = $_POST['image'];
$deskripsi = $_POST['deskripsi'];


mysql_query("INSERT INTO pesanan_service VALUES('$idservice','$nama','$jenisa_name','$merka_name','$color_name','$jenis_service','$image','$deskripsi')");

header("location:service-user.php");
}
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


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="home.php">Home</a>

		<table>
			<tr><td col="2"><h3>Status Service Alat Musik</h3></td>
			</tr>
			<tr><td></td><td><img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    </td>
			</tr>
			<tr><td>Nama :</td><td></td>
			</tr>
			<tr><td>Jenis Alat :</td><td></td>
			</tr>
			<tr><td>Merk Alat :</td><td></td>
			</tr>
			<tr><td>Jenis Service :</td><td></td>
			</tr>
			<tr><td>Deskripsi :</td><td></td>
			</tr>
			<tr><td>Status Service :</td>
				<td>
					<input type="submit" class="btn btn-dark btn-block" name="kirim" value="Bawa Ke Toko"/>
					<input type="submit" class="btn btn-dark btn-block" name="kirim" value="Pengecekan" />
					<input type="submit" class="btn btn-dark btn-block" name="kirim" value="Selesai" />
					<input type="submit" class="btn btn-dark btn-block" name="kirim" value="Transaksi Lunas" />
				</td>
			</tr>
		</table>
     
        </div>
    </div>
</div>
	

</body>
</html>