<?php
include("session.php");
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
    <script src="scripts/canvas.js" defer></script>
</head>

<body>
    <div style="display:none;">
        <?php include("navbar.php") ?>
    </div>
    <div class="canvas-main">
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
        <canvas id="canvas"></canvas>
        <form action="sendCanvas.php" method="POST">
            <input type="hidden" name="img" data-target="canvas-hidden" value="TEMP">
            <input type="submit" id="saveCanv" type="button" name="send-canvas"class="btn btn-primary">
            <div class="right">
                <a class="btn btn-secondary" href="home.php">Go back home</a>
            </div>
        </form>
        
    </div>
</body>

</html>