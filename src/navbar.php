<?php
$loggedIn = isset($_SESSION['login_user']) ? true : false;
if ($loggedIn) : ?>
    <!-- Nav Bar if logged in -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/GiraffeStateLogo2.0WhiteOutline.png" alt="Giraffes" height="75">
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
                        <a class="nav-link" href="#">My Giraffes</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="canvas_page.php">Start Drawing</a>
                    </li>
                    <li class="nav-item">
                        <!---<a class="nav-link red" href="/testZone.html">Logout</a>-->
                        <a class="btn btn-outline-danger" type="submit" href="logout.php">Logout</a>
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
                <img src="../assets/GiraffeStateLogo2.0WhiteOutline.png" alt="Giraffes" height="75">
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
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <!---<a class="nav-link red" href="/testZone.html">Logout</a>-->
                        <a class="btn btn-outline-success" type="submit" href="login.php?page=1">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif ?>