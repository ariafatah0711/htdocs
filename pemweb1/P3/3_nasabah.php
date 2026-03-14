<?php

require "2_bank.php";

// Membuat 2 object nasabah
$nsbl1 = new Bank("011107","Aria Fatah",8400000);
$nsbl2 = new Bank("011108","Budi Santoso",5000000);
$nsbl3 = new Bank("011109","Mr robot",10000);

echo "<h3>Data Nasabah Tanggal 1</h3><hr>";
$nsbl1->cetak();
$nsbl2->cetak();
$nsbl3->cetak();

// Test transaksi
$nsbl1->setor(1000000);   // setor
$nsbl1->ambil(500000);    // tarik

$nsbl2->setor(200000);
$nsbl2->ambil(1000000);

$nsbl3->setor(999999);

// Cetak data
echo "<h3>Data Nasabah Tanggal 2</h3><hr>";
$nsbl1->cetak();
$nsbl2->cetak();
$nsbl3->cetak();

echo "<br>";
echo "Jumlah Nasabah ".Bank::$jml." orang";

?>
