<?php
include '../assets/include/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/scripts/script.js"></script>
    <script src="../assets/scripts/cart-page.js"></script>
    <link rel="stylesheet" href="../assets/styles/all.css">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="shortcut icon" href="../assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <nav class="lg-nav">
            <button class="btn btn-transparent w-100 text-white side-bar"><i class="fas fa-bars fa-2x"></i></button>
            <ul>
                <li>
                    <a href="../../D03022021/home.php" data-toggle="tooltip" data-placement="right" title="Home">
                        <i class="fas fa-home fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="../../D03022021/cart/" class="active-nav" data-toggle="tooltip" data-placement="right" title="Cart">
                        <i class="fas fa-shopping-cart fa-2x"></i><small><span class="badge badge-light cart-items"></span></small>
                    </a>
                </li>
                <li>
                    <a href="../../D03022021/" data-toggle="tooltip" data-placement="right" title="Manage Products">
                        <i class="fas fa-box fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="../add-category/" data-toggle="tooltip" data-placement="right" title="Add Category">
                        <i class="fas fa-boxes fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="../add-subcategory/" data-toggle="tooltip" data-placement="right" title="Add Subcategory">
                        <i class="fas fa-stream fa-2x"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="main">
        <h1 class="p-5 m-0">
            <i class="fas fa-shopping-cart"></i>
            Cart
        </h1>
        <div class="container">
            <h3>Cart Items</h3>
            <hr>
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
                                            <img class="col-4" src="../assets/images/cardboard-box-mock-up.jfif" alt="Prodcut" draggable="false">
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
                                if ($quan==1)
                                    $price = $price + $row['price'];
                                else {
                                    while($quan>=1) {
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