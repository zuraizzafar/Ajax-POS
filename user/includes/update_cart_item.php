<?php 
    include '../../assets/include/conn.php';
    $uid = $_SESSION['user_id'];
    $pid = $_POST['cid'];
    $quan = $_POST['quan'];

    $sql = "UPDATE cart set `product_quantity`='$quan' where `user_id`='$uid' and `product_id`='$pid'";
    mysqli_query($conn, $sql);
?>