<?php
$ar_judul = ['NO','NAMA'];

$obj_jenis = new jenis();
$rs = $obj_jenis->index();
?>

<h3>Daftar jenis</h3>
<a href="index.php?hal=jenis_form" class="btn btn-primary">Tambah</a>

<table class="table table-striped">
    <thead>
        <tr>
            <?php foreach($ar_judul as $jdl){ ?>
                <th><?= $jdl ?></th>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach($rs as $jenis){ ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $jenis['nama'] ?></td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>
