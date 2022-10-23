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

	<br/>
	<h3>Input data baru</h3>
	<form action="alat-proses.php" method="post">		
		<table>
			<input type="hidden" name="idalat">	
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
			
			
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
</body>
</html>