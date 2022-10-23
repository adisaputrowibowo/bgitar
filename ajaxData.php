<?php
//Include database configuration file
include('dbconfig.php');

if(isset($_POST["jenisa_id"]) && !empty($_POST["jenisa_id"])){
    //Get all merk data
    $query = $db->query("SELECT * FROM merkalat WHERE jenisa_id = ".$_POST['jenisa_id']." AND status = 1 ORDER BY merka_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display merk list
    if($rowCount > 0){
        echo '<option value="">Select Merk</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['merka_id'].'">'.$row['merka_name'].'</option>';
        }
    }else{
        echo '<option value="">Merk not available</option>';
    }
}

if(isset($_POST["merka_id"]) && !empty($_POST["merka_id"])){
    //Get all color data
    $query = $db->query("SELECT * FROM color WHERE merka_id = ".$_POST['merka_id']." AND status = 1 ORDER BY color_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display color list
    if($rowCount > 0){
        echo '<option value="">Select Color</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['color_id'].'">'.$row['color_name'].'</option>';
        }
    }else{
        echo '<option value="">Color not available</option>';
    }
}
?>