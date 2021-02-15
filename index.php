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
    <!-- <script src="assets/scripts/add.js"></script> -->
    <script src="assets/scripts/home.js"></script>
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
                    <a href="../D03022021/home.php" data-toggle="tooltip" data-placement="right" title="Home">
                        <i class="fas fa-home fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="../../D03022021/cart/" data-toggle="tooltip" data-placement="right" title="Cart">
                        <i class="fas fa-shopping-cart fa-2x"></i><small><span class="badge badge-light cart-items"></span></small>
                    </a>
                </li>
                <li>
                    <a href="../D03022021/" class="active-nav" data-toggle="tooltip" data-placement="right" title="Manage Products">
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
            <i class="fas fa-boxes"></i>
            All Products
        </h1>
        <div class="container">
            <div class="alert alert-success alert-dismissible alert" id="bs-alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> The product has been added successfuly to the database.
            </div>
            <div class="text-right">
                <button type="button" class="btn pl-4 pr-4 btn-primary mb-3 rounded-pill" data-toggle="modal" data-target="#add_product">
                    <i class="fas fa-plus mr-2 "></i>Add Product
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr#.</th>
                            <th>Product </th>
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="main-table">
                        <?php
                        $sql = "SELECT  products.name 'product', products.quantity 'quant',
                                        products.id, products.disabled, products.added_at 'added',
                                        categories.name 'category', products.disabled 'disable',
                                        sub_category.name 'subcat', categories.disabled, products.price
                                FROM products
                                LEFT JOIN categories
                                ON products.category = categories.id
                                INNER JOIN sub_category
                                ON categories.id = sub_category.category
                                WHERE sub_category.id = products.subcategory and categories.disabled = '0'
                                ORDER BY added DESC";
                        $result = mysqli_query($conn, $sql);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr id="<?php echo 'row-' . $row['id'] ?>" <?php if ($row['disabled'] == '1') echo 'class="bg-danger text-white"'; ?>>
                                <td class="ser-row"><?php echo $i++; ?></td>
                                <td id="name-<?php echo $row['id'] ?>"><?php echo $row['product']; ?></td>
                                <td id="cat-<?php echo $row['id'] ?>"><?php echo $row['category']; ?></td>
                                <td id="subcat-<?php echo $row['id'] ?>"><?php echo $row['subcat']; ?></td>
                                <td id="quantity-<?php echo $row['id'] ?>"><?php echo $row['quant']; ?></td>
                                <td id="price-<?php echo $row['id'] ?>"><?php echo $row['price']; ?></td>
                                <td>
                                    <?php if ($row['disable'] == '0') { ?>
                                        <span id="status-<?php echo $row['id'] ?>" class="badge badge-primary">Active</span>
                                    <?php } else { ?>
                                        <span id="status-<?php echo $row['id'] ?>" class="badge badge-danger">Disabled</span>
                                    <?php } ?>
                                </td>
                                <td id="action-<?php echo $row['id'] ?>">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light dropdown-toggle w-100" data-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu p-2 bg-dark text-center w-100">
                                            <button class="btn btn-sm btn-info view-product" data-toggle="tooltip" data-placement="top" title="View" data-id="<?php echo $row['id'] ?>"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-success edit-product" data-toggle="tooltip" data-placement="top" title="Edit" data-id="<?php echo $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-warning copy-product" data-toggle="tooltip" data-placement="top" title="Copy" data-id="<?php echo $row['id'] ?>"><i class="fas fa-copy"></i></button>
                                            <button class="btn btn-sm btn-danger delete-product" data-toggle="tooltip" data-placement="top" title="Delet" data-id="<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal" id="add_product">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h4 class="modal-title">Add Product</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form action="../assets/include/add_product.php" method="POST" id="add-product">
                                <div class="form-group">
                                    <label for="pname">Product Name:</label>
                                    <input type="text" maxlength="50" class="form-control" id="pname" name="pname" required>
                                </div>
                                <div class="form-group">
                                    <label for="pquan">Product Quantity:</label>
                                    <input type="number" min="0" class="form-control" id="pquan" name="pquan" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="pcat">Product Category:</label>
                                        <select class="form-control" id="pcat" name="pcat" required>
                                            <option value="" checked>Select Category</option>
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pscat">Product Sub Category:</label>
                                        <select class="form-control" id="pscat" name="pscat" disabled required>
                                            <option value="" checked>Select Sub Category</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price">Product Price:</label>
                                        <input type="number" min="0" class="form-control" id="price" name="price" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="save-p-btn" class="btn btn-primary rounded-pill mt-2"><i class="fas fa-save ml-2 mr-2"></i>Save Products</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="copy_product">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning text-white">
                        <h4 class="modal-title">Copy Product</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="copy-product">
                                <div class="form-group">
                                    <label for="pname">Product Name:</label>
                                    <input type="text" maxlength="50" class="form-control" id="pname" name="pname" required>
                                </div>
                                <div class="form-group">
                                    <label for="pquan">Product Quantity:</label>
                                    <input type="number" min="0" class="form-control" id="pquan" name="pquan" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="pcat">Product Category:</label>
                                        <select class="form-control" id="pcat" name="pcat" required>
                                            <option value="" checked>Select Category</option>
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cpscat">Product Sub Category:</label>
                                        <select class="form-control" id="pscat" name="pscat" required>
                                            <option value="" checked>Select Sub Category</option>
                                            <?php
                                            $sql = "SELECT * FROM sub_category";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="price">Product Price:</label>
                                        <input type="number" min="0" class="form-control" id="price" name="price" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="copy-p-btn" class="btn btn-warning rounded-pill mt-2"><i class="fas fa-save ml-2 mr-2"></i>Save Products</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="edit_product">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Edit Product</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="edit-product">
                                <div class="form-group">
                                    <label for="epname">Product Name:</label>
                                    <input type="text" maxlength="50" class="form-control" id="epname" name="epname" required>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="epquan">Product Quantity:</label>
                                        <input type="number" min="0" class="form-control" id="epquan" name="epquan" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="epcat">Product Category:</label>
                                        <select class="form-control" id="epcat" name="epcat" required>
                                            <option value="" checked>Select Category</option>
                                            <?php
                                            $sql = "SELECT * FROM categories";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="epscat">Product Sub Category:</label>
                                        <select class="form-control" id="epscat" name="epscat" required>
                                            <option value="" checked>Select Sub Category</option>
                                            <?php
                                            $sql = "SELECT * FROM sub_category";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="status">Product Status:</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="1">Disabled</option>
                                            <option value="0">Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="eprice">Product Price:</label>
                                        <input type="number" min="0" class="form-control" id="eprice" name="eprice" required>
                                    </div>
                                    <div class="form-group col-1 invisible">
                                        <label for="cpquan">ID:</label>
                                        <input type="number" min="0" class="form-control" id="id" name="id" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="edit-p-btn" class="btn btn-success rounded-pill mt-2"><i class="fas fa-save ml-2 mr-2"></i>Update Products</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="view_product">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h4 class="modal-title">View Product Details</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="text-center text-muted">
                                <i class="fas fa-box fa-5x"></i>
                            </div>
                            <h5 id="product_name" class="font-weight-bold text-center p-2"></h5>
                            <div class="pl-5 pr-5 pt-2">
                                <div class="p-1">
                                    <i class="fas fa-chart-pie"></i>
                                    <span class="font-weight-bold">Quantity: </span>
                                    <span id="product_quan"></span>
                                </div>
                                <div class="p-1">
                                    <i class="fas fa-boxes"></i>
                                    <span class="font-weight-bold">Category: </span>
                                    <span id="product_cat"></span>
                                </div>
                                <div class="p-1">
                                    <i class="fas fa-stream"></i>
                                    <span class="font-weight-bold">Subcategory: </span>
                                    <span id="product_subcat"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>