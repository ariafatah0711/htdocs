<?php

$namaSiswa = "Aria Fatah Anom";
$umur = 19;
$berat_badan = 41.5;

// cara 1
echo "Hello my name is ", $namaSiswa, ", my age ", $umur, ", and my weight ", $berat_badan, "Kg <br>";
echo "Hello my name is " . $namaSiswa . ", my age " . $umur . ", and my weight " . $berat_badan . "Kg <br>";

// cara 2
echo "Hello my name is $namaSiswa, my age $umur, and my weight $berat_badan Kg <br>";

// cara 3
echo "Hello my name is {$namaSiswa}, my age {$umur}, and my weight {$berat_badan} Kg <br>";

// cara 4
echo sprintf(
    "Hello my name is %s, my age %d, and my weight %f Kg <br>",
    $namaSiswa,
    $umur,
    $berat_badan
);

?>

<ul>
    <li>Nama Siswa: <?= $namaSiswa ?></li>
    <li>Umur Siswa: <?= $umur ?></li>
    <li>Berat Badn: <?= $berat_badan ?> Kg</li>
</ul>

<?php
// variable constanta

$jari2 = 15;
define('PHI', 3.14);
$luas = PHI * $jari2 * $jari2;
$keliling = 2 * PHI * $jari2;

echo "Luas lingkaran dengan jari jari $jari2 cm, adalah $luas cm <br>";
echo "Keliling Lingkaran dengan jari jari $jari2 cm, adlaah $keliling cm <br>";

?>
