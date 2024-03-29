<?php
$loggedIn = isset($_SESSION['login_user']) ? true : false;
if ($loggedIn) : ?>
    <!-- Nav Bar if logged in -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/GiraffeGraphLogo2.0MERGED.png" alt="Giraffes" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="my_giraffes.php">My Giraffes</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="help.php">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="canvas_page.php">Start Drawing</a>
                    </li>
                    <?php if(isset($_SESSION['admin_user'])):?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_page.php">Admin Page</a>
                    </li>
                    <?php endif?>
                    <li class="nav-item">
                        <a class="btn btn-outline-danger" type="submit" href="scripts/php_scripts/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php else : ?>
    <!-- Navbar if logged out -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/GiraffeGraphLogo2.0MERGED.png" alt="Giraffes" height="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="help.php">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-success" type="submit" href="login.php?page=1">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif ?>