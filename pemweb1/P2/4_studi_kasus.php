<?php
$product = [
    [
        'kode' => 'A1',
        'nama' => 'Apel',
        'harga' => 12000,
    ],
    [
        'kode' => 'B1',
        'nama' => 'Manga',
        'harga' => 15000,
    ],
    [
        'kode' => 'C1',
        'nama' => 'Anggur',
        'harga' => 18000,
    ],
    [
        'kode' => 'A2',
        'nama' => 'Durian',
        'harga' => 80000,
    ]
];
?>

<h3>[+] Daftar Product</h3>
<?php
foreach ($product as $p) {
    echo "{$p['kode']} - {$p['nama']} | Rp.{$p['harga']}<br>";
}
?>

<?php
function totalPrice($a, $b, $c) {
    return $a + $b + $c;
}

$total = totalPrice(
    $product[0]['harga'],$product[1]['harga'],$product[2]['harga']
);
?>

<h3>[$] Total Harga: Rp.<?= $total ?></h3>
