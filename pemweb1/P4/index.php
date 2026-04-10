<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Web</title>
  <link href="assets/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'header.php'; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'menu.php'; ?>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-md-8">
        <?php
        if (isset($_GET['hal'])) {
          $req = $_GET['hal'];
          include_once $req . '.php';
        } else {
          include_once 'home.php';
        }
        ?>
      </div>

      <div class="col-md-4">
        <?php include_once 'sidebar.php'; ?>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'footer.php'; ?>
      </div>
    </div>

  </div>

  <script src="assets/bootstrap.bundle.min.js"></script>
</body>

</html>
