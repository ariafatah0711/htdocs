<div class="container px-5 my-5">
    <h3>Form Jenis Produk</h3>

    <form method="POST" action="controller/jenisController.php">

        <div class="form-floating mb-3">
            <input class="form-control" name="nama" id="namaJenis" type="text" placeholder="Nama Jenis" required />
            <label for="namaJenis">Nama Jenis</label>
        </div>

        <div class="text-center">
            <button class="btn btn-primary" name="proses" type="submit" value="simpan">
                Simpan
            </button>
            <a href="index.php?hal=jenis_list" class="btn btn-info">
                Kembali
            </a>
        </div>

    </form>
</div>