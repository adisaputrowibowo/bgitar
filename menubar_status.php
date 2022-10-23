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
  <title>Bengkel Gitar Bali</title>
</head>

<body class="bg-light">
	<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
				 <li class="sidebar-brand">
					<a href="#">
					Bengkel Gitar Bali
					</a>
                </li>
				<li >
                    <a href="timeline.php">
					<img class="img img-responsive rounded-circle mb-2" width="35" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
					
					<?php echo $_SESSION["user"]["nameplg"] ?></a>
                </li>
                <li >
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="news.php">News</a>
                </li>
                <li>
                    <a href="about.php">About</a>
                </li>
				<li>
                    <a href="forum.php">Forum</a>
                </li>
				<li>
                    <a href="service.php">Service</a>
                </li>
				<li>
                    <a href="status_service.php">Status Service</a>
                </li><hr>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
               
            </ul>
        </div>
<header>
	<input type="submit" a href="#menu-toggle" id="menu-toggle" class="btn btn-dark btn-block" value="MENU" />
	</div>
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

