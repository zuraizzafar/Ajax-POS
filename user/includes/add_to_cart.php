<?php
include '../../assets/include/conn.php';
if (!isset($_COOKIE['user_id'])) {
    $id = $_POST['pid'];
    $pquan = $_POST['pquan'];
    if (array_search($id, $_SESSION["products"]["product"]) == NULL) {
        array_push($_SESSION["products"]["product"], $id);
        setcookie('cart_items', $_COOKIE['cart_items'] + 1, time() + (86400 * 7), "/");
        array_push($_SESSION["products"]["quantity"], $pquan);
        echo 1;
    } else {
        $index = array_search($id, $_SESSION["products"]["product"]);
        $quantity = $_SESSION["products"]["quantity"][$index];
        $_SESSION["products"]["quantity"][$index] = $quantity + $pquan;
    }
} else {
    $pid = $_POST['pid'];
    $pquan = $_POST['pquan'];
    if (!isset($_COOKIE['user_id']))
        $uid = $_SERVER['REMOTE_ADDR'];
    else $uid = $_COOKIE['user_id'];
    $ceheck_sql = "SELECT * from cart where `user_id`='$uid' and `product_id`='$pid'";
    $check_result = mysqli_query($conn, $ceheck_sql);
    if (mysqli_num_rows($check_result)) {
        $sql = "UPDATE cart SET product_quantity = product_quantity + $pquan where `user_id`='$uid' and `product_id`='$pid'";
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
        $sql = "INSERT INTO cart(`user_id`,`product_id`,`product_quantity`) values ('$uid', '$pid', '$pquan')";
        setcookie('cart_items', $_COOKIE['cart_items'] + 1, time() + (86400 * 7), "/");
        echo 1;
    }
    mysqli_query($conn, $sql);
}
