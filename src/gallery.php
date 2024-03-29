<?php
include("scripts/php_scripts/config.php");
session_start();
$statement;
$errors = [];
if (isset($_GET['searchType']) && isset($_GET['searchTerm'])) {
    $searchType = parseSearchType($_GET['searchType']);
    //IF searching for int type
    if (strcmp($searchType, "GID") == 0 || strcmp($searchType, "UID") == 0) {
        $searchTerm = intval($_GET['searchTerm']);
        $sql = "SELECT gallery.*, users.FirstName, users.LastName FROM gallery inner join users on gallery.UID = users.UID  WHERE gallery.$searchType=$searchTerm";
        $statement = $db->prepare($sql);
        //$statement->bindValue(1, $searchType, PDO::PARAM_STR);
        //$statement->bindValue(2, $searchTerm, PDO::PARAM_INT);
    } else {
        $searchTerm = $_GET['searchTerm'];
        if (strcmp($searchType, "User") == 0) {
            $sql = "SELECT * FROM gallery inner join users on gallery.UID = users.UID WHERE MATCH(FirstName, LastName) AGAINST('$searchTerm');";
            $statement = $db->prepare($sql);
        } else {
            $sql = "SELECT * FROM gallery inner join users on gallery.UID = users.UID WHERE MATCH(Title) AGAINST('$searchTerm')";
            $statement = $db->prepare($sql);
            //$statement->bindValue("searchTerm", $searchTerm, PDO::PARAM_STR);
        }
    }
} else {
    $sql = "SELECT gallery.*, users.FirstName, users.LastName FROM gallery inner join users on gallery.UID = users.UID";
    $statement = $db->prepare($sql);
}
$gallery = [];
$statement->execute();
$gallery = $statement->fetchAll();
$statement->closeCursor();

function parseSearchType($type)
{
    global $errors;
    //Stops SQL injection on the type
    if (strcmp($type, "User") == 0 || strcmp($type, "Title") == 0 || strcmp($type, "GID") == 0 || strcmp($type, "UID") == 0 ) {
        return $type;
    } else {
        array_push($errors, "Error in search");
        return "Title";
    }
}
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
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://unpkg.com/packery@2/dist/packery.pkgd.min.js"></script>
    <script src="scripts/JS_scripts/resposive.js" defer></script>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="top-bar">
        <h1 id="mobile-hidden">Gallery</h1>
        <div class="search-bar">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <select class="dropdown-toggle form-select" style="flex:1;" name="searchType" aria-label="searchItem">
                        <option value="Title" selected>Title</option>
                        <option value="User">User</option>
                        <option value="GID">GID</option>
                    </select>
                    <input type="text" class="form-control" name="searchTerm" style="flex:5" aria-label="Text input with dropdown button">
                    <input type="submit" class="btn btn-outline-warning" style="flex:1" value="Search">
                </div>
            </form>
        </div>
    </div>

    <div style="text-align: center;">
        <?php include("scripts/php_scripts/messages.php") ?>
    </div>
    <div data-masonry='{"percentPosition": true}' style="margin:auto; width:90vw;" class="row row-cols-md-3 g-2">
        <!-- <div class="row row-cols-1 row-cols-md-3 g-4">         class="row row-cols-md-4 g-4" -->
        <?php foreach ($gallery as $item) : ?>
            <div class="col">
                <div class="card" style="min-width: 10em;
                                        max-width: 30em;
                                        width:auto;">
                    <img src="<?php echo $item['Image'] ?>" class="card-img-top" alt="Img:<?php echo $item['GID'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item['Title'] ?></h5>
                        <?php if ((isset($_SESSION['login_user']) && $_SESSION['login_user'] == $item['UID']) || isset($_SESSION['admin_user'])) : ?>
                            <form action="scripts/php_scripts/deleteCanvas.php" method="post">
                                <input type="hidden" name="GID" value="<?php echo $item['GID'] ?>">
                                <input type="submit" class="btn btn-danger" name="delete" value="Delete">
                            </form>
                        <?php endif ?>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Posted: <?php echo $item['DateTime'] ?> by <?php echo $item['FirstName'] . " " . $item['LastName'] ?></small>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>