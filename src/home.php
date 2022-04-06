<?php
include('scripts/php_scripts/session.php');
?>
<!DOCTYPE html>
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
    <script src="scripts/JS_scripts/cardSlider.js" defer></script>
    <script src="scripts/JS_scripts/resposive.js" defer></script>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="main-body">
        <div class="document-opener">
            <h2> Welcome <?php echo $login_session_name ?></h2>
            <h4><a id="open-slider-btn" href="#">Start a new Document</a></h4>
            <div data-card-slider class="card-slider">
                <div class="card-container">
                    <div id="blank-card" onclick="location.href='canvas_page.php'" class="card border-dark mb-3 disabled">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Blank</h5>
                        </div>
                    </div>
                    <div id="blank-card" onclick="location.href='canvas_page.php'" class="card border-dark mb-3 disabled">
                        <img class="card-img-top" src="https://media.istockphoto.com/vectors/wip-sign-icon-vector-id972656164?k=20&m=972656164&s=170667a&w=0&h=ci0boYR1pCvxw8PSJ-vlrGdDrK7LEYrID1h_TaWSv7k=">
                        <div class="card-body">
                            <h5 class="card-title">More Coming Soon</h5>
                        </div>
                    </div>
                    <!-- 
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Giraffe</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Rhino</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Lion</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Cheetah</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Elephant</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Meerkat</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Warthog</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3">
                        <img class="card-img-top" src="../assets/GriaffeStateLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Snake</h5>
                        </div>
                    </div>
                     -->
                </div>

            </div>
            <h4><a href="#"> Open Most Recent Giraffe</a></h4>
            <h4><a href="#"> Upload a Giraffe</a></h4>
            <h4><a href="./cloudDocuments_NA.html"> My Giraffes</a></h4>
        </div>

			<div class="about-giraffestate">
				<h3>What is GiraffeGraph?</h3>
				<br>
				
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                	dolore magna aliqua. Ornare arcu odio ut sem. Urna nunc id cursus metus aliquam eleifend mi. Diam donec
                	adipiscing tristique risus nec feugiat in fermentum. Arcu odio ut sem nulla pharetra diam sit amet nisl.
               		Consectetur libero id faucibus nisl tincidunt eget nullam non. Tellus integer feugiat scelerisque varius
                	morbi enim nunc faucibus. Non odio euismod lacinia at quis risus sed vulputate. Eu consequat ac felis
                	donec et odio pellentesque. Sed ullamcorper morbi tincidunt ornare massa eget. Orci dapibus ultrices in
                	iaculis nunc sed augue lacus viverra.</p>
				
            	<p>Felis bibendum ut tristique et egestas quis ipsum. Porttitor rhoncus dolor purus non enim praesent
                	elementum facilisis. Dignissim enim sit amet venenatis urna cursus. Semper viverra nam libero justo
                	laoreet sit amet. Et netus et malesuada fames ac turpis egestas. Malesuada pellentesque elit eget
                	gravida cum sociis natoque penatibus. Sit amet venenatis urna cursus eget nunc scelerisque. Ipsum dolor
                	sit amet consectetur adipiscing elit duis tristique sollicitudin. Bibendum ut tristique et egestas quis
                	ipsum suspendisse ultrices gravida. In fermentum et sollicitudin ac orci. Pellentesque dignissim enim
                	sit amet venenatis urna cursus.</p>
			</div>
		</div>
		<footer>GiraffeState</footer>
	</body>
</html>