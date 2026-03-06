<html>
<body>
----------ARRAY----------<br>
<?php
$fruits = ['apple','mangga','jeruk'];

foreach ($fruits as $fruit) {
    echo "ini buah {$fruit}<br>";
}
?>

<br>----------ARRAY SCOLLAR / ASSOSIATE----------<br>
<?php
$b1 = ['kode' => 'a1', 'buah' => 'apple', 'harga' => 25000];
$b2 = ['kode' => 'a2', 'buah' => 'mangga', 'harga' => 18000];
$b3 = ['kode' => 'a2', 'buah' => 'jeruk', 'harga' => 1200];
$b4 = ['kode'=>'b2', 'buah'=>'Bangkuang', 'harga'=>10000];
$b5 = ['kode'=>'c1', 'buah'=>'Cerry', 'harga'=>35000];

$buah2an = [$b1, $b2, $b3, $b4, $b5];
?>

<table border="1">
<thead>
<tr>
<th>No</th>
<th>Kode</th>
<th>Buah</th>
<th>Harga</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;
foreach($buah2an as $b){
$warna = $no % 2 == 1 ? 'khaki' : 'beige';
?>

<tr bgcolor="<?= $warna; ?>">
<td><?= $no ?></td>
<td><?= $b['kode'] ?></td>
<td><?= $b['buah'] ?></td>
<td><?= $b['harga'] ?></td>
</tr>

<?php
$no++;
}
?>

</tbody>
</table>

<br>
<?php
$mahasiswa1 = [
    'nama' => 'aria',
    'umur' => 19,
    'kota' => 'depok',
    'prodi' => 'teknik informatika',
];

echo "nama: " . $mahasiswa1['nama'] . "<br>";
echo "umur: {$mahasiswa1['umur']} <br>";
echo "kota: {$mahasiswa1['kota']} <br>";
echo "prodi: {$mahasiswa1['prodi']} <br>";
?>

</body>
</html>
