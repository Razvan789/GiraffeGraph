<?php session_start();
include("scripts/php_scripts/config.php");
$users = [];
$sql = "SELECT * FROM users";
$statement = $db->prepare($sql);
$statement->execute();
$users = $statement->fetchAll();
$statement->closeCursor();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giraffe Graph</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://unpkg.com/packery@2/dist/packery.pkgd.min.js"></script>
</head>
<?php
if (!isset($_SESSION['admin_user'])) {
    echo "<div style='text-align:center;font-size:40px;padding: 200px'>Not using an admin account, please log into one <a href='login.php'>here</a></div>";
    exit;
} ?>

<body>
    <?php include("navbar.php") ?>
    <div class="top-bar">
        <h1>Users:</h1>
        <div class="search-bar">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <select class="dropdown-toggle form-select" style="flex:1;" name="searchType" aria-label="searchItem">
                        <option value="Title" selected>UID</option>
                        <option value="User">Name</option>
                    </select>
                    <input type="text" class="form-control" name="searchTerm" style="flex:5" aria-label="Text input with dropdown button">
                    <input type="submit" class="btn btn-outline-primary" style="flex:1" value="Search">
                </div>
            </form>
        </div>
    </div>

    <div style="margin: 0 30px;border:solid 2px black" class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <th scope="col">UID</th>
                <th scope="col">Email</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">API Token</th>
                <th scope="col">Actions</th>
            </thead>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['UID'] ?></td>
                    <td><?php echo $user['Email'] ?></td>
                    <td><?php echo $user['FirstName'] ?></td>
                    <td><?php echo $user['LastName'] ?></td>
                    <td><?php echo $user['APIToken'] ?></td>
                    <td>
                        <form action="scripts/php_scripts/admin_controls.php" method="POST">
                            <input type="hidden" name="UID" value="<?php echo $user['UID']?>">
                            <?php if ($user['IsAdmin'] != 1) : ?>
                                <input type="submit" class="btn btn-warning" name="makeAdmin" value="Make Admin">
                            <?php endif ?>
                            <input type="submit" class="btn btn-spots" name="resetPass" value="Reset Pass">
                            <?php if($user['APIToken'] == NULL):?>
                            <input type="submit" class="btn btn-warning" name="genToken" value="Generate API Token">
                            <?php else: ?>
                            <input type="submit" class="btn btn-warning" name="revokeToken" value="Revoke API Token">
                            <?php endif ?>
                            <?php if($user['UID'] != 1):?>
                            <input type="submit" class="btn btn-danger" name="ban" value="Ban">
                            <?php endif?>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>