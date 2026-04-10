<?php

class Bank {
    // Atribute
    protected $norek;
    public $nama;
    private $saldo;

    static $jml = 0;
    const BANK = 'Bank Syariah Nurul Fikri';

    // Connstructor
    public function __construct($no, $nasabah, $saldo) {
        $this->norek = (string) $no;
        $this->nama = $nasabah;
        $this->saldo = $saldo;

        self::$jml++;
    }

    public function setor($uang) {
        $this->saldo += $uang;
    }

    public function ambil($uang) {
        $this->saldo -= $uang;
    }

    public function cetak() {
        echo "<h3>=== ".self::BANK." ===</h3>";
        echo "No. Rekening : {$this->norek}";
        echo "<br>Nama Nasabah : {$this->nama}";
        echo "<br>Saldo        : Rp. ".number_format($this->saldo,0,',','.');
    }
}

// $nsbl1 = new Bank("011107","Aria Fatah",8400000);

// $nsbl1->cetak();

?>
