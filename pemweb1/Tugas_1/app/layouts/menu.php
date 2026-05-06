<nav class="navbar navbar-expand-lg bg-primary"
     data-bs-theme="dark">

    <div class="container-fluid">

        <!-- LOGO -->
        <a class="navbar-brand"
           href="index.php">

            <img class="rounded-circle" src="assets/img/logo.jpeg" alt="Logo" width="40">
            My Profile
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <!-- HOME -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="index.php?page=home">
                        Home
                    </a>
                </li>

                <!-- ABOUT -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="index.php?page=about">
                        About Me
                    </a>
                </li>

                <!-- CONTACT -->
                <li class="nav-item">
                    <a class="nav-link"
                       href="index.php?page=contact">
                        Contact Me
                    </a>
                </li>

                <!-- MY STUDIES -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button"
                       href="#" data-bs-toggle="dropdown">
                        My Studies
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item"
                               href="index.php?page=level/list">
                                Level
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item"
                               href="index.php?page=studies/list">
                                Studies
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- LOGIN -->
                <?php if(!isset($_SESSION['MEMBER'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="index.php?page=auth/login">
                            Login
                        </a>
                    </li>
                <?php } else { ?>
                    <!-- USER -->
                    <li class="nav-item dropdown">
                        <?php
                        $username = htmlspecialchars($_SESSION['MEMBER']['username'] ?? 'User', ENT_QUOTES, 'UTF-8');
                        $role = htmlspecialchars(
                            $_SESSION['MEMBER']['role'] ?? ($_SESSION['MEMBER']['level'] ?? 'User'),
                            ENT_QUOTES,
                            'UTF-8'
                        );
                        ?>
                        <a class="nav-link dropdown-toggle" role="button"
                           href="#" data-bs-toggle="dropdown">
                            <?= $username; ?> <span class="badge bg-secondary ms-1"><?= $role; ?></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item"
                                   href="app/controllers/auth.php?action=logout">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>
