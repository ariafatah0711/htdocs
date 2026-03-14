<?php

// create class
class Motor {
    // Atribute
    public $merk;
    public $warna;
    public $tahun;

    // Method
    public function __construct($merk = null, $warna = null, $tahun = null) {
        $this->merk = $merk;
        $this->warna = $warna;
        $this->tahun = $tahun;
    }
};

// init object
$mbl0 = new Motor();
$mbl1 = new Motor();
$mbl2 = new Motor('A','Merah','2000');

// ubah atribut
$mbl1->merk = "Supra";
$mbl1->warna = "hitam";
$mbl1->tahun = 2009;

// output
echo "<h3>Class - OOP</h3>";

var_dump($mbl0);
echo "<br>";
var_dump($mbl1);
echo "<br>";
var_dump($mbl2);

echo "<br>";
echo $mbl1->merk . $mbl1->warna . $mbl1->tahun;

?>
