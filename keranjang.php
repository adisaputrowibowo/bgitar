<?php
require_once("auth.php"); 
require_once("koneksi.php");

if (isset($_POST['pesan'])) {
    if (!isset($_SESSION['iduser'])) {
        Helper::redirect(APP_URL . 'login.php');
    }

    $forum = Db::query('
        SELECT * FROM `forum` WHERE `iduser` = ' . $_SESSION['iduser'] . ' AND `status` = 0
    ');

    if (sizeof($forum)) {
        Db::insert('forum_detail', [
            'idforum' => $forum[0]['idforum'],
            'subject' => $_POST['subject'],
            'deskripsi' => $_POST['deskripsi'],
            'estimasi_pemesanan_order' => 0,
        ]);
    } else {
        $id_order = Db::insert('`order`', [
            'id_pelanggan' => $_SESSION['id_pelanggan'],
        ]);

        Db::insert('order_detail', [
            'id_order' => $id_order,
            'id_produk' => $_POST['id_produk'],
            'jumlah_order' => $_POST['jumlah'],
            'warna_order' => $_POST['warna'],
            'harga_order' => 0,
            'estimasi_pemesanan_order' => 0,
        ]);
    }

    Helper::redirect(APP_URL . 'keranjang.php');
}

if (isset($_POST['delete'])) {
    Db::delete('order_detail', ['id_order_detail' => $_POST['id_order_detail']]);

    Helper::redirect(APP_URL . 'keranjang.php');
}

if (isset($_POST['checkout'])) {
    Db::update('`order`', ['status' => 1, 'tanggal_pemesanan' => date('Y-m-d h:i:s')], ['id_order' => $_POST['id_order']]);

    Helper::redirect(APP_URL . 'pemesanan.php');
}

$keranjangs = Db::query('
    SELECT * FROM `order`, `order_detail`, `produk`
    WHERE `order`.`id_order` = `order_detail`.`id_order`
    AND `order_detail`.`id_produk` = `produk`.`id_produk`
    AND `order`.`id_pelanggan` = ' . $_SESSION['id_pelanggan'] . '
    AND `order`.`status` = 0
');

$produk_all = [];

foreach ($keranjangs as $keranjang) {
    if (!in_array($keranjang['id_produk'], $produk_all)) {
        $produk_all[] = $keranjang['id_produk'];
    }
}

if ($produk_all) {
    $results = Db::query('
        SELECT * FROM produk, produk_detail
        WHERE produk.id_produk = produk_detail.id_produk
        AND produk.id_produk IN(' . implode(',', $produk_all) . ')
    ');

    foreach ($results as $result) {
        $produks[$result['id_produk']][$result['warna']] = $result['stok'];
    }
}

$menu = 'keranjang';

require_once 'template/header.php';

?>

<div class="col-md-12">
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Warna</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th class="text-right">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $total = 0;
                $total_estimasi = 0;

                foreach ($keranjangs as $keranjang) {
                    $total += ($keranjang['harga'] * $keranjang['jumlah_order']);

                    $kurang = $produks[$keranjang['id_produk']][$keranjang['warna_order']] - $keranjang['jumlah_order'];
                    $estimasi = false;

                    if ($kurang <= 0) {
                        $estimasi = '*estimasi pemesanan ' . (-$kurang * $keranjang['estimasi_pemesanan']) . ' hari';
                        $total_estimasi += (-$kurang * $keranjang['estimasi_pemesanan']);
                    }
            ?>
            <tr>
                <td>
                    <form action="<?php echo APP_URL . 'keranjang.php'; ?>" method="post">
                        <input type="hidden" name="delete" value="">
                        <input type="hidden" name="id_order_detail" value="<?php echo $keranjang['id_order_detail']; ?>">
                        <a href="#confirm" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
                    </form>
                </td>
                <td><?php echo $keranjang['nama']; ?></td>
                <td><img src="<?php echo file_exists(IMG_DIR . 'produk/' . $keranjang['id_produk'] . '.jpg') ? APP_URL . 'assets/img/produk/' . $keranjang['id_produk'] . '.jpg' : ''; ?>" alt="" style="width: 100px;"></td>
                <td><?php echo $standard['warna'][$keranjang['warna_order']]; ?></td>
                <td><?php echo $keranjang['jumlah_order']; ?></td>
                <td><?php echo $estimasi ? $estimasi : ''; ?></td>
                <td class="text-right">Rp <?php echo number_format(($keranjang['harga'] * $keranjang['jumlah_order']), 2, ',', '.'); ?></td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="5"></td>
                <td><strong><?php echo $total_estimasi ? '*estimasi pemesanan ' . $total_estimasi . ' hari' : ''; ?></strong></td>
                <td class="text-right"><strong>Rp <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
            </tr>
        </tbody>
    </table>

    <form action="<?php echo APP_URL . 'keranjang.php'; ?>" method="post">
        <input type="hidden" name="id_order" value="<?php echo isset($keranjangs[0]['id_order']) ? $keranjangs[0]['id_order'] : ''; ?>">
        <input type="hidden" name="checkout" value="">
        <a href="#confirm" class="btn btn-default pull-right">Check Out</a>
    </form>
</div>
