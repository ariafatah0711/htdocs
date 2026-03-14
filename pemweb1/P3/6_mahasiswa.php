<?php

require_once '4_person.php';

class Mahasiswa extends Person {
    public $semester;
    public $jurusan;

    public function __construct($nama, $gender, $semester, $jurusan) {
        parent::__construct($nama, $gender);
        $this->semester = $semester;
        $this->jurusan = $jurusan;
    }

    public function cetak() {
        parent::cetak();
        echo "<br>Semester  : ".$this->gender;
        echo "<br>Jurusan : ".$this->gender;
        echo "<hr>";
    }
}

?>
