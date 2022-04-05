<?php
    
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
    <div class="login-grid">
        <!-- Login Form-------------------------------------------------------->
        <form action="" data-form='login' class="login-forms <?php checkPage(1) ?>" method="POST">
            <h2>Login</h2>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div style="color:#0a7300; margin-top:10px"><?php echo $resetPassword ?></div>
            <?php include("messages.php") ?>
            <p>Create a new account <a href="login.php?page=2" class="clickable">here</a></p>
            <p>Forgot your password? <a href="resetPass.php" style="color:#e7db2f">Reset Password</a></p>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
        <!-- Register form----------------------------------------------------->
        <form action="" data-form="register" class="login-forms <?php checkPage(2) ?>" method="POST">
            <h2>Register</h2>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingFName" name="fname" placeholder="John">
                <label for="floatingFName">First Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="lname" placeholder="Doe">
                <label for="floatingLName">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingRPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                <label for="floatingConfirmPassword">Confim Password</label>
            </div>
            <?php include("messages.php") ?>
            <p>Already have an account? <a href="login.php?page=1" class="clickable">Log in</a></p>
            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>

        <div data-text="login" class="login-text <?php checkPage(1) ?>">
            <h3>What is GiraffeGraph?</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ab, beatae. Aut sequi optio commodi quas, aliquid doloribus saepe, corporis soluta consectetur amet repudiandae at, consequatur quos ullam vero sint officia maiores tenetur. Officiis impedit nisi labore fugiat at, ut necessitatibus commodi assumenda voluptatibus distinctio! Illum ut laborum sit laudantium consequatur maxime blanditiis, esse maiores ratione repellendus autem iure illo labore harum dolore voluptate velit! Porro quasi ut esse culpa minima! Facilis beatae a maiores, quod atque suscipit officia optio eaque porro, maxime sunt totam velit, pariatur cupiditate laudantium corporis! Eligendi, labore officia velit saepe error qui quo id ut iusto, voluptas eaque hic est ab amet quis rem reiciendis deleniti, inventore esse explicabo! Nihil placeat accusamus labore blanditiis aperiam quaerat voluptate, dicta animi enim officia recusandae. Fugit, temporibus officiis voluptatibus alias, ad repellat assumenda perferendis molestias autem sapiente numquam! Natus magni maiores sed tempora asperiores, delectus sequi quas et fugit.</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae, repellendus consequuntur. Necessitatibus et voluptas, aliquid exercitationem perspiciatis magnam cum aspernatur voluptate in quos fugit nulla quas sint similique ipsum consectetur, facilis ipsa nobis adipisci asperiores sunt deleniti nihil, eaque numquam! Vel itaque rem unde maxime blanditiis consequuntur? Laborum deserunt debitis repellendus sint nemo magni maiores placeat? Similique doloremque, fugit officia expedita laborum eius nisi molestiae illo iure eaque quisquam facilis nobis placeat consectetur quaerat modi nemo sapiente saepe unde, odio deserunt! Debitis, aliquam! Ea magni quisquam perspiciatis expedita quas. Necessitatibus a modi commodi alias atque adipisci, repudiandae assumenda quisquam laboriosam.</p>
        </div>
    </div>
    </div>
</body>

</html>