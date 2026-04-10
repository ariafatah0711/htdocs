<?php
$ar_judul = ['NO','KODE','NAMA','KONDISI','HARGA','STOK','FOTO'];

$obj_produk = new Produk();
$rs = $obj_produk->index();
?>

<h3>Daftar Produk</h3>
<a href="index.php?hal=produk_form" class="btn btn-primary">Tambah</a>

<table class="table table-striped">
    <thead>
        <tr>
            <?php foreach($ar_judul as $jdl){ ?>
                <th><?= $jdl ?></th>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach($rs as $produk){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $produk['no_produk'] ?></td>
            <td><?= $produk['nama'] ?></td>
            <td><?= $produk['kondisi'] ?></td>
            <td>Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></td>
            <td><?= $produk['stok'] ?></td>
            <td width="15%">
                <?php if(!empty($produk['foto'])){ ?>
                    <img src="images/<?= $produk['foto'] ?>" width="50%">
                <?php } else { ?>
                    <img src="images/nophoto.jpg" width="50%">
                <?php } ?>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>
