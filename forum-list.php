<?php
include ('koneksi.php');

if (isset($_POST['pesan'])) {
    if (!isset($_SESSION['akun_id'])) {
        Helper::redirect(APP_URL . 'login.php');
    }

    $forum = Db::query('
        SELECT * FROM `forum` WHERE `iduser` = ' . $_SESSION['akun_id'] . ' AND `status` = 0
    ');

    if (sizeof($forum)) {
        Db::insert('forum', [
            'idforum' => $forum[0]['idforum'],
            'subject' => $_POST['subject'],
            'deskripsi' => $_POST['deskripsi'],
        ]);
    } else {
        $idforum = Db::insert('`forum`', [
            'iduser`' => $_SESSION['akun_id'],
        ]);

        Db::insert('forum', [
            'idforum' => $idforum,
            'subject' => $_POST['subject'],
            'deskripsi' => $_POST['deskripsi'],
        ]);
    }

    Helper::redirect(APP_URL . 'forum-list.php');
}

if (isset($_POST['delete'])) {
    Db::delete('forum', ['idforum' => $_POST['idforum']]);

    Helper::redirect(APP_URL . 'forum-list.php');
}
?>


<h3>Data user</h3>
	<div class="col-md-12">
        <div class="card">
			<div class="card-body">
			<?php 
			include "koneksi.php";
			$query_mysql = mysql_query("SELECT * FROM forum ")or die(mysql_error());
			
			while($data = mysql_fetch_array($query_mysql)){
			?>
				<img class="img img-responsive rounded-circle mb-2" width="25" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
					| <?php echo  $_SESSION["user"]["nameplg"] ?> | <?php echo $data['tanggal']; ?><hr>
			
					<div class="form-group">
					<h5>Subject &raquo;: <a class="text-danger"><?php echo $data['subject']; ?></a> <br>
					Deskripsi : <a class="text-danger"><?php echo $data['deskripsi']; ?></a> <br>
					</h5><br>
					<p><a href="hapus.php?id=<?php echo $data['idforum']; ?>" ><span class="glyphicon glyphicon-shopping-cart"></span><strong> hapus </strong></a></p>
					</div>
				
			<?php } ?>
			<tbody>	
			</div></div></div>	
			<tr>
                <td>
                    <form action="<?php echo APP_URL . 'form-list.php'; ?>" method="post">
                        <input type="hidden" name="delete" value="">
                        <input type="hidden" name="idforum" value="<?php echo $forum['idforum']; ?>">
                        <a href="#confirm" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                    </form>
                </td>
                <td><?php echo $data['subject']; ?></td>
                 <td><?php echo $data['deskripsi']; ?></td>
               </tr>
           	<?php 
			include "koneksi.php";
			$query_mysql = mysql_query("SELECT users.username , forum.subject FROM users INNER JOIN forum ON users.iduser = forum.iduser")or die(mysql_error());
			
			while($data = mysql_fetch_array($query_mysql)){
			?>
					
					<?php echo  $_SESSION["user"]["nameplg"] ?> | <?php echo $data['tanggal']; ?>
					<?php echo $data['users']{'username'}; ?>
					<?php echo $_SESSION['user']['iduser'],$_SESSION['user']['username']; ?>
					<div class="form-group">
					Subject &raquo;: <a class="text-danger"><?php echo $data['subject']; ?></a>
					<p><a href="forum2.php" ><strong> Lihat Forum </strong></a></p>
					</div>
				
			<?php } ?>
           
        </tbody>
    </table>
