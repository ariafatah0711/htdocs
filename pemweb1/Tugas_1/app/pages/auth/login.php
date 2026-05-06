<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body">

                <h2 class="text-center mb-4">
                    Login
                </h2>

                <?php
                if (session_status() == PHP_SESSION_NONE) session_start();
                if(!empty($_SESSION['FLASH_ERROR'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <div>
                            <?= htmlspecialchars($_SESSION['FLASH_ERROR']) ?>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php unset($_SESSION['FLASH_ERROR']); } ?>

                <form method="POST"
                      action="app/controllers/auth.php?action=login">

                    <!-- USERNAME -->
                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-3">
                        <label class="form-label">
                            Password
                        </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <!-- BUTTON -->
                    <button type="submit" class="btn btn-primary w-100">
                        Login
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
