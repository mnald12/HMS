<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelBook - Login</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <link href="./assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="./assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="./dist/css/style.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 card mt-5">
                <div class="card-body">
                    <h2 style="text-align: center">HOTELBOOK</h2>
                    <?php if(isset($_SESSION['login-message'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $_SESSION['login-message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['login-message']); ?>
                    <?php endif ?>
                    <form method="post" action="backend/login.php">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="user">Username</label>
                            <input type="text" id="user" name="user" class="form-control" />
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="pwd">Password</label>
                            <input type="password" name="pwd" id="pwd" class="form-control" />
                        </div>
                        <button class="btn btn-primary btn-block mb-4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>   
    </div>
    <?php include './model/scripts.php' ?>
</body>
</html>