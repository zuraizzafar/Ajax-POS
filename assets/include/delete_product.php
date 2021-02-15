<?php
    include 'conn.php';
    $id = $_POST['id'];
    $sql = "DELETE FROM products where id = '$id'";
    mysqli_query($conn, $sql)
?>