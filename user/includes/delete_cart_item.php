<?php 
    include '../../assets/include/conn.php';
    $uid = $_COOKIE['user_id'];
    $cid = $_POST['cid'];

    $sql = "DELETE from cart where `product_id`='$cid' and `user_id`='$uid'";
    if(mysqli_query($conn, $sql)) {
        // $_COOKIE['cart_items'] -= 1;
        setcookie('cart_items',$_COOKIE['cart_items']-1, time()+(86400 * 7),"/");
    }
?>