<?php require_once("auth.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bengkel Gitar Bali</title>
  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/simple-sidebar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>

<body class="bg-light">
<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="timeline.php">
					<img class="img img-responsive rounded-circle mb-2" width="35" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    <?php echo  $_SESSION["user"]["namapelanggan"] ?>
                    </a>
                </li>
				<li>
                    <a href="index-acc.php">Home</a>
                </li>
                <li>
                    <a href="#">News</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
				<li>
                    <a href="forum.php">Forum</a>
                </li>
                <li>
                    <a href="service-user.php">Services</a>
                </li>
				<li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
<header>
	<input type="submit" a href="#menu-toggle" id="menu-toggle" class="btn btn-dark btn-block" value="MENU" />		
</header>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    </header>
	<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	
<?php

require_once("config.php");

if(isset($_POST['proses'])){

    // filter data yang diinputkan
    $namapelanggan = filter_input(INPUT_POST, 'namapelanggan', FILTER_SANITIZE_STRING);
    $jenisalat = filter_input(INPUT_POST, 'jenisalat', FILTER_SANITIZE_STRING);
	$merkalat = filter_input(INPUT_POST, 'merkalat', FILTER_SANITIZE_STRING);
	$jenisservice = filter_input(INPUT_POST, 'jenisservice', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $sql = "INSERT INTO service (namapelanggan, jenisalat, merkalat, jenisservice) 
            VALUES (:namapelanggan, :jenisalat, :merkalat, :jenisservice)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":namapelanggan" => $namapelanggan,
        ":jenisalat" => $jenisalat,
        ":merkalat" => $merkalat,
        ":jenisservice" => $jenisservice
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: detailservice.php");
}

?>

	<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index-acc.php">Home</a>

        <h4>Pemesanan Service ..</h4>
        <p>Ingin konsultasi alat musik anda klik <a href="forum.php">Forum di sini</a></p>
		
		<form action="" method="POST">

					<div class="form-group">
						<label for="namapelanggan">Nama Lengkap</label>
						<input class="form-control" type="text" name="namapelanggan" placeholder="Nama kamu" />
					</div>
					<label for="jenisalatmusik">Jenis Alat Musik</label>
					<select class="form-control">
						<option value="pilih" selected>Pilih Jenis Alat Musik</option>
						<?php
							require_once 'Config.php';
							
							$stmt = $db->prepare('SELECT * FROM jenisalat');
							$stmt->execute();
						  ?>
						  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
								<?php extract($row); ?>
								
								<option value="<?php echo $idjenisalat; ?>"><?php echo $jenisalatmusik; ?></option>
						<?php endwhile; ?>
					</select>
					<label for="jenisalatmusik">Merk Alat Musik</label>
					<select class="form-control">
						<option value="pilih" selected>Pilih Merk Alat Musik</option>
						<?php
							require_once 'Config.php';
							
							$stmt = $db->prepare('SELECT * FROM merkalat');
							$stmt->execute();
						  ?>
						  <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
								<?php extract($row); ?>
								
								<option value="<?php echo $idjenisalat; ?>"><?php echo $merkalatmusik; ?></option>
						<?php endwhile; ?>
					</select>
					<label for="jenisservice">Jenis Service</label><br>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Service
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Costum
					</label><br>
					<div class="form-group">
						<input type="file" class="form-group" name="data"/>
					</div>
					<div class="form-group">
							<label for="deskkripsi">Deskripsi Masalah</label><br>
							<textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Deskripsi masalah alat musik"></textarea>
					</div>
					
					<br><br>
					<input type="submit" class="btn btn-dark btn-block" name="proses" value="Proses" /><br><br>
		</font>
		</div>
	</div><!--row-->
	</div><!---Container--->
</body>
</html>