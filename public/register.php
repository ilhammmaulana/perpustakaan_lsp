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
            <form action="proccess/register.php" class="auth-card" method="POST">
                <h3 class="mb-3 heading-primary">Register</h3>
                <div class="mb-3 ">
                    <label for="name" class="col-form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <label for="username" class="col-form-label">Username</label> <br>
                <div class="input-group mb-3 flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">@</span>
                    <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username"
                        aria-describedby="addon-wrapping">
                </div>
                <div class="mb-3 ">
                    <label for="inputPassword" class="col-form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="inputPassword">
                </div>

                <button type="submit" class="btn primary mt-2 mb-3">Register</button> <br>
                <a href="index.php" class="heading-primary mt-2 text-none">Login here </a>
            </form>
        </div>

    </body>

</html>