<?php
include "../../assets/include/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Login or Signup to continue</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="shortcut icon" href="../../assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="../scripts/login.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../../assets/styles/all.css">
</head>

<body class=" bg-dark">
    <header>

    </header>
    <section class="main-content text-white">
        <div class="container">
            <div class="container login-banner">
                <h2 class="text-center pb-4 pt-4">Login or Signup now</h2>
                <div class="row">
                    <div class="col-md-6 bg-primary border border-info rounded-left d-none d-lg-block">
                        <figure class="text-center mt-5">
                            <i class="fas fa-rocket fa-5x"></i>
                        </figure>
                        <div class="conatiner p-3 p-md-5 text-center">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum modi et hic sed. Architecto provident saepe nihil, quae neque vel nisi cum ab! Quos modi, quaerat fugit iusto maxime perspiciatis!</p>
                        </div>
                        <h5 class="text-center pl-3 pr-3 pl-md-5 pr-md-5">
                            Join us now to avail amazing offer and discounts online!
                        </h5>
                        <figure class="text-center pt-2">
                            <i class="fas fa-sign-in-alt fa-2x"></i>
                        </figure>
                    </div>
                    <div id="login_carousel" class="carousel slide col-md-6 p-3 p-md-5 rounded-right bg-light text-dark" data-ride="carousel" data-interval="false" data-keyboard="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container">
                                    <h3 class="text-muted border-bottom d-inline-block pb-2 pr-3">Login<i class="fas fa-sign-in-alt ml-2"></i></h3>
                                    <form class="login-form w-100">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username">
                                            <small id="usernameHelp" class="form-text text-muted">Type your username here (Not the your full name).</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary login-btn">Login</button>
                                        <span class="p-3 signup-switch">Dont have an accuount? Signup Now!</span>
                                        <div class="form-group invisible">
                                            <label for="fname">Full name</label>
                                            <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fnameHelp" placeholder="Enter full name">
                                            <small id="fnameHelp" class="form-text text-muted">Type your legal fullname here.</small>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <h3 class="text-muted border-bottom d-inline-block pb-2 pr-3">Signup<i class="fas fa-user-plus ml-3"></i></h3>
                                    <form class="signup-form w-100">
                                        <div class="form-group">
                                            <label for="sfname">Full name</label>
                                            <input type="text" class="form-control" id="sfname" name="sfname" aria-describedby="sfnameHelp" placeholder="Enter full name" required>
                                            <small id="sfnameHelp" class="form-text text-muted">Type your legal fullname here.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="susername">Username</label>
                                            <input type="text" class="form-control" id="susername" name="susername" aria-describedby="susernameHelp" placeholder="Enter username" required>
                                            <small id="susernameHelp" class="form-text text-muted">Type your username here (Not the your full name).</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="spassword">Password</label>
                                            <input type="password" class="form-control" id="spassword" name="spassword" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary signup-btn">Signup</button>
                                        <span class="p-3 signin-switch">Dont have an accuount? Signup Now!</span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>

    </footer>
</body>

</html>