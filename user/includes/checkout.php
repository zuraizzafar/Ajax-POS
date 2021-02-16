<?php 
    include '../../assets/include/conn.php';
    $price = $_POST['price'];
    $uid = $_COOKIE['user_id'];
    $sql = "INSERT into transaction_history (`user_id`, `total_price`) values ('$uid','$price')";
    mysqli_query($conn, $sql);
    $sql = "DELETE from cart where `user_id`='$uid'";
    mysqli_query($conn, $sql);
    setcookie('cart_items',0, time()+(86400 * 7),"/");
    // $_COOKIE['cart_items'] = 0;
?>