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
        $idlevel = $_POST['idlevel'] ?: null;
        $keterangan = $_POST['keterangan'] ?: null;
        $tahun_lulus = $_POST['tahun_lulus'] ?: null;

        $foto = null;
        if(isset($_FILES['foto_sekolah']) && $_FILES['foto_sekolah']['error'] == UPLOAD_ERR_OK) {
            $tmp  = $_FILES['foto_sekolah']['tmp_name'];
            $name = basename($_FILES['foto_sekolah']['name']);
            $safe = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $name);
            $dest = __DIR__ . '/../../uploads/' . $safe;
            if(move_uploaded_file($tmp, $dest)) {
                $foto = $safe;
            }
        }

        $sql = "INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus, foto_sekolah)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$nama, $idlevel, $keterangan, $tahun_lulus, $foto]);

        header("Location: ../../index.php?page=studies/list");
        exit;
    } catch(PDOException $e) {
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=studies/list");
        exit;
    }
}

/* DELETE */
if($action == 'delete') {
    try {
        $id = $_GET['id'] ?? null;
        if($id) {
            // delete file if exists
            $stmt = $conn->prepare("SELECT foto_sekolah FROM studies WHERE id = ?");
            $stmt->execute([$id]);
            $old = $stmt->fetchColumn();
            if($old) {
                $path = __DIR__ . '/../../uploads/' . $old;
                if(file_exists($path)) @unlink($path);
            }

            $stmt = $conn->prepare("DELETE FROM studies WHERE id = ?");
            $stmt->execute([$id]);
        }

        header("Location: ../../index.php?page=studies/list");
        exit;
    } catch(PDOException $e) {
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=studies/list");
        exit;
    }
}

/* EDIT */
if($action == 'edit') {
    try {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $idlevel = $_POST['idlevel'] ?: null;
        $keterangan = $_POST['keterangan'] ?: null;
        $tahun_lulus = $_POST['tahun_lulus'] ?: null;

        $foto = null;
        if(isset($_FILES['foto_sekolah']) && $_FILES['foto_sekolah']['error'] == UPLOAD_ERR_OK) {
            // remove old
            $stmt = $conn->prepare("SELECT foto_sekolah FROM studies WHERE id = ?");
            $stmt->execute([$id]);
            $old = $stmt->fetchColumn();
            if($old) {
                $oldpath = __DIR__ . '/../../uploads/' . $old;
                if(file_exists($oldpath)) @unlink($oldpath);
            }

            $tmp  = $_FILES['foto_sekolah']['tmp_name'];
            $name = basename($_FILES['foto_sekolah']['name']);
            $safe = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $name);
            $dest = __DIR__ . '/../../uploads/' . $safe;
            if(move_uploaded_file($tmp, $dest)) {
                $foto = $safe;
            }
        }

        if($foto) {
            $sql = "UPDATE studies SET nama = ?, idlevel = ?, keterangan = ?, tahun_lulus = ?, foto_sekolah = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nama, $idlevel, $keterangan, $tahun_lulus, $foto, $id]);
        } else {
            $sql = "UPDATE studies SET nama = ?, idlevel = ?, keterangan = ?, tahun_lulus = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$nama, $idlevel, $keterangan, $tahun_lulus, $id]);
        }

        header("Location: ../../index.php?page=studies/list");
        exit;
    } catch(PDOException $e) {
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=studies/list");
        exit;
    }
}

?>
