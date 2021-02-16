<?php
include '../../assets/include/conn.php';
if (!isset($_SESSION['username'])) {
    header("location: ../login/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - User Transactions Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../assets/styles/all.css">
    <link rel="shortcut icon" href="../../assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../scripts/profile.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="../../user/">
                <img src="../../assets/images/icons8-truck-100.png" alt="icon" width="40px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../user/"><i class="fas fa-home mr-1"></i>Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../cart/"><i class="fas fa-shopping-cart mr-1"></i>Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../transactions/"><i class="fas fa-history mr-1"></i>Transactions</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle mr-2"></i><?php echo $_SESSION['full_name']; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
                            <a class="dropdown-item active" href="../profile">Manage profile</a>
                            <a class="dropdown-item" href="../../assets/include/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                </span>
            </div>
        </nav>
    </header>
    <section class="site-content pt-4 mt-5">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-center mb-3">Change Personal information</h4>
                    <form class="login-form w-100 change-profile">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username" value="<?php echo $_SESSION["username"]; ?>" required>
                            <small id="usernameHelp" class="form-text text-muted">Type your username here (Not the your full name).</small>
                        </div>
                        <div class="form-group">
                            <label for="fname">Full name</label>
                            <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fnameHelp" placeholder="Enter full name" value="<?php echo $_SESSION["full_name"]; ?>" required>
                            <small id="fnameHelp" class="form-text text-muted">Type your legal fullname here.</small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary login-btn rounded-pill"><i class="fas fa-cloud-upload-alt mr-2"></i>Update Profile</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center mb-3">Change Password</h4>
                    <form class="login-form w-100 change-password">
                        <div class="form-group">
                            <label for="cpassword">Current Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password" required>
                            <small id="fnameHelp" class="form-text text-muted">Type your current password here.</small>
                        </div>
                        <div class="form-group">
                            <label for="npassword">New Password</label>
                            <input type="password" class="form-control" id="npassword" name="npassword" placeholder="Password" required>
                            <small id="fnameHelp" class="form-text text-muted">Type your new password here.</small>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary login-btn rounded-pill"><i class="fas fa-cloud-upload-alt mr-2"></i>Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>