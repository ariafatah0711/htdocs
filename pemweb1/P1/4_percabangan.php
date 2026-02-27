<?php
// data awal
$nama = "Aria";
$totalBelanja = 15000;
$nilai = 75;

// belanja (if else)
if ($totalBelanja > 1000) {
    $ketBelanja = "Selamat $nama anda mendapatkan hadiah";
} else {
    $ketBelanja = "Terima kasih $nama sudah berbelanja";
}

// kelulusan (ternary)
$ketLulus = ($nilai >= 60) ? "Lulus" : "Tidak Lulus";

// Grade (if multi kondisi)
if ($nilai >= 85 && $nilai <= 100) {
    $grade = "A";
} elseif ($nilai >= 75 && $nilai < 85) {
    $grade = "B";
} elseif ($nilai >= 60 && $nilai < 75) {
    $grade = "C";
} elseif ($nilai >= 30 && $nilai < 60) {
    $grade = "D";
} elseif ($nilai >= 10 && $nilai < 30) {
    $grade = "E";
} else {
    $grade = "-";
}

// Prediket (Switch Case)
switch ($grade) {
    case "A":
        $prediket = "Memuaskan";
        break;
    case "B":
        $prediket = "Bagus";
        break;
    case "C":
        $prediket = "Cukup";
        break;
    case "D":
        $prediket = "Kurang";
        break;
    case "E":
        $prediket = "Buruk";
        break;
    default:
        $prediket = "-";
        break;
}
?>
<h3>Data Siswa</h3>
Nama: <?= $nama ?><br>
Belanja: <?= $totalBelanja ?><br>
Nilai: <?= $nilai ?><br>

<hr>

<h3>Data Belanja</h3>
Nama Pelanggan: <?= $nama ?><br>
Total Belanja: <?= $totalBelanja ?><br>
Keterangan: <?= $ketBelanja ?><br>

<h3>Data Nilai</h3>
Nama Siswa: <?= $nama ?><br>
Nilai: <?= $nilai ?><br>
Status: <?= $ketLulus ?><br>
Grade: <?= $grade ?><br>
Prediket: <?= $prediket ?><br>
