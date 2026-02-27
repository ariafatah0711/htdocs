<?php
// FORM GET
$nama = "";
$alamat = "";

// isset => digunakan untuk mengecek apakah suatu variabel sudah di set atau belum
// $_GET => digunakan untuk mengambil data yang dikirim melalui method GET
// $GET['variabel'] => digunakan untuk mengambil nilai dari variabel yang dikirim melalui method GET
// ?? => operator null coalescing, digunakan untuk memberikan nilai default jika variabel tidak di set atau bernilai null

if (isset($_GET['proses'])) {
    $nama = $_GET['nama'] ?? "";
    $alamat = $_GET['alamat'] ?? "";
}
?>

<h3>FORM GET</h3>
<form method="get">
    <label for="nama">Nama</label></br>
    <input type="text" id="nama" name="nama"><br>

    <label for="alamat">Alamat</label><br>
    <textarea id="alamat" name="alamat"></textarea><br>

    <input type="submit" name='proses' value="simpan">
</form>

<!-- ======================================================= -->
<hr>
<!-- ======================================================= -->

<?php
// FORM POST
$username = "";
$password = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? "";
    $password = $_POST['password'] ?? "";
}
?>

<h3>FORM POST</h3>
<form method="post">
    <label for="username">username</label></br>
    <input type="text" id="username" name="username"><br>

    <label for="password">password</label></br>
    <input type="password" id="password" name="password"><br>

    <input type="submit" name='login' value="login">
</form>

<!-- ======================================================= -->
<hr>
<!-- ======================================================= -->

<?php if (isset($_POST['login'])): ?>
    <p>
        <strong>Result Method Post: </strong>
        Hello <?= htmlspecialchars($username) ?>,
        password anda <?= htmlentities($password) ?>
    </p>
<?php endif; ?>
