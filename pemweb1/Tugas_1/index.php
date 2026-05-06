<?php
session_start();
include_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aria Fatah - Personal HomePage</title>

    <!-- ICON -->
    <link rel="icon" href="assets/img/logo.jpeg" type="image/jpeg">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/flip-card.css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- MAIN WRAPPER -->
    <div class="flex-grow-1">

        <div class="container-fluid p-0 m-0">

            <!-- HEADER -->
            <div class="row">
                <div class="col-md-12">
                    <?php include_once 'app/layouts/header.php'; ?>
                </div>
            </div>

            <!-- MENU -->
            <div class="row">
                <div class="col-md-12">
                    <?php include_once 'app/layouts/menu.php'; ?>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="row p-4 g-4">

                <!-- SIDEBAR -->
                <div class="col-md-3">
                    <?php include_once 'app/layouts/sidebar.php'; ?>
                </div>

                <!-- MAIN CONTENT -->
                <div class="col-md-9">
                    <?php include_once 'app/layouts/main.php'; ?>
                </div>

            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div>
        <?php include_once 'app/layouts/footer.php'; ?>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
