<?php
include '../assets/include/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/scripts/script.js"></script>
    <script src="../assets/scripts/category.js"></script>
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
                    <a href="../../D03022021/cart/" data-toggle="tooltip" data-placement="right" title="Cart">
                        <i class="fas fa-shopping-cart fa-2x"></i><small><span class="badge badge-light cart-items"></span></small>
                    </a>
                </li>
                <li>
                    <a href="../../D03022021/" data-toggle="tooltip" data-placement="right" title="Manage Products">
                        <i class="fas fa-box fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a href="../add-category/" class="active-nav" data-toggle="tooltip" data-placement="right" title="Add Category">
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
        <h1 class="p-5">
            <i class="fas fa-folder-plus"></i>
            Add Category
        </h1>
        <div class="container">
            <div class="text-right">
                <button type="button" class="btn btn-primary mb-3 rounded-pill" data-toggle="modal" data-target="#add_category">
                    <i class="fas fa-plus mr-2"></i>Add Category
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr#.</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT *
                                FROM categories
                                ORDER BY added_at DESC";
                        $result = mysqli_query($conn, $sql);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr id="<?php echo 'row-' . $row['id'] ?>" >
                                <td class="ser-row"><?php echo $i++; ?></td>
                                <td id="name-<?php echo $row['id']; ?>"><?php echo $row['name']; ?></td>
                                <td><?php if ($row['disabled']=='0'){ ?>
                                    <span id="status-<?php echo $row['id']; ?>" class="badge badge-primary">Active </span>
                                <?php }else{ ?>
                                    <span id="status-<?php echo $row['id']; ?>" class="badge badge-danger">Disabled </span>
                               <?php } ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light dropdown-toggle w-100" data-toggle="dropdown">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu p-2 bg-dark text-center w-100">
                                            <button class="btn btn-sm btn-info view-category" data-toggle="tooltip" data-placement="top" title="View" data-id="<?php echo $row['id'] ?>"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-success edit-category" data-toggle="tooltip" data-placement="top" title="Edit" data-id="<?php echo $row['id'] ?>"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-warning copy-category" data-toggle="tooltip" data-placement="top" title="Copy" data-id="<?php echo $row['id'] ?>"><i class="fas fa-copy"></i></button>
                                            <button class="btn btn-sm btn-danger delete-category" data-toggle="tooltip" data-placement="top" title="Delet" data-id="<?php echo $row['id'] ?>"><i class="fas fa-trash"></i></button>
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

        <div class="modal" id="view_category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h4 class="modal-title">View Category</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="text-center text-muted">
                                <i class="fas fa-boxes fa-5x"></i>
                            </div>
                            <h5 id="category_name" class="font-weight-bold text-center p-2"></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="edit_category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" action="../assets/include/edit_category.php" id="edit-category">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="ecname">Category Name:</label>
                                        <input type="text" maxlength="50" class="form-control" id="ecname" name="ecname" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Product Status:</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="1">Disabled</option>
                                            <option value="0">Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1 invisible">
                                        <label for="id">ID:</label>
                                        <input type="number" class="form-control" id="id" name="id" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success rounded-pill mt-2 loading-btn"><i class="fas fa-save ml-2 mr-3"></i>Update Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="add_category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info text-white">
                        <h4 class="modal-title">Add Category</h4>
                        <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form method="POST" id="add-category">
                                <div class="form-group">
                                    <label for="cname">Category Name:</label>
                                    <input type="text" maxlength="50" class="form-control" id="cname" name="cname" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info rounded-pill mt-2 loading-btn"><i class="fas fa-save ml-2 mr-3"></i>Save Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>