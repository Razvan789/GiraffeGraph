<?php include("app_logic.php")?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/GiraffeState/src/stylesheets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <title>Reset Password</title>
</head>

<body>
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
                        <a class="nav-link" href="src/cloudDocuments_NA.html">Cloud Giraffes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/src/testZone.html">Start Drawing</a>
                    </li>
                    <li class="nav-item">
                        <!---<a class="nav-link red" href="/testZone.html">Logout</a>-->
                        <a class="btn btn-outline-success" type="submit" href="/src/login.html">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="center-self center-children my-5">
        <form method="post">
            <h2 class="mb-5 mx-5">Enter New Password</h2>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="newPassword" placeholder="New Password">
                <label for="floatingInput">New Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="confirmNewPassword" placeholder="Re-type Password">
                <label for="floatingInput">Re-type Password</label>
            </div>
            <?php include('messages.php'); ?>
            <input class="btn btn-primary" type="submit" name="new_pass">
        </form>
    </div>
</body>

</html>