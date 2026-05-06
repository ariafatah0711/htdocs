<?php

$host = "localhost";
$port = "3306";
$db   = "db_tugas1";
$user = "root";
$pass = "";

try {
    $conn = New PDO(
        "mysql:host=$host;port=$port;dbname=$db",
        $user,
        $pass
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    // echo "Koneksi Berhasil";
} catch (PDOException $e) {
    echo "Koneksi Gagal: " . $e->getMessage();
}

?>
