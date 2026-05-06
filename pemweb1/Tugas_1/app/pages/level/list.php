<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['MEMBER'])) {
    header("Location: index.php?page=auth/login");
    exit;
}

$sql = "SELECT * FROM level";

$stmt = $conn->query($sql);
$levels = $stmt->fetchAll();

?>

<div class="card shadow">
    <div class="card-body">

    <?php if(!empty($_SESSION['FLASH_ERROR'])): ?>
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <div>
                <?= htmlspecialchars($_SESSION['FLASH_ERROR']) ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        <?php unset($_SESSION['FLASH_ERROR']); ?>
    <?php endif; ?>

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>
                Level Studies
            </h2>

            <!-- BUTTON MODAL -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                + Add Level
            </button>
        </div>

        <!-- TABLE -->
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th width="10%">
                        No
                    </th>
                    <th>
                        Level Name
                    </th>
                    <th width="25%">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach($levels as $level) {
                ?>

                <tr>
                    <td>
                        <?= $no++ ?>
                    </td>

                    <td>
                        <?= $level['nama'] ?>
                    </td>

                    <td>
                        <!-- EDIT -->
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editModal<?= $level['id'] ?>">
                            Edit
                        </button>

                        <!-- DELETE -->
                        <a href="app/controllers/level.php?action=delete&id=<?= $level['id'] ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this level?')">
                            Delete
                        </a>
                    </td>
                </tr>

                <!-- EDIT MODAL -->
                <div class="modal fade"
                     id="editModal<?= $level['id'] ?>">

                    <div class="modal-dialog">
                        <div class="modal-content">

                            <form method="POST"
                                  action="app/controllers/level.php?action=edit">
                                <div class="modal-header">
                                    <h5>
                                        Edit Level
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?= $level['id'] ?>">
                                    <input type="text" name="nama" class="form-control" value="<?= $level['nama'] ?>" required>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade"
     id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST"
                  action="app/controllers/level.php?action=add">

                <div class="modal-header">
                    <h5>
                        Add Level
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="text" name="nama" class="form-control" placeholder="Level Name" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">
                        Save
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
