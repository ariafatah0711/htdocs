<?php
include_once '../koneksi.php';
include_once '../models/Produk.php';

//1. tangkap request form (dari name2 element form)
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$kondisi = $_POST['kondisi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$idjenis = $_POST['idjenis'];
$foto = $_POST['foto'];
$tombol = $_POST['proses']; // untuk keperluan eksekusi sebuah tombol di form
//2. simpan ke sebuah array
$data = [
    $kode, // ? 1
    $nama, // ? 2
    $kondisi, // ? 3
    $harga, // ? 4
    $stok, // ? 5
    $idjenis, // ? 6
    $foto, // ? 7
];
//3. eksekusi tombol
$obj_produk = new Produk();
switch ($tombol) {
    case 'simpan':
        $obj_produk->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx'];; // tambah array ? ke-8 dari hidden field idx
        $obj_produk->ubah($data);
        break;
    case 'hapus':
        $obj_produk->hapus($_POST['id']);
        break; //$_POST['id'] dari hidden field di tombol hapus

    default:
        header('location: ../index.php?hal=produk_list');
        break;
}
//4. setelah selasai arahkan ke hal produk
    header('Location: ../index.php?hal=produk_list');
    exit;

//----------proses pencarian data---------------
$tombol_cari = $_GET['proses_cari']; // untuk keperluan eksekusi sebuah tomboldi form

if(isset($tombol_cari)){
//print_r('###########################'.$_GET['keyword']);
$obj_produk->cari($_GET['keyword']);
header('location:index.php?hal=produk_cari');
}
?>
