<!-- WHILE -->
----------WHILE----------
<?php
$a = 1;
while ($a <= 5) {
    echo "<br> Bilangan $a";
    $a++;
}
?>

<!-- FOR -->
<br><br>----------FOR----------
<?php
$b = 5;
while ($b < 10) {
    echo "<br>Hello ";
    $b++;
}
?>

<!-- DO WHILE -->
<br><br>----------DO WHILE----------
<?php
$c = 10;
do {
    echo "<br>Hello ";
    $c--;
} while ($c > 5);
?>

<!-- CETAK BILANGAN 1 - 10, dan 10 - 1 -->
<?php
echo "<br><br>----------Cetak angka 10 s/d 1----------";
for ($x=1; $x <= 10; $x++) {
    echo "<br> Bilangan {$x}.";
}

echo "<br>----------Cetak angka 10 s/d 1----------";
for ($y=10; $y >= 1; $y--) {
    echo "<br> Bilangan {$y}.";
}
?>
