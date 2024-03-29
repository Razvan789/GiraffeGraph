<?php include('scripts/php_scripts/app_logic.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giraffe Graph</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <title>Reset Password</title>
</head>

<body>
    <?php include("navbar.php") ?>
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
            <input class="btn btn-warning" type="submit" name="new_pass">
        </form>
    </div>
</body>

</html>