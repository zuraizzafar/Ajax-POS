<?php include 'assets/include/conn.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/scripts/script.js"></script>
    <script src="assets/scripts/cart.js"></script>
    <link rel="stylesheet" href="assets/styles/all.css">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <link rel="shortcut icon" href="assets/images/icons8-truck-100.png" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <header>
        <nav class="lg-nav">
            <button class="btn btn-transparent w-100 text-white side-bar"><i class="fas fa-bars fa-2x"></i></button>
            <ul>
                <li>
                    <a href="../D03022021/home.php" class="active-nav" data-toggle="tooltip" data-placement="right" title="Home">
                        <i class="fas fa-home fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="../../D03022021/cart/" data-toggle="tooltip" data-placement="right" title="Cart">
                        <i class="fas fa-shopping-cart fa-2x"></i><small><span class="badge badge-light cart-items"></span></small>
                    </a>
                </li>
                <li>
                    <a href="../D03022021/" data-toggle="tooltip" data-placement="right" title="Manage Products">
                        <i class="fas fa-box fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="add-category/" data-toggle="tooltip" data-placement="right" title="Add Category">
                        <i class="fas fa-boxes fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="add-subcategory/" data-toggle="tooltip" data-placement="right" title="Add Subcategory">
                        <i class="fas fa-stream fa-2x"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <section class="main">
        <h1 class="p-5">
            <i class="fas fa-home"></i>
            Home
        </h1>
        <div class="container">
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
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img class="card-img-top" src="assets/images/cardboard-box-mock-up.jfif" alt="Prodcut" draggable="false">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['product']; ?></h5>
                            <div class="card-text"><strong>Price: </strong>Rs. <?php echo $row['price']; ?></div>
                            <div class="card-text"><strong>Category: </strong><?php echo $row['category']; ?></div>
                            <small class="text-muted"><strong>Subcategory: </strong><?php echo $row['subcat']; ?></small> <br>
                            <div class="text-center">
                                <button class="btn btn-success mt-1 pl-5 pr-5 rounded-pill add-to-cart" data-id="<?php echo $row['pid']; ?>"><i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }   ?>
            </div>
        </div>
    </section>
</body>

</html>