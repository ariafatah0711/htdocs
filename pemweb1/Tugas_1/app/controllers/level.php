<?php
session_start();
include '../../config/db.php';

if(!isset($_SESSION['MEMBER'])) {
    header("Location: ../../index.php?page=auth/login");
    exit;
}

$action = $_GET['action'] ?? '';

/* ADD */
if($action == 'add') {
    try {
    $nama = $_POST['nama'];

    $sql = "INSERT INTO level (nama)
            VALUES (?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$nama]);
        header("Location: ../../index.php?page=level/list");
        exit;
    } catch(PDOException $e) {
        // store error in session flash so it can be shown in the UI
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=level/list");
        exit;
    }
}

/* DELETE */
if($action == 'delete') {
    try {
        $id = $_GET['id'];

        $sql = "DELETE FROM level
                WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        header("Location: ../../index.php?page=level/list");
        exit;
    } catch(PDOException $e) {
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=level/list");
        exit;
    }
}

/* EDIT */
if($action == 'edit') {
    try {
        $id   = $_POST['id'];
        $nama = $_POST['nama'];

        $sql = "UPDATE level
                SET nama = ?
                WHERE id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $nama,
            $id
        ]);

        header("Location: ../../index.php?page=level/list");
        exit;
    } catch(PDOException $e) {
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=level/list");
        exit;
    }
}
