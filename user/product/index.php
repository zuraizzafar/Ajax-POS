<?php
include '../../assets/include/conn.php';
if (!isset($_COOKIE['username'])) {
    // header("location: ../login/");
    $logged = 0;
}
else $logged = 1;
$id = $_GET['id'];
$sql = "SELECT * from products where id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product - <?php echo $row['name'] ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../assets/styles/all.css">
    <link rel="shortcut icon" href="../../assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../scripts/product.js"></script>
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
                        <a class="nav-link" href="../cart/"><i class="fas fa-shopping-cart mr-1"></i><span class="badge badge-secondary cart-items-badge mr-1"><?php echo $_COOKIE['cart_items']; ?></span>Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../transactions/"><i class="fas fa-history mr-1"></i>Transactions</a>
                    </li>
                </ul>
                <span class="navbar-text"><?php if ($logged) { ?>
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle mr-2"></i><?php echo $_COOKIE['full_name']; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
                            <a class="dropdown-item" href="../profile/">Manage profile</a>
                            <a class="dropdown-item" href="../../assets/include/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if (!$logged) { ?>
                        <a class="btn btn-light" href="login/">
                            <i class="fas fa-user-circle mr-2"></i> Login or SignUp
                        </a>
                    <?php } ?>
                </span>
            </div>
        </nav>
    </header>
    <section class="site-content pt-4 mt-5">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-4">
                    <img src="../../assets/images/cardboard-box-mock-up.jfif" width="100%" alt="product_img">
                </div>
                <div class="col-sm-8 bg-light border rounded p-3 p-md-4">
                    <h4><?php echo $row['name']; ?></h4>
                    <div class="row">
                        <div class="col-7">
                            <span class="text-muted font-weight-bold"><?php echo $_GET['cat'] ?>, </span>
                            <span class="text-muted"><?php echo $_GET['subcat'] ?></span>
                            <div><span class="font-weight-bold">Price: </span><?php echo $row['price']; ?></div>
                            <label class="mt-1 font-weight-bold" for="pquan">Quantity:</label>
                            <input class="form-control w-50" name="pquan" type="number" min="1" max="<?php echo $row['quantity'] ?>" value="1">
                        </div>
                        <div class="col-5 text-center">
                            <button class="btn btn-success mt-5 pl-5 pt-2 pb-2 pr-5 rounded-pill add-to-cart" data-id="<?php echo $row['id'];?>"><i class="fas fa-cart-plus "></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>