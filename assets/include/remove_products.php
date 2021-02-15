<?php
    include 'conn.php';
    $id = $_POST['pid'];
    $sql = "UPDATE products SET `disabled`='1' where id=$id";
    mysqli_query($conn, $sql);
?>