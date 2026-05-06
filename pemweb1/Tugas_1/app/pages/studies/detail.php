<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['MEMBER'])) {
    header("Location: index.php?page=auth/login");
    exit;
}

$id = $_GET['id'] ?? null;
if(!$id) {
    header("Location: index.php?page=studies/list");
    exit;
}

$stmt = $conn->prepare("SELECT s.*, l.nama AS level_name FROM studies s LEFT JOIN level l ON s.idlevel = l.id WHERE s.id = ?");
$stmt->execute([$id]);
$s = $stmt->fetch();
if(!$s) {
    $_SESSION['FLASH_ERROR'] = 'Study not found';
    header("Location: index.php?page=studies/list");
    exit;
}

?>

<div class="card shadow">
    <div class="card-body">
        <h2><?= htmlspecialchars($s['nama']) ?></h2>
        <p><strong>Level:</strong> <?= htmlspecialchars($s['level_name']) ?></p>
        <p><strong>Tahun Lulus:</strong> <?= htmlspecialchars($s['tahun_lulus']) ?></p>
        <p><strong>Keterangan:</strong><br><?= nl2br(htmlspecialchars($s['keterangan'])) ?></p>
        <?php if(!empty($s['foto_sekolah'])): ?>
            <img src="uploads/<?= htmlspecialchars($s['foto_sekolah']) ?>" alt="" style="max-width:400px;">
        <?php endif; ?>
        <div class="mt-3">
            <a href="index.php?page=studies/list" class="btn btn-secondary">Back</a>
            <a href="app/controllers/studies.php?action=delete&id=<?= $s['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this study?')">Delete</a>
        </div>
    </div>
</div>
