<?php 
    include '../../assets/include/conn.php';
    $uid = $_SESSION['user_id'];
    $cid = $_POST['cid'];

    $sql = "DELETE from cart where `product_id`='$cid' and `user_id`='$uid'";
    if(mysqli_query($conn, $sql)) {
        $_SESSION['cart_items'] -= 1;
    }
?>