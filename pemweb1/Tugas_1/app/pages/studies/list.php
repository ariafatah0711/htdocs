<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['MEMBER'])) {
    header("Location: index.php?page=auth/login");
    exit;
}

$sql = "SELECT s.*, l.nama AS level_name FROM studies s LEFT JOIN level l ON s.idlevel = l.id";
$stmt = $conn->query($sql);
$studies = $stmt->fetchAll();

$levels = $conn->query("SELECT * FROM level")->fetchAll();

?>

<div class="card shadow">
    <div class="card-body">

        <?php if(!empty($_SESSION['FLASH_ERROR'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_SESSION['FLASH_ERROR']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['FLASH_ERROR']); ?>
        <?php endif; ?>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Studies</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">+ Add Study</button>
        </div>

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="10%">No</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Tahun Lulus</th>
                    <th>Foto</th>
                    <th width="25%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($studies as $s): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($s['nama']) ?></td>
                    <td><?= htmlspecialchars($s['level_name']) ?></td>
                    <td><?= htmlspecialchars($s['tahun_lulus']) ?></td>
                    <td>
                        <?php if(!empty($s['foto_sekolah'])): ?>
                            <img src="uploads/<?= htmlspecialchars($s['foto_sekolah']) ?>" alt="" style="max-width:120px;">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="index.php?page=studies/detail&id=<?= $s['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $s['id'] ?>">Edit</button>
                        <a href="app/controllers/studies.php?action=delete&id=<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this study?')">Delete</a>
                    </td>
                </tr>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal<?= $s['id'] ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="app/controllers/studies.php?action=edit" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5>Edit Study</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                    <div class="mb-2">
                                        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($s['nama']) ?>" required>
                                    </div>
                                    <div class="mb-2">
                                        <select name="idlevel" class="form-control">
                                            <option value="">-- Select Level --</option>
                                            <?php foreach($levels as $lvl): ?>
                                                <option value="<?= $lvl['id'] ?>" <?= $lvl['id'] == $s['idlevel'] ? 'selected' : '' ?>><?= htmlspecialchars($lvl['nama']) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <input type="text" name="tahun_lulus" class="form-control" value="<?= htmlspecialchars($s['tahun_lulus']) ?>" placeholder="Tahun Lulus">
                                    </div>
                                    <div class="mb-2">
                                        <textarea name="keterangan" class="form-control" placeholder="Keterangan"><?= htmlspecialchars($s['keterangan']) ?></textarea>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Foto Sekolah (ganti untuk update)</label>
                                        <input type="file" name="foto_sekolah" class="form-control">
                                        <?php if(!empty($s['foto_sekolah'])): ?>
                                            <small class="text-muted">Current: <?= htmlspecialchars($s['foto_sekolah']) ?></small>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="app/controllers/studies.php?action=add" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5>Add Study</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2"><input type="text" name="nama" class="form-control" placeholder="Name" required></div>
                    <div class="mb-2">
                        <select name="idlevel" class="form-control">
                            <option value="">-- Select Level --</option>
                            <?php foreach($levels as $lvl): ?>
                                <option value="<?= $lvl['id'] ?>"><?= htmlspecialchars($lvl['nama']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-2"><input type="text" name="tahun_lulus" class="form-control" placeholder="Tahun Lulus"></div>
                    <div class="mb-2"><textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea></div>
                    <div class="mb-2"><label class="form-label">Foto Sekolah</label><input type="file" name="foto_sekolah" class="form-control"></div>
                </div>
                <div class="modal-footer"><button class="btn btn-primary">Save</button></div>
            </form>
        </div>
    </div>
</div>
