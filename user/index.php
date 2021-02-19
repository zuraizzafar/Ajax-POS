<?php
include '../assets/include/conn.php';
if (!isset($_COOKIE['username'])) {
    // header("location: login/");
    $logged = 0;
}
else $logged = 1;
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
    <link rel="stylesheet" href="../assets/styles/all.css">
    <link rel="shortcut icon" href="../assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="scripts/home.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="../user/">
                <img src="../assets/images/icons8-truck-100.png" alt="icon" width="40px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../user/"><i class="fas fa-home mr-1"></i>Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart/"><i class="fas fa-shopping-cart mr-1"></i><span class="badge badge-secondary cart-items-badge mr-1"><?php echo $_COOKIE['cart_items']; ?></span>Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transactions/"><i class="fas fa-history mr-1"></i>Transactions</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php if ($logged) { ?>
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle mr-2"></i><?php echo $_COOKIE['full_name']; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
                            <a class="dropdown-item" href="profile/">Manage profile</a>
                            <a class="dropdown-item" href="../assets/include/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
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
    <section class="site-content pt-5 mt-5">
        <div class="text-center">
            <input type="text" id="search-product" name="search" placeholder="Search products..." class="form-control w-50 mr-auto ml-auto rounded-pill">
        </div>
        <div class="container mt-3">
            <div class="row">
                <?php
                $sql = "SELECT  products.name 'product', products.quantity 'quant',
                                products.id 'pid', products.disabled, products.added_at 'added',
                                categories.name 'category', products.disabled 'disable',
                                sub_category.name 'subcat', categories.disabled, products.price
                        FROM products
                        LEFT JOIN categories
                        ON products.category = categories.id
                        INNER JOIN sub_category
                        ON categories.id = sub_category.category
                        WHERE sub_category.id = products.subcategory and categories.disabled = '0' and products.disabled = '0'
                        ORDER BY added DESC";
                $result = mysqli_query($conn, $sql);
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-md-3 product-card" id="card-<?php echo $row['pid']; ?>">
                        <div class="card mb-4">
                            <img class="card-img-top" src="../assets/images/cardboard-box-mock-up.jfif" alt="Prodcut" draggable="false">
                            <div class="card-body">
                                <h5 class="card-title" data-id="<?php echo $row['pid'];?>"><?php echo $row['product']; ?></h5>
                                <div class="card-text"><strong>Price: </strong>Rs. <?php echo $row['price']; ?></div>
                                <div class="card-text"><strong>Category: </strong><?php echo $row['category']; ?></div>
                                <small class="text-muted"><strong>Subcategory: </strong><?php echo $row['subcat']; ?></small> <br>
                                <div class="text-center">
                                    <button class="btn btn-success mt-2 pl-5 pr-5 rounded-pill add-to-cart" data-id="<?php echo $row['pid'];?>" data-cat="<?php echo $row['category']; ?>" data-subcat="<?php echo $row['subcat']; ?>"><i class="fas fa-cart-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }   ?>
            </div>
        </div>
    </section>
    <footer>

    </footer>
</body>

</html>