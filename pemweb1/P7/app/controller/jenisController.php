<?php
include_once '../koneksi.php';

$proses = $_POST['proses'];

if ($proses == "simpan") {

    $nama = $_POST['nama'];

    // simpan ke database
    $sql = "INSERT INTO jenis (nama) VALUES (?)";
    $ps = $dbh->prepare($sql);
    $ps->execute([$nama]);

    // redirect balik ke list
    header('Location: ../index.php?hal=jenis_list');
    exit;
}
