<?php
include("config.php");
session_start();
$errors = [];
$createdAccount = isset($_SESSION['created_account']) ? $_SESSION['created_account'] : "";
$resetPassword = isset($_SESSION['reset_password']) ? $_SESSION['reset_password'] : "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['email']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);


    $sql = "SELECT * FROM logintable WHERE Email = '$myusername'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row != NULL) {
        $hashedPass = $row['Password'];
        if (password_verify($mypassword, $hashedPass)) {
            $_SESSION['login_user'] = $myusername;
            header("location: home.php");
        } else {
            array_push($errors,"Your Login Name or Password is invalid");
            $createdAccount = "";
            $resetPassword = "";

        }
    } else {
        array_push($errors,"Your Login Name or Password is invalid");
        $createdAccount = "";
        $resetPassword = "";
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
    <script src="scripts/login.js" defer></script>
</head>

<body>
    <?php include("navbar.php") ?>
    <div class="login-grid">
        <!-- Login Form-------------------------------------------------------->
        <form action="" data-form='login' class="login-forms" method="POST">
            <h2>Login</h2>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div style="color:#0a7300; margin-top:10px"><?php echo $createdAccount;
            echo $resetPassword?></div>
            <?php include("messages.php")?>
            <p>Create a new account <span data-function="register" class="clickable">here</span></p>
            <p>Forgot your password? <a href="resetPass.php" style="color:#e7db2f">Reset Password</a></p>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <!-- Register form----------------------------------------------------->
        <form action="register.php" data-form="register" class="login-forms d-none" method="POST">
            <h2>Register</h2>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingFName" name="fname">
                <label for="floatingFName">First Name</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" name="lname">
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
            <?php include("messages.php")?>
            <p>Already have an account? <span data-function="login" class="clickable">Log in</span></p>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>

        <div data-text="login" class="login-text">
            <h3>What is GiraffeState?</h3>
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
    </div>
</body>

</html>