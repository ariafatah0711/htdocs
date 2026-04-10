<?php
class Jenis{
    //member1 var
    private $koneksi;

    //member2 konstruktor
    public function __construct() {
        global $dbh; //instance obj dbkoneksi.php
        $this->koneksi = $dbh;
    }

    //member3 fungsionalitas CRUD
    public function index() {
        $sql = "SELECT * FROM jenis ORDER BY id DESC";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }
}
