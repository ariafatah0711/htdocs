<?php
session_start();
include '../../config/db.php';

$action = $_GET['action'] ?? '';

/* LOGIN */
if ($action == 'login') {
    try {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "
            SELECT * FROM users
            WHERE username = ?
            AND password = ?
        ";

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $username,
            $password
        ]);

        $user = $stmt->fetch();

        if($user) {
            $_SESSION['MEMBER'] = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'role'     => $user['role']
            ];
            header("Location: ../../index.php");
        } else {
            $_SESSION['FLASH_ERROR'] = 'Username atau Password salah!';
            header("Location: ../../index.php?page=auth/login");
        }
        exit;
    } catch(PDOException $e) {
        $_SESSION['FLASH_ERROR'] = $e->getMessage();
        header("Location: ../../index.php?page=auth/login");
        exit;
    }
}

/* LOGOUT */
if ($action == 'logout') {
    session_destroy();
    header("Location: ../../index.php");
}

?>
