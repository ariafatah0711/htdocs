<?php
class Jenis
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh; //globalkan instance obj $dbh di file koneksi.php
        $this->koneksi = $dbh;
    }
    //member3 fungsionalitas
    public function index()
    {
        $sql = "SELECT * FROM jenis";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }
}