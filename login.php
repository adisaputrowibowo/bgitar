<?php 
session_start();
if(isset ($_SESSION["user"])){
	header("location: home.php");
	exit;
}


require_once("config.php");
if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            $_SESSION["user"] = $user;
            // login sukses,
			if(mysql_num_rows($sql_login)>0){
				$row_akun = mysql_fetch_array($sql_login);
				$_SESSION["akun_id"] = $row_akun["iduser"];
				$_SESSION["akun_username"] = $row_akun["username"];
				$_SESSION["akun_password"] = $row_akun["password"];
				$_SESSION["akun_nama"] = $row_akun["namaplg"];
				$_SESSION["akun_email"] = $row_akun["email"];
				$_SESSION["akun_alamat"] = $row_akun["alamat"];
				$_SESSION["akun_notelp"] = $row_akun["notelp"];
				$_SESSION["akun_photo"] = $row_akun["photo"];
			}
            header("Location: home.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Bengkel Gitar Bali</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index.php">Home</a>

        <h4>Masuk ke Bengkel Gitar Bali</h4>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

        <form action="" method="POST">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>
			
            <input type="submit" class="btn btn-dark btn-block" name="login" value="Masuk" />

        </form>
            
        </div>

        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
    
</body>
</html>