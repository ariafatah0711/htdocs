<?php

require_once '4_person.php';

class Dosen extends Person {
    public $nidn;
    public $gelar;

    public function __construct($nama, $gender, $nidn, $gelar) {
        parent::__construct($nama, $gender);
        $this->nidn = $nidn;
        $this->gelar = $gelar;
    }

    public function cetak() {
        parent::cetak();
        echo "<br>NIDN  : ".$this->gender;
        echo "<br>Gelar : ".$this->gender;
        echo "<hr>";
    }
}

?>
