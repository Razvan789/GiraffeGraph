<?php 
    session_start();
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
    </head>

    <body>
        <?php include("navbar.php") ?>
        <div class="center-children center-self" >
            <h3 style="padding-bottom: 15px;">About GiraffeGraph</h3>
            <!--GiraffeState paragraph-->
            <p>
                GiraffeGraph was started as a joke between two college friends, spurred by the laughter over the creation of a stupid looking,
                blocky giraffe made in photoshop within minutes. Using skills acquired from an internship, they teamed together to create a fun website 
                where people could get a laugh and explore their creativity for fun.
                <br><br>
                Razvan created the canvas page that has been the backbone of the site, while Lindsey devoted her time to the user interface and aesthetics of it all. 
                Each creator played off their strong suits in order to create a site that would be not only functional, but also easy to use and have a pleasing user interface. 
            </p> 
            <iframe width="560" height="315" src="https://www.youtube.com/embed/xO4LaAHJqxw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
            <h3 style="padding-top: 50px;">About the Creators</h3>
        </div>
        <div class="main-body">           
            <div class="about_display">
                
                <img class="about-img" src="../assets/RazGiraffePortrait.png" alt="Razvan in a giraffe-onesie">
                <!--Lindsey's paragraph-->
                <p>
                    I'm Lindsey, and I'm the one behind the logos and artwork that you see all around the site as well as some front end work with the CSS and HTML. 
                    Raz and myself met in college, and have been friends since, and a lot of the work we do together is efficient, high quality, and most importantly, 
                    so much fun. He's an incredible programmer and person, and creating GiraffeGraph with him has been the utmost pleasure. While I focused on a majority of 
                    frontend work, I have him to thank for a lot of the backend, and our abilities to work together have allowed us to thrive and create a website that we are incredibly 
                    proud of. <br><br>

                    Now enough praise, you came here to learn about us, so let me tell y'all a little about me. I am a computer science major at UGA, and was going to get a minor in studio 
                    art as well, but decided I's rather just be done with school instead. I love art, music, programming, and sports, my favorite of which are football, baseball, and softball. 
                    I grew up in the south and I'm a big fan of cooking and all kinds of food. My favorite meal to cook would have to be homemade tomato soup, nothing beats that when I'm sick and 
                    need a good comfort food. I really like to make chicken parmesan as well, and I love to cook for my friends and my fiance. <br><br>
                
                    I did the portraits you see on this page for fun, and had a blast doing one of myself and one of Raz in goofy giraffe-onesies. I hope you enjoy, and get as much of a laugh 
                    out of the drawings and site in general as Raz and I have throughout this process! <br><br>
                </p>
            </div>
            <div class="about_display">
                <!--Raz's paragraph-->
                <p>

                </p>
                <img class="about-img" src="../assets/LindseyGiraffeSelfPortrait.png" alt="Lindsey in a giraffe-onesie">
            </div>
        </div>
    </body>

</html>