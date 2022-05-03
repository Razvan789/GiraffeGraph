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
                    <div id="blank-card" onclick="location.href='canvas_page.php?startWith=0'" class="card border-dark mb-3 disabled">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Blank</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=1'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Gerald</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=2'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Ronald</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=3'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Edward</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=4'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Penelope</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=5'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Anthony</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=6'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Bart</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=7'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Antony</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=8'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Uga</h5>
                        </div>
                    </div>
                    <div class="card border-dark mb-3" onclick="location.href='canvas_page.php?startWith=9'">
                        <img class="card-img-top" src="../assets/GriaffeGraphLogoHEADSHOTblackOutline.png">
                        <div class="card-body">
                            <h5 class="card-title">Michael</h5>
                        </div>
                    </div>
                    <div id="blank-card" onclick="location.href='canvas_page.php'" class="card border-dark mb-3 disabled">
                        <img class="card-img-top" src="https://media.istockphoto.com/vectors/wip-sign-icon-vector-id972656164?k=20&m=972656164&s=170667a&w=0&h=ci0boYR1pCvxw8PSJ-vlrGdDrK7LEYrID1h_TaWSv7k=">
                        <div class="card-body">
                            <h5 class="card-title">More Coming Soon</h5>
                        </div>
                    </div>
                </div>

            </div>
            <h4><a href="my_giraffes.php"> My Giraffes</a></h4>
        </div>

			<div class="about-giraffestate">
				<h3>What is GiraffeState?</h3>
				<br>
				
            	<p>GiraffeState started as a joke between two friends, a funny idea spawned from the creation of a goofy, five minute
                    blocky giraffe that got both of them laughing uncontrollably. It was the perfect project for a web development 
                    class and would let both of them use skills they'd be accumulating through an internship and for their degree. 
                    Little did they know how much fun they'd have making it, and it has expanded into the site that you see today.
                </p>
				
            	<p>
                    This website is a fun way for people to create drawings of any kind and share them through the use of the gallery 
                    page. Without an account, you can take a look at the gallery page and see all kinds of images drawn by people 
                    from all different places and accounts. Explore your creativity and make fun, funny drawings to share with all 
                    kinds of people! 
                </p>
			</div>
		</div>
		<footer>GiraffeState</footer>
	</body>
</html>