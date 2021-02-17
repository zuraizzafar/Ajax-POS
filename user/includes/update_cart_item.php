<?php
include '../../assets/include/conn.php';
if (!isset($_COOKIE['user_id'])) {
    session_start();
    $id = $_POST['cid'];
    $quantity = $_POST['quan'];
    if (array_search($id, $_SESSION["products"]["product"]) == NULL);
    else {
        $index = array_search($id, $_SESSION["products"]["product"]);
        $_SESSION["products"]["quantity"][$index] = $quantity;
        // echo $quantity;
    }
} else {
    $uid = $_COOKIE['user_id'];
    $pid = $_POST['cid'];
    $quan = $_POST['quan'];

    $sql = "UPDATE cart set `product_quantity`='$quan' where `user_id`='$uid' and `product_id`='$pid'";
    mysqli_query($conn, $sql);
}
