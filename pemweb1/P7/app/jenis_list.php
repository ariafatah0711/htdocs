<?php
$obj_jenis = new Jenis();
$rs = $obj_jenis->index();

$ar_judul = ['NO', 'NAMA JENIS'];
?>

<h3>Daftar Jenis Produk</h3>
<a href="index.php?hal=jenis_form" class="btn btn-primary">Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            <?php
            foreach ($ar_judul as $jdl) {
                echo "<th>$jdl</th>";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($rs as $jenis) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $jenis['nama'] ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>