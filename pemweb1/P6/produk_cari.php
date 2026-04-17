<?php
//buat array judul kolom
$ar_judul = ['NO','NAMA','KONDISI','HARGA','STOK','KATEGORI','FOTO','ACTION'];

//ciptakan object dari class Produk
$obj_produk = new Produk();
$keyword = $_GET['keyword'];
//panggil fungsi pencarian data di model Produk
$rs = $obj_produk->cari($keyword);
//print_r($rs); die();
?>

<h3>Daftar Produk</h3>
<a href="index.php?hal=produk_form" class="btn btn-primary">Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            <?php
            foreach ($ar_judul as $jdl) {
                echo '<th>' .$jdl. '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($rs as $produk) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $produk['kode'] ?></td>
                <td><?= $produk['nama'] ?></td>
                <td><?= $produk['kategori']?></td>
                <td><?= $produk['kondisi'] ?></td>
                <td>Rp. <?= number_format($produk['harga'], 0, ',', '.') ?></td>
                <td><?= $produk['stok'] ?></td>
                <td width="15%">
                    <?php
                    if (!empty($produk['foto'])) {
                    ?>
                        <img src="img/<?= $produk['foto'] ?>" width="50%" />
                    <?php
                    } else {
                    ?>
                        <img src="img/nophoto.jpg" width="50%" />
                    <?php } ?>
                </td>
                <td>
                    <form method="POST" action="controller/produk.php">
                        <a
                            href="index.php?hal=produk_detail&id=<?= $produk['id'] ?>"
                            title="Detail Produk" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a
                            href="index.php?hal=produk_form&id=<?= $produk['id'] ?>"
                            title="Ubah Produk" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button type="submit" title="Hapus Produk"
                            class="btn btn-danger btn-sm" name="proses"
                            value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                            <i class="bi bi-trash"></i>
                        </button>
                        <input type="hidden" name="id" value="<?= $produk['id'] ?>" />
                    </form>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>
