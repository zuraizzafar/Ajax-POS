<?php 
    include '../../assets/include/conn.php';
    $pid = $_POST['pid'];
    $uid = $_COOKIE['user_id'];
    $ceheck_sql = "SELECT * from cart where `user_id`='$uid' and `product_id`='$pid'";
    $check_result = mysqli_query($conn, $ceheck_sql);
    if(mysqli_num_rows($check_result)) {
        $sql = "UPDATE cart SET product_quantity = product_quantity + 1 where `user_id`='$uid' and `product_id`='$pid'";
    }
    else {
        $sql = "INSERT INTO cart(`user_id`,`product_id`,`product_quantity`) values ('$uid', '$pid', '1')";
        setcookie('cart_items',$_COOKIE['cart_items']+1, time()+(86400 * 7),"/");
        echo 1;
    }
    mysqli_query($conn, $sql);
?>