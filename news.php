<?php 	
require_once("auth.php"); 
include("menubar.php");
?>
<link rel="stylesheet" type="text/css" href="css/bootstrap1.css">
<header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
					<div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <?php 
							include "koneksi.php";
							$query_mysql = mysql_query("SELECT * FROM berita")or die(mysql_error());
							while($data = mysql_fetch_array($query_mysql)){
						?>
						<div class="col-sm-2 col-md-12">
							<div class="thumbnail">
							  <div class="caption">
								<h6><?php echo $data['tanggal'];?></h6>
								<h4><?php echo $data['judul'];?></h4>
								<div class="row">
								<div class="col-lg-3">
								<img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $data['image'] ?>" /></div>
								<div class="col-lg-6"><?php echo $data['berita'];?></div>
								</div>
							  </div>
							</div>
						</div>
						<?php } ?>
                    </div>
					<div class="col-lg-2">
                      <h5>Topik Populer</h5>
						<a class="text-danger">#</a> Musik<br>
						<a class="text-danger">#</a> Gitar String 24<br>
						<a class="text-danger">#</a> Indonesia<br>
                    </div>
					<div class="col-lg-2">
                      <h5>Topik Populer</h5>
						<a class="text-danger">#</a> Musik<br>
						<a class="text-danger">#</a> Gitar String 24<br>
						<a class="text-danger">#</a> Indonesia<br>
                    </div>
                </div>
            </div>
        </div>	
</header>
</body>
</html>