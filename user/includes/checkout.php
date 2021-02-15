<?php 
    include '../../assets/include/conn.php';
    $price = $_POST['price'];
    $uid = $_SESSION['user_id'];
    $sql = "INSERT into transaction_history (`user_id`, `total_price`) values ('$uid','$price')";
    mysqli_query($conn, $sql);
    $sql = "DELETE from cart where `user_id`='$uid'";
    mysqli_query($conn, $sql);
?>