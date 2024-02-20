<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/pages/auth.css">
    </head>

    <body>
        <div class="container-auth">
            <form action="proccess/login.php" class="auth-card" method="POST">
                <h3 class="mb-4 heading-primary">Login</h3>
                <p class="text-danger">
                    <?php if (isset($_SESSION['failed'])) {
                        echo $_SESSION['failed'];
                        unset($_SESSION['failed']);
                    } ?>

                </p>

                <label for="username" class="col-form-label">Username</label>
                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username"
                        aria-describedby="addon-wrapping" id="username">
                </div>
                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">Password</label>

                    <input type="password" class="form-control" name="password" id="inputPassword">
                </div>
                <button type="submit" class="btn primary mt-2 mb-3">Login</button> <br>
                <a href="register.php" class="heading-primary text-none ">Register here </a>
            </form>
        </div>

    </body>

</html>