<?php
$obj_jenis = new Jenis(); //ciptakan object dari class Jenis
$rs = $obj_jenis->index(); //panggil fungsi index untuk mendapatkan data jenis produk
$ar_kondisi = ['Baru'


,'Second']; //buat array kondisi produk


//------------proses edit data----------------
@$id = $_REQUEST['id']; //tangkap request id di url
$obj_produk = new Produk(); //ciptakan object dari class Produk
if(!empty($id)){
// panggil fungsi untuk menampilkan data lama yg ingin diubah di form
$row = $obj_produk->getProduk($id); // mode edit data, form terisi data lama yg akan diedit
}
else {
$row = []; // mode input data baru, form tetap dalam keadaan kosong
}
?>
<div class="container px-5 my-5">
<h3>Form Produk</h3>
<form id="contactForm" method="POST" action="controller/produk.php">
<div class="form-floating mb-3">
<input class="form-control" name="kode" value="<?= @$row['kode'] ?>"


id="kodeProduk" type="text" placeholder="Kode Produk" data-sb-validations="required" />


<label for="kodeProduk">Kode Produk</label>
<div class="invalid-feedback" data-sb-feedback="kodeProduk:required">Kode


Produk is required.</div>


</div>
<div class="form-floating mb-3">
<input class="form-control" name="nama" value="<?= @$row['nama'] ?>"


id="namaProduk" type="text" placeholder="Nama Produk" data-sb-validations="required" />


<label for="namaProduk">Nama Produk</label>
<div class="invalid-feedback" data-sb-feedback="namaProduk:required">Nama


Produk is required.</div>


</div>
<div class="mb-3">


<label class="form-label d-block">Kondisi Produk</label>
<?php
foreach($ar_kondisi as $kondisi){
//--------proses edit kondisi produk-------
$cek = ($kondisi == @$row['kondisi']) ? "checked" : "" ;
?>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="kondisi" value="<?=


$kondisi ?>" data-sb-validations="required" <?= $cek ?> />


<label class="form-check-label"><?= $kondisi ?></label>
</div>
<?php } ?>
<div class="invalid-feedback" data-sb-feedback="kondisiProduk:required">One


option is required.</div>


</div>
<div class="form-floating mb-3">


<input class="form-control" name="harga" value="<?= @$row['harga'] ?>"
id="hargaProduk" type="text" placeholder="Harga Produk" data-sb-validations="required"
/>


<label for="hargaProduk">Harga Produk</label>
<div class="invalid-feedback" data-sb-feedback="hargaProduk:required">Harga


Produk is required.</div>


</div>
<div class="form-floating mb-3">
<input class="form-control" name="stok" value="<?= @$row['stok'] ?>"


id="stokProduk" type="text" placeholder="Stok Produk" data-sb-validations="required" />


<label for="stokProduk">Stok Produk</label>
<div class="invalid-feedback" data-sb-feedback="stokProduk:required">Stok


Produk is required.</div>


</div>
<div class="form-floating mb-3">


<select class="form-select" name="idjenis" id="jenisProduk"


aria-label="Jenis Produk">


<option value="-- Pilih Produk --">-- Pilih Produk --</option>
<?php
foreach($rs as $jenis){
//--------proses edit jenis produk-------
$sel = ($jenis['id'] == @$row['idjenis']) ? "selected" : "" ;
?>
<option value="<?= $jenis['id'] ?>" <?= $sel ?>><?= $jenis['nama'] ?>
</option>
<?php } ?>
</select>
<label for="jenisProduk">Jenis Produk</label>


</div>
<div class="form-floating mb-3">


<input class="form-control" name="foto" value="<?= @$row['foto'] ?>"
id="fotoProduk" type="text" placeholder="Foto Produk" data-sb-validations="" />


<label for="fotoProduk">Foto Produk</label></div>
<div class="text-center">


<?php
if(empty($id)){ //-----mode input data baru form kosong & tombol simpan--------
?>
<button class="btn btn-primary" name="proses" type="submit"


value="simpan">Simpan</button>


<?php
}
else{ //-----mode edit data lama form terisi data lama & tombol ubah--------
?>
<button class="btn btn-success" name="proses" type="submit"


value="ubah">Ubah</button>


<input type="hidden" name="idx" value="<?= $id ?>" />
<?php } ?>
<a href="index.php?hal=produk_list" class="btn btn-info"


name="unproses">Kembali</a>


</div>
</form>
</div>
