<?php

// class Persegi
class Persegi {
    // Atribute
    public $sisi;
    private $luas = 0;
    private $keliling = 0;

    const HEADER = "LUAS DAN KELILING PERSEGI";

    // Constructor
    public function __construct($sisi) {
        $this->sisi = $sisi;
        // $this->luas();
        // $this->keliling();
    }

    public function luas() {
        $sisi = $this->sisi;
        $this->luas = $sisi * $sisi;

        echo "Persegi dengan sisi $sisi memiliki luas $this->luas <br>";
    }

    public function keliling() {
        $sisi = $this->sisi;
        $this->keliling = $sisi * 4;

        echo "Persegi dengan sisi $sisi memiliki keliling $this->keliling <br>";
    }

    public function cetak() {
        echo "<h3>".SELF::HEADER."</h3>";
        echo "Sisi: ".$this->sisi."<br>";
        echo "Luas: ".$this->luas."<br>";
        echo "Keliling: ".$this->keliling."<br>";
    }
}

$persegi1 = new Persegi(4);
$persegi2 = new Persegi(5);
// $persegi1->cetak();

$persegi1->luas();
$persegi1->keliling();

$persegi2->luas();
$persegi2->keliling();

?>
