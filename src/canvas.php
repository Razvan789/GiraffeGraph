<?php
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrafStateTest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="/scripts/canvas.js" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/assets/Logo.png" height="65" alt="Gra𝑓sτaτe">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/src/home_NA.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/src/shell.html">Shell</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link">Cloud Documents</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/src/testZone.html">Test Zone</a>
                    </li>
                    <li class="nav-item">
                        <!---<a class="nav-link red" href="/testZone.html">Logout</a>-->
                        <button class="btn btn-outline-danger" type="submit">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <button id="open-modal-btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#canvasModal">
        New drawing
    </button>
    <!-- Modal -->
    <div class="modal fade" id="canvasModal" tabindex="-1" role="dialog" aria-labelledby="canvasModalLabel" aria-hidden="true">
        <div id="canvas-modal-dialog" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="canvasModalLabel">Canvas</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="canvasControls">
                        <button id="clearCanv" class="btn btn-outline-secondary" type="button">Clear</button>
                        <label>Color:</label>
                        <input type="color" class="form-control form-control-color" id="color-picker" value="#563d7c" title="Choose your color">
                        <label for="size-picker">Size:</label>
                        <select name="size-picker" id="size-picker">
                            <option value="1" selected>1px</option>
                            <option value="2">2px</option>
                            <option value="5">5px</option>
                            <option value="10">10px</option>
                            <option value="20">20px</option>
                        </select>
                    </div>
                    <canvas id="canvas"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="saveCanv" type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    <button type="button" id="update-canvas-btn" class="d-none btn btn-primary" data-bs-dismiss="modal">Update</button>
                </div>
            </div>
        </div>
    </div>

    <div id="cardContainer" class="container mt-3">
        <div id="card-row" class="row">
            <!--Cards go here, added by JS-->
        </div>
    </div>


    <template id="card-template">
        <button class="card" data-bs-toggle="modal" data-bs-target="#canvasModal">
            <img class="card-img-top" id="canImg" width="200" height="200">
            <div class="card-body">
                <h5 class="card-title">Saved Image</h5>
            </div>
        </button>
    </template>
</body>

</html>