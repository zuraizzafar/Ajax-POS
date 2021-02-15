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
                    <li class="nav-item active">
                        <a class="nav-link" href="../transactions/"><i class="fas fa-history mr-1"></i>Transactions</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <div class="btn-group">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle mr-2"></i><?php echo $_SESSION['full_name']; ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userMenu">
                            <a class="dropdown-item" href="../profile/">Manage profile</a>
                            <a class="dropdown-item" href="../../assets/include/logout.php"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                        </div>
                    </div>
                </span>
            </div>
        </nav>
    </header>
    <section class="site-content pt-4 mt-5">
        <div class="container mt-4">
            <h3 class="text-center"><i class="fas fa-history mr-2"></i>Transactions</h3>
            <div class="table-responsive">
                <table class="table mt-4 table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr#</th>
                            <th>Total Purchase</th>
                            <th>Time of purchase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $uid = $_SESSION['user_id'];
                        $sql = "SELECT * FROM transaction_history where `user_id` = '$uid'";
                        $result = mysqli_query($conn, $sql);
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>Rs. <?php echo $row['total_price']; ?></td>
                                <td><?php echo $row['added_at']; ?></td>
                            </tr>
                        <?php
                            $i += 1;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>