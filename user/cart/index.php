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
    <title>Welcome - User Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../assets/styles/all.css">
    <link rel="shortcut icon" href="../../assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../scripts/cart.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="../cart/"><i class="fas fa-shopping-cart mr-1"></i>Cart</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle mr-2"></i><?php echo $_SESSION['username']; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
                            <a class="dropdown-item" href="#">Manage profile</a>
                            <a class="dropdown-item" href="../../assets/include/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                </span>
            </div>
        </nav>
    </header>
    <section class="site-content pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 bg-light pt-3 pb-2">
                    <div class="row" style="overflow-y: auto; height: 420px;">
                        <?php
                        $pids = $_SESSION["products"]["product"];
                        asort($pids);
                        $price = 0;
                        foreach ($pids as $index => $id) {
                            $sql = "SELECT * from products where id = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $i = 1;
                            $indx = $index;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $quan = $_SESSION["products"]["quantity"][$indx];
                        ?>
                                <div class="col-md-12" class="cart-card" data-id="<?php echo $row['id']; ?>" id="cart-item-<?php echo $row['id']; ?>">
                                    <div class="card mb-4">
                                        <div class="row">
                                            <img class="col-4" src="../../assets/images/cardboard-box-mock-up.jfif" alt="Prodcut" draggable="false">
                                            <div class="card-body col-8">
                                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                                <div class="row">
                                                    <div class="card-text col-5"><strong>Price: </strong>Rs. <span class="item-price" data-id="<?php echo $row['id']; ?>"><?php echo $row['price'] ?></span></div>
                                                    <div class="form-group col-3">
                                                        <input class="form-control cart-item-quan" min="1" data-id="<?php echo $row['id'] ?>" type="number" id="cart-item-quantity-<?php echo $row['id'] ?>" value="<?php echo $quan; ?>">
                                                    </div>
                                                    <div class="col-4 text-center"><button class="btn btn-danger delete-item" data-id="<?php echo $row['id']; ?>"> <i class="fas fa-trash"></i> </button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                if ($quan == 1)
                                    $price = $price + $row['price'];
                                else {
                                    while ($quan >= 1) {
                                        $price = $price + $row['price'];
                                        $quan = $quan - 1;
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container border rounded bg-light">
                        <h2 class="mt-3 text-center">Total</h2>
                        <hr>
                        <div class="container">
                            <h5 class="mt-4">Sub-total:</h5>
                            <div class="text-muted text-right">Rs. <span class="cart-price"><?php echo $price; ?></span></div>
                        </div>
                        <button class="btn btn-success w-100 rounded-0 mt-4 mb-4 checkout">Checkout</button>
                        <div class="container credit-cards mb-3">
                            <h6>We Accept:</h6>
                            <div class="text-center mt-2 text-muted">
                                <i class="fab fa-cc-mastercard fa-3x mr-2"></i>
                                <i class="fab fa-cc-visa fa-3x mr-2"></i>
                                <i class="fab fa-cc-paypal fa-3x mr-2"></i>
                                <i class="fab fa-cc-apple-pay fa-3x mr-2"></i>
                                <i class="fab fa-cc-amazon-pay fa-3x mr-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>