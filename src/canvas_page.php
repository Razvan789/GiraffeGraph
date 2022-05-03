<?php
include("scripts/php_scripts/session.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrafStateTest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="stylesheets/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="scripts/JS_scripts/canvas.js" defer></script>

</head>

<body>
    <?php if (isset($_GET['startWith'])) : ?>
        <div id="startWith" style="display: none;"><?php echo $_GET['startWith'] ?></div>
        <div style="display: none;">
        <img src="../assets/animals/<?php echo $_GET['startWith'] ?>.png" alt="temp">
        </div>
    <?php endif ?>
    <div class="canvas-main mobile-body">
        <div class="mini-nav">
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">&#9776</button>
            <h3>Drawing Pad</h3>
            <a style="display: block;" class="btn btn-secondary" href="home.php">&#8592</a>
        </div>
        <div class="offcanvas offcanvas-top" style="height:10vh" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
            <div style="display:flex; justify-content:space-between" class="offcanvas-body">
                <div class="canvasControls">
                    <div class="left">
                        <button id="clearCanv" class="btn btn-outline-secondary" type="button">Clear</button>
                        <label>Color:</label>
                        <input type="color" class="form-control-color" id="color-picker" value="#563d7c" title="Choose your color">
                        <label for="size-picker">Size:</label>
                        <select name="size-picker" id="size-picker">
                            <option value="1" selected>1px</option>
                            <option value="2">2px</option>
                            <option value="5">5px</option>
                            <option value="10">10px</option>
                            <option value="20">20px</option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
        </div>
        <canvas id="canvas"></canvas>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bottom-right" data-bs-toggle="modal" data-bs-target="#titleModal">
            Name your creation
        </button>

        <!-- Modal -->
        <div class="modal fade" id="titleModal" tabindex="-1" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Name your Drawing</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="scripts/php_scripts/sendCanvas.php" method="POST">
                        <input type="hidden" name="img" data-target="canvas-hidden" value="TEMP">
                        <div class="modal-body">
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" id="saveCanv" type="button" name="send-canvas" data-bs-dismiss="modal" class="btn btn-primary">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>