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
    <div style="width:80vw; margin:auto; margin-top:40px">
        <h1 id="giraffe-api-v0-1-0">Giraffe API v0.1.0</h1>
        <p>The Current State of the GiraffeAPI only supports retrieving items from the database. This API is based off of the Unsplash public API</p>
        <h2 id="first-steps">First Steps</h2>
        <p>Before you can use the GiraffeAPI you must be an approved API user. You can request API access by emailing razvan@beldeanu.com. Once your access has been approved, you will be sent an API token to use with all of your requests.</p>
        <blockquote>
            <p>Never share your token with anyone, as incorrect use will cause the removal of your API privileges</p>
        </blockquote>
        <h2 id="url-to-send-request">URL to send request</h2>
        <p>The GiraffeAPI url is <code>https://beldeanu.com/src/GiraffeAPI.php</code> followed by specified GET variables. More information about GET variables can be found <a href="https://www.semrush.com/blog/url-parameters/">here</a></p>
        <h2 id="2-ways-to-use-the-api">2 ways to use the API</h2>
        <h3 id="search">Search</h3>
        <p>By using search, API users will be able to search the GiraffeGraph Database based on Title, Name of poster, and gallery ID.</p>
        <h4 id="search-by-title">Search by Title</h4>
        <p>In order to search by title, the user must define the following GET variables:</p>
        <blockquote>
            <p>type = search</p>
            <p>searchType = Title</p>
            <p>searchTerm = <em> Word to search </em></p>
            <p>authToken = <em> APIToken Here </em></p>
        </blockquote>
        <p>Example:
            In order to search for any post with the word &quot;trees&quot; the url would look like:
            <code>https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&amp;type=search&amp;searchType=Title&amp;searchTerm=trees</code>
        </p>
        <h4 id="search-by-name">Search by Name</h4>
        <p>In order to search by title, the user must define the following GET variables:</p>
        <blockquote>
            <p>type = search</p>
            <p>searchType = User</p>
            <p>searchTerm = <em> Name to Search </em></p>
            <p>authToken = <em> APIToken Here </em></p>
        </blockquote>
        <p>Example:
            In order to search for any posted by someone with the name &quot;Anna&quot; the url would look like:
            <code>https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&amp;type=search&amp;searchType=User&amp;searchTerm=Anna</code>
        </p>
        <h4 id="search-by-gallery-id">Search by Gallery ID</h4>
        <p>In order to search by title, the user must define the following GET variables:</p>
        <blockquote>
            <p>type = search</p>
            <p>searchType = GID</p>
            <p>searchTerm = <em> ID to Search </em></p>
            <p>authToken = <em> APIToken Here </em></p>
        </blockquote>
        <p>Example:
            In order to search for any post with the GID of 13 the url would look like:
            <code>https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&amp;type=search&amp;searchType=GID&amp;searchTerm=13</code>
        </p>
        <h3 id="random">Random</h3>
        <p>Using Random, the API will return a specified amount of images from the database, if not specified the default value is 3. The specific GET variables for a random API call are as follows: </p>
        <blockquote>
            <p>type = random</p>
            <p>numOf = <em> Ammount of random images </em></p>
        </blockquote>
        <p>Example:
            In order to get 5 random images from the database the following url would be needed:
            <code>https://beldeanu.com/src/GiraffeAPI.php?authToken=APIToken&amp;type=random&amp;numOf=5</code>
        </p>
        <h2 id="what-gets-returned">What gets Returned</h2>
        <p>The API will return a JSON that contains the following for each image:</p>
        <blockquote>
            <p>{</p>
            <p>GID: Gallery ID</p>
            <p>Image: Base64 encoding of Image</p>
            <p>Title: Image Title</p>
            <p>UID: ID of user that posted the image</p>
            <p>DateTime: A DateTime object for when the image was posted</p>
            <p>FirstName: Poster&#39;s FirstName</p>
            <p>LastName: Poster&#39;s Last Name</p>
            <p>}</p>
        </blockquote>
        <h2 id="debugging-tool">Debugging Tool</h2>
        <p>By adding the GET variable <code>view=1</code> and going to the website you can see the images that are returned rather than hard to read JSON. Using the search example to find anything posted by someone with the first name Anna and the debug tool active the URL will be as follows:</p>
        <pre><code>`http<span class="hljs-variable">s:</span>//beldeanu.<span class="hljs-keyword">com</span>/src/GiraffeAPI.php?authToken=APIToken&amp;<span class="hljs-built_in">type</span>=<span class="hljs-built_in">search</span>&amp;searchType=User&amp;searchTerm=Anna&amp;<span class="hljs-keyword">view</span>=<span class="hljs-number">1</span>`
</code></pre>
    </div>
</body>

</html>