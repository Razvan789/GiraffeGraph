<?php
include("config.php");
$gallery = [];

$sql = "SELECT * FROM gallery";
$statement = $db->prepare($sql);
$statement->execute();
$gallery = $statement->fetchAll();
$statement->closeCursor();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giraffe Graph</title>
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="scripts/login.js" defer></script>
</head>

<body>
    <?php include("navbar.php") ?>
    <h1 class="text-center">Temp Gallery for Display purposes</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($gallery as $item) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo $item['Image'] ?>" class="card-img-top" alt="Img:<?php echo $item['GID'] ?>">
                    <div class="card-body">
                        <h5 class="card-title">Title: <?php echo $item['Title'] ?></h5>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Posted: <?php echo $item['DateTime']?> by UserID: <?php echo $item['UID'] ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>