<?php
$id = $_REQUEST['id']; // tangkap request produk id di URL
$model = new Produk(); // ciptakan obj dari class Produk
$rs = $model->getProduk($id); // panggil fungsi u/ mendetailkan produk
?>

<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <?php
            if (!empty($rs['foto'])) {
            ?>
                <img src="img/<?= $rs['foto'] ?>" class="img-fluid rounded-start" alt="..." />
            <?php
            } else {
            ?>
                <img src="img/nophoto.jpg" class="img-fluid rounded-start" alt="..." />
            <?php } ?>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $rs['nama'] ?></h5>
                <p class="card-text">
                    Jenis Produk: <?= $rs['kategori'] ?> <br />
                    Kode Produk: <?= $rs['kode'] ?> <br />
                    Kondisi Produk: <?= $rs['kondisi'] ?> <br />
                    Harga Produk: Rp. <?= number_format($rs['harga'], 0, ',', '.') ?> <br />
                    Stok Produk: <?= $rs['stok'] ?> <br />
                </p>
                <p class="card-text">
                    <a href="index.php?hal=produk_list" class="btn btn-primary">Kembali</a>
                </p>
            </div>
        </div>
    </div>
</div>
