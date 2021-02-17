<?php
include '../../assets/include/conn.php';
if (!isset($_COOKIE['user_id'])) {
    session_start();
    $id = $_POST['cid'];
    $key = array_search($id, $_SESSION['products']["product"]);
    if ($key !== false) {
        unset($_SESSION['products']["product"][$key]);
        unset($_SESSION['products']["quantity"][$key]);
    }
}
else {
    $uid = $_COOKIE['user_id'];
    $cid = $_POST['cid'];

    $sql = "DELETE from cart where `product_id`='$cid' and `user_id`='$uid'";
    if (mysqli_query($conn, $sql)) {
        // $_COOKIE['cart_items'] -= 1;
        setcookie('cart_items', $_COOKIE['cart_items'] - 1, time() + (86400 * 7), "/");
    }
}
