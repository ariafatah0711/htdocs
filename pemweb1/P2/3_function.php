----------FUNCTION----------<br>
<?php
function salam($nama = "") {
    if (!$nama) {
        echo "Selamat Pagi<br>";
    } else {
        echo "Selamat Siang $nama<br>";
    }
}

salam();
salam("Aria");
?>

<br>----------RETURN----------<br>
<?php
// FUNCTION
function add($a, $b) {
    return $a + $b;
}

function sub($a, $b) {
    return $a - $b;
}

function mul($a, $b) {
    return $a * $b;
}

function div($a, $b) {
    return $a / $b;
}

// OUTPUT
$result = add(2, 5);
echo "2 + 5 = {$result} <br>";

$result = sub(5, 3);
echo "5 - 3 = {$result} <br>";

$result = mul(5, 3);
echo "5 * 3 = {$result} <br>";

$result = div(25, 5);
echo "25 / 5 = {$result} <br>";
?>
